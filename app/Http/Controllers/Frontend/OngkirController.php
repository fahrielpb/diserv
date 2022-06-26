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



        $response = Http::withHeaders(
            [
                'key' => '83624db318a1398f617240e141350d5b'
            ]
        )->get('https://api.rajaongkir.com/starter/city');
        return $response->body();

        // $categories = Category::get();
        // return view('frontend.shippingcost', compact('categories'));
    }
}