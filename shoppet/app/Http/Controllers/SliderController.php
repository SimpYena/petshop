<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
class SliderController extends Controller
{
    public function Authlogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id)
        return Redirect::to('admin.dashboard');
        else
        return Redirect::to('adminlogin')->send();
      }
      
        public function add_slider()
        {
          $this->Authlogin();
              return view('admin.add-slider');
        }



        public function save_slider(Request $request)
  {
    $this->Authlogin();
    $data=array();
    $data['slider_name']= $request->slider_name;
   
    $data['status']= $request->slider_status;
    $get_image=$request->file('slider_image');
if( $get_image)
    {
      $this->Authlogin();
      $get_name_image=$get_image->getClientOriginalName();
      $name_image= current(explode('.',$get_name_image));
      $new_image=  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
      $get_image->move('public/uploads/slider',$new_image);
      $data['slider_image']=$new_image;
      DB::table('sliders')->insert($data);
    
      return Redirect::to('all-slider');
     
   
    }
    $data['slider_image']='';
   
    DB::table('sliders')->insert($data);
    Session::put('message','Thêm thành công');
    return Redirect::to('all-slider');
  }
  public function all_slider()
  {
    $this->Authlogin();
    $all_slider = DB::table('sliders')->orderBy('slider_id','desc')->get();
    $maneger_slider = view('admin.all-slider')->with('all_slider',$all_slider);
        return view('admin-layout')->with('admin.all-slider',$maneger_slider);
    
  }
  public function active_slider($slider_id)
  {
    $this->Authlogin();
     DB::table('sliders')->where('slider_id',$slider_id )->update(['status'=>1]);
 
    return Redirect::to('all-slider');
  }
  public function unactive_slider($slider_id)
  {
    $this->Authlogin();
    DB::table('sliders')->where('slider_id',$slider_id )->update(['status'=>0]);
   
    return Redirect::to('all-slider');
  }
  public function edit_slider($slider_id)
  {
    $this->Authlogin();
   

    $edit_slider=DB::table('sliders')->where('slider_id',$slider_id)->get();
        $maneger_slider = view('admin.edit-slider')->with('edit_slider',$edit_slider);
        
        return view('admin-layout')->with('edit-slider',$maneger_slider);
  }
  public function delete_slider($slider_id)
  {
    $this->Authlogin();
    DB::table('sliders')->where('slider_id',$slider_id )->delete();
   
    return Redirect::to('all-slider');
  }
  public function update_slider($slider_id,Request $request)
  {
    $this->Authlogin();
    $data=array();
    $data['slider_name']= $request->slider_name;
    
    $get_image=$request->file('slider_image');
if( $get_image)
    {
      $get_name_image=$get_image->getClientOriginalName();
      $name_image= current(explode('.',$get_name_image));
      $new_image=  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
      $get_image->move('public/uploads/slider',$new_image);
      $data['slider_image']=$new_image;
      DB::table('sliders')->where('slider_id',$slider_id)->update($data);
   
    }
 
    DB::table('sliders')->where('slider_id',$slider_id)->update($data);
  
    return Redirect::to('all-slider');
 
 }
}
?>