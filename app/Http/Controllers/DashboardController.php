<?php

namespace App\Http\Controllers;

use App\Charts\OrderOverviewChart;
use App\Models\Order;

class DashboardController extends Controller
{
    public function index(OrderOverviewChart $chart)
    {
        // sum orders.total today
        $sumOrderTotalToday = (int) Order::whereDate('created_at', now())->sum('total');

        // sum orders.total yesterday
        $sumOrderTotalYesterday = (int) Order::whereDate('created_at', now()->subDay())->sum('total');

        // percentage orders.total today vs orders.total yesterday
        $percentageOrderTotal = $sumOrderTotalYesterday ? (($sumOrderTotalToday - $sumOrderTotalYesterday) / $sumOrderTotalYesterday) * 100 : 0;
        $percentageOrderTotal = round($percentageOrderTotal);

        // count orders today
        $countOrderToday = (int) Order::whereDate('created_at', now())->count();

        // count orders yesterday
        $countOrderYesterday = (int) Order::whereDate('created_at', now()->subDay())->count();

        // percentage orders today vs orders yesterday
        $percentageOrder = $countOrderYesterday ? (($countOrderToday - $countOrderYesterday) / $countOrderYesterday) * 100 : 0;
        $percentageOrder = round($percentageOrder);

        // format currency
        $sumOrderTotalToday = formatCurrency($sumOrderTotalToday);

        return view('dashboard', [
            'card' => compact('sumOrderTotalToday', 'percentageOrderTotal', 'countOrderToday', 'percentageOrder'),
            'chart' => $chart->build(),
        ]);
    }
}
