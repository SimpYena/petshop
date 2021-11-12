@extends('admin-layout')
@section('admin-content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật danh mục
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_category_product as $key =>$edit_value )
                            
                      
                    <form role="form" action="{{ URL::to('/update-category-product/'.$edit_value->category_id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục </label>
                            <input type="text" value="{{$edit_value->category_name }}" class="form-control" id="exampleInputEmail1" name="category_product_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả </label>
                            <input type="textarea" value="{{$edit_value->category_desc }}" rows="7"style="resize: none" rows="10"class="form-control" id="exampleInputPassword1" name="category_product_desc" >
                        </div>
                       
                   
                             
                            
                       
                               
                            
                           
                       
                        
                        <div class="form-group" style="margin-top: 30px">
                        <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật</button>
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