<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class CreateProduct extends ModalComponent
{
	use WithFileUploads;

	public $name;
	public $price;
	public $images = [];
	public $description = '';

    public $category_id;

	protected $rules = [
		'name' => 'required',
		'price' => 'required|numeric',
		'description' => 'nullable',
        'category_id' => 'nullable|exists:categories,id',
		'images' => 'required',
		'images.*' => 'required|image'
	];

	public function store()
	{
		$this->validate();

		$product = Product::create([
			'name'          => $this->name,
            'slug'          => str($this->name)->slug(),
			'price'         => $this->price,
            'category_id'   => ($this->category_id == "") ? null : $this->category_id,
			'description'   => $this->description,
		]);

		$product->upload($this->images);

		$this->closeModalWithEvents(['product-event']);
	}

    public function render()
    {
        return view('livewire.admin.products.create-product', ['categories' => Category::all()]);
    }
}
