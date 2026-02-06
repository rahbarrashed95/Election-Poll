@extends('frontend.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Search Property</h2>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home </a></li>
                                <li>Search Property</li>
                            </ul>
                        </div>
                    </div>
                    <div class="breadcrumb-border-img">
                        <img src="{{ asset('public/frontend/assets/img/bg/line-bg.png')}}" alt="Line Image">
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->

            <!-- Feature Property For Rent -->
			<div class="listing-section">
				<div class="container">                  

                    <div class="feature-property-sec for-rent for-rent p-0 bg-transparent">
                        <div class="row">
                        @foreach($items as $property)
                            <!-- Rent grid -->
                            <div class="col-lg-4 col-md-6">
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
                            </div>
                            <!-- /Rent grid -->                      
                        @endforeach
                        </div>
					</div>
				</div>
			</div>
			<!-- /Feature Property For Rent -->
@endsection

