<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Brand;
use App\Subcategory;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Item::orderBy('id', 'desc')->get();
        $items = Item::all();
        // dd($items);
        return view('backend.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.items.create', compact('brands', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codeno' => 'required',
            'name' => 'required|min:3',
            'price' => 'required',
            'discount' => 'required',
            'brand_id' => 'required',
            'subcategory_id' => 'required',
            'photo' => 'sometimes|mimes:png,jpg,jpeg'
        ]);

        //  Upload
        if ($request->file()) {
            // File Name Change
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            //categoryimg change
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');
            $path = '/storage/' . $filePath;
        }

        // Store Data
        $item = new Item;
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->description = $request->description;
        $item->photo = $path;
        $item->save();


        // redirect
        return redirect()->route('items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $brands = Brand::all();
        $subcategories = Subcategory::all();
        return view('backend.items.edit', compact('item', 'brands', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'codeno' => 'required',
            'name' => 'required|min:3',
            'price' => 'required',
            'discount' => 'required',
            'brand_id' => 'required',
            'subcategory_id' => 'required',
            'photo' => 'sometimes|mimes:png,jpg,jpeg'
        ]);

        //  Upload
        if ($request->file()) {
            // File Name Change
            $fileName = time() . '_' . $request->photo->getClientOriginalName();
            //categoryimg change
            $filePath = $request->file('photo')->storeAs('itemimg', $fileName, 'public');
            $path = '/storage/' . $filePath;
            $item->photo = $path;
        }

        // Store Data
        $item->codeno = $request->codeno;
        $item->name = $request->name;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->brand_id = $request->brand_id;
        $item->subcategory_id = $request->subcategory_id;
        $item->description = $request->description;
        $item->save();


        // redirect
        return redirect()->route('items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index');
    }
}
