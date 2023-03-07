<div class="p-4">
	<h1 class="font-bold text-2xl text-slate-700 uppercase">Create Category</h1>

	<form method="POST" wire:submit.prevent="update">
		@csrf

        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
		</div>

		<div class="mt-4">
            <x-input-label for="color" :value="__('Color')" />

            <x-text-input id="color" class="block mt-1 border rounded-lg px-2 py-1" type="color" wire:model="color" autofocus />

            <x-input-error :messages="$errors->get('color')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="images" :value="__('Curret Image')" />
            <img class="mt-1" src="{{ asset('storage/' . $path) }}" width="100" height="100">
        </div>

        <div class="mt-4">
            <x-input-label for="images" :value="__('Change Image')" />
            <x-text-input id="images" type="file" class="block mt-1 w-full text-slate-700 " wire:model="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div class="mt-4">
            @if ($image)
                <x-input-label for="preview-images" :value="__('Preview Image to be uploaded')" />

                <div class="grid grid-flow-row grid-cols-4 gap-4 auto-rows-max mt-1">
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
                </div>
            @endif
        </div>

        <x-primary-button class="mt-4">
			<span>{{ __('Update') }}</span>
		</x-primary-button>

	</form>
</div>
