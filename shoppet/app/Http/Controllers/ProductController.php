<?php
namespace App\Http\Controllers;

use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();


use Illuminate\Http\Request;

class ProductController extends Controller
{
     
public function Authlogin(){
  $admin_id= Session::get('admin_id');
  if($admin_id)
  return Redirect::to('admin.dashboard');
  else
  return Redirect::to('adminlogin')->send();
}

    public function add_product()
  {
    $this->Authlogin();
    $cate_product=DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

    $brand_product=DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get();
    return view('admin.add-product')->with('cate_product',$cate_product)->with('brand_product',$brand_product);
  }

  public function all_product()
  {
    $this->Authlogin();
    $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
              ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
              ->orderBy('tbl_product.product_id','desc')->paginate(5);
      
        $maneger_product = view('admin.all-product')->with('all_product',$all_product);
        return view('admin-layout')->with('admin.all-product',$maneger_product);
    
  }

  public function save_product(Request $request)
  {
    $this->Authlogin();
    $data=array();
    $data['product_name']= $request->product_name;
    $data['product_price']= $request->product_price;
    $data['product_desc']= $request->product_desc;
    $data['product_content']= $request->product_content;
    $data['category_id']= $request->product_cate;
    $data['brand_id']= $request->product_bra;
    $data['product_status']= $request->product_status;
    $get_image=$request->file('product_image');
if( $get_image)
    {
      $this->Authlogin();
      $get_name_image=$get_image->getClientOriginalName();
      $name_image= current(explode('.',$get_name_image));
      $new_image=  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
      $get_image->move('public/uploads/product',$new_image);
      $data['product_image']=$new_image;
      DB::table('tbl_product')->insert($data);
      Session::put('message','Thêm thành công');
      return Redirect::to('all-product');
     
   
    }
    $data['product_image']='';
   
    DB::table('tbl_product')->insert($data);
    Session::put('message','Thêm thành công');
    return Redirect::to('all-product');
  }


  public function active_product($product_id)
  {
    $this->Authlogin();
     DB::table('tbl_product')->where('product_id',$product_id )->update(['product_status'=>1]);
    Session::put('message','Thêm thành công');
    return Redirect::to('all-product');
  }
  public function unactive_product($product_id)
  {
    $this->Authlogin();
    DB::table('tbl_product')->where('product_id',$product_id )->update(['product_status'=>0]);
    Session::put('message','Thêm thành công');
    return Redirect::to('all-product');
  }
  public function edit_product($product_id)
  {
    $this->Authlogin();
    $cate_product=DB::table('tbl_category_product')->orderBy('category_id','desc')->get();

    $brand_product=DB::table('tbl_brand_product')->orderBy('brand_id','desc')->get(); 

    $edit_product=DB::table('tbl_product')->where('product_id',$product_id)->get();
        $maneger_product = view('admin.edit-product')->with('edit_product',$edit_product)
        ->with('cate_product',$cate_product)
        ->with('brand_product',$brand_product);
        return view('admin-layout')->with('edit-product',$maneger_product);
  }
  public function delete_product($product_id)
  {
    $this->Authlogin();
    DB::table('tbl_product')->where('product_id',$product_id )->delete();
   
    return Redirect::to('all-product');
  }

  public function update_product($product_id,Request $request)
  {
    $this->Authlogin();
    $data=array();
    $data['product_name']= $request->product_name;
    $data['product_price']= $request->product_price;
    $data['product_desc']= $request->product_desc;
    $data['product_content']= $request->product_content;
    $data['category_id']= $request->product_cate;
    $data['brand_id']= $request->product_bra;
    $data['product_status']= $request->product_status;
    $get_image=$request->file('product_image');
if( $get_image)
    {
      $get_name_image=$get_image->getClientOriginalName();
      $name_image= current(explode('.',$get_name_image));
      $new_image=  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
      $get_image->move('public/uploads/product',$new_image);
      $data['product_image']=$new_image;
      DB::table('tbl_product')->where('product_id',$product_id)->update($data);
   
    }
 
    DB::table('tbl_product')->where('product_id',$product_id)->update($data);
  
    return Redirect::to('all-product');
 
 }
 public function show_chi_tiet($product_id){
  $cate_product=DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_id','desc')->get();
  $slider=DB::table('sliders')->where('status','0')->where('slider_id','7')->get();
  $slider1=DB::table('sliders')->where('status','0')->orderBy('slider_id','desc')->where('slider_id','<>','7')->get();
  $brand_product=DB::table('tbl_brand_product')->where('brand_status','0')->orderBy('brand_id','desc')->get();
  $details_product=DB::table('tbl_product')
  ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
  ->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
  ->where('tbl_product.product_id',$product_id)->get();
  foreach($details_product as$key=>$details ){
$category_id=$details->category_id;}

$related_product=DB::table('tbl_product')
->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->orderBy('tbl_product.product_id','desc')->limit(3)->get();
$related_product1=DB::table('tbl_product')
->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
->join('tbl_brand_product', 'tbl_brand_product.brand_id', '=', 'tbl_product.brand_id')
->where('tbl_category_product.category_id',$category_id)->whereNotIn('tbl_product.product_id',[$product_id])->orderBy('tbl_product.product_id','asc')->limit(3)->get();

   return view('page.show_details.showdetals')
   ->with('category',  $cate_product)
        ->with('brand',  $brand_product)
        ->with('details_product',  $details_product)
        ->with('related_product',  $related_product)
        ->with('related_product1',  $related_product1)
        ->with('slider',  $slider)
        ->with('slider1',  $slider1);
 }
}
?>