<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
session_start();
class CheckOutController extends Controller
{
    public function login_checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $slider=DB::table('sliders')->where('status','0')->where('slider_id','7')->get();
        $slider1=DB::table('sliders')->where('status','0')->orderBy('slider_id','desc')->where('slider_id','<>','7')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        return view('page.check_out.login_check_out')
        ->with('category',  $cate_product)
        ->with('brand',  $brand_product)
              ->with('slider',  $slider)
        ->with('slider1',  $slider1);
   
    }
    public function register(Request $request){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $slider=DB::table('sliders')->where('status','0')->where('slider_id','7')->get();
        $slider1=DB::table('sliders')->where('status','0')->orderBy('slider_id','desc')->where('slider_id','<>','7')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $data=array();

        $data['customer_name']=$request->name_cus;
        $data['customer_email']=$request->email_cus;
        $data['customer_pass']=$request->pass_cus;
        $data['customer_phone']=$request->phone_cus;
       $customer_id=DB::table('tbl_customer')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);
       return Redirect('/chec_kout');
    }
    public function checkout(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
        $slider=DB::table('sliders')->where('status','0')->where('slider_id','7')->get();
        $slider1=DB::table('sliders')->where('status','0')->orderBy('slider_id','desc')->where('slider_id','<>','7')->get();
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        return view('page.check_out.check_out')->with('category',  $cate_product)
        ->with('brand',  $brand_product)
              ->with('slider',  $slider)
        ->with('slider1',  $slider1);
    }
    public function save_checkout( Request $request){
        $data=array();
        $data['shipping_name']=$request->shipping_name;
        $data['shipping_address']=$request->shipping_address;
      
        $data['shipping_phone']=$request->shipping_notes;
        $data['shipping_email']=$request->shipping_email;
        $data['shipping_notes']=$request->shipping_notes;
       $shipping_id=DB::table('tbl_shipping')->insertGetId($data);
        Session::put('shipping_id',$shipping_id);
        Session::put('customer_name',$request->customer_name);
       return Redirect('/payment');
        
    }
    public function logout( Request $request){
        Session::put('customer_id',null);
 
        return Redirect::to('/trangchu');
      }
      public function login_customer( Request $request){
        $user_email=$request->user_email;
        $user_password=$request->admin_password;
        $result=DB::table('tbl_customer')
                ->where('admin_email', $user_email)
                ->where('admin_password', $user_password)
                ->first();
             if($result)
             
                {
                    Session::put('customer_id',$result->customer_id);
                    return Redirect::to('/checkout');
                }
              else {
                Session::put('message','Tài khoản hoặc mật khẩu sai');
    
                return Redirect::to('/login-checkout');
          
    
              }
    
      }
      public function check_login_in_checkout( Request $request){
        $user_email=$request->user_email;
        $user_password=$request->user_password;
        $result=DB::table('tbl_customer')
                ->where('customer_email', $user_email)
                ->where('customer_pass', $user_password)
                ->first();
             if($result)
             
                {
                    Session::put('customer_id',$result->customer_id);
                    return Redirect::to('/checkout');
                }
              else {
                Session::put('message','Tài khoản hoặc mật khẩu sai');
    
              return Redirect::to('/login-checkout')  ;
          
    
              }
    
      }

      public  function payment(){
        $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
       
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $slider=DB::table('sliders')->where('status','0')->where('slider_id','7')->get();
        $slider1=DB::table('sliders')->where('status','0')->orderBy('slider_id','desc')->where('slider_id','<>','7')->get();
        return view('page.check_out.payment')
        ->with('category',  $cate_product)
        ->with('brand',  $brand_product)
        ->with('slider',  $slider)
        ->with('slider1',  $slider1);
   
          
      }

      public function order_place(Request $request)
      {  $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
       
        $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
        $slider=DB::table('sliders')->where('status','0')->where('slider_id','7')->get();
        $slider1=DB::table('sliders')->where('status','0')->orderBy('slider_id','desc')->where('slider_id','<>','7')->get();
        
        // $content = Cart::getContent();
        // echo $content;
        //thêm vào tbl payment 
        $data=array();

        $data['payment_method']=$request->rad;
        $data['payment_status']='Đang chờ xử lý';
        $data_id=DB::table('tbl_payment')->insertGetId($data);

        // thêm vào tbl order
        $order_data=array();
        $order_data['customer_id']=Session::get('customer_id');
        $order_data['shipping_id']=Session::get('shipping_id');
        $order_data['payment_id']=$data_id;
        $order_data['order_total']= Cart::getTotal();
       
        $order_data['order_status']='Đang chờ xử lý';
        $order_data_id=DB::table('tbl_order')->insertGetId($order_data);
        // thêm vào tbl order detail
        $content = Cart::getContent();
        foreach ($content as$key=>$v_content ){
        $order_detail_data=array();
        $order_detail_data['order_id']= $order_data_id;
        $order_detail_data['product_id']=$v_content->id;
        $order_detail_data['product_name']=$v_content->name;
       
        $order_detail_data['product_price']= $v_content->price;
        $order_detail_data['product_quantity']=$v_content->quantity;
       
       DB::table('tbl_order_detail')->insert($order_detail_data);

      }
      Cart::clear();
      return view("page.check_out.donepayment")
      ->with('category',  $cate_product)
        ->with('brand',  $brand_product)
        ->with('slider',  $slider)
        ->with('slider1',  $slider1);
    }
  }
?>