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
        return Inertia::render('Product/Add', []);
    }

    public function products_list(Request $request) {
        $products = Product
            ::where('is_deleted', 0)
            ->where('is_sold', 0)
            ->orderByDesc('created_at');
        $products = $products->get();
        return Inertia::render('Product/User/Index', [
            'products' => $products
        ]);
    }

    public function product_detail(Request $request, $id = null) {
        $product = Product::whereId($id)->first();
//        if ($product->is_sold == 1) {
//            return back(303)->dangerBanner('This product is sold');
//        }
        return Inertia::render('Product/User/Detail', [
            'item' => $product
        ]);
    }

    public function product_buy(Request $request) {
        $product = Product::findOrFail($request->id);
        if ($product->is_sold == 1) {
            return back(303)->dangerBanner('This product is sold');
        }
        $product['buyer_id'] = $request->user()->id;
        $product['is_sold'] = 1;
        $product->save();
        return redirect(route('product.detail', ['id' => $request->id]))->banner('You bought this product');
    }
}
