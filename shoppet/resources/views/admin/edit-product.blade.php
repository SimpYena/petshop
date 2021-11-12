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
                        @foreach ($edit_product as$key=>$pro )
                            
                      
                    <form role="form" action="{{ URL::to('/update-product/'.$pro->product_id) }}" method="post"  enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm </label>
                            <input type="text" class="form-control" value="{{ $pro->product_name }}" id="exampleInputEmail1" name="product_name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hình ảnh </label>
                            <input  type="file" class="form-control" id="exampleInputPassword1" name="product_image" >
                            <label style="margin: 10px 0 10px 0; font-style: italic" for="exampleInputPassword1">Hình ảnh hiện tại:{{  $pro->product_image }}</label>
                            <br>
                            <img src="{{ URL::to('public/uploads/product/'.$pro->product_image) }}" height="150" width="150" alt="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm </label>
                            <input value="{{ $pro->product_price }}"  type="text" class="form-control" id="exampleInputEmail1" name="product_price">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm </label>
                            <textarea name="product_desc" style="resize: none" id="exampleInputPassword1" rows="8" class="form-control">{{ $pro->product_desc }} </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm </label>
                            <textarea name="product_content" style="resize: none" id="exampleInputPassword1" rows="8" class="form-control">{{ $pro->product_content }}</textarea>
                        </div>
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Dach mục sản phẩm </label>
                             <select  class="form-control input-lg m-bot10 " name="product_cate">
                                @foreach ($cate_product as$key=> $cate_value )
                                @if($cate_value->category_id == $pro->category_id)
                                <option selected value="{{ $cate_value->category_id }}">{{ $cate_value->category_name }}</option>;
                                @else
                                <option value="{{ $cate_value->category_id }}">{{ $cate_value->category_name }}</option>;
                                @endif
                              @endforeach 
                             </select>
                        
                           </div>
                           <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục thương hiệu</label>
                             <select  class="form-control input-lg m-bot10 " name="product_bra">
                                @foreach ($brand_product as$key=> $brand_value )
                                @if($brand_value->brand_id == $pro->brand_id)
                                <option selected value="{{ $brand_value->brand_id }}">{{ $brand_value->brand_name }}</option>;
                                @else
                                <option value="{{ $brand_value->brand_id }}">{{ $brand_value->brand_name }}</option>;
                                @endif
                              @endforeach 
                             </select>
                        
                           </div>
                       
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị </label>
                             <select  class="form-control input-lg m-bot10 " name="product_status">
                                 <option value="0">Hiện</option>
                                 <option value="1">Ẩn</option>
                                 
                             </select>
                        
                           </div>
                        
                        <div class="form-group" style="margin-top: 30px">
                        <button type="submit" name="add_product" class="btn btn-info">Thêm</button>
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