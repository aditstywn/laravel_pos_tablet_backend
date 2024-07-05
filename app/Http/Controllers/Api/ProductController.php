<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        // $products = Product::latest()->paginate(5);
        return response()->json([
            'success' => true,
            'message' => 'Get List Product Berhasil',
            'data' => $products,
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


        $filename = time() . '.' . $request->image->extension();

        $validate['image'] = $filename;

        // memasukan image ke dalam storage
        $request->image->storeAs('public/products', $filename);

        $product = Product::create($validate);

        if ($product) {
            return response()->json([
                'success' => true,
                'message' => 'Product Created',
                'data' => $product,
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Product Failed to Save',
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);


        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product tidak ditemukan',
            ], 404);
        }

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


        // Jika ada file gambar yang diunggah, proses gambar baru
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $validate['image'] = $filename;

            // memasukan image ke dalam storage
            $request->image->storeAs('public/products', $filename);

            // Hapus gambar lama jika ada
            if ($product->image) {
                Storage::delete('public/products/' . $product->image);
            }
        }

        $product->update($validate);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Update Product',
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Product tidak ditemukan',
            ], 404);
        }

        // Hapus gambar dari storage jika ada
        if ($product->image) {
            Storage::delete('public/products/' . $product->image);
        }

        // Hapus produk dari database
        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil Hapus Product',
        ]);
    }
}
