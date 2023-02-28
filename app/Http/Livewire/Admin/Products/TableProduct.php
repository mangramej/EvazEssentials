<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class TableProduct extends Component
{
	use WithPagination;	
	
	protected $listeners = ['product-event' => '$refresh'];

    public function render()
    {
		return view('livewire.admin.products.table-product', [
			'products' => Product::latest()->paginate(10)
		]);
    }
}
