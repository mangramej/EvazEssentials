<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class EditProduct extends ModalComponent
{
	public Product $product;

	public $name;
	public $price;

	protected $rules = [
		'name' => 'required',
		'price' => 'required|numeric'
	];

	public function mount(Product $id)
	{
		$this->product = $id;

		$this->name = $this->product->name;
		$this->price = $this->product->price; 
	}

	public function update()
	{
		$this->validate();
	
		$this->product->update([
				'name' => $this->name,
				'price' => $this->price,
			]);

		$this->closeModalWithEvents(['product-event']);
	}


    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
