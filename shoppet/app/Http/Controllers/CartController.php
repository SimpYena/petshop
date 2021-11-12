<?php

namespace App\Http\Controllers;

use Darryldecode\Cart\Cart as CartCart;
use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    public function save_cart(Request $request)
    {
     $product_id=$request->productid_hiden;
     $quantity=$request->qty;
     $product_info=DB::table('tbl_product')->where('product_id',$product_id)->first();
     
    
  
     $data['id']=$product_info->product_id;
     $data['quantity']= $quantity;
     $data['name']=$product_info->product_name;
     $data['price']=$product_info->product_price;
     $data['weight']=$product_info->product_image;
     $data['attributes']['image']=$product_info->product_image;
     
     Cart::add($data);
    
    //  $id='6';
    //  $rowId = '11';

    //  Cart::remove($rowId);
     return Redirect::to('/show_cart_product');
    }
    public function show_cart()
    {
      $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
      $content = Cart::getContent();
      $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
      $slider=DB::table('sliders')->where('status','0')->where('slider_id','7')->get();
      $slider1=DB::table('sliders')->where('status','0')->orderBy('slider_id','desc')->where('slider_id','<>','7')->get();
     return view('page.show_cart.show_cart')
     ->with('category',  $cate_product)
     ->with('brand',  $brand_product)
     ->with('content',  $content)
     ->with('slider',  $slider)
     ->with('slider1',  $slider1);
     
     
  
}
public function remove_cart($product_id)
    {
$rowId =$product_id;
Cart::remove($rowId);
return Redirect::to('/show_cart_product');

  
     
}
public function update_cart(Request $request)
    {
$rowId =$request->cart_id;
$qty=$request->quantity_cart;

Cart::update($rowId, array(
    'quantity' => array(
        'relative' => false,
        'value' => $qty
    ),
  ));

return Redirect::to('/show_cart_product');



     
}
}
?>