@extends('admin-layout')
@section('admin-content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_slider as$key=>$pro )
                            
                      
                    <form role="form" action="{{ URL::to('/update-slider/'.$pro->slider_id) }}" method="post"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên slider </label>
                            <input type="text" class="form-control" value="{{ $pro->slider_name }}" id="exampleInputEmail1" name="slider_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh </label>
                            <input  type="file" class="form-control" id="exampleInputPassword1" name="slider_image" >
                            <label style="margin: 10px 0 10px 0; font-style: italic" for="exampleInputPassword1">Hình ảnh hiện tại:{{  $pro->slider_image }}</label>
                            <br>
                            <img src="{{ URL::to('public/uploads/slider/'.$pro->slider_image) }}" height="150" width="650" alt="">
                        </div>
                       
                       
                      
                         
                     
                        
                        <div class="form-group" style="margin-top: 30px">
                        <button type="submit" name="add_slider" class="btn btn-info">Thêm</button>
                        </div>
                    </form>
                    @endforeach
                    </div>

                </div>
            </section>

    </div>
   
        </section>

    </div>
</div>
@endsection