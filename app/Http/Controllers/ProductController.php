<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function list(Request $request) {
        $products = Product::orderByDesc('updated_at')->get();
        return Inertia::render('Product/Index', [
            'products' => $products
        ]);
    }
}
