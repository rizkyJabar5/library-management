<section class="w-full">
    @include('partials.platform-heading', [
        'title' => __('Users'),
        'description' => __('Manage members and their details.')
    ])
    <div class="p-4 space-y-4">
        <flux:input
            wire:model="search"
            :placeholder="__('Search User...')"/>

        <x-table>
            <x-slot name="head">
                <x-table.heading sortable field="name">Name</x-table.heading>
                <x-table.heading sortable field="email">E-mail</x-table.heading>
                <x-table.heading sortable field="created_at">Created At</x-table.heading>
                <x-table.heading sortable field="role">Role</x-table.heading>
                <x-table.heading>Actions</x-table.heading>
            </x-slot>

            @forelse($users as $user)
                <x-table.row>
                    <x-table.cell>{{ $user->name }}</x-table.cell>
                    <x-table.cell>{{ $user->email }}</x-table.cell>
                    <x-table.cell>{{ $user->created_at }}</x-table.cell>
                    <x-table.cell>{{ $user->role }}</x-table.cell>
                    <x-table.cell>
                        <a href="{{ route('users.edit', $user) }}" class="text-blue-500 hover:text-blue-700">Edit</a>
                        |
                        <a href="#" wire:click.prevent="delete({{ $user->id }})" class="text-red-500 hover:text-red-700">Delete</a>
                    </x-table.cell>
                </x-table.row>
            @empty
                <x-table.row>
                    <x-table.cell colspan="4" class="text-center">No User found.</x-table.cell>
                </x-table.row>
            @endforelse
        </x-table>

        {{ $users->links() }}
    </div>

</section>
