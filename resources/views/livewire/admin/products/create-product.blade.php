<div class="p-4">
	<h1 class="font-bold text-2xl text-slate-700 uppercase">Create Product</h1>

	<form method="POST" wire:submit.prevent="store">
		@csrf

        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.defer="name" autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
		</div>

		<div class="mt-4">
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" class="block mt-1 w-full" type="text" name="price" wire:model.defer="price" autofocus />
            <x-input-error :messages="$errors->get('price')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="category" :value="__('Category')" />

            <select
                wire:model.defer="category_id"
                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none mt-1"
                name="category">
                <option selected value="">No Category</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>

            <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="description" :value="__('Description')" />

            <textarea id="description" wire:model.defer="description" rows="10"
                class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-100"
                autofocus></textarea>
        </div>

        <div class="mt-4">
            <x-input-label for="images" :value="__('Images')" />
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

        <x-primary-button class="mt-4" wire:loading.attr="disabled">
			<span wire:loading.remove>{{ __('Create') }}</span>

            <div wire:loading class="flex items-center justify-center">
				<div
				  class="inline-block h-4 w-4 animate-spin rounded-full border-4 border-solid border-current border-r-transparent align-[-0.125em] motion-reduce:animate-[spin_1.5s_linear_infinite]"
				  role="status">
				  <span
					class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]"
					>Loading...</span
				  >
				</div>
			</div>
		</x-primary-button>

	</form>
</div>
