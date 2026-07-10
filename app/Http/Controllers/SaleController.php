<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    public function purchase(Request $request)
    {
        $product_id=$request->input('product_id');
        $quantity=$request->input('quantity');
        //product_idを基に購入された商品情報を取得
        $product=Product::find($product_id);

        //購入個数が在庫を上回る場合処理終了
        if($product->stock<$quantity)
        {
            return response()->json(['message'=>'在庫が不足しています'],400);
        }


        DB::beginTransaction();
        try{
            $sale=Sale::create([
            'user_id'=>Auth::id(),
            'product_id'=>$product_id,
            'quantity'=>$quantity
            
            ]);

            //商品の在庫を購入個数分減らす
            $product->decrement('stock',$quantity);

            //DB更新処理実行
            DB::commit();
        }catch(\Exception $e){
            //try内処理でエラーが発生した場合
            DB::rollBack();
            return response()->json(['message'=>'購入に失敗しました'],500);
        }

        //try内処理が成功した場合、成功メッセージを返却
        // return response()->json(['message'=>'購入が完了しました','order'=>$sale],201);
        return redirect()->route('index')
            ->with('success','購入が完了しました');
        
    }
    
    public function confirm($id)
    {
        $product=Product::findOrFail($id);

        return view('purchase',compact('product'));
    }

}
