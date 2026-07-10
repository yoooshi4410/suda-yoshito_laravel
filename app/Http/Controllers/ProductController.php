<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product=$product;
    }

    //商品一覧
    public function index(Request $request)
    {
        $user_id=Auth::id();

        $products = $this->product->getOtherProduct(
            $user_id,
            $request->keyword,
            $request->min_price,
            $request->max_price
        );

        return view('index',compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    //新規登録
    public function store(ProductRequest $request)
    {
        $product=new Product();
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->description = $request->description;

        //画像処理
        if ($request->hasFile('image')){
            $imagePath = $request->file('image')->store('images','public');
            $product->img_path = $imagePath;
        }else{
            $product->img_path='';
        }

        $product->user_id=Auth::id();
        $product->company_id=1;

        $product->save();
        return redirect('/mypage');
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
    public function update(ProductRequest $request,$id)
    {
        $product=Product::findOrFail($id);
        $product->product_name=$request->input('product_name');
        $product->price=$request->input('price');
        $product->stock=$request->input('stock');
        $product->description=$request->input('description');

        if($product->img_path){
            Storage::delete('public/'.$product->img_path);
        
        $imagePath=$request->file('image')->store('images','public');
        $product->img_path=$imagePath;
        }

        $product->save();
        return redirect()->route('mypagedetail',$product->id);

    }

    //マイページ
    public function mypage()
    {
        // $products=Product::where('user_id',1)->get();
        $user_id=Auth::id();
        $products=$this->product->getOwnProduct($user_id);

        return view('mypage',compact('products'));
    }

    //出品商品詳細
    public function mypagedetail($id)
    {
        $product=Product::findOrFail($id);
        return view('mypagedetail',compact('product'));
    }

    

    //削除機能
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $product->delete();



        return redirect()->route('mypage')
        ->with('success','記事が削除されました');
    }

    

}
