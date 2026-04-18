<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('product.index', compact('products'));
    }

    public function export()
    {
        // Dummy export logic
        return response('File export is ready for user ' . auth()->user()->name, 200)
                  ->header('Content-Type', 'text/plain');
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        
        // If user_id is not provided (non-admin), set it to the current user's ID
        if (!isset($data['user_id'])) {
            $data['user_id'] = auth()->id();
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function create()
    {
        $users = User::orderBy('name')->get();

        return view('product.create', compact('users'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product.view', compact('product'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        abort_if(auth()->user()->cannot('update', $product), 403);

        $product->update($request->validated());

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function edit(Product $product)
    {
        abort_if(auth()->user()->cannot('update', $product), 403);

        $users = User::orderBy('name')->get();

        return view('product.edit', compact('product', 'users'));
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        abort_if(auth()->user()->cannot('delete', $product), 403);

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product berhasil dihapus');
    }
}