<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class CreateProduct extends ModalComponent
{
	public $name;
	public $price;

	protected $rules = [
		'name' => 'required',
		'price' => 'required|numeric'
	];

	public function store()
	{
		$this->validate();

		Product::create([
			'name' => $this->name,
			'price' => $this->price
		]);
		
		$this->closeModalWithEvents(['product-event']);
	}

    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
