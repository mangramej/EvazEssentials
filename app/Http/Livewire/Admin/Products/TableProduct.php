<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class TableProduct extends Component
{
	use WithPagination;

	public $search;

	protected $queryString = ['search'];

	protected $listeners = ['product-event' => '$refresh'];

    public function render()
    {
		return view('livewire.admin.products.table-product', [
			'products' => Product::with('previewImages', 'category')
				->where('name', 'like', '%'.$this->search.'%')
				->orWhere('price', 'like', '%'.$this->search.'%')
				->latest()
				->paginate(10)
		]);
    }
}
