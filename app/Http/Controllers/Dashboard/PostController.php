<?php

namespace App\Http\Controllers\Dashboard;

use App\Actions\FileUpload;
use App\Actions\SyncPostTags;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\Scopes\OwnerScope;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;
use Illuminate\Support\Str;
use Throwable;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', Post::class);

        $status = $request->query('status', 'published');

        $status_options = array_map(function ($value) {
            return [
                'name' => ucfirst($value),
                'count' => Post::query()->where('status', $value)->count(),
            ];
        }, [
            'published',
            'draft',
            'archived',
        ]);

        $user = Auth::user();

        $posts = $user->posts()
            ->with('category')
            ->withCount('comments')
            ->where('status', $status)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('dashboard.posts.index', [
            'posts' => $posts,
            'status' => $status,
            'status_options' => $status_options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Post::class);

        return view('dashboard.posts.create', [
            'post' => new Post(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request, PostService $service)
    {
        Gate::authorize('create', Post::class);

        try {
            $service->create($request);
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'Failed to create post: ' . $e->getMessage(),
                ]);
        }

        return redirect()
            ->route('dashboard.posts.index')
            ->with('status', 'Post created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('view', $post);

        return view('dashboard.posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);

        return view('dashboard.posts.edit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, FileUpload $fileUpload, SyncPostTags $syncPostTags, string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('update', $post);

        $clean = $request->validated();
        $data = \array_merge($clean, [
            'cover_image' => $fileUpload->handle(key: 'cover', path: 'covers')
        ]);

        try {
            DB::transaction(function () use ($post, $data, $syncPostTags, $clean) {
                $post->update($data);

                $syncPostTags->handle($post, $clean['tags'] ?? '');
            });
        } catch (Throwable $e) {
            return back()
                ->withInput()
                ->withErrors([
                    'error' => 'Failed to update post: ' . $e->getMessage(),
                ]);
        }


        $previous = $post->getOriginal();
        $prev_cover_image = $previous['cover_image'] ?? null;
        if ($prev_cover_image !== $post->cover_image) {
            Storage::disk('public')->delete($previous['cover_image']);
        }

        return redirect()->route('dashboard.posts.index')
            ->with('status', 'Post updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        Gate::authorize('delete', $post);

        $post->delete();

        return redirect()->route('dashboard.posts.index')
            ->with('status', 'Post deleted!');
    }

    public function restore(string $id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        Gate::authorize('restore', $post);

        $post->restore();

        return redirect()->route('dashboard.posts.index')
            ->with('status', 'Post restored!');
    }

    public function forceDelete(string $id)
    {
        $post = Post::onlyTrashed()->findOrFail($id);
        Gate::authorize('forceDelete', $post);

        $post->forceDelete();

        return redirect()->route('dashboard.posts.index')
            ->with('status', 'Post permanently deleted!');
    }
}
