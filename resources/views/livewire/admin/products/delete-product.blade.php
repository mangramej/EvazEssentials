<div class="p-4">
	<h1 class="font-bold text-2xl text-slate-700 uppercase">Delete Product</h1>

	<form method="POST" wire:submit.prevent="destroy">
		@csrf

		<div class="py-4 text-slate-600">
			<p>Are you sure? This will result in permanent delete.</p>
		</div>

        <x-primary-button class="mt-4 mt-4 bg-red-700 hover:bg-red-800" wire:loading.attr="disabled">
			<span wire:loading.remove>{{ __('Delete') }}</span>

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
