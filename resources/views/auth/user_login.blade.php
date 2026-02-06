@extends('frontend.app')
@section('content')

<style>
    .pass-group {
    position: relative;
}

.toggle-password {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    cursor: pointer;
}

.login-wrapper {
    height: 700px;
}

</style>

<div class="login-wrapper">
    <div class="loginbox">						
        <div class="login-auth">
            <div class="login-auth-wrap">
                <h1>To add a property you must log in first!</h1>
                <div class="row">
                        <div class="col-md-6">
                            <a href="{{ route('front.google-auth') }}" class="btn btn-outline-light w-100 btn-size">Continue With Google</a>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('front.facebook-auth') }}" class="btn btn-outline-light w-100 btn-size">Continue With Facebook</a>
                        </div>
                    </div>
                    <p style="color: #000;margin-top: 20px;">Or Sign In With Your Credentials</p>
                <form method="POST" action="{{ route('front.login_user') }}" id="login_form">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email <span>*</span></label>										
                        <input type="email" class="form-control border-0 border-bottom rounded-0 @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email" value="{{ old('email')}}">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password <span>*</span></label>
                        <div class="pass-group">
                            <input type="password" class="form-control border-0 border-bottom rounded-0 @error('password') is-invalid @enderror"  name="password" id="password" value="" placeholder="Enter Password" required>
                            <span class="fas fa-eye toggle-password" id="togglePassword"></span>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>	
                    
                    <div class="form-group mb-5">
                        <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                    </div>
                    
                    <!--<a type="submit" class="btn btn-outline-light w-100 btn-size">Sign In</a>-->
                    <button class="btn btn-outline-light w-100 btn-size mb-3" type="submit">Log in</button>
                    
                    <!-- <button class="btn btn-outline-light w-100 btn-size mb-3">Login With Google</button> -->
                
                    <div class="text-center dont-have">Don't have an account ? <a href="{{ route('register') }}">Sign Up</a></div>
                </form>							
            </div>
        </div>
    </div>
</div>	

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

    $(document).ready(function() {
        $('#togglePassword').click(function() {
            var passwordField = $('#password');
            var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
            passwordField.attr('type', type);
            $(this).toggleClass('fa-eye fa-eye-slash');
        });
    });
    
    $(document).on('submit','form#login_form', function(e) {    
        e.preventDefault(); 
        
        var url=$(this).attr('action');
        var method=$(this).attr('method');
        var formData = new FormData($(this)[0]);
       
        $.ajax({
            type: method,
            url: url,
            data: formData,
            async: false,
            processData: false,
            contentType: false,
            success: function(res) {                            
                if(res.status==true){
                    toastr.success(res.msg);
                    window.location.href = res.url;
                }else if(res.status==false){
                    toastr.error(res.msg);
                }                            
            }
        });
    });
</script>

@endsection