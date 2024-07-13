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
    public $isFilteredCategory = false;
    public $cartItems = [];
    public $cartItemsProductIds = [];
    public $hasMorePages = true;
    public $page = 1;
    public $allProducts = [];

    public function toggleCategory($categoryId)
    {
        $this->selectedCategories = in_array($categoryId, $this->selectedCategories)
        ? array_diff($this->selectedCategories, [$categoryId])
        : array_merge($this->selectedCategories, [$categoryId]);

        $this->isFilteredCategory = true;
    }

    public function addToCart($productId)
    {
        $product = Product::find($productId);
        $newItem = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
        ];

        $key = array_search($newItem['id'], array_column($this->cartItems, 'id'));
        if ($key === false) {
            $this->cartItems[] = $newItem;
        } else {
            unset($this->cartItems[$key]);
            $this->cartItems = array_values($this->cartItems);
        }

        $this->cartItemsProductIds = array_column($this->cartItems, 'id');
    }

    public function clearCart()
    {
        $this->cartItems = [];
        $this->cartItemsProductIds = [];
    }

    public function loadMore()
    {
        $this->page++;
    }

    public function loadProduct()
    {
        $perpage = $this->page > 1 ? 12 : 24;

        $products = ProductService::index($this->searchQuery)
            ->when($this->selectedCategories, function ($query) {
                $query->whereIn('category_id', $this->selectedCategories);
            })
            ->simplePaginate($perpage, ['*'], 'page', $this->page);

        $this->hasMorePages = $products->hasMorePages();

        return $products;
    }

    public function resetPage()
    {
        $this->page = 1;
        $this->allProducts = [];
    }

    public function render()
    {
        if ($this->isFilteredCategory || $this->searchQuery != '') {
            $this->resetPage();
        }

        $this->categories = Cache::remember('categories', 60, function () {
            return Category::active()->get();
        });

        $products = $this->loadProduct();

        if ($this->page > 1) {
            $this->allProducts = array_merge($this->allProducts, $products->items());
        } else {
            $this->allProducts = $products->items();
        }

        return view('livewire.cashier', [
            'products' => $this->allProducts,
        ]);
    }
}
