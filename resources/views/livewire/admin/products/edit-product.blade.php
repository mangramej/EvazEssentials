<div class="p-4">
	<h1 class="font-bold text-2xl text-slate-700 uppercase">Edit Product</h1>

	<form method="POST" wire:submit.prevent="update">
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

		<div class="mt-4">
            <x-input-label for="images" :value="__('Add Images')" />
            <x-text-input id="images" type="file" class="block mt-1 w-full text-slate-700 " wire:model="images" multiple />
            <x-input-error :messages="$errors->get('images')" class="mt-2" />
            @error('images.*')
            <x-input-error messages="All file must be an image." class="mt-2" />
            @enderror
        </div>

		<div class="mt-4">
            @if ($images)
            <x-input-label for="preview-images" :value="__('Preview Images to be uploaded')" />
            
            <div class="grid grid-flow-row grid-cols-4 gap-4 auto-rows-max mt-1">
                @foreach ($images as $image)
                
                @php
                    try {
                        $url = $image->temporaryUrl();
                        $previewable = true;
                    } catch (RuntimeException $e) {
                        $previewable = false;
                    }   
                @endphp
                
                @if($previewable)
                <img src="{{ $url }}">
                @endif

                @endforeach
            </div>

            @endif
        </div>

		<fieldset class="mt-4 border border-solid border-gray-300 p-3 col-span-2">
			<legend class="font-medium text-sm text-gray-700">Select images to delete</legend>

			<div class="grid grid-flow-row grid-cols-4 gap-4 auto-rows-max mt-1">
			@foreach ($product->images as $images)
				<div>
					<input type="checkbox" wire:model="imagesToDelete" value="{{ $images->id }}"
						class="form-check-input appearance-none h-4 w-4 border border-gray-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 bg-no-repeat bg-center bg-contain cursor-pointer mb-2">
					<img src="{{ asset('storage/'. $images->path) }}" width="100" height="100">
				</div>
			@endforeach
			</div>
		</fieldset>

		<x-primary-button class="mt-4">
			{{ __('Update') }}
		</x-primary-button>

        <div wire:loading wire:target="update">
            <p class="text-gray-700">Loading ...</p>
        </div>
	</form>
</div>


