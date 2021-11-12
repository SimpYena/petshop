@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
            @foreach ( $category_name as$key => $cate_name )
                
         
                <h2 class="title text-center">Danh mục {{ $cate_name->category_name }}</h2>
                @endforeach
         @foreach ($category_by_id as$key => $pro )
         <form  action="{{ URL::to('/save-cart') }} " method="POST">
            {{ csrf_field() }}
            <input name="qty" type="hidden" value="1" min="1" />
            <input name="productid_hiden" type="hidden"  value="{{ $pro->product_id }}"  />
         <a href="{{URL::to('/chi_tiet_san_pham/'.$pro->product_id)  }}">
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <img id="imageProduct" src="{{ URL::to('public/uploads/product/'.$pro->product_image) }}" height="270" width="150" alt="" />
                                    <h2 id="price" >{{ number_format($pro->product_price) }} VND</h2>
                                    <p>{{ $pro->product_name }}</p>
                                    <button name="add-to-card" type="submit" data-id="{{ $pro->product_id  }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" ></i>Thêm vào giỏ</button>
                                </form>
                                </div>
                               
                        </div>
                       
                    </div>
                </div>
            </a>
               @endforeach 
               <div class="col-sm-7 text-right text-center-xs">                
                {{ $category_by_id->links('pagination::bootstrap-4')}} 
              </div>
                
        </div>
        @stop