<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Product\StoreRequest;
use App\Http\Requests\BackPanel\Product\UpdateRequest;
use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $products = Product::query()
            ->paginate(10);
        return view("back_panel.products.index")
            ->with("products", $products);
    }

    /**
     * Show the form for creating a new resource.
e
     */
    public function create()
    {
        return view("back_panel.products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request Request

     */
    public function store(StoreRequest $request)
    {
        $product = new Product();
        $product->fill($request->input('product'));
        $product->save();

        if ($request->hasFile('product.image')) {
            $uploaded_file = $request->file("product.image");
            $file_name = $product->id.".".$uploaded_file->extension();
            $path = $uploaded_file
                ->storeAs("assets/products_images", $file_name, 'public');
            $product->photo_name = $file_name;
            $product->save();
        }
        return redirect()
            ->route("back_panel.products.index", $product)
            ->with('success', 'New product successfully added.');
    }

    /**
     * Show the form for editing the specified resource.
     *

     */
    public function edit(Product $product)
    {
        return view("back_panel.products.edit")
            ->with("product", $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request Request
     * @param Product       $product Product
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $product->type = request("product.type");
        $product->brand = request("product.brand");
        $product->price = request("product.price");
        $product->quantity = request("product.quantity");
        $product->save();

        if ($request->hasFile('product.image')) {
            $uploaded_file = $request->file("product.image");
            $file_name = $product->id.".".$uploaded_file->extension();
            $path = $uploaded_file
                ->storeAs("assets/products_images", $file_name, 'public');
            $product->photo_name = $file_name;
            $product->save();
        }
        return redirect()
            ->route("back_panel.products.index");
    }

    /**
     * Remove the specified resource from storage.
     *

     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()
            ->route("back_panel.products.index");
    }
}
