<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function save(Request $request)
    {
        $valid = $request->validate(
            'name',
            'price',
        );

        if ($valid != null) {
            $product = new Product();
            $product->name = $valid['name'];
            $product->price = $valid['price'];
            $product->created_at = Carbon::now()->timezone('Asia/Phnom_Penh');
            $product->updated_at = Carbon::now()->timezone('Asia/Phnom_Penh');
            $product->admin_id = $request->session()->get('admin_session');
            $product->save();
        }
    }
}
