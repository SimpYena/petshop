@extends('welcome')
@section('content')



    
        
            <div class="features_items"><!--features_items-->
                <h2 class="title text-center wow bounceInUp">Sản phẩm mới</h2>
                @foreach ($product as$key => $pro )
                
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                                <div class="productinfo text-center">
                                    <form  action="{{ URL::to('/save-cart') }} " method="POST">
                                      {{ csrf_field() }}
                                      <input name="qty" type="hidden" value="1" min="1" />
                                      <input name="productid_hiden" type="hidden"  value="{{ $pro->product_id }}"  />
                                    <a href="{{URL::to('/chi_tiet_san_pham/'.$pro->product_id)  }}">

                                    <img src="{{ URL::to('public/uploads/product/'.$pro->product_image) }}"  alt="" id="imageProduct" />
                            
                                    <h2 id="price">{{ number_format($pro->product_price) }} VND</h2>
                                    <p id="text1">{{ $pro->product_name }}</p>
                                    </a>
                                    {{-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a> --}}
                                    <button name="add-to-card" type="submit" data-id="{{ $pro->product_id  }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart" ></i>Thêm vào giỏ</button>
                                </form>
                                </div>
                                {{-- <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{ number_format($pro->product_price) }}VND</h2>
                                        <p>{{ $pro->product_name }}</p>
                                        <button  name="add-to-card" type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ</button>
                                    </div>
                                </div> --}}
                        </div>
                       
                    </div>
                </div>
            </a>
               @endforeach
                
               <div class="col-sm-7 text-right text-center-xs">                
                {{ $product->links('pagination::bootstrap-4')}} 
              </div>
            </div>
            <!--features_items-->
           
@stop