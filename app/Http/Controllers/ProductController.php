<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index()
{
    $products = Product::all();
    return view('admin.products.index', compact('products'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imagePath = $request->file('image')->store('products', 'public');

    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'description' => $request->description,
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan.');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric',
        'description' => 'required',
        'image' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $product = Product::findOrFail($id);
    $product->name = $request->name;
    $product->price = $request->price;
    $product->description = $request->description;

    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($product->image && \Storage::disk('public')->exists($product->image)) {
            \Storage::disk('public')->delete($product->image);
        }
        $product->image = $request->file('image')->store('products', 'public');
    }

    $product->save();

    return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
