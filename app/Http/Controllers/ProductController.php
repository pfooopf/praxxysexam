<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function index(): Response
    {
        $products = Product::paginate(10);
        // dd($products);
        return Inertia::render('Products/Index', [
            'products' => $products,
        ]);
    }

    public function edit($id): Response
    {
        $product = Product::find($id);
        return Inertia::render('Products/Edit', [
            'product' => $product,
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:'.Product::class,
            'category' => 'required|string|max:255',
            'description' => 'required',
        ]);

        $user = Product::create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
        ]);

        return Redirect::route('products');
    }

    public function destroy(Product $product): RedirectResponse
    {
        dd($product);
        $product->delete();
        return Redirect::route('products');
    }

    public function update(Request $request): RedirectResponse
    {

        $update = Product::find($request->id);
        $update->name = $request->name;
        $update->category = $request->category;
        $update->description = $request->description;
        $update->save();

        return Redirect::route('products');
    }

}
