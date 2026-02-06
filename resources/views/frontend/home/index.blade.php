
@extends('frontend.app')
@section('content')

<style>
    .banner-search .banner-tab-property .banner-property-info .banner-property-grid .select2-container .select2-selection--single {
        height: 60px;
        border-radius: 10px;
        width: 175px;
    }
    @media (min-width: 992px) {
        .col-lg-2 {
            flex: 0 0 auto;
            width: 16%;
        }
    }
    
    .banner-search .banner-tab-property .banner-property-info .banner-property-grid .select2-container .select2-selection--single {
        height: 60px;
        border-radius: 10px;
        width: 175px;
        border: none;
        background: #F6F6F9;
    }
    
    .owl-prev {
        position: absolute;
        top: 40%;
        left: -2%;
    }
    
    .owl-next {
        position: absolute;
        right: -2%;
        top: 40%;
    }
    
</style>

    <!-- Home Banner -->
	<section class="banner-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="banner-content" data-aos="fade-down">
						<h1>Your Property, Your Choice <span>Rent • Buy • Sell</span></h1>
						<p>Search smarter. Live better. Explore thousands of options near you.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="banner-search"  data-aos="fade-down">
						<div class="banner-tab">
							<ul class="nav nav-tabs" id="bannerTab" role="tablist">
								<li class="nav-item" role="presentation">
									<a class="nav-link" id="rent-property" data-bs-toggle="tab" href="#rent_property" role="tab" aria-controls="rent_property" aria-selected="false">
										<img src="{{asset('public/frontend/assets/img/icons/rent-icon.svg')}}" alt="icon"> Rent a Property
									</a>
								</li>
							</ul>
						</div>
						<div class="tab-content" id="bannerTabContent">
							<div class="tab-pane fade show active" id="buy_property" role="tabpanel" aria-labelledby="buy-property">
								<div class="banner-tab-property">
								
										<div class="row banner-property-info">
											<!--<div class="banner-property-grid">-->
											<!--	<input type="text" class="form-control" placeholder="Enter Keyword">-->
											<!--</div>-->
											
											<div class="col-lg-2 banner-property-grid">
												<select id="city_id" class="form-control select2">
												    <option>Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                    @endforeach 
													
												</select>
											</div>
											<div class="col-lg-2 banner-property-grid">
												<select id="area_id" class="form-control select2">
												    
												</select>
											</div>
											<div class="col-lg-2 banner-property-grid">
												<select id="type_id" class="form-control select2">
													<option value="0">Property Type</option>

													@foreach($property_types as $pt)
														<option value="{{ $pt->id }}" >{{ $pt->name }}</option>
													@endforeach
													
												</select>
											</div>
											
											<!--<div class="banner-property-grid">-->
											<!--	<input type="email" class="form-control" placeholder="Enter Address">-->
											<!--</div>-->
											
											<div class="col-lg-2 banner-property-grid">
											    <select id="min_price" class="form-control select2">
													<option value="">Minimum Price</option>
													<option value="5000" >5000</option>
													<option value="5500" >5500</option>
													<option value="6000" >6000</option>
													<option value="6500" >6500</option>
													<option value="7000" >7000</option>
													<option value="7500" >7500</option>
													<option value="8000" >8000</option>
													<option value="8500" >8500</option>
													<option value="9000" >9000</option>
													<option value="9500" >9500</option>
													<option value="10000" >10000</option>
												</select>
											</div>
								<!--			<div class="col-lg-2 banner-property-grid">-->
								<!--			<div class="">-->
									
								<!--	<div id="pricing" class="card-collapse collapse show">-->
        <!--                                <ul class="price-filter">-->
                                            <!--<h5>Price Range : </h5>-->
        <!--                                    <li class="d-flex justify-content-between">-->
        <!--                                        <div class="caption d-flex" style="gap: 20px;">-->
        <!--                                            <input class="form-control" type="text" name="min_price" id="min_price" value="{{ request('min_price') ?? 5000 }}" />-->
        <!--                                            <input class="form-control" type="text" name="max_price" id="max_price" value="{{ request('max_price') ?? 50000 }}" />-->

        <!--                                            <span style="display: none;" id="slider-range-value1"> to</span> -->
        <!--                                            <span style="display: none;" id="slider-range-value2"> </span>-->
        <!--                                        </div>-->
        <!--                                    </li>-->
        <!--                                    <li class="price-filter-inner">-->
        <!--                                        <div id="slider-range" class="range-bottom"></div>-->
        <!--                                    </li>-->
        <!--                                </ul>-->
								<!--	</div>-->
									
								<!--</div>-->
								<!--</div>-->
											
											<div class="col-lg-2 banner-property-grid">
											    <select id="max_price" class="form-control select2">
													<option value="">Maximum Price</option>
													<option value="40000" >40000</option>
													<option value="41000" >41000</option>
													<option value="42000" >42000</option>
													<option value="42000" >42000</option>
													<option value="43000" >43000</option>
													<option value="44000" >44000</option>
													<option value="45000" >45000</option>
													<option value="46000" >46000</option>
													<option value="47000" >47000</option>
													<option value="48000" >48000</option>
													<option value="49000" >49000</option>
													<option value="50000" >50000</option>
												</select>
											</div>
											<div class="col-lg-1 banner-property-grid">
												<a id="searchBtn" href="#" class="btn-primary"><span><i class='feather-search'></i></span></a>
											</div>
										</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Home Banner -->
	
	<!-- Feature Property For Rent -->
	<section class="feature-property-sec for-rent">
		<div class="container">
			<div class="section-heading text-center">
				<h2>Featured Properties for Rent</h2>
				<div class="sec-line">
					<span class="sec-line1"></span>
					<span class="sec-line2"></span>
				</div>
				<p>Hand-picked selection of quality places</p>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="feature-slider owl-carousel">
						@foreach($properties as $property)
							<div class="slider-col">
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
											
											    @if($property->favourite_id != null)
    												<a data-property-id="{{ $property->id }}" data-user-id="{{ Auth::user()->id }}" data-url="{{ route('front.property.store') }}" href="javascript:void(0);" class="property_form">
    													<div class="favourite selected">
    														<span><i class="fa-regular fa-heart"></i></span>
    													</div>
    												</a>
												@else
												    <a data-property-id="{{ $property->id }}" data-user-id="{{ Auth::user()->id }}" data-url="{{ route('front.property.store') }}" href="javascript:void(0);" class="property_form">
    													<div class="favourite">
    														<span><i class="fa-regular fa-heart"></i></span>
    													</div>
    												</a>
												@endif
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
							</div>
						@endforeach												
					</div>
					<div class="view-property-btn d-flex justify-content-center"  data-aos="fade-down" data-aos-duration="2000">
						<a href="{{ route('front.all_property') }}" class="btn-primary">View All Properties</a>
					</div>
				</div>
			</div>
		</div>
		<!--<div class="bg-imgs">-->
		<!--	<img src="{{asset('public/frontend/assets/img/bg/price-bg.png')}}" class="bg-04" alt="Image">-->
		<!--</div>-->
	</section>
	<!-- /Feature Property For Rent -->	

	<!-- How It Work -->
	<section class="howit-work">
		<div class="container">
			<div class="section-heading text-center">
				<h2>How It Works</h2>
				<div class="sec-line">
					<span class="sec-line1"></span>
					<span class="sec-line2"></span>
				</div>
				<p>Follow these 3 steps to book your place</p>
			</div>
			<div class="row justify-content-center">

				@foreach($work_steps as $key => $work_step)

					<div class="col-lg-4 col-md-6">
						<div class="howit-work-card" data-aos="fade-down" data-aos-duration="1200" data-aos-delay="100">
							<div class="work-card-icon">
								@php
									$classes = ['', 'bg-red', 'bg-green'];
								@endphp

								<span class="{{ $classes[$key] ?? '' }}">
									<img src="{{ asset('public/backend/workstep/'.$work_step->icon) }}" alt="icon">
								</span>																
							</div>
							<h4>{{ $work_step->title }}</h4>
							<span>{!! $work_step->description !!}</span>
						</div>
					</div>

				@endforeach					

			</div>
		</div>
	</section>
	<!-- /How It Work -->

	<!-- Property Type -->
	<section class="property-type-sec">
		<div class="section-shape-imgs">
			<img src="{{asset('public/frontend/assets/img/shapes/property-sec-bg-1.png')}}" class="rectangle-left" alt="icon">
			<img src="{{asset('public/frontend/assets/img/shapes/property-sec-bg-2.png')}}" class="rectangle-right" alt="icon">	
			<img src="{{asset('public/frontend/assets/img/icons/red-circle.svg')}}" class="bg-09" alt="Image">
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="section-heading" data-aos="fade-down" data-aos-duration="1000">
						<h2>Explore by Property Type</h2>
						<div class="sec-line">
							<span class="sec-line1"></span>
							<span class="sec-line2"></span>
						</div>
						<p>
						    Discover a variety of properties tailored to your lifestyle and investment needs. Whether you're looking for luxurious apartments, spacious commercial spaces, cozy family homes, or land for future development — we have it all in one place. Filter by property type to find exactly what you're searching for, quickly and easily.
						</p>
					</div>
					<div class="owl-navigation">
						<div class="owl-nav mynav1 nav-control"></div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="property-type-slider owl-carousel">

						@foreach($sub_types as $s_type)
    						<a href="{{ route('front.category_by_property',[$s_type->id]) }}">
    							<div class="property-card" data-aos="fade-down" data-aos-duration="1000">
    								<div class="property-img">
    									<img src="{{asset('public/backend/sub_category/'.$s_type->image)}}" alt="icon">
    								</div>
    								<div class="property-name">
    									<h4>{{ $s_type->name }}</h4>
    									<p>{{ $s_type->properties()->count() }} Properties</p>											
    								</div>
    							</div>
    						</a>
						@endforeach		
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Property Type -->

	<!-- Feature Properties For Sale-->
	<section class="feature-property-sec" style="display: none;">
		<div class="container">
			<div class="section-heading text-center">
				<h2>Featured Properties for Sales</h2>
				<div class="sec-line">
					<span class="sec-line1"></span>
					<span class="sec-line2"></span>
				</div>
				<p>Hand-Picked selection of quality places</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="feature-slider owl-carousel">
						<div class="slider-col">
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-details.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-1.jpg')}}">
										</a>
										<div class="product-amount">
											<span>$41,000</span>
										</div>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
												<div class="new-featured">
													<span>New</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite selected">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-01.jpg')}}" alt="User">
										</div>
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
                                            <p class="rating-review"><span>5.0</span>(20 Reviews)</p>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Place perfect for nature</a> 
										</h3>
										<p><span><i class="feather-map-pin"></i></span>318-S Oakley Blvd, Chicago, IL 60612, USA</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												4 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												4 Baths
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												35000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">16 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">Apartment</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-details.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-2.jpg')}}">
										</a>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="product-amount">
											<span>$78,000</span>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-02.jpg')}}" alt="User">
										</div>
									</div>
									<div class="pro-content">
										<div class="rating">
                                            <span class="rating-count">
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                            <p class="rating-review"><span>3.0</span>(10 Reviews)</p>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Beautiful Condo Room</a> 
										</h3>
										<p><i class="feather-map-pin"></i>470 Park Ave S, New York, NY 10016</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												3 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												2 Baths
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												15000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">17 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">Condos</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						</div>
						<div class="slider-col">
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-details.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-3.jpg')}}">
										</a>
										<div class="product-amount">
											<span>$63,000</span>
										</div>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-03.jpg')}}" alt="User">
										</div>
									</div>
									<div class="pro-content">
										<div class="rating">
                                            <span class="rating-count">
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                            <p class="rating-review"><span>4.0</span>(28 Reviews)</p>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Summer house</a> 
										</h3>
										<p><i class="feather-map-pin"></i>82-25 Parsons Blvd, Jamaica, NY 11432, USA</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												2 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												1 Bath
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												5000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">13 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">House</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-detail-viewhtml.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-4.jpg')}}">
										</a>
										<div class="product-amount">
											<span>$51,000</span>
										</div>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-04.jpg')}}" alt="User">
										</div>
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
                                            <p class="rating-review"><span>5.0</span>(15 Reviews)</p>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Minimalist and bright flat</a> 
										</h3>
										<p><i class="feather-map-pin"></i>518-520 8th Ave, New York, NY 10018, USA</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												3 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												1 Baths
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												25000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">18 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">Flats</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						</div>
						<div class="slider-col">
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-details.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-5.jpg')}}">
										</a>
										<div class="product-amount">
											<span>$29,000</span>
										</div>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-05.jpg')}}" alt="User">
										</div>
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
                                            <p class="rating-review"><span>5.0</span>(20 Reviews)</p>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Two storey modern flat</a> 
										</h3>
										<p><i class="feather-map-pin"></i>470 Park Ave S, New York, NY 10016</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												2 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												2 Baths
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												31000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">19 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">Flat</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-details.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-2.jpg')}}">
										</a>
										<div class="product-amount">
											<span>$80,000</span>
										</div>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-06.jpg')}}" alt="User">
										</div>
									</div>
									<div class="pro-content">
										<div class="rating">
                                            <span class="rating-count">
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star checked"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                            <p class="rating-review"><span>4.0</span>(12 Reviews)</p>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Modern apartment</a> 
										</h3>
										<p><i class="feather-map-pin"></i>122 N Morgan St, Chicago, IL 60607, USA</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												3 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												3 Baths
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												12000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">20 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">Apartment</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						</div>
						<div class="slider-col">
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-details.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-4.jpg')}}">
										</a>
										<div class="product-amount">
											<span>$51,000</span>
										</div>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-07.jpg')}}" alt="User">
										</div>
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
                                            <span class="rating-review">5.0 (60 Reviews)</span>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Minimalist and bright flat</a> 
										</h3>
										<p><i class="feather-map-pin"></i>518-520 8th Ave, New York, NY 10018, USA</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												4 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												2 Baths
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												23000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">21 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">Flats</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
							<div class="product-custom"  data-aos="fade-down" data-aos-duration="1000">
								<div class="profile-widget">
									<div class="doc-img">
										<a href="rent-details.html" class="property-img">
											<img class="img-fluid" alt="Property Image" src="{{asset('public/frontend/assets/img/product/product-3.jpg')}}">
										</a>
										<div class="product-amount">
											<span>$41000</span>
										</div>
										<div class="feature-rating">
											<div>
												<div class="featured">
													<span>Featured</span>
												</div>
											</div>
											<a href="javascript:void(0)">
												<div class="favourite">
													<span><i class="fa-regular fa-heart"></i></span>
												</div>
											</a>
										</div>
										<div class="user-avatar">
											<img src="{{asset('public/frontend/assets/img/profiles/avatar-05.jpg')}}" alt="User">
										</div>
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
                                            <span class="rating-review">5.0 (50 Reviews)</span>
                                        </div>
										<h3 class="title">
											<a href="rent-details.html">Place perfect for nature</a> 
										</h3>
										<p><i class="feather-map-pin"></i>318-S Oakley Blvd, Chicago, IL 60612, USA</p>
										<ul class="d-flex details">
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
												2 Beds
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
												4 Baths
											</li>
											<li>
												<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
												15000 Sqft
											</li>
										</ul>
			
										<ul class="property-category d-flex justify-content-between">
											<li>
												<span class="list">Listed on : </span>
												<span class="date">16 Jan 2023</span>
											</li>
											<li>
												<span class="category list">Category : </span>
												<span class="category-value date">Apartment</span>
											</li>
										</ul>
									</div>
								</div>		
							</div>
						</div>
					</div>
					<div class="view-property-btn d-flex justify-content-center"  data-aos="fade-down" data-aos-duration="1000">
						<a href="rent-property-grid.html" class="btn-primary">View All Properties</a>
					</div>
				</div>
			</div>
		</div>
		<div class="bg-imgs">
			<img src="{{asset('public/frontend/assets/img/bg/price-bg.png')}}" class="bg-01" alt="icon">
			<img src="{{asset('public/frontend/assets/img/icons/blue-circle.svg')}}" class="bg-02" alt="icon">
			<img src="{{asset('public/frontend/assets/img/icons/red-circle.svg')}}" class="bg-03" alt="icon">
		</div>
	</section>
	<!-- /Feature Properties For Sale -->

	<!-- Cities List -->
	<section class="cities-list-sec">
		<div class="container">
			<div class="section-heading">
				<h2>Top Popular Area</h2>
				<div class="sec-line">
					<span class="sec-line1"></span>
					<span class="sec-line2"></span>
				</div>
				<p>Destinations we love the most</p>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="city-card-slider owl-carousel">
					    
					    @foreach($top_areas as $ta)
					        <div class="city-list">
								<div class="city-img">
									<img src="https://property.dotmaxbd.com/public/backend/city/dhak1745927192.jpg" alt="City">
								</div>
								<div class="city-name">
									<h5>{{ $ta->area_name }}</h5>
									<p>{{ $ta->properties()->count() }} Properties</p>
								</div>
								<div class="arrow-overlay">
									<a href="{{ route('front.city_by_property',[$ta->id]) }}"><i class='fa-solid fa-arrow-right'></i></a>
								</div>
							</div>
					    @endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Cities List -->

	<!-- Testimonial -->
	<section class="testimonial-sec">
		<div class="container">
			<div class="section-heading">
				<h2>Testimonials</h2>
				<div class="sec-line">
					<span class="sec-line1"></span>
					<span class="sec-line2"></span>
				</div>
				<p>What our happy client says</p>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="testimonial-slider owl-carousel">
						@foreach($testimonial_items as $ti)
						<div class="testimonial-card" data-aos="fade-down" data-aos-duration="2000" style="height: 354px;">
							<div class="user-icon">
								<a href="javascript:void(0);"><img src="{{ asset('backend/testimonial/'. $ti->image) }}" alt="User"></a>
							</div>
							<h4><a href="javascript:void(0);">{{ $ti->name }}</a></h4>
							<p>{!! $ti->description !!}</p>
							
							<!-- <div class="rating">
								<span><i class="fa-solid fa-star"></i></span>
								<span><i class="fa-solid fa-star"></i></span>
								<span><i class="fa-solid fa-star"></i></span>
								<span><i class="fa-solid fa-star"></i></span>
								<span><i class="fa-solid fa-star"></i></span>
							</div> -->
						</div>
						@endforeach
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Testimonial -->			

	<!-- Faq -->
	<section class="faq-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<div class="faq-img">
						<img src="{{asset('public/frontend/assets/img/faq-img.jpg')}}" alt="icon">
					</div>
				</div>
				<div class="col-lg-8">
					<div class="section-heading" data-aos="fade-down" data-aos-duration="2000">
						<h2>Frequently Asked Questions</h2>
						<div class="sec-line">
							<span class="sec-line1"></span>
							<span class="sec-line2"></span>
						</div>
						<p>
						    Find quick answers to common questions from tenants and landlords. Whether you're looking to rent
                            your next home or list a property, we've got you covered with everything you need to know — from
                            viewings to payments and beyond.
						</p>
					</div>							

					@foreach($faq_items as $key => $fi)

					<div class="faq-card" data-aos="fade-down" data-aos-duration="2000">
						<h4 class="faq-title">
							<a class="collapsed" data-bs-toggle="collapse" href="#faqtwo_{{ $key }}" aria-expanded="false">{{ $key+1 }}. {{ $fi->question }}</a>
						</h4>
						<div id="faqtwo_{{ $key }}" class="card-collapse collapse">
							<div class="faq-info">
								<p>{!! $fi->answer !!}</p>
							</div>
						</div>
					</div>

					@endforeach					

				</div>
			</div>
		</div>
	</section>
	<!-- /Faq -->

	<!-- Agent Register -->
	<section class="agent-section">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-8">
					<div class="section-heading" data-aos="fade-down" data-aos-duration="2000">
						<h2>Become a Real Estate Agent</h2>
						<div class="sec-line">
							<span class="sec-line1"></span>
							<span class="sec-line2"></span>
						</div>
						<p>
						    Join our dynamic team and turn your passion for real estate into a rewarding career.
						    As a registered agent, you'll gain access to exclusive property listings, professional training,
						    and generous commission opportunities. Whether you're experienced or just starting out, we provide the tools and
						    support you need to succeed in the real estate market.
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="register-btn" data-aos="fade-down" data-aos-duration="2000">
						<a href="{{ route('front.agent') }}" class="btn-primary">Register Now</a>
					</div>
				</div>
			</div>
		</div>				
		<div class="bg-imgs">
			<img src="{{asset('public/frontend/assets/img/icons/blue-circle.svg')}}" class="bg-06" alt="icon">
			<img src="{{asset('public/frontend/assets/img/icons/red-circle.svg')}}" class="bg-07" alt="icon">
		</div>
	</section>
	<!-- /Agent Register -->	

	<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> -->
	<!-- jQuery -->
	<script src="{{asset('public/frontend/assets/js/jquery-3.7.1.min.js')}}" type="text/javascript"></script>

    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{ asset('public/frontend/assets/plugins/select2/css/select2.min.css') }}">
    
    <!-- Select2 JS -->
    <script src="{{ asset('public/frontend/assets/plugins/select2/js/select2.min.js') }}"></script>

	<script>
		$(document).ready(function(){
		    
            $('#city_id').select2();
            $('#area_id').select2();
            $('#max_price').select2();
            $('#min_price').select2();
            $('#type_id').select2();
            get_area();
		    
		    $('#searchBtn').on('click', function(e){
                e.preventDefault();
            
                let params = {
                    city_id: $('#city_id').val(),
                    area_id: $('#area_id').val(),
                    type_id: $('#type_id').val(),
                    min_price: $('#min_price').val(),
                    max_price: $('#max_price').val()
                };
                
            
                let query = $.param(params);
                window.location.href = "{{ route('front.all_property') }}?" + query;
            });
            
            $(document).on('change','select#city_id',function(){
                get_area();
            });
            
            function get_area(){
                let city_id = $('select#city_id').val(); 
                $.ajax({
                    method: 'GET',
                    url: '{{ route("front.get_city") }}',  
                    data: { city_id },  
                    success: function(res){
                        if(res.status){
                            $('select#area_id').html(res.html_view);
                        }
                    }
                });
            }
		    
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
			
			$('.feature-slider').owlCarousel({
                loop: true,
                margin: 10,
                nav: true, // enable arrows
                navText: ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"], // custom arrows
                dots: false, // hide dots if you don’t want them
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 2
                    },
                    1000: {
                        items: 3
                    }
                }
            });

			
			
// 			$(function () {
//             // Get the value from the input fields (already filled by Blade with request() values)
//             let minPrice = parseInt($('#min_price').val()) || 5000;
//             let maxPrice = parseInt($('#max_price').val()) || 50000;
        
//             $("#slider-range").slider({
//                 range: true,
//                 min: 5000,
//                 max: 50000,
//                 values: [minPrice, maxPrice],
//                 slide: function (event, ui) {
//                     $("#slider-range-value1").text(ui.values[0]);
//                     $("#slider-range-value2").text(ui.values[1]);
        
//                     $("#min_price").val(ui.values[0]);
//                     $("#max_price").val(ui.values[1]);
//                     get_data(); // Call to refresh data
//                 }
//             });
        
//             // Set text values for price range preview
//             $("#slider-range-value1").text(minPrice);
//             $("#slider-range-value2").text(maxPrice);
        
//         });
			
		});
	</script>

@endsection