@extends('frontend.app')
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Blog List</h2>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home </a></li>
                                <li>Blog List</li>
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
                        @foreach($items as $item)
                            <!-- Rent grid -->
                            <div class="col-lg-4 col-md-6">
                                <div class="product-custom">
                                    <div class="profile-widget">
                                        <div class="doc-img">
                                            <a href="{{ route('front.rent_details',[$item->id]) }}" class="property-img">
                                                <img class="img-fluid" alt="Property Image" src="{{ asset('public/backend/blog/'.$item->thumbnail) }}">
                                            </a>
                                            <div class="product-amount">
                                                <h5><span>${{ $item->price }} </span></h5>
                                            </div>
                                            <div class="featured">
                                                <span>Featured</span>
                                            </div>
                                            <div class="new-featured">
                                                <span>New</span>
                                            </div>
                                            <a href="javascript:void(0)">
                                                <div class="favourite selected">
                                                    <i class="fa-regular fa-heart"></i>
                                                </div>
                                            </a>
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
                                                <a href="rent-details.html">{{ $item->title }}</a> 
                                            </h3>
                                            <p><i class="feather-map-pin"></i> {{ $item->location }}</p>
                                            <ul class="d-flex details">
                                                <li>
                                                    <img src="{{ asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
                                                    {{ $item->bed }} Beds
                                                </li>
                                                <li>
                                                    <img src="{{ asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
                                                    {{ $item->bath }} Baths
                                                </li>
                                                <li>
                                                    <img src="{{ asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
                                                    {{ $item->floor_area }} Sqft
                                                </li>
                                            </ul>
                                            <ul class="property-category d-flex justify-content-between align-items-center">
                                                <li class="user-info">
                                                   <a href="#"><img src="{{ asset('public/frontend/assets/img/profiles/avatar-01.jpg')}}" class="img-fluid avatar" alt="User"></a>
                                                    <div class="user-name">
                                                        <a href="#">Marc Silva</a>
                                                        <p>Newyork</p>
                                                    </div>													
                                                </li>
                                                <li>
                                                    <a href="{{ route('front.rent_details',[$item->id]) }}" class="btn-primary">View</a>
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

