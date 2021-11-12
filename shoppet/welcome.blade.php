<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopper</title>
	<link rel="shortcut icon" href="{{ asset('public/frontend/images/pet.png')}}" />
	<link rel='stylesheet' href='https://cdn.rawgit.com/daneden/animate.css/v3.1.0/animate.min.css'>
	<script src='https://cdn.rawgit.com/matthieua/WOW/1.0.1/dist/wow.min.js'></script>
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/css/main.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
	<link href="{{ asset('public/frontend/css/sweetalert.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       


    <link rel="shortcut icon" href="public/frontend/images/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="public/frontend/images/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="public/frontend/images/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="public/frontend/images/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="public/frontend/images/apple-touch-icon-57-precomposed.png">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> info@domain.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{ URL::to('/') }}"><img src="{{ asset('public/frontend/images/yourpet.png')}}"  style="width: 90%;"  alt="" /></a>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a data-wow-delay="0.2s" class="wow bounceInRight"  id="navmid" href="#"><i class="fa fa-user"></i> Account</a></li>
								<li><a data-wow-delay="0.4s" class="wow bounceInRight" id="navmid" href="#"><i class="fa fa-star"></i> Wishlist</a></li>
								<li><a data-wow-delay="0.6s" class="wow bounceInRight" id="navmid" href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a data-wow-delay="0.8s" class="wow bounceInRight" id="navmid" href="{{ URL::to('/show_cart_product') }}"><i class="fa fa-shopping-cart"></i> Cart</a></li>
								<li><a data-wow-delay="1s" class="wow bounceInRight" id="navmid" href="login.html"><i class="fa fa-lock"></i> Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row" >
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a  href="{{ URL:: to ('/trangchu') }}" class="active wow bounceInLeft">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										<li><a href="checkout.html">Checkout</a></li> 
										<li><a href="cart.html">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
										<li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li> 
								<li><a href="404.html">404</a></li>
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Search"/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	
	<section id="slider"><!--slider-->
		<div class="container" >
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							@foreach ( $slider as $key=>$sli_v )
								
							
							<div class="item active">
								<div class="col-sm-6" >
									<div id="containerWater">
									<h1><span  id="title" class="title1" style="font-size: 120px;margin-left: -30px;font-weight: bolder">YourPets</span></h1>
									<h1><span id="title" class="title2" style="font-size: 120px;margin-left: -30px;font-weight: bolder">YourPets</span></h1>
									</div>
									<div class="titlebanner">
									<h2>100% Sản phẩm nhập khẩu</h2>
									<p>Đồ ăn cho cún con </p>
								</div>
									<?php
										$slide_id='7';
										?>
									<button type="button" class="btn btn-default get"><a style="color: black;font-weight: bolder" href="{{ URL::to('/danhmucsanpham/7') }}">Tìm hiểu ngay</a></button>
								</div>
								<div class="col-sm-6">
									
									<img src="{{asset ('public/uploads/slider/'.$sli_v->slider_image) }}" height="520px" width="520px" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							@endforeach
							
							@foreach ( $slider1 as $key=>$sli_v )
							
							<div class="item ">
								<div class="col-sm-6">
									<div id="containerWater">
										<h1><span id="title" class="title1" style="font-size: 120px;margin-left: -30px;font-weight: bolder">YourPets</span></h1>
										<h1><span id="title" class="title2" style="font-size: 120px;margin-left: -30px;font-weight: bolder">YourPets</span></h1>
									</div>
									<div class="titlebanner">
									<h2>100% Sản phẩm nhập khẩu</h2>
									<p>Đồ ăn cho cún con </p>
								</div>
									<?php
										$slide_id='7';
										?>
									<button type="button" class="btn btn-default get"><a href="{{ URL::to('/danhmucsanpham/7') }}">Tìm hiểu ngay</a></button>
								</div>
								<div class="col-sm-6">
				
									<img src="{{asset ('public/uploads/slider/'.$sli_v->slider_image) }}" height="520px" width="520px" class="girl img-responsive" alt="" />
									
								</div>
							</div>
							@endforeach
							
							
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
	<section>
		<div class="container" style="margin-top:50px">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2 class="wow bounceInLeft">Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
					@foreach ($category as$key=>$cate )
              
							
						
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
									
										<a id="danhmuc" style="text-transform: none" href="{{ URL::to('/danhmucsanpham/'.$cate->category_id) }}">	{{ $cate->category_name }}</a>
									
									</h4>
								</div>
							
							</div>
						
							
						@endforeach
						
					
						</div><!--/category-products-->
				
						<div class="brands_products"><!--brands_products-->
							<h2  class="wow bounceInLeft">Brands</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									@foreach ($brand as$key=>$brand )
									<li id="#danhmuc" > <a   style="text-transform: none" href="{{ URL::to('/thuonghieusanpham/'.$brand->brand_id) }}"> {{ $brand->brand_name }}</a></li>
									@endforeach
								</ul>
							</div>
						</div><!--/brands_products-->
						
					
						<div class="shipping text-center"><!--shipping-->
							<img  class="wow bounceInLeft" src="{{ asset('public/frontend/images/logo (2).png')}}" alt="" />
						</div><!--/shipping-->
					
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					@yield('content')
				</div>
				
			</div>
		</div>
	</section>
	
	<footer id="footer"><!--Footer-->
		
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>DỊCH VỤ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Trợ giúp trực tuyến</a></li>
								<li><a href="#">
									Liên hệ chúng tôi</a></li>
								<li><a href="#">Tình trạng đặt hàng</a></li>
								<li><a href="#">Thay đổi địa điểm</a></li>
								<li><a href="#">Câu hỏi thường gặp</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Quock Shop</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Đồ ăn cho chó con</a></li>
								<li><a href="#">Đồ ăn cho chó trưởng thành</a></li>
								<li><a href="#">Đồ ăn cho mèo cons</a></li>
								<li><a href="#">Đồ ăn cho mèo trường thành</a></li>
							
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>CHÍNH SÁCH</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Điều khoản sử dụng</a></li>
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Chính sách hoàn lại tiền</a></li>
								<li><a href="#">Hệ thống thanh toán</a></li>
								<li><a href="#">Hệ thống vé</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Giới thiệu về Shopper</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Thông tin công ty</a></li>
								<li><a href="#">Nghề nghiệp</a></li>
								<li><a href="#">
									Vị trí cửa hàng</a></li>
								<li><a href="#">
									Chương trình liên kết</a></li>
								<li><a href="#">Bản quyền</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1" style="position: relative">
						<div class="single-widget">
							<h2>Giới thiệu về Shopper</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Nhận các bản cập nhật gần đây nhất từ <br />
									trang web của chúng tôi và được cập nhật bản thân của bạn ...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">
						Bản quyền © 2013 YOURPET Inc. Mọi quyền được bảo lưu.</p>
					<p class="pull-right">
						Thiết kế bởi <span><a target="_blank" href="http://www.themeum.com">Tu & Phuoc</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
	<script src="{{ asset('public/frontend/js/bootstrap.min.js') }}" ></script>
	<script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}" ></script>
	<script src="{{ asset('public/frontend/js/price-range.js') }}" ></script>
    <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}" ></script>
    <script src="{{ asset('public/frontend/js/main.js') }}" ></script>
	<script src="{{ asset('public/frontend/js/sweetalert.js') }}" ></script>
	<script src="{{ asset('public/frontend/js/script.js') }}" ></script>
	<script> new WOW().init(); </script>
</body>
</html>






