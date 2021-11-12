<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


session_start();
class AdminController extends Controller
{
   
public function Authlogin(){
  $admin_id= Session::get('admin_id');
  if($admin_id)
  return Redirect::to('admin.dashboard');
  else
  return Redirect::to('adminlogin')->send();
}
 
  
public function index()
{ 
  $admin_id=Session::get('admin_id');
  if($admin_id){
    return Redirect::to('dashboard');
  }else{
      return view('adminlogin');
  }
}

public function show_dashboard()
{  $this->Authlogin();
   return view('admin.dashboard');
}

public function dashboard(Request $request)
{ 
  $this->Authlogin();
    $admin_email=$request->admin_email;
    $admin_password=md5($request->admin_password);
    $result=DB::table('tbl_admin')
            ->where('admin_email', $admin_email)
            ->where('admin_password', $admin_password)
            ->first();
         if($result)
         
            {
                Session::put('admin_name',$result->admin_name);
                Session::put('admin_id',$result->admin_id);
                return Redirect::to('/dashboard');
            }
          else {
            Session::put('message','Tài khoản hoặc mật khẩu sai');

          return Redirect::to('/adminlogin')  ;
      

          }
}

public function logout()
{ 
  Session::put('admin_name',null);
  Session::put('admin_id',null);
 
  return Redirect::to('/admin');
}
}
