@extends('admin-layout')
@section('admin-content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                  Thêm slide
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    <form role="form" action="{{ URL::to('/save-slider') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên slider </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="slider_name">
                        </div>
                      
                     
                           
                      
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh </label>
                            <input type="file" class="form-control" id="exampleInputPassword1" name="slider_image" >
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị </label>
                             <select  class="form-control input-lg m-bot10 " name="slider_status">
                                 <option value="0">Hiện</option>
                                 <option value="1">Ẩn</option>
                                 
                             </select>
                             
                            
                       
                               
                            
                           
                        </div>
                        
                        <div class="form-group" style="margin-top: 30px">
                        <button type="submit" name="add_slider" class="btn btn-info">Thêm</button>
                        </div>
                    </form>
                    </div>

                </div>
            </section>

    </div>
   
        </section>

    </div>
</div>
@endsection