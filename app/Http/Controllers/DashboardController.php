<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Material;
use App\Models\ModelItem;
use App\Models\RequestItem;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title      = 'Halaman Dashboard';
        $material   = Material::count();
        $customer   = Customer::count();
        $supplier   = Supplier::count();
        $requestItem = RequestItem::where('status_permintaan', 'Request')->count();

        return view('pages.dashboard.index', ['title' => $title, 'material' => $material, 'customer' => $customer, 'supplier' => $supplier, 'requestItem' => $requestItem]);
    }
}
