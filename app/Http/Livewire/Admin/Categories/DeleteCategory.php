<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use LivewireUI\Modal\ModalComponent;

class DeleteCategory extends ModalComponent
{
    public Category $category;

	public function mount(Category $id)
	{
		$this->category = $id;
	}

	public function destroy()
	{
		$this->category->delete();

		$this->closeModalWithEvents(['category-refresh']);
	}

    public function render()
    {
        return view('livewire.admin.categories.delete-category');
    }
}
