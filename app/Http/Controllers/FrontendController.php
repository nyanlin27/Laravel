<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Brand;
use App\Item;


class FrontendController extends Controller
{
    public function index($value = '')
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->get();
        $brands = Brand::all();
        $items = Item::all();
        return view('frontend.index', compact('categories', 'subcategories', 'brands', 'items'));
    }
    public function shoppingcart($value = '')
    {
        return view('frontend.shoppingcart');
    }
    public function subcategory($value = '')
    {
        return view('frontend.subcategory');
    }
}
