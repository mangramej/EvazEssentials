<div class="p-4">
	<h1 class="font-bold text-2xl text-slate-700 uppercase">Create Product</h1>

	<form method="POST" wire:submit.prevent="store">
		@csrf

        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model="name" autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
		</div>

		<div class="mt-4">
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" wire:model="price" autofocus />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

			<x-primary-button class="mt-4">
                {{ __('Create') }}
            </x-primary-button>

			<div wire:loading>
				<span class="text-sm text-slate-500">Creating product...</span>				
			</div>
	</form>
</div>
