<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\product;
use App\Models\Slider;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $traendingProduct = product::where('traending', '1')->latest()->take(15)->get();
        $newArrivalsProduct = product::latest()->take(15)->get();
        $featuredProducts = product::where('Featured', '1')->latest()->take(15)->get();
        return view('frontend.index', compact('sliders', 'traendingProduct', 'newArrivalsProduct', 'featuredProducts'));
    }
    public function searchProduct(Request $request)
    {
        if ($request->search) {
            $searchProduct = product::where('name', 'LIKE', '%' . $request->search . '%')->latest()->paginate(15);
            return view('frontend.pages.search', compact('searchProduct'));
        } else {
            return redirect()->back()->with('message', 'Empty search');
        }
    }

    function newArrivals()
    {
        $newArrivalsProduct = product::latest()->take(15)->get();
        return view('frontend.pages.new-Arrivals', compact('newArrivalsProduct'));
    }
    function FeaturedProducts()
    {
        $featuredProducts = product::where('Featured', '1')->latest()->get();
        return view('frontend.pages.featuredview', compact('featuredProducts'));
    }
    public function categories()
    {
        $categories = category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }
    public function products($category_slug)
    {
        $category = category::where('slug', $category_slug)->first();
        if ($category) {

            //$products = $category->products()->get();
            // dd($products);
            // dd($category);
            return view('frontend.collections.products.index', compact('category',));
        } else {
            return redirect()->back();
        }
    }
    public function viewproducts(string $category_slug, string  $products_slug)
    {
        $category = category::where('slug', $category_slug)->first();
        if ($category) {

            $product = $category->products()->where('slug', $products_slug)->where('status', '0')->first();
            if ($product) {
                return view('frontend.collections.products.view', compact('category', 'product'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->back();
        }
    }
    public function thankyou()
    {
        return view('frontend.thank-you');
    }
}
