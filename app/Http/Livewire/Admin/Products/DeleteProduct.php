<?php

namespace App\Http\Livewire\Admin\Products;

use App\Models\Product;
use LivewireUI\Modal\ModalComponent;

class DeleteProduct extends ModalComponent
{
	public Product $product;	

	public function mount(Product $id)
	{
		$this->product = $id;
	}

	public function destroy()
	{
		$this->product->delete();

		$this->closeModalWithEvents(['product-event']);
	}

    public function render()
    {
        return view('livewire.admin.products.delete-product');
    }
}
