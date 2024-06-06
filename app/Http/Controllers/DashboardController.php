<?php

namespace App\Http\Controllers;

use App\Models\inventory;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $assets = inventory::all();

        // Aggregate data for the charts
        $statusCounts = $assets->groupBy('status')->map->count();
        $categoryStatusCounts = $assets->groupBy('asset_category')->map(function ($category) {
            return $category->groupBy('status')->map->count();
        });

        return view('dashboard', [
            'statusCounts' => $statusCounts,
            'categoryStatusCounts' => $categoryStatusCounts,
        ]);
    }
}
