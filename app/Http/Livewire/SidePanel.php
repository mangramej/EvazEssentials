<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SidePanel extends Component
{
    public $open = false;
    public $title = 'Default Panel';
    public $component = '';

    protected $listeners  = ['openPanel'];

    public function openPanel($title, $component)
    {
        $this->open = true;
        $this->title = $title;
        $this->component = $component;
    }

    public function render()
    {
        return view('livewire.side-panel');
    }
}
