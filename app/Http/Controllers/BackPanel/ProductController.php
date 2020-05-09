<?php

namespace App\Http\Controllers\BackPanel;

use App\Http\Controllers\Controller;
use App\Http\Requests\BackPanel\Product\StoreRequest;
use App\Http\Requests\BackPanel\Product\UpdateRequest;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
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

        return redirect()
            ->route("back_panel.products.index", $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $product->save();
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
