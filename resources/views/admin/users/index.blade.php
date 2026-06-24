@extends('layouts.main')

@section('title', 'Manage Users')

@section('content')
<div class="pt-24 pb-section-gap px-gutter max-w-container-max mx-auto">
    <div class="flex justify-between items-center mb-8">
        <h1 class="font-display-lg text-display-lg text-on-surface">Manage Users</h1>
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
                    <th class="p-4">Email</th>
                    <th class="p-4">Roles</th>
                    <th class="p-4">Actions</th>
                </tr>
            </thead>
            <tbody class="text-on-surface">
                @foreach($users as $user)
                    <tr class="border-b border-outline-variant hover:bg-surface-container transition-colors">
                        <td class="p-4 font-medium">{{ $user->name }}</td>
                        <td class="p-4 text-secondary">{{ $user->email }}</td>
                        <td class="p-4">
                            <div class="flex flex-wrap gap-2">
                                @forelse($user->roles as $role)
                                    <span class="bg-tertiary-container text-on-tertiary-container px-2 py-0.5 rounded text-metadata font-metadata">
                                        {{ $role->name }}
                                    </span>
                                @empty
                                    <span class="text-secondary italic">No roles assigned</span>
                                @endforelse
                            </div>
                        </td>
                        <td class="p-4">
                            <a href="{{ route('admin.users.edit', $user) }}" class="text-primary hover:underline font-ui-label text-ui-label">Manage Roles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $users->links() }}
    </div>
</div>
@endsection
