<?php

namespace App\Http\Controllers\FrontPanel;

use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *

     */
    public function index()
    {
        $products = Product::query()
            ->paginate(10);
        return view("front_panel.pages.products.index")
            ->with("products", $products);
    }
}
