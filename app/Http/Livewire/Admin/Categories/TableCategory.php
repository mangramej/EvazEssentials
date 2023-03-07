<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Component;

class TableCategory extends Component
{
    public $search;

	protected $queryString = ['search'];

    protected $listeners = ['category-refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.admin.categories.table-category', [
            'categories' => Category::where('name', 'like', '%'.$this->search.'%')
                ->latest()
                ->paginate(10)
        ]);
    }
}
