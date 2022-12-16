<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * @return response()
     */
    public function index()
    {
        $products = Product::get();

        return view('/products', compact('products'));
    }

    /**
     * @return response()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'desc' => 'string',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Product::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'price' => $request->price,
        ]);

        return response()->json(['success' => 'Product created successfully.']);
    }
}
