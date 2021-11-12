@extends('admin-layout')
@section('admin-content')

<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                   Cập nhật thương hiệu
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        @foreach ($edit_brand_product as $key =>$edit_value )
                            
                      
                    <form role="form" action="{{ URL::to('/update-brand-product/'.$edit_value->brand_id) }}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu </label>
                            <input type="text" value={{ $edit_value->brand_name }} class="form-control" id="exampleInputEmail1" name="brand_product_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả </label>
                            <input type="textarea" value="{{$edit_value->brand_desc }}" rows="7"style="resize: none" rows="10"class="form-control" id="exampleInputPassword1" name="brand_product_desc" >
                        </div>
                       
                   
                             
                            
                       
                               
                            
                           
                       
                        
                        <div class="form-group" style="margin-top: 30px">
                        <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật</button>
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