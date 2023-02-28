<div>
	<div class="overflow-hidden rounded-lg shadow-md">
		<table class="table-auto w-full border-collapse bg-white text-left text-sm text-gray-500">
			<thead class="bg-gray-50">
				<tr>
					<th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
					<th scope="col" class="px-6 py-4 font-medium text-gray-900">Price</th>
					<th scope="col" class="px-6 py-4 font-medium text-gray-900 text-center">Action</th>
				</tr>
			</thead>
				
			<tbody class="divide-y divide-gray-100 border-t border-gray-100">
				@foreach($products as $product)
				<tr class="hover:bg-gray-50">
					<td class="px-6 py-4 font-bold">
						{{ $product->name }}
					</td>	
					
					<td class="px-6 py-4">
						{{ $product->price }}
					</td>	

					<td class="flex justify-center items-center px-6 py-4">
						<x-primary-button 
							wire:click="$emit('openModal', 
											'admin.products.edit-product', 
											{{ json_encode(['id' => $product->id]) }}
										)"
						>
                			{{ __('Edit') }}
            			</x-primary-button>
					
						<x-primary-button 
							class="ml-4"
							wire:click="$emit('openModal', 
											'admin.products.delete-product', 
											{{ json_encode(['id' => $product->id]) }}
										)"
						>
                			{{ __('Delete') }}
            			</x-primary-button>

					</td>
				</tr>	
				@endforeach
			</tbody>
		</table>
	</div>	

	<div class="mt-4">
		{{ $products->links() }}
	</div>
</div>
