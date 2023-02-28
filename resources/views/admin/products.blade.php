<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 text-gray-900">
					<x-primary-button onclick="Livewire.emit('openModal', 'admin.products.create-product')"
						class="mb-4"
					>
                		{{ __('Create') }}
            		</x-primary-button>

					<livewire:admin.products.table-product>	
                </div>
        </div>
    </div>
</x-app-layout>
