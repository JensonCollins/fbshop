<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function list(Request $request, $date = null) {
        $products = Product::where('is_deleted', 0)->orderByDesc('created_at');
        if ($date) {
            $products = $products->whereYear('created_at', date('Y', strtotime($date)));
            $products = $products->whereMonth('created_at', date('m', strtotime($date)));
        }
        $products = $products->get();
        return Inertia::render('Product/Index', [
            'products' => $products,
            'date' => $date
        ]);
    }

    public function detail(Request $request, $id, $date = null) {
        $product = Product::whereId($id)->first();
        return Inertia::render('Product/Detail', [
            'item' => $product,
            'date' => $date
        ]);
    }

    public function add(Request $request) {

    }
}
