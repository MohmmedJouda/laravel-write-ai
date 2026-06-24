@extends('layouts.main')

@section('title', ($role->exists ? 'Edit Role' : 'Create Role'))

@section('content')
<div class="pt-24 pb-section-gap px-gutter max-w-container-max mx-auto">
    <div class="max-w-2xl mx-auto">
        <div class="mb-8">
            <h1 class="font-display-lg text-display-lg text-on-surface">{{ $role->exists ? 'Edit Role' : 'Create Role' }}</h1>
            <p class="text-secondary font-body-md">Define the role name and its associated permissions (abilities).</p>
        </div>

        <form action="{{ $role->exists ? route('admin.roles.update', $role) : route('admin.roles.store') }}" method="POST" class="bg-surface border border-outline-variant rounded-xl p-8 space-y-6">
            @csrf
            @if($role->exists)
                @method('PUT')
            @endif

            <div class="space-y-2">
                <label for="name" class="block font-ui-label text-ui-label text-on-surface">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" required
                    class="w-full bg-surface-container border border-outline-variant rounded-lg px-4 py-2 focus:ring-2 focus:ring-primary focus:border-transparent outline-none transition-all">
                @error('name') <p class="text-error text-metadata mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="space-y-4">
                <span class="block font-ui-label text-ui-label text-on-surface">Abilities</span>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($abilities as $key => $label)
                        <label class="flex items-center gap-3 p-3 bg-surface-container-low border border-outline-variant rounded-lg cursor-pointer hover:border-primary transition-all">
                            <input type="checkbox" name="abilities[]" value="{{ $key }}"
                                {{ in_array($key, old('abilities', $role->abilities ?? [])) ? 'checked' : '' }}
                                class="w-5 h-5 text-primary border-outline-variant rounded focus:ring-primary bg-surface">
                            <span class="text-ui-label font-ui-label text-on-surface">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
                @error('abilities') <p class="text-error text-metadata mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="pt-4 flex gap-4">
                <button type="submit" class="bg-primary text-on-primary px-8 py-3 rounded-lg font-ui-button text-ui-button hover:opacity-90 active:scale-95 transition-all">
                    {{ $role->exists ? 'Update Role' : 'Create Role' }}
                </button>
                <a href="{{ route('admin.roles.index') }}" class="text-secondary hover:text-on-surface px-8 py-3 font-ui-button text-ui-button transition-all">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
