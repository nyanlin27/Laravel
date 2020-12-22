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
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $items = Item::all();
        // $items=Item::take(2)->get();
        $flash_items = Item::orderBy('created_at', 'desc')->get();
        $fresh_items = Item::orderBy('subcategory_id', 'desc')->get();
        return view('frontend.index', compact('categories', 'subcategories', 'brands', 'items', 'flash_items', 'fresh_items'));
    }
    public function shoppingcart($value = '')
    {
        $categories = Category::orderBy('id', 'desc')->get();
        $subcategories = Subcategory::orderBy('id', 'desc')->get();
        $brands = Brand::all();
        $items = Item::all();

        return view('frontend.shoppingcart', compact('categories', 'subcategories', 'brands', 'items'));
    }

    public function itemdetail($id)
    {
        $items = Item::find($id);
        // dd($items);
        return view('frontend.itemdetail', compact('items'));
    }


    // public function subcategory($value = '')
    // {
    //     return view('frontend.subcategory');
    // }

    }
