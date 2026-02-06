@extends('frontend.app')
@section('content')

            <!-- Breadcrumb -->
            <div class="breadcrumb" style="padding: 40px 0px;">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Rent Details</h2>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('front.home') }}">Home </a></li>
                                <li>Rent Details</li>
                            </ul>
                        </div>
                    </div>
                    <div class="breadcrumb-border-img">
                        <img src="assets/img/bg/line-bg.png" alt="Line Image">
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->

            <!-- Detail View Section -->
            <section class="buy-detailview">
                <div class="container">

					<!-- Details -->
                    <div class="row align-items-center page-head">
                        <div class="col-lg-8">
                            <!--<div class="buy-btn">-->
                            <!--    <span class="buy">Buy</span>-->
                            <!--    <span class="appartment">Appartment</span>-->
                            <!--</div>-->
                            <div class="page-title">
                                <h3>{{ $item->title }}<span><img src="{{asset('public/frontend/assets/img/icons/location-icon.svg')}}" alt="Image"></span></h3>
                                <p><i class="feather-map-pin"></i> {{ $item->landmark }}, {{ $item->area->area_name }}, {{ $item->city->city }}</p>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="latest-update">
                                <!--<h5>Property Created On : {{ $item->created_at->format('d M Y') }}</h5>-->
                                <p>{{ $item->price }} Tk</p>
                                <!--<ul class="other-pages">-->
                                <!--    <li><a href="javascript:void(0);"><i class="feather-share-2"></i>Share</a></li>-->
                                <!--    <li><a href="compare.html"><i class="feather-git-pull-request"></i>Add to Compare</a></li>-->
                                <!--    <li><a href="javascript:void(0);"><i class="feather-heart"></i>Wishlist</a></li>-->
                                <!--</ul>-->
                            </div>
                        </div>
                    </div>
					<!-- /Details -->

                    <div class="row">
                        <div class="col-lg-8">

							<!-- Slider -->
                            <div class="buy-details-col">
								<div class="rental-card" style="padding-top: 0px;">
								<div class="slider rental-slider">

									@foreach($item->property_image as $pro_img)
										<div class="product-img">
											<img src="{{asset('public/backend/property_image/'.$pro_img['image'])}}" alt="Slider">
										</div>
									@endforeach									
									
									</div>
									<div class="slider slider-nav-thumbnails">
										@foreach($item->property_image as $pro_img)
											<div>
												<img src="{{asset('public/backend/property_image/'.$pro_img['image'])}}" alt="product image">
											</div>	
										@endforeach									
									</div>
								</div>
							</div>
							<!-- /Slider -->

							<!-- Overview -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="" aria-expanded="true">Overview</a>
								</h4>
								<div id="overview" class="card-collapse collapse show">
									<ul class="property-overview  collapse-view">
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="Image">
											<p>{{ $item->bed }} Beds</p>
										</li>
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="Image">
											<p>{{ $item->bath }} Baths</p>
										</li>
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="Image">
											<p>{{ $item->floor_area }} Sqft</p>
										</li>
										<!--<li>-->
										<!--	<img src="{{asset('public/frontend/assets/img/icons/garage-icon.svg')}}" alt="Image">-->
										<!--	<p>2 Garages</p>-->
										<!--</li>-->
										<!--<li>-->
										<!--	<img src="{{asset('public/frontend/assets/img/icons/calender-icon.svg')}}" alt="Image">-->
										<!--	<p>Year Built: 2005</p>-->
										<!--</li>-->
									</ul>
								</div>
							</div>
							<!-- /Overview -->
							
							<!-- Property Details -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="" aria-expanded="false">Property Details</a>
								</h4>
								<div id="details" class="card-collapse collapse show  collapse-view">
									<div class="row">
										<div class="col-md-4">
											<ul class="property-details">
												<li>Property Id : <span> {{ $item->id }}</span></li>
												<li>Price : <span>  {{ $item->price }} Tk</span></li> 
											</ul>
										</div>
										<div class="col-md-4">
											<ul class="property-details">
												<li>Bedrooms : <span> {{ $item->bed }}</span></li> 
												<li>Bathrooms : <span> {{ $item->bath }}</span></li>
											</ul>
										</div>
										<div class="col-md-4">
											<ul class="property-details">
    											<li>Type : <span>  {{ $item->type->name }} </span></li> 
    											<li>Category : <span> {{ $item->sub_type->name }}</span></li>												 
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- /Property Details -->

							<!-- Overview -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="" aria-expanded="false">Description</a>
								</h4>
								<div id="about" class="card-collapse collapse show">
									<div class="about-agent collapse-view">
									<p>{!! $item->description !!}</p>
									</div>
								</div>
							</div>
							<!-- /Overview -->
							
							<!-- Property Address -->
							<!--<div class="collapse-card">-->
							<!--	<h4 class="card-title">-->
							<!--		<a class="collapsed" data-bs-toggle="collapse" href="" aria-expanded="false">Property Address</a>-->
							<!--	</h4>-->
							<!--	<div id="address" class="card-collapse collapse show  collapse-view">-->
							<!--		<ul class="property-address">-->
							<!--			<li>Location : <span> {{ $item->location }}</span></li>-->
							<!--			<li>City : <span> {{ $item->city->city }} </span></li> -->
							<!--			<li>Area : <span> {{ $item->area->area_name }}</span></li>-->
							<!--			<li>Address : <span> {{ $item->landmark }}</span></li> -->
						
							<!--		</ul>-->
							<!--	</div>-->
							<!--</div>-->
							<!-- /Property Address -->

							

							<!-- Amenities -->
							<div class="collapse-card">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="" aria-expanded="false">Amenities</a>
								</h4>
								<div id="amenities" class="card-collapse collapse show  collapse-view">
									<div class="row">
										@foreach($item->amenities as $amn)
										<div class="col-md-4">
											<ul class="amenities-list">
												<li><img src="{{asset('public/frontend/assets/img/icons/amenities-icon-1.svg')}}" alt="Image">{{ $amn->name }}</li>
												
											</ul>
										</div>
										@endforeach				
									</div>
								</div>
							</div>
							<!-- /Amenities -->

							<!-- Video -->
							<!--<div class="collapse-card">-->
							<!--	<h4 class="card-title">-->
							<!--		<a class="collapsed" data-bs-toggle="collapse" href="#video" aria-expanded="false">Video</a>-->
							<!--	</h4>-->
							<!--	<div id="video" class="card-collapse collapse show  collapse-view">-->
							<!--		<div class="sample-video">-->
							<!--			<img src="{{ asset('public/frontend/assets/img/video-img.jpg')}}" alt="Image">-->
							<!--			<a class="play-icon"  data-fancybox="" href="{{ asset('public/backend/property/'.$item->video_url) }}"><i class="bx bx-play"></i></a>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
							<!-- /Video -->
							
							
							@php
                                // Assume $property is passed to the blade with relations city, area
                                $fullAddress = '';
                                if (!empty($item->city->city)) {
                                    $fullAddress .= $item->city->city;
                                }
                                if (!empty($item->area->area_name)) {
                                    $fullAddress .= ', ' . $item->area->area_name;
                                }
                                if (!empty($item->address)) {
                                    $fullAddress .= ', ' . $item->address;
                                }
                            
                                $encodedAddress = urlencode($fullAddress);
                                $apiKey = 'AIzaSyDqzGcjUF26pJWvWma1kCdNj5hYGYrkuDw'; // better store API key in .env
                            @endphp
                            
                            <div class="map" id="map_div">
                                <iframe
                                    style="width: 100%; height: 300px;"
                                    id="mapFrame"
                                    loading="lazy"
                                    allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="https://www.google.com/maps/embed/v1/place?key={{ $apiKey }}&q={{ $encodedAddress }}">
                                </iframe>
                            </div>

							<!-- Map -->
							<!--<div class="collapse-card">-->
							<!--	<h4 class="card-title">-->
							<!--		<a class="collapsed" data-bs-toggle="collapse" href="#map" aria-expanded="false">Map</a>-->
							<!--	</h4>-->
							<!--	<div id="map" class="card-collapse collapse show  collapse-view">-->
							<!--		<div class="map">-->
							<!--			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6509170.989457427!2d-12380081967108484!3d37.192957227641294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f131!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C%20USA!5e0!3m2!1sen!2sin!4v166911581381!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="contact-map"></iframe>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
							<!-- /Map -->

							<!-- Reviews -->
							<div class="collapse-card sidebar-card" style="display: none;">
								<h4 class="card-title">
									<a class="collapsed" data-bs-toggle="collapse" href="#review" aria-expanded="false">Reviews (25)</a>
								</h4>
								<div id="review" class="card-collapse collapse show  collapse-view">
									<div class="review-card">
										<div class="customer-review">
											<div class="customer-info">
												<div class="customer-name">
													<a href="javascript:void(0);"><img src="assets/img/profiles/avatar-01.jpg')}}" alt="User"></a>
													<div>
														<h5><a href="javascript:void(0);">Johnson</a></h5>
														<p>02 Jan 2023</p>
													</div>
												</div>												
												<div class="rating">
													<span class="rating-count">
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star"></i>
													</span>
													<p class="rating-review"><span>4.0</span>(20 Reviews)</p>
												</div>
											</div>
											<div class="review-para">
												<p>It was popularised in the 1960s with the release of Letraset sheets containing LoremIpsum passages, and more recently with desktop publishing software like Aldus PageMakerincluding versions of Lorem Ipsum.It was popularised in the 1960s </p>
											</div>
										</div>
										<div class="customer-review">
											<div class="customer-info">
												<div class="customer-name">
													<a href="javascript:void(0);"><img src="assets/img/profiles/avatar-02.jpg')}}" alt="User"></a>
													<div>
														<h5><a href="javascript:void(0);">Casandra</a></h5>
														<p>01 Jan 2023</p>
													</div>
												</div>
												<div class="rating">
													<span class="rating-count">
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star checked"></i>
														<i class="fa-solid fa-star checked"></i>
													</span>
													<p class="rating-review"><span>5.0</span>(20 Reviews)</p>
												</div>
											</div>
											<div class="review-para">
												<p>It was popularised in the 1960s with the release of Letraset sheets containing LoremIpsum passages, and more recently with desktop publishing software like Aldus PageMakerincluding versions of Lorem Ipsum.It was popularised in the 1960s with the elease ofLetraset sheets containing Lorem Ipsum passages, and more recently with desktop publishingsoftware like Aldus Page Maker including versions.</p>
											</div>
										</div>
										<div class="property-review">
											<h5 class="card-title">Property Reviews</h5>
											<form action="#">
												<div class="row">
													<div class="col-md-6">
														<div class="review-form">
															<input type="text" class="form-control" placeholder="Your Name">
														</div>
													</div>
													<div class="col-md-6">
														<div class="review-form">
															<input type="email" class="form-control" placeholder="Your Email">
														</div>
													</div>
													<div class="col-md-12">
														<div class="review-form">
															<textarea rows="5" placeholder="Enter Your Comments"></textarea>
														</div>
													</div>
													<div class="col-md-12">
														<div class="review-form submit-btn">
															<button type="submit" class="btn-primary">Submit Review</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /Reviews -->

						</div>

						<!-- Sidebar -->
						<div class="col-lg-4 theiaStickySidebar">
							<div class="right-sidebar">
								
								<!-- Enquiry -->
								<div class="sidebar-card">
									<div class="sidebar-card-title">
										<h5>Request Info</h5>
									</div>
									<div class="user-active" style="display: none;">
										<div class="user-img">
											<a href="javascript:void(0);"><img class="avatar" src="assets/img/profiles/avatar-03.jpg')}}" alt="Image"></a>
											<span class="avatar-online"></span>
										</div>
										<div class="user-name">
											<h4><a href="javascript:void(0);">John Collins</a></h4>
											<p> Company Agent</p>
										</div>
									</div>
									<form action="#">
										<div class="review-form">
											<input type="text" class="form-control" placeholder="Your Name">
										</div>
										<div class="review-form">
											<input type="email" class="form-control" placeholder="Your Email">
										</div>
										<div class="review-form">
											<textarea rows="5" placeholder="Your Message"></textarea>
										</div>
										<div class="review-form submit-btn">
											<button type="submit" class="btn-primary">Send Email</button>
											<!--<a href="rental-order.html" class="btn btn-primary prop-book"><i class="bx bx-calendar"></i>Book Property</a>-->
										</div>
									</form>
									<ul class="connect-us">
										<li>
											@if($existance == '')
												<a href="tel: {{ $item->phone }}"><i class="feather-phone"></i>{{ $item->phone }}</a>
											@else
												<a id="interest" data-id="{{ $item->id }}" data-userid="{{ Auth::user()->id }}"
												href="javascript:void(0);"><i class="feather-phone"></i>Call to Inquire</a>
											@endif
										</li>
										<li><a href="https://wa.me/+8801674319438"><i class="fa-brands fa-whatsapp"></i>Whatsapp</a></li>
									</ul>
								</div>
								<!-- /Enquiry -->

								<!-- Listing Owner Details -->
								<div class="sidebar-card" style="display: none;">
									<div class="sidebar-card-title">
										<h5>Listing Owner Details</h5>
									</div>
									<div class="user-active bg-white p-0">
										<div class="user-img">
											<a href="javascript:void(0);"><img class="avatar" src="assets/img/profiles/avatar-03.jpg')}}" alt="Image"></a>
										</div>
										<div class="user-name">
											<h4><a href="javascript:void(0);">John Collins</a></h4>
											<div class="rating">
                                                <span class="rating-count d-inline-flex">
                                                    <i class="fa-solid fa-star checked"></i>
                                                    <i class="fa-solid fa-star checked"></i>
                                                    <i class="fa-solid fa-star checked"></i>
                                                    <i class="fa-solid fa-star checked"></i>
                                                    <i class="fa-solid fa-star checked"></i>
                                                </span>
                                                <span class="rating-review">5.0 (20 Reviews)</span>
                                            </div>
										</div>
									</div>
									<ul class="list-details">
										<li>No of Listings <span>05</span></li>
										<li>No of Bookings<span>225</span></li>
										<li>Memeber on<span>15 Jan 2023</span></li>
										<li>Verification<span>Verified</span></li>
									</ul>
								</div>
								<!-- /Listing Owner Details -->

								<!-- Share Property -->
								<div class="sidebar-card" style="display: none;">
									<div class="sidebar-card-title">
										<h5>Share Property</h5>
									</div>
									<div class="social-links">
										<ul class="sidebar-social-links">
											<li><a href="javascript:void(0);" class="fb-icon"><i class="fa-brands fa-facebook-f hi-icon"></i></a></li>
											<li><a href="javascript:void(0);" class="ins-icon"><i class="fa-brands fa-instagram hi-icon"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa-brands fa-behance hi-icon"></i></a></li>
											<li><a href="javascript:void(0);" class="twitter-icon"><i class="fa-brands fa-twitter hi-icon"></i></a></li>
											<li><a href="javascript:void(0);" class="ins-icon"><i class="fa-brands fa-pinterest-p hi-icon"></i></a></li>
											<li><a href="javascript:void(0);"><i class="fa-brands fa-linkedin hi-icon"></i></a></li>
										</ul>
									</div>
								</div>
								<!-- /Share Property -->
								
							</div>
						</div>
						<!-- /Sidebar -->

                    </div>

					<!-- Similar Listings -->
					<div class="similar-list">
						<div class="section-heading">
							<h2>Similar Listings</h2>
							<div class="sec-line">
								<span class="sec-line1"></span>
								<span class="sec-line2"></span>
							</div>
							<p>Choose Your Best Property</p>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="feature-property-sec for-rent p-0">
									<div class="rentfeature-slider owl-carousel">
									    @foreach($similiar_items as $property)
										    	<div class="product-custom"  data-aos="fade-down" data-aos-duration="2000">
									<div class="profile-widget">
										<div class="doc-img">
											<a href="{{ route('front.rent_details',[$property->id]) }}" class="property-img">
												<img class="img-fluid" alt="Property Image" src="{{asset('public/backend/property/'.$property->thumb_img)}}">
											</a>
											<div class="product-amount">
												<h5><span>{{ $property->price }} Tk </span></h5>
											</div>
											<!--<div class="featured">-->
											<!--	<span>Featured</span>-->
											<!--</div>-->
											<!--<div class="new-featured">-->
											<!--	<span>New</span>-->
											<!--</div>	-->
											
											@guest													
											<a href="javascript:void(0);">
												<div class="favourite selected">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>											
											@else 
												<a data-property-id="{{ $property->id }}" data-user-id="{{ Auth::user()->id }}" data-url="{{ route('front.property.store') }}" href="javascript:void(0);" class="property_form">
													<div class="favourite selected">
														<span><i class="fa-regular fa-heart"></i></span>
													</div>
												</a>
											@endguest

										</div>
										<div class="pro-content">
											<div class="rating">
												<span class="rating-count">
													<i class="fa-solid fa-star checked"></i>
													<i class="fa-solid fa-star checked"></i>
													<i class="fa-solid fa-star checked"></i>
													<i class="fa-solid fa-star checked"></i>
													<i class="fa-solid fa-star checked"></i>
												</span>
												<span class="rating-review">Excellent</span>
											</div>
											<h3 class="title">
												<a href="{{ route('front.rent_details',[$property->id]) }}">{{ $property->title }}</a> 
											</h3>
											<p><i class="feather-map-pin"></i> {{ $property->landmark }}</p>
											<ul class="d-flex details">
												<li>
													<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
													{{ $property->bed }} Beds
												</li>
												<li>
													<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
													{{ $property->bath }} Baths
												</li>
												<li>
													<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
													{{ $property->floor_area }} Sqft
												</li>
											</ul>
											<ul class="property-category d-flex justify-content-between align-items-center">
												<!--<li class="user-info">-->
												<!--	<a href="#"><img src="{{asset('public/frontend/assets/img/profiles/avatar-01.jpg')}}" class="img-fluid avatar" alt="User"></a>-->
												<!--	<div class="user-name">-->
												<!--		<h6><a href="#">Marc Silva</a></h6>-->
												<!--		<p>Newyork</p>-->
												<!--	</div>													-->
												<!--</li>-->
												<li style="margin: 0 auto;">
													<a href="{{ route('front.rent_details',[$property->id]) }}" class="btn-primary">View Details</a>
												</li>
											</ul>
										</div>
									</div>		
								</div>			
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Similar Listings -->

                </div>
            </section>
			<!-- /Detail View Section -->
			<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript">

$('.property_form').on('click', function (e) {

				e.preventDefault();						
				var user_id = $(this).data('user-id');
				var property_id = $(this).data('property-id');		
				var addToPropertyUrl = $(this).data('url');		
				var csrfToken = $('meta[name="csrf-token"]').attr('content');		
				
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': csrfToken
					}
				});
			
				$.post(addToPropertyUrl, { property_id: property_id, user_id: user_id }, function (response) {
					toastr.success(response.msg);
					if(response.status)
					{
						toastr.success(response.msg);								
					} else
					{
						
					}
					
				});
			});

	$('#interest').on('click', function () {
		let property_id = $(this).data('id');
		let user_id = $(this).data('userid');
		
		$.ajax({
			url: "{{ route('front.interest') }}",
			method: "GET",
			data: {property_id, user_id},
			success: function(res){
				if(res.status){
					// toastr.success(res.msg);
					$('a#interest').html(res.phone);
				}
			}
		});	
	});
</script>
@endsection

			