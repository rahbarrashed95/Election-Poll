<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from dreamsestate.dreamstechnologies.com/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 06:38:18 GMT -->
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
					<a href=""><img class="img-fluid logo-dark" src="{{ asset('public/frontend/assets/img/logo.svg')}}" alt="Logo"></a>
				</header>
				<!-- /Header -->

				<div class="login-wrapper">
					<div class="loginbox">						
						<div class="login-auth">
							<div class="login-auth-wrap">
								<h1>Hey There!!! Welcome Back.</h1>							
								<form method="POST" action="{{ route('login') }}">
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
									<button class="btn btn-outline-light w-100 btn-size" type="submit">Log in</button>
								
									<div class="text-center dont-have">Don't have an account ? <a href="{{ route('register') }}">Sign Up</a></div>
								</form>							
							</div>
						</div>
					</div>
				</div>	
			</div>		
		</div>
		
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
		<script src="{{ asset('public/frontend/assets/js/jquery-3.7.1.min.js')}}" type="e27ededa4a86a61b87cbf17b-text/javascript"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}" type="e27ededa4a86a61b87cbf17b-text/javascript"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('public/frontend/assets/js/script.js')}}" type="e27ededa4a86a61b87cbf17b-text/javascript"></script>

	<script src="{{ asset('public/frontend/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="e27ededa4a86a61b87cbf17b-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"91b79ae388e44ea6","version":"2025.1.0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                var passwordField = $('#password');
                var type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                passwordField.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });
        });
    </script>


</body>

<!-- Mirrored from dreamsestate.dreamstechnologies.com/html/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 06:38:18 GMT -->
</html>