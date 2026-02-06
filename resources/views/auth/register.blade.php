<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from dreamsestate.dreamstechnologies.com/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 06:38:18 GMT -->
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<title>DreamsEstate</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('public/frontend/assets/img/favicon.png')}}">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.min.css')}}">

		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('public/frontend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{ asset('public/frontend/assets/plugins/fontawesome/css/all.min.css')}}">
		
		<!-- Fearther CSS -->
		<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/feather.css')}}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css')}}">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	</head>
	<body>

		<!-- Loader -->
		<div class="page-loader">
			<div class="page-loader-inner">
				<img src="{{ asset('public/frontend/assets/img/icons/loader.svg')}}" alt="Loader">
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
			</div>
		</div>
		<!-- /Loader -->
	
		<!-- Main Wrapper -->
		<div class="main-wrapper login-body">
			<div class="container">
				<!-- Header -->
				<header class="log-header">
					<a href="{{ route('front.home') }}">
					    <img class="img-fluid logo-dark" src="{{ asset('public/frontend/assets/img/logo.svg')}}" alt="Logo">
					</a>
				</header>
				<!-- /Header -->

				<div class="login-wrapper">
					<div class="loginbox">						
						<div class="login-auth">
							<div class="login-auth-wrap">						
								<h1>Signup! <span class="d-block"> New Account.</span></h1>							
								<form method="POST" action="{{ route('front.register_user') }}" id="user_signup">
								    @csrf
									<div class="form-group">
										<label class="form-label">Name <span>*</span></label>
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autocomplete="name" autofocus>
									    @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									
									<div class="form-group">
										<label class="form-label">Type <span>*</span></label>
									
									    <select name="user_type" class="form-control">
									        <option>Select One</option>
									        <option value="seller">Seller</option>
									        <option value="rent">Rent</option>
									        <option value="buyer">Buyer</option>
									    </select>
										<!--<input id="user_type" type="text" class="form-control @error('user_type') is-invalid @enderror" name="user_type" value="{{ old('user_type') }}" placeholder="Enter Name" required autocomplete="user_type" autofocus>-->
									    <!--@error('name')-->
             <!--                               <span class="invalid-feedback" role="alert">-->
             <!--                                   <strong>{{ $message }}</strong>-->
             <!--                               </span>-->
                                        <!--@enderror-->
									</div>
									
									<div class="form-group">
										<label class="form-label">Email <span>*</span></label>
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									
									<div class="form-group">
										<label class="form-label">Phone <span>*</span></label>
										<input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
									</div>
									
									<div class="form-group">
										<label class="form-label">Password <span>*</span></label>
										<div class="pass-group">
											<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter Password" name="password" required autocomplete="new-password">
                                            <span class="fas fa-eye toggle-password" id="togglePassword"></span>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
											
										</div>
									</div>		
									<div class="form-group">
										<label class="form-label">Confirm Password <span>*</span></label>
										<div class="pass-group">
											<input id="password-confirm" type="password" class="form-control" name="confirm_password" placeholder="Enter Confirm Password" required autocomplete="new-password">
										<span class="fas fa-eye toggle-password" id="togglePasswords"></span>
										</div>
									</div>	
									
									<button type="submit" class="btn btn-outline-light w-100 btn-size">
                                        Sign Up
                                    </button>
									
									<div class="text-center dont-have">Already have login ? <a href="{{ route('front.user_login') }}">Sign In</a></div>
								</form>							
							</div>
						</div>
					</div>
				</div>	
			</div>		
		</div>
		
		<!-- /Main Wrapper -->
		
	<!-- jQuery -->
	<script src="{{ asset('public/frontend/assets/js/jquery-3.7.1.min.js')}}" type="9518e6a170e2d1b76ae6b972-text/javascript"></script>
		
	<!-- Bootstrap Core JS -->
	<script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}" type="9518e6a170e2d1b76ae6b972-text/javascript"></script>
		
	<!-- Custom JS -->
	<script src="{{ asset('public/frontend/assets/js/script.js')}}" type="9518e6a170e2d1b76ae6b972-text/javascript"></script>

	<script src="{{ asset('public/frontend/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="9518e6a170e2d1b76ae6b972-|49" defer></script>
	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"91b79ae2387f3366","version":"2025.1.0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            $('#togglePassword').click(function() {
                var passwordField = $('#password');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
            $('#togglePasswords').click(function() {
                var passwordField = $('#password-confirm');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
        });
        
            
        $(document).on('submit','form#user_signup', function(e) {    
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
                    if(res.success==true){
					    swal({
                          title: "You have been successfully registered",
                          text: "To continue , please login",
                          type: "warning",
                          showCancelButton: true,
                          confirmButtonColor: "#006400",
                          confirmButtonText: "Yes, do it!",
                          cancelButtonText: "No, cancel plz!",
                          closeOnConfirm: false,
                          closeOnCancel: false
                        },
                        function(isConfirm){
                          if (isConfirm) {
                              window.location.href=res.url;
                          } else {
                            swal("Cancelled", "Your imaginary file is safe :)", "error");
                          }
                        });
                    }else if(res.status==false){
                        toastr.error(res.msg);
                    }                            
                }
            });
        });
        
    </script>

</body>

<!-- Mirrored from dreamsestate.dreamstechnologies.com/html/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 06:38:18 GMT -->
</html>