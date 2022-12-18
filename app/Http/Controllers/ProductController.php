<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
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

        return view('/product/list', compact('products'));
    }

    public function create()
    {
        return view('product/store');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        if ($product) {
            return response()->json(['status' => 'success', 'data' => $product]);
        }
        return response()->json(['status' => 'failed', 'message' => 'No post found']);
    }

    /**
     * @return response()
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
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
    public function destroy($id)
    {

        try {
            $delete = Product::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response([
                'success' => false,
            ]);
        }
        $delete->delete();
        return response()->json(['success'=>true,'message' => 'Product Deleted Successfully!']);

    }
    public function edit($id){
        $product = Product::find($id);
        return view('product/update',['product' =>$product]);
    }
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'price' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors()->all()
            ]);
        }

        Product::where('id', $id)
            ->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'price' => $request->price,
        ]);

        return response()->json(['success' => 'Product updated successfully.']);
    }
}
