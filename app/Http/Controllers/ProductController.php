<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('index',compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $product=new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;

        $product->user_id=1;
        $product->company_id=1;
        $product->img_path='';

        $product->save();
        return redirect('/products');
    }


    //詳細画面
    public function show($id)
    {
        $product=Product::findOrFail($id);
        return view('detail',compact('product'));

    }

    //編集画面
    public function edit($id)
    {
        $product=Product::findOrFail($id);
        return view('edit',compact('product'));
    }

    //更新処理
    public function update(Request $request,$id)
    {
        $product=Product::findOrFail($id);
        $product->product_name=$request->input('product_name');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->description=$request->input('description');

        $product->save();
        return redirect()->route('detail',$id);

    }
}
