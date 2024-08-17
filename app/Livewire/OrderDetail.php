<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;

class OrderDetail extends Component
{
    public Order $order;

    public function mount($id)
    {
        $this->order = Order::with(['user', 'orderProducts', 'orderProducts.product'])->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.order-detail');
    }
}
