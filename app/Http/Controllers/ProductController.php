<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductGuideline;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('Staff')->only([
            'index',
            'store',
            'update',
        ]);
    }

    public function index()
    {
        $products = Product::all();
        return view('staff.product', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',

        ]);



        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function guidelineIndex($id)
    {
        $productGuidelines = ProductGuideline::with('product')->whereHas('product', function ($query) use ($id) {
            $query->where('product_id', $id);
        })->get();
        return view('staff.product-guideline-show', compact('productGuidelines'));

    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            // Add other validation rules as needed
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
