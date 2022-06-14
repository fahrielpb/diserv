<?php

namespace App\Http\Controllers\Frontend;

use App\Models\City;
use App\Models\Courier;
use App\Models\Category;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OngkirController extends Controller
{
    public function index()
    {
          // ongkir
        $categories = Category::get();
        return view('frontend.shippingcost', compact('categories'));
    }
}
