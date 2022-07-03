<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use function PHPUnit\Framework\returnSelf;

class FrontendController extends Controller
{
    public function index()
    {
        $category = Category::get();
        $categories = Category::get();
        // $featured_products = Product::with('category')->where('trending','1')->take(8)->get();

        // menampilkan produk 12 terbaru
        $featured_products = Product::with('category')->latest()->take(12)->get();
        return view('frontend.index', compact('featured_products', 'category', 'categories'));
    }

    public function category()
    {
        $category = Category::where('status', '0')->get();
        $categories = Category::get();
        return view('frontend.category', compact('category', 'categories'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $categories = Category::get();
            $products = Product::where('cate_id', $category->id)->where('status','0')->get();
            return view('frontend.products.index', compact('category','products','categories'));
        }
        else {
            return redirect('/')->with('status',"Slug Does Not Exists!");
        }
    }

    public function productview($cate_slug, $prod_slug)
    {
        if(Category::where('slug', $cate_slug)->exists())
        {

            if(Product::where('slug', $prod_slug)->exists())
            {
                $categories = Category::get();
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products', 'categories'));
            }
            else{
                return redirect('/')->with('status',"The link was broken");
            }
        }
        else
        {
            return redirect('/')->with('status',"No such category found");
        }
    }

    public function allproductview()
    {
                $categories = Category::get();
                $products = Product::latest()->paginate(12);
                return view('frontend.viewall', compact('products', 'categories'));
    }

    public function tncview()
    {
        $categories = Category::get();
        return view('frontend.tnc', compact('categories'));
    }

    public function productlistAjax()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];

        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }

    public function searchproduct(Request $request)
    {
        $searched_product = $request->product_name;
        
        if($searched_product != "") {
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if($product) {
                return redirect('category/'.$product->category->slug.'/'.$product->slug);
            }
            else{
                return redirect()->back()->with("status", "No products matched your search!");
            }
        } else{
            return redirect()->back();
        }
    }
}