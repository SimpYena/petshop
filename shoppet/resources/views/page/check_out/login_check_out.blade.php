@extends('welcome')
@section('content')
<div class="row">
    <div class="col-sm-4 col-sm-offset-1">
        <div class="login-form"><!--login form-->
            <h2>Login to your account</h2>
            <form action="{{ URL::to('check_login_in_checkout') }}" method="POST">
                {{ csrf_field() }}
                <input type="email" name="user_email" placeholder="Name" />
                <input type="password" name="user_password" placeholder="Email Address" />
                <span>
                    <input type="checkbox" class="checkbox"> 
                    Keep me signed in
                </span>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div><!--/login form-->
    </div>
    <div class="col-sm-1">
        <h2 class="or">OR</h2>
    </div>
    <div class="col-sm-4">
        <div class="signup-form"><!--sign up form-->
            <h2>New User Signup!</h2>
            <form action="{{ URL::to('/register') }}" method="POST">
                {{ csrf_field() }}
                <input type="text"  name="name_cus" placeholder="Họ và tên"/>
                <input type="email"  name="email_cus"  placeholder="Email"/>
                <input type="password"  name="pass_cus" placeholder="Password"/>
                <input type="text" name="phone_cus"  placeholder="Phone"/>
                <button type="submit"class="btn btn-default">Signup</button>
            </form>
        </div><!--/sign up form-->
    </div>
</div>

@stop