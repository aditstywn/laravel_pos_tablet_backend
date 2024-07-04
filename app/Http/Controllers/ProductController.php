<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $products = Product::when($request->input('name'), function ($query, $name) {
            return $query->where('name', 'like', '%' . $name . '%');
        })->orderBy('id', 'desc')->paginate(6);
        return view('pages.products.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.products.create',[
            'categories' =>  Category::get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required',
            'status' => 'required|boolean',
            'is_favorite' => 'required|boolean',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // dd($validate);

        $filename = time() . '.' . $request->image->extension();

        $validate['image'] = $filename;

        // memasukan image ke dalam storage
        $request->image->storeAs('public/products', $filename);

        Product::create($validate);
        return redirect()->route('product.index')->with('success', 'Product Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.products.detail',[
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.products.edit',[
            'product' => $product,
            'categories' => Category::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required',
            'status' => 'required|boolean',
            'is_favorite' => 'required|boolean',
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        // Proses pembaruan gambar jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete('public/products/' . $product->image);

            // Simpan gambar baru
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $filename);
            $validate['image'] = $filename;
        }


        $product->update($validate);

        return redirect()->route('product.index')->with('success', 'Product Successfuly Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::delete('public/products/' . $product->image);
        }
        // Storage::delete('public/products/' . $product->image);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Successfuly Delete');
    }
}
