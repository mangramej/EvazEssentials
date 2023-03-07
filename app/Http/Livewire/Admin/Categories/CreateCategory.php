<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class CreateCategory extends ModalComponent
{
    use WithFileUploads;

    public $name;
    public $color;
    public $image;

    protected $rules = [
        'name' => 'required',
        'color' => 'required',
        'image' => 'required|image'
    ];

    public function store()
    {
        $this->validate();

        Category::create([
            'name' => $this->name,
            'slug' => str($this->name)->slug(),
            'color' => $this->color,
            'path' => $this->image->store('categories')
        ]);

		$this->closeModalWithEvents(['category-refresh']);
    }

    public function render()
    {
        return view('livewire.admin.categories.create-category');
    }
}
