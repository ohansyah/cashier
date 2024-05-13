<?php

namespace App\Livewire;

use Livewire\Component;

class Category extends Component
{
    public string $title = 'Categories';

    public function render()
    {
        return view('livewire.category');
    }
}
