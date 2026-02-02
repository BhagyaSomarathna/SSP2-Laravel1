<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SalesReport extends Component
{
    public $sales = [];

    public function mount()
    {
        // Query the sales data from the orders table
        $this->sales = DB::table('orders')
            ->selectRaw('
                DATE(order_date) as order_day,
                COUNT(*) as total_orders,
                SUM(amount) as total_sales
            ')
            ->groupBy('order_day')
            ->orderByDesc('order_day')
            ->get();
    }

    public function render()
    {
        // Just return the Blade file, NO layout
        return view('livewire.sales-report');
    }
}
