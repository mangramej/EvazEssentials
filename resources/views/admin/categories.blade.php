<x-admin.app>
    <x-slot name="header">
        <p class="text-neutral-400">{{ __('Categories') }}</p>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <x-primary-button onclick="Livewire.emit('openModal', 'admin.categories.create-category')"
                    class="mb-4"
                >
                    {{ __('Create') }}
                </x-primary-button>

                <livewire:admin.categories.table-category>
            </div>
        </div>
    </div>
</x-admin.app>
