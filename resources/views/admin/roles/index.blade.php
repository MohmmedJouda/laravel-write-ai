@extends('layouts.main')

@section('title', 'Manage Roles')

@section('content')
<div class="pt-24 pb-section-gap px-gutter max-w-container-max mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="font-display-lg text-display-lg text-on-surface">Manage Roles</h1>
        <a href="{{ route('admin.roles.create') }}" class="bg-primary text-on-primary px-6 py-2 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all">
            Create New Role
        </a>
    </div>

    @if(session('success'))
        <div class="bg-primary-fixed text-on-primary-fixed p-4 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-surface border border-outline-variant rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-surface-container-low border-b border-outline-variant text-on-surface-variant font-ui-label text-ui-label">
                    <th class="p-4">Name</th>
                    <th class="p-4">Abilities</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody class="text-on-surface">
                @foreach($roles as $role)
                    <tr class="border-b border-outline-variant hover:bg-surface-container transition-colors">
                        <td class="p-4 font-medium">{{ $role->name }}</td>
                        <td class="p-4">
                            <div class="flex flex-wrap gap-2">
                                @forelse($role->abilities as $ability)
                                    <span class="bg-secondary-container text-on-secondary-container px-2 py-0.5 rounded text-metadata font-metadata">
                                        {{ config("abilities.$ability", $ability) }}
                                    </span>
                                @empty
                                    <span class="text-secondary italic">No abilities</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="p-4">
                            <div class="flex gap-3">
                                <a href="{{ route('admin.roles.edit', $role) }}" class="text-primary hover:underline font-ui-label text-ui-label">Edit</a>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-error hover:underline font-ui-label text-ui-label">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $roles->links() }}
    </div>
</div>
@endsection
