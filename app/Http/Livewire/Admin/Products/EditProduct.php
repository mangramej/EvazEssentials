<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Category;
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

    public $category_id;

	protected $rules = [
		'name' => 'required',
		'price' => 'required|numeric',
		'description' => 'nullable',
        'category_id' => 'nullable|exists:categories,id',
		'images.*' => 'image'
	];

	public function mount(Product $id)
	{
		$this->product = $id;
        $this->product->load('category');

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
                'category_id' => ($this->category_id == "") ? null : $this->category_id,
			]);

		$this->product->upload($this->images);

		if(! empty($this->imagesToDelete)) {
			$this->product->images()->whereIn('id', $this->imagesToDelete)->delete();
		}

		$this->closeModalWithEvents(['product-event']);
	}


    public function render()
    {
        return view('livewire.admin.products.edit-product', [
            'categories' => Category::all()
        ]);
    }
}
