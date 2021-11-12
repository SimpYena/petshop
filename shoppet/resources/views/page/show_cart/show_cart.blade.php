@extends('welcome')
@section('content')
<section id="cart_items">
		
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{ URL::to('/trangchu') }}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
                <?php
                $content = Cart::getContent();
            //   echo'<pre>';
            //     print_r($content);
            //     echo'</pre>'
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
	
	</section> <!--/#cart_ite
</section><!--/#do_action-->
<section id="do_action">
  
        <div class="heading">
            <h3>Đặt hàng Online</h3>
            
        </div>
        <div class="row">
            <div class="col-sm-6">
              
            </div>
            <div class="col-sm-6">
                <div class="total_area">
                    <ul>
                        <?php
                            $total=Cart::getTotal();

                            ?>
                        <li>Tổng tiền <span>{{ number_format($total).' '.'VND' }}</span></li>
                        <li>Phí vận chuyển<span>Free</span></li>
                        <li>Thành tiền <span>{{ number_format($total).' '.'VND' }}</span></li>
                    </ul>
                        <a class="btn btn-default update" href="">Update</a>
                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Check Out</a>
                </div>
            </div>
        </div>
   
</section><!--/#do_action-->
<div class="row">
    @yield('content');
</div>
@stop