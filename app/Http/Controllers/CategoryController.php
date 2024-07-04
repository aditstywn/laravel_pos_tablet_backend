<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.categories.index',[
            'categories' => Category::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        // dd($validate);

        $filename = time() . '.' . $request->image->extension();

        $validate['image'] = $filename;

        // memasukan image ke dalam storage
        $request->image->storeAs('public/category', $filename);

        Category::create($validate);
        return redirect()->route('category.index')->with('success', 'Category Successfully Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('pages.categories.edit',[
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validate = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg'
        ]);

        // Proses pembaruan gambar jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            Storage::delete('public/category/' . $category->image);

            // Simpan gambar baru
            $filename = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/category', $filename);
            $validate['image'] = $filename;
        }


        $category->update($validate);

        return redirect()->route('category.index')->with('success', 'Category Successfuly Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category->image) {
            Storage::delete('public/products/' . $category->image);
        }
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category Successfuly Delete');
    }
}
