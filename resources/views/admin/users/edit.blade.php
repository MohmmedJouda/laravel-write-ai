@extends('layouts.main')

@section('title', "Edit User: {$user->name}")

@section('content')
<div class="pt-24 pb-section-gap px-gutter max-w-container-max mx-auto">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8 border-b border-outline-variant pb-4">
            <h1 class="font-display-lg text-display-lg text-on-surface">Manage User Roles</h1>
            <p class="text-secondary font-body-md">Assigning roles to <strong>{{ $user->name }}</strong> ({{ $user->email }})</p>
        </div>

        <form action="{{ route('admin.users.update', $user) }}" method="POST" class="bg-surface border border-outline-variant rounded-xl p-8 space-y-6">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <span class="block font-ui-label text-ui-label text-on-surface text-lg">Available Roles</span>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($roles as $role)
                        <label class="flex items-center gap-3 p-4 bg-surface-container-low border border-outline-variant rounded-xl cursor-pointer hover:border-primary transition-all has-[:checked]:bg-primary-container has-[:checked]:border-primary group">
                            <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                {{ $user->roles->contains($role->id) ? 'checked' : '' }}
                                class="w-6 h-6 text-primary border-outline-variant rounded-lg focus:ring-primary bg-surface transition-all">
                            <div class="flex flex-col">
                                <span class="text-ui-label font-bold text-on-surface group-has-[:checked]:text-on-primary-container transition-colors">{{ $role->name }}</span>
                                <span class="text-metadata font-metadata text-secondary group-has-[:checked]:text-on-primary-container/80 transition-colors">
                                    {{ count($role->abilities) }} abilities
                                </span>
                            </div>
                        </label>
                    @endforeach
                </div>
                @error('roles') <p class="text-error text-metadata mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- Hidden field for User Name and Email to pass validation if implemented strictly in Controller -->
            <input type="hidden" name="name" value="{{ $user->name }}">
            <input type="hidden" name="email" value="{{ $user->email }}">

            <div class="pt-6 flex gap-4 border-t border-outline-variant">
                <button type="submit" class="bg-primary text-on-primary px-10 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all shadow-lg shadow-primary/20">
                    Save Changes
                </button>
                <a href="{{ route('admin.users.index') }}" class="text-secondary hover:text-on-surface px-8 py-3 font-ui-button text-ui-button transition-all">
                    Back to List
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
