<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;

class EditCategory extends ModalComponent
{
    use WithFileUploads;

    public Category $category;

    public $name;
    public $color;
    public $path;
    public $image;

    protected $rules = [
        'name' => 'required',
        'color' => 'required',
        'image' => 'nullable|image'
    ];

    public function mount(Category $id)
    {
        $this->category = $id;

        $this->name = $this->category->name;
        $this->color = $this->category->color;
        $this->path = $this->category->path;
    }

    public function update()
    {
        $this->validate();

        $this->category->name = $this->name;
        $this->category->slug = str($this->name)->slug();
        $this->category->color = $this->color;

        if(! empty($this->image) ) {
            $this->category->path = $this->image->store('categories');
        }

        $this->category->save();

        $this->closeModalWithEvents(['category-refresh']);
    }

    public function render()
    {
        return view('livewire.admin.categories.edit-category');
    }
}
