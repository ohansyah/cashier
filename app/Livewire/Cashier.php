<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class Cashier extends Component
{
    use WithPagination;

    public string $searchQuery = '';
    public $categories;
    public $selectedCategories = [];
    public $cartItems = [];

    public function toggleCategory($categoryId)
    {
        $this->selectedCategories = in_array($categoryId, $this->selectedCategories)
        ? array_diff($this->selectedCategories, [$categoryId])
        : array_merge($this->selectedCategories, [$categoryId]);
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        $newItem = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
        ];

        $key = array_search($newItem['id'], array_column($this->cartItems, 'id'));
        if ($key === false) {
            $this->cartItems[] = $newItem;
        } else {
            $this->cartItems[$key]['qty'] += 1;
            $this->cartItems[$key]['price'] += $product->price;
        }

    }

    public function render()
    {
        if ($this->searchQuery != '') {
            $this->resetPage();
        }

        $this->categories = Cache::remember('categories', 60, function () {
            return Category::active()->get();
        });

        $products = ProductService::index($this->searchQuery)
            ->when($this->selectedCategories, function ($query) {
                $query->whereIn('category_id', $this->selectedCategories);
            })
            ->simplePaginate(18);

        return view('livewire.cashier', [
            'products' => $products,
        ]);
    }
}
