<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class EditProduct extends ModalComponent
{
	use WithFileUploads;

	public Product $product;

	public $name;
	public $price;
	public $description = '';

	public $images = [];

	public $imagesToDelete = [];

	protected $rules = [
		'name' => 'required',
		'price' => 'required|numeric',
		'description' => 'nullable',
		'images.*' => 'image'
	];

	public function mount(Product $id)
	{
		$this->product = $id;

		$this->name = $this->product->name;
		$this->price = $this->product->price; 
		$this->description = $this->product->description; 
	}

	public function update()
	{
		$this->validate();
	
		$this->product->update([
				'name' => $this->name,
				'price' => $this->price,
				'description' => $this->description,
			]);

		$this->product->upload($this->images);

		if(! empty($this->imagesToDelete)) {
			$this->product->images()->whereIn('id', $this->imagesToDelete)->delete();
		}

		$this->closeModalWithEvents(['product-event']);
	}


    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }
}
