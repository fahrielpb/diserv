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
        $featured_products = Product::with('category')->where('trending','1')->take(8)->get();
        // dd($featured_products);
        return view('frontend.index', compact('featured_products'));


    }

    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('frontend.category', compact('category'));
    }

    public function viewcategory($slug)
    {
        if(Category::where('slug', $slug)->exists())
        {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('cate_id', $category->id)->where('status','0')->get();
            return view('frontend.products.index', compact('category','products'));
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
                $products = Product::where('slug', $prod_slug)->first();
                return view('frontend.products.view', compact('products'));
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
}
