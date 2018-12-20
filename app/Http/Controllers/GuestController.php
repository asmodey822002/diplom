<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;


class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('guests.index');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function addToCart(Request $request)//для корзины
    {
        $product=Product::find($request->product_id);
        Cart::add($product, $request->qty);
        return view('shop.cart');
        //return $request->product_id;
    }
    public function removeFromCart(Request $request)//для корзины
    {
        Cart::remove($request->id);
        return view('shop.cart');
    }
    public function clearCart()//для корзины
    {
        Cart::clear();
        return view('shop.cart');
    }
    public function checkout()//для корзины
    {
        return view('shop.checkout');
    }
    public function checkoutEnd(Request $request)//для корзины
    {
        
        //return view('shop.checkout');
        $order=new Order;
        $order->sum=session('totalSum');
        $order->phone=$request->phone;
        $order->address=$request->address;
        $order->save();
        foreach (session('cart') as $product){
            $item=new OrderItem;
            $item->name=$product['name'];
            $item->price=$product['price'];
            $item->order_id=$order->id;
            $item->save();
        }
        \Mail::send('emails.admin.order', ['order'=>$order->id, 'phone'=>$request->phone, 'address'=>$request->address], function($m){
            $m->from('asmodey822002@gmail.com');//от кого
            $m->to('asmodey822002@gmail.com');//кому
        });
        $address=$request->address;
         \Mail::send('emails.user.order', ['order'=>$order->id, 'phone'=>$request->phone, 'address'=>$request->address], function($m) use ($address){
            $m->from('asmodey822002@gmail.com');
            $m->to($address);
        });
        Cart::clear();
        return redirect('/')->with('success', 'Ваш заказ в обработке проверте почту');
    }*/
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$category=Category::find($id);
        $title=$category->name;
        $products=Product::where('category_id', '=', $id)->get();
        return view('guests.show', compact('category', 'products', 'title'));*/
    }
    /*public function showProduct($id)
    {
        $product=Product::find($id);
        $title=$product->name;
        return view('guests.showProduct', compact('product', 'title'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
