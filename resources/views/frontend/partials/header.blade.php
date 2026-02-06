
<style>
	@media (min-width: 992px) {
		.header .second .main-nav li > ul {
			right: 30%; 
		}
	}
	.custom-dropdown {
        width: 60px;  /* set the width you want */
        min-width: 60px; /* ensure Bootstrap’s default min-width doesn’t override */
        left: -8px !important;
        text-align: center;
    }
    .sign-btns {
        width: 50px !important;      /* desired width */
        min-width: 25px !important;  /* override Bootstrap default min-width */
        padding: 7px 10px !important;       /* remove extra space inside */
        display: flex;               /* center the image */
        align-items: center;         
        justify-content: center;
    }

</style>


<header class="header header-fix">
				<!--<div class="header-top">-->
				<!--	<div class="template-ad">-->
				<!--		<img src="{{asset('public/frontend/assets/img/icons/badge-icon.svg')}}" alt="icon">-->
				<!--		<h5>No 1, Realestate Website to Buy / Sell Your Place <span>First Listing Free!!!</span></h5>-->
				<!--	</div>-->
				<!--</div>-->
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="{{ route('front.home') }}" class="navbar-brand logo">
							<img style="height: 40px;" src="{{ getImage('settings',getInfo('logo'))}}" class="img-fluid" alt="Logo">
						</a>
					</div>
					<div class="main-menu-wrapper">
						<div class="menu-header">
							<a href="{{ route('front.home') }}" class="menu-logo">
								<img src="{{asset('public/frontend/assets/img/logo.svg')}}" class="img-fluid" alt="Logo">
							</a>
				
							<a id="menu_close" class="menu-close" href="javascript:void(0);">
								<i class="fas fa-times"></i>
							</a>
						</div>
						<ul class="main-nav">
							<li class="active">
								<a href="{{ route('front.home') }}">Home</a>
							</li>
							<!-- <li class="has-submenu">
								<a href="javascript:void(0);">Listing <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li class="has-submenu">
										<a href="javascript:void(0);">Buy Property</a>
										<ul class="submenu">
											<li><a href="buy-property-grid.html">Buy  Grid</a></li>
											<li><a href="buy-property-list.html">Buy  List</a></li>
											<li><a href="buy-property-grid-sidebar.html">Buy Grid With Sidebar</a></li>
											<li><a href="buy-property-list-sidebar.html">Buy List With Sidebar</a></li>
                                            <li><a href="buy-grid-map.html">Buy Grid with map</a></li>
                                            <li><a href="buy-list-map.html">Buy List with map</a></li>
                                            <li><a href="buy-details.html">Buy Details</a></li>
										</ul>
									</li>
									<li class="has-submenu">
										<a href="javascript:void(0);">Rent Property</a>
										<ul class="submenu">
											<li><a href="rent-property-grid.html">Rent  Grid</a></li>
											<li><a href="rent-property-list.html">Rent  List</a></li>
											<li><a href="rent-property-grid-sidebar.html">Rent Grid With Sidebar</a></li>
											<li><a href="rent-property-list-sidebar.html">Rent List With Sidebar</a></li>
                                            <li><a href="rent-grid-map.html">Rent Grid with map</a></li>
                                            <li><a href="rent-list-map.html">Rent List with map</a></li>
                                            <li><a href="rent-details.html">Rent Details</a></li>
										</ul>
									</li>
								</ul>
							</li> -->
							<!-- <li class="has-submenu">
								<a href="javascript:void(0);">Agent <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="agent-grid.html">Agent  Grid</a></li>
                                    <li><a href="agent-list.html">Agent  List</a></li>
                                    <li><a href="agent-grid-sidebar.html">Agent Grid With Sidebar</a></li>
                                    <li><a href="agent-list-sidebar.html">Agent List With Sidebar</a></li>
                                    <li><a href="agent-details.html">Agent Details</a></li>
								</ul>
							</li>
                            <li class="has-submenu">
								<a href="javascript:void(0);">Agency <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="agency-grid.html">Agency  Grid</a></li>
                                    <li><a href="agency-list.html">Agency  List</a></li>
                                    <li><a href="agency-grid-sidebar.html">Agency Grid With Sidebar</a></li>
                                    <li><a href="agency-list-sidebar.html">Agency List With Sidebar</a></li>
                                    <li><a href="agency-details.html">Agency Details</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="javascript:void(0);">Pages <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
								    <li><a href="about-us.html">About Us</a></li>
									<li class="has-submenu">
										<a href="javascript:void(0);">Authentication</a>
										<ul class="submenu">
											<li><a href="{{ route('register') }}">Signup</a></li>
											<li><a href="{{ route('front.user_login') }}">Signin</a></li>
											<li><a href="forgot-password.html">Forgot Password</a></li>
											<li><a href="reset-password.html">Reset Password</a></li>
										</ul>
									</li>
									<li><a href="invoice-details.html">Invoice Details</a></li>
									<li class="has-submenu">
										<a href="javascript:void(0);">Error Page</a>
										<ul class="submenu">
											<li><a href="error-404.html">404 Error</a></li>
											<li><a href="error-500.html">500 Error</a></li>
										</ul>
									</li>
									<li><a href="pricing.html">Pricing</a></li>
									<li><a href="faq.html">FAQ</a></li>
									<li><a href="gallery.html">Gallery</a></li>
									<li><a href="our-team.html">Our Team</a></li>
									<li><a href="testimonial.html">Testimonials</a></li>
									<li><a href="terms-condition.html">Terms & Conditions</a></li>
									<li><a href="privacy-policy.html">Privacy Policy</a></li>									
									<li><a href="maintenance.html">Maintenance</a></li>
									<li><a href="coming-soon.html">Coming Soon</a></li>
								</ul>
							</li>
							<li class="has-submenu">
								<a href="javascript:void(0);">Blog <i class="fas fa-chevron-down"></i></a>
								<ul class="submenu">
									<li><a href="blog-list.html">Blog List</a></li>
									<li><a href="blog-grid.html">Blog Grid</a></li>
									<li><a href="blog-details.html">Blog Details</a></li>	
								</ul>
							</li> -->
							<li><a href="{{ route('front.all_property') }}">Rent</a></li>
							<li><a href="{{ route('front.all_property') }}?pro_type=Sell">Buy</a></li>
							<li><a href="{{ route('front.sell_property') }}">Sell</a></li>
							<li><a href="{{ route('front.contact') }}">Contact Us</a></li>
							<!--<li><a href="{{ route('front.all_property') }}">All Property</a></li>-->
							
							
							<li class="searchbar">
								<a href="javascript:void(0);">
									<img src="{{asset('public/frontend/assets/img/icons/search-icon.svg')}}" alt="img">
								</a>
							</li>
							<!--<li class="login-link"><a href="{{ route('register') }}">Sign Up</a></li>-->
							<li class="login-link"><a href="{{ route('front.user_login') }}">Sign In</a></li>
						</ul>
					</div>
					<ul class="nav header-navbar-rht">
						<li class="new-property-btn">
							@guest
								<a href="{{ route('front.user_login') }}">
									<i class="bx bxs-plus-circle"></i> Add New Property
								</a>
							@else
								<a href="{{ route('front.create_own_property') }}">
									<i class="bx bxs-plus-circle"></i> Add New Property
								</a>
							@endguest
						</li>
						@guest
						<!--<li>-->
						<!--	<a href="{{ route('register') }}" class="btn btn-primary"><i class="feather-user-plus"></i>Sign Up</a>-->
						<!--</li>-->
						@endguest
						
						@guest
						<li>
							<a href="{{ route('front.user_login') }}" class="btn sign-btn"><i class="feather-unlock"></i>Sign In</a>
						</li>
						@else
						<div class="main-menu-wrapper second">
							<ul class="main-nav">
								<li class="has-submenu">
									<a href="javascript:void(0);">{{ Auth::user()->name }} <i class="fas fa-chevron-down"></i></a>
									<ul class="submenu">
										<li style="text-align: center;"><a href="{{ route('front.dashboard') }}">Dashboard</a></li>
										<li style="text-align: center;"><a href="{{ route('front.profile',[Auth::user()->id]) }}">Profile</a></li>
										<li style="text-align: center;"><a href="{{ route('front.user_logout') }}">Logout</a></li>										
									</ul>
								</li>
							</ul>
						</div>						
						@endguest
						
						<li>
						    
						    <div class="dropdown">
  <button id="langBtn" style="width: 35px; padding: 0; border: none;" 
          class="btn btn-light dropdown-toggle sign-btn sign-btns" 
          type="button" data-bs-toggle="dropdown">
      <!-- Default English flag -->
      <img id="selectedLang" src="{{ asset('public/frontend/assets/img/usa.png')}}" width="25">
  </button>

  <ul class="dropdown-menu custom-dropdown">
    <li style="margin-right: 0px;">
      <a class="dropdown-item lang-option" href="#" data-img="{{ asset('public/frontend/assets/img/usa.png') }}" data-lang="english">
        <img src="{{ asset('public/frontend/assets/img/usa.png')}}" width="20">
      </a>
    </li>
    <li>
      <a class="dropdown-item lang-option" href="#" data-img="{{ asset('public/frontend/assets/img/bangladesh.png') }}" data-lang="bangla">
        <img src="{{ asset('public/frontend/assets/img/bangladesh.png')}}" width="20">
      </a>
    </li>
  </ul>
</div>



						    
						    
						    <!--<div class="dropdown">-->
                              <!--<button style="max-width: 65px;padding: 7px 10px;" class="btn btn-light dropdown-toggle sign-btn" type="button" data-bs-toggle="dropdown">-->
                              <!--  <img src="{{ asset('public/frontend/assets/img/language.png')}}" width="25">-->
                              <!--</button>-->
                              
          <!--                    <button style="width: 25px; padding: 0; border: none;" class="btn btn-light dropdown-toggle sign-btn sign-btns" type="button" data-bs-toggle="dropdown">-->
          <!--                          <img src="{{ asset('public/frontend/assets/img/language.png')}}" width="25">-->
          <!--                      </button>-->

                              
          <!--                    <ul class="dropdown-menu custom-dropdown">-->
          <!--                      <li style="margin-right: 0px;"><a class="dropdown-item" href="#"><img src="{{ asset('public/frontend/assets/img/usa.png')}}" width="20"></a></li>-->
          <!--                      <li style="margin-right: 0px;"><a class="dropdown-item" href="#"><img src="{{ asset('public/frontend/assets/img/bangladesh.png')}}" width="20"></a></li>-->
          <!--                    </ul>-->
          <!--                  </div>-->

						    
    <!--						<select-->
    <!--						style="font-size: 14px;-->
    <!--background: #F6F6F9;-->
    <!--border: 1px solid #f4f4f4;-->
    <!--border-radius: 10px;-->
    <!--color: #8A909A;-->
    <!--min-height: 42px;-->
    <!--margin: 0;-->
    <!--padding: 9px 15px;"-->
    <!--						id="language" class="form-control select2">-->
    <!--						    <option>-->
    <!--						        <img src="{{ asset('public/frontend/assets/img/language.png')}}" />-->
    <!--						    </option>-->
    <!--                            <option value="english">English</option>-->
    <!--                            <option value="bangla">Bangla</option>-->
    <!--						</select>-->
						</li>
						
					</ul>
				</nav>
			</header>
			
		<script>
document.querySelectorAll('.lang-option').forEach(item => {
    item.addEventListener('click', function(e) {
        e.preventDefault();

        let imgSrc = this.getAttribute('data-img');
        document.getElementById('selectedLang').src = imgSrc; // update button image
    });
});
</script>
			