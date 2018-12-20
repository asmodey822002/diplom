<?php

namespace App\Models;
use Session;

class Cart
{
    static function add($product, $qty){
    	if(Session::get('cart.prod_'.$product->id)){
    		$inCart=Session::get('cart.prod_'.$product->id.'.qty');
	    	Session::put('cart.prod_'.$product->id.'.qty', $qty+$inCart);
    	}
    	else
    	{
	    	Session::put('cart.prod_'.$product->id.'.id', $product->id);
	    	Session::put('cart.prod_'.$product->id.'.name', $product->name);
	    	Session::put('cart.prod_'.$product->id.'.imgPath', $product->imgPath);
	    	Session::put('cart.prod_'.$product->id.'.price', $product->price);
	    	Session::put('cart.prod_'.$product->id.'.qty', $qty);
	    }
	    //Session::put('totalSum', )
	    self::totalSum();
    }
    static function totalSum(){
    	$sum=0;
    	foreach(Session::get('cart') as $product){
    		$sum+=$product['price']*$product['qty'];
    	}
    	Session::put('totalSum', $sum);
    }
    static function remove($id){
    	Session::forget('cart.prod_'.$id);
    	self::totalSum();
    }
    static function clear(){
    	Session::forget('cart');
    	Session::forget('totalSum');
    }

}
