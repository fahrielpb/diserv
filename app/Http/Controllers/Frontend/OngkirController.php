<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
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
