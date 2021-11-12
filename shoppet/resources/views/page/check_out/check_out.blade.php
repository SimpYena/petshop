@extends('welcome')
@section('content')
<section id="cart_items">
  
    <div class="breadcrumbs">
        <ol class="breadcrumb">
          <li><a href="{{ URL::to('/trangchu') }}">Trang chủ</a></li>
          <li class="active">Xác nhận giỏ hàng</li>
        </ol>
    </div>

   

        <div class="register-req">
            <p>Please use Register And Checkout to easily get access to your order history, or use Checkout as Guest</p>
        </div><!--/register-req-->

        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-5">
                    <div class="shopper-info">
                        <p>Thông tin thanh toán</p>
                        <form action="{{ URL::to('/save-checkout-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text"  name="shipping_name" placeholder="Họ và tên">
                            <input type="text" name="shipping_email"  placeholder="Email">
                            <input type="text" name="shipping_address"  placeholder="Địa chỉ">
                            <input type="text" name="shipping_phone"  placeholder="Số điện thoại">
                            <button type="submit"class="btn btn-default">Xác nhận thông tin</button>

                   
                 
                    </div>
                </div>
                <div class="col-sm-1">
                </div>
                <div class="col-sm-5">
                    <div class="order-message">
                        <p>Ghi chú gửi hàng</p>
                        <textarea name="shipping_notes"  placeholder="Ghi chú cho đơn hàng của bạn" rows="16"></textarea>
                        
                    </div>	
                </div>	
            </form>				
            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>

       
 
</section> <!--/#cart_items-->


@stop