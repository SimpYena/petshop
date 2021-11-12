@extends('admin-layout')
@section('admin-content')
<div class="table-agile-info" >
    <div class="panel panel-default">
      <div class="panel-heading">
      Liệt kê sản phẩm
      </div>
     
      <div class="table-responsive">
        <table class="table table-striped b-t bg-dark" style="color: black !important">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  
                </label>
              </th>
              <th>Tên sản phẩm </th>
              <th>Hình ảnh </th>
          
              <th>Hiển thị</th>
              <th style="width:30px;"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($all_slider as$key => $sliderpro )
                
            
            <tr>
              <td><label class="i-checks m-b-none"><i></i></label></td>
              <td>{{ ($sliderpro->slider_name) }}</td>
             
              <td><img src="public/uploads/slider/{{ ($sliderpro->slider_image) }}" height="150" width="300" alt=""></td>
           
              <td>
                <?php
                if($sliderpro->status==0){
                  ?>
              
               <a href="{{ URL::to ('/active-slider/'.$sliderpro->slider_id) }}"><i style="font-size: 25px;margin-left: 15px " class="fa fa-eye"  ></i></a>
               
               <?php
                 }else {
                   ?>
                <a href="{{ URL::to ('/unactive-slider/'.$sliderpro->slider_id)  }}"><i style="font-size: 25px;margin-left: 15px " class="fa fa-eye-slash" style="margin-left: 15px "></i> </a>
              <?php 
              }
               ?>
              </td>
              <td>
                <a href="{{URL::to ('/edit-slider/'.$sliderpro->slider_id) }}"><i class="fa fa-pencil-square-o text-success text-active"></i></a>
                  <a onclick="return confirm('Bạn có chắc muốn xóa không ?')" href="{{URL::to ('/delete-slider/'.$sliderpro->slider_id) }}"><i class="fa fa-times text-danger text"></i></a>
                
              </td>
            </tr>
            @endforeach
             
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>

@endsection