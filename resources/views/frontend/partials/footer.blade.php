@php
	Use App\Models\Faq;
	Use App\Models\City;
	Use App\Models\Social;
	Use App\Models\Page;
	Use App\Models\PropertySubCategory;

	$sub_types = PropertySubCategory::all();
	$faq_items = Faq::where('status', 1)->get();
	$cities = City::all();
	$social_items = Social::where('status', 1)->orderBy('id', 'asc')->get();
	$page_items = Page::latest()->limit(5)->get();
@endphp
<footer class="footer">
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="footer-border-img">
						<img src="{{asset('public/frontend/assets/img/bg/line-bg.png')}}" alt="image">
					</div>
					<div class="container">
						<div class="row">
							<div class="col-lg-4 col-md-6 col-sm-8">
								<div class="footer-widget footer-about">
									<div class="footer-app-content">
										<!-- <div class="footer-content-heading">
											<h4>Get Our App </h4> 
											<p>Download the app and book your property</p>
										</div> -->
										<!-- <div class="download-app">
											<a href="javascript:void(0);"><img src="{{asset('public/frontend/assets/img/google-pay.png')}}" alt="google play"></a>
											<a href="javascript:void(0);"><img src="{{asset('public/frontend/assets/img/app-store.png')}}" alt="app store"></a>
										</div> -->
										<div class="social-links">
											<h4>Connect with us</h4>
											<ul>
												@foreach($social_items as $s_item)
													<li>
														<a href="{{ $s_item->link }}" target="_blank"><i class="{{ $s_item->icon }}"></i></a>
													</li>
												@endforeach												
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4">
								<div class="footer-widget-list">
									<div class="footer-content-heading">
										<h4>Explore</h4>
									</div>
									<ul>
										<li><a href="{{ route('front.all_property') }}">All Property</a></li>
										<li><a href="{{ route('register') }}">Sign Up</a></li>
										<li><a href="{{ route('front.user_login') }}">Sign In</a></li>
										<li><a href="{{ route('front.blog_list') }}">Blogs</a></li>
										<li><a href="{{ route('front.agent') }}">Agency</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-3 col-sm-4">
								<div class="footer-widget-list">
									<div class="footer-content-heading">
										<h4>Categories</h4>
									</div>
									<ul>
										@foreach($sub_types as $key => $s_type)
											@if($key <=4)
												<li><a href="javascript:void(0);">{{ $s_type->name }}</a></li>
											@endif
										@endforeach
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4">
								<div class="footer-widget-list">
									<div class="footer-content-heading">
										<h4>Top Cities</h4>
									</div>
									<ul>									
										@foreach($cities as $key => $ct)
											@if($key <=4)
												<li><a href="{{ route('front.city_by_property',[$ct->id]) }}">{{ $ct->city }}</a></li>
											@endif
										@endforeach										
									</ul>
								</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4">
								<div class="footer-widget-list">
									<div class="footer-content-heading">
										<h4>Quick Links</h4>
									</div>
									<ul>
										@foreach($page_items as $p_item)
											<li><a href="{{ route('front.page-details',[$p_item->slug]) }}">{{ $p_item->title }}</a></li>
										@endforeach										
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /Footer Top -->

				<!-- Footer Bottom -->
				<div class="footer-bottom">
					<div class="container">
						<div class="footer-bottom-content">
							<div class="copyright text-center">
								<p>Copyright  2024 - All right reserved {{ getInfo('name') }}</p>
							</div>
							<!-- <div class="company-logo">
								<p>a product of</p>
								<a href="https://dreamguystech.com/" target="_blank"><img src="{{asset('public/frontend/assets/img/company-logo.png')}}" alt="Logo"></a>
							</div> -->
						</div>						
					</div>
				</div>
				<!-- /Footer Bottom -->

			</footer>