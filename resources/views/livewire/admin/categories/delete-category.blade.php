<div class="p-4">
	<h1 class="font-bold text-2xl text-slate-700 uppercase">Delete Category</h1>

	<form method="POST" wire:submit.prevent="destroy">
		@csrf

		<div class="py-4 text-slate-600">
			<p>Are you sure? This will result in permanent delete.</p>
		</div>

		<x-primary-button class="mt-4 bg-red-700 hover:bg-red-800">
			<span>{{ __('Delete') }}</span>
		</x-primary-button>

	</form>
</div>
