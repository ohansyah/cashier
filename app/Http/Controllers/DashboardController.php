<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\OrderOverviewChart;

class DashboardController extends Controller
{
    public function index(OrderOverviewChart $chart)
    {
        return view('dashboard', ['chart' => $chart->build()]);
    }
}
