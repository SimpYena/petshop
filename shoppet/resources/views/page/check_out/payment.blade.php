@extends('welcome')
@section('content')
<section id="cart_items">
  
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{ URL::to('/trangchu') }}">Trang chủ</a></li>
          <li class="active">Thanh toán </li>
        </ol>
    </div>
   
   

      

        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
            <div class="table-responsive cart_info">
                <?php
                $content = Cart::getContent();
            //   echo'<pre>';
            //     print_r($content);
            //     echo'</pre>'
            // echo Session::get('customer_id');
            // echo Session::get('shipping_id');
                ?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình ảnh</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng cộng</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
                        @foreach ($content as$key=>$v_content )
                            
                      
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{ URL::to('public/uploads/product/'.$v_content->attributes->image) }}" width="50" alt=""></a>
							</td>
							<td class="cart_description" style="width: 230px;">
								<p style="font-weight: 500; font-size: 18px;word-wrap: break-word"><a style="color:#9c9b98;word-break: break-word;" href="">{{ $v_content->name }}</a></p>
								
							</td>
							<td class="cart_price">
								<p>{{ number_format($v_content->price).''.'VND' }}</p>
							</td>
							<td class="cart_quantity"  style="width: 200px;" >
							
                                <form action="{{ URL::to('/update-cart') }}" method="POST">
                                    {{ csrf_field() }}
                            <div class="quantity buttons_added" style="margin:0 0 19px 10px;">
                                <input style="width: 40px;" name="quantity_cart" value="{{ $v_content->quantity }}" title="Qty"  size="2">
                                <input type="hidden" name="cart_id" value="{{ $v_content->id }}" >
                                <button type="submit" >Cập nhật</button>
                            </div>
                        </form>
                        </td>
							<td class="cart_total">
								<p class="cart_total_price" style="font-size: 19px">
                                    <?php
                                    $total=$v_content->price * $v_content->quantity;
                                    echo number_format($total).''.'VND';

                                    ?>
                                </p>
							</td>
                            
							<td class="cart_delete">
								<a onclick="return confirm('Bạn có chắc muốn xóa không ?')" class="cart_quantity_delete"  href="{{ URL::to('/remove-cart/'.$v_content->id) }}"><i class="fa fa-times"></i></a>
                                
							</td>
                        
						</tr>

                        @endforeach
					</tbody>
				</table>
			</div>
        </div>
<div class="row">
    <div class="col-md-6">
        <div class="review-payment">
            <h2>
                Phương thức thanh toán 
            </h2>
           
            <div>

            <form action="{{ URL::to('/order_place') }}" method="post">
              {{ csrf_field() }}
                <label class="rad-label">
                  <input type="radio" class="rad-input" name="rad" value="1">
                  <div class="rad-design"></div>
                  <div class="rad-text">Trả khi nhận hàng</div>
                </label>
              
                <label class="rad-label">
                  <input type="radio" class="rad-input" name="rad" value="2">
                  <div class="rad-design"></div>
                  <div class="rad-text">Thông qua ATM </div>
                </label>
                <label class="rad-label">
                  <input type="radio" class="rad-input" name="rad" value="3">
                  <div class="rad-design"></div>
                  <div class="rad-text">Trả bằng Credit Card</div>
                </label>
                <button type="submit" class="btn btn-default">Xác nhận thanh toán</button>
            </form>
              </div>
              
           
          
            {{-- <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span> --}}
        </div>
    </div>
    <div class="col-md-6">
        <div class="review-payment">
            <h2>
               Chi tiết hóa đơn
            </h2>
           
            <div>
        <div class="total_area">
            <ul>
                <?php
                    $total=Cart::getTotal();

                    ?>
                <li>Tổng tiền <span>{{ number_format($total).' '.'VND' }}</span></li>
                <li>Phí vận chuyển<span>Free</span></li>
                <li>Thành tiền <span>{{ number_format($total).' '.'VND' }}</span></li>
            </ul>
               
        </div>
    </div>
    </div>
    </div>
</section> <!--/#cart_items-->


@stop