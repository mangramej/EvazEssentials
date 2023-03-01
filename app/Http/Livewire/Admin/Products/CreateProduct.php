<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class CreateProduct extends ModalComponent
{
	use WithFileUploads;

	public $name;
	public $price;
	public $images = [];

	protected $rules = [
		'name' => 'required',
		'price' => 'required|numeric',
		'images' => 'required',
		'images.*' => 'required|image'
	];

	public function store()
	{
		$this->validate();

		$product = Product::create([
			'name' => $this->name,
			'price' => $this->price
		]);

		$product->upload($this->images);

		$this->closeModalWithEvents(['product-event']);
	}

	// public function updatedPhotos($property)
	// {
	// 	$this->validate([
    //         'images.*' => 'required|image',
    //     ]);
	// }

    public function render()
    {
        return view('livewire.admin.products.create-product');
    }
}
