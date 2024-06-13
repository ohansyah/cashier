<?php

namespace App\Livewire;

use App\Services\ProductService;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;

class Cashier extends Component
{
    use WithPagination;

    public string $searchQuery = '';
    public $categories;
    public $cartItems = [
        ['id' => 1, 'name' => 'ORI GIMBER 700ml', 'price' => 800],
    ];

    public function render()
    {
        if ($this->searchQuery != '') {
            $this->resetPage();
        }

        $this->categories = Category::all();

        $products = ProductService::index($this->searchQuery)->simplePaginate(18);

        return view('livewire.cashier', [
            'products' => $products,
        ]);
    }
}
