
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
    
    .pricing {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: center;
            justify-content: center;
            width: 100%;
            margin: 0 auto;
        }
        
        .pricing-item {
            position: relative;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: stretch;
            align-items: stretch;
            text-align: center;
            -webkit-flex: 0 1 330px;
            flex: 0 1 330px;
        }
        
        .pricing-action {
            color: inherit;
            border: none;
            background: none;
            cursor: pointer;
        }
        
        .pricing-action:focus {
            outline: none;
        }
        
        .pricing-feature-list {
            text-align: left;
        }
        
        .pricing-palden .pricing-item {
            font-family: 'Open Sans', sans-serif;
            cursor: default;
            color: #84697c;
            background: #fff;
            box-shadow: 0 0 10px rgba(46, 59, 125, 0.23);
            border-radius: 20px 20px 10px 10px;
            margin: 1em;
        }
        
        @media screen and (min-width: 66.25em) {
            .pricing-palden .pricing-item {
                margin: 1em -0.5em;
            }
            .pricing-palden .pricing__item--featured {
                margin: 0;
                z-index: 10;
                box-shadow: 0 0 20px rgba(46, 59, 125, 0.23);
            }
        }
        
        .pricing-palden .pricing-deco {
            border-radius: 10px 10px 0 0;
            background: linear-gradient(135deg,#4097f9,#0af0c7);
            padding: 4em 0 9em;
            position: relative;
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .pricing-palden .pricing-deco-img {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 160px;
        }
        
        .pricing-palden .pricing-title {
            font-size: 0.75em;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #fff;
        }
        
        .pricing-palden .deco-layer {
            -webkit-transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
        }
        
        .pricing-palden .pricing-item:hover .deco-layer--1 {
            -webkit-transform: translate3d(15px, 0, 0);
            transform: translate3d(15px, 0, 0);
        }
        
        .pricing-palden .pricing-item:hover .deco-layer--2 {
            -webkit-transform: translate3d(-15px, 0, 0);
            transform: translate3d(-15px, 0, 0);
        }
        
        .pricing-palden .icon {
            font-size: 2.5em;
        }
        
        .pricing-palden .pricing-price {
            font-size: 5em;
            font-weight: bold;
            padding: 0;
            color: #fff;
            margin: 0 0 0.25em 0;
            line-height: 0.75;
        }
        
        .pricing-palden .pricing-currency {
            font-size: 0.15em;
            vertical-align: top;
        }
        
        .pricing-palden .pricing-period {
            font-size: 0.15em;
            padding: 0 0 0 0.5em;
            font-style: italic;
        }
        
        .pricing-palden .pricing__sentence {
            font-weight: bold;
            margin: 0 0 1em 0;
            padding: 0 0 0.5em;
        }
        
        .pricing-palden .pricing-feature-list {
            margin: 0;
            padding: 0.25em 0 2.5em;
            list-style: none;
            text-align: center;
        }
        
        .pricing-palden .pricing-feature {
            padding: 1em 0;
        }
        
        .pricing-palden .pricing-action {
            font-weight: bold;
            margin: auto 3em 2em 3em;
            padding: 1em 2em;
            color: #fff;
            border-radius: 30px;
            background: linear-gradient(135deg,#a93bfe,#584efd);
            -webkit-transition: background-color 0.3s;
            transition: background-color 0.3s;
        }
        
        .pricing-palden .pricing-action:hover,
        .pricing-palden .pricing-action:focus {
            background: linear-gradient(135deg,#fd7d57,#f55d59);
        }
        
        .pricing-palden .pricing-item--featured .pricing-deco {
            padding: 5em 0 8.885em 0;
        }
    
</style>

    <!-- Home Banner -->
	<section class="banner-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="banner-content" data-aos="fade-down">
						<h1>Find Your Best Dream </br> <span>House for Sell...</span></h1>
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
										<img src="{{asset('public/frontend/assets/img/icons/rent-icon.svg')}}" alt="icon"> Sell Property
									</a>
								</li>
							</ul>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- /Home Banner -->
	
	<section class="feature-property-sec for-rent">
		<div class="container">
			<div class="section-heading text-center">
				<h2>Property Plan</h2>
				<div class="sec-line">
					<span class="sec-line1"></span>
					<span class="sec-line2"></span>
				</div>
				<p>Choose your package for property listing</p>
			</div>
			<div class="row justify-content-center pricing pricing-palden">
            @foreach($packages as $key => $package)
                @if($key % 2 == 0)
                    <div class="col-md-4">
                <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                    <div class="pricing-deco">
                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                        </svg>
                        <div class="pricing-price"><span class="pricing-currency">TK</span>{{ $package->price }}
                            <span class="pricing-period">/ Subs</span>
                        </div>
                        <h3 class="pricing-title">{{ $package->name }}</h3>
                    </div>
                    <ul class="pricing-feature-list">
                        <li class="pricing-feature">{{ $package->no_of_property }} Property Create</li>
                        <li class="pricing-feature">Responsive Design</li>
                        <li class="pricing-feature">Content Upload</li>
                    </ul>
                    <button class="pricing-action">Choose</button>
                </div>
            </div>
                @else
                    <div class="col-md-4">
                <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                    <div class="pricing-deco" style="background: linear-gradient(135deg,#a93bfe,#584efd)">
                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                        </svg>
                        <div class="pricing-price"><span class="pricing-currency">TK</span>{{ $package->price }}
                            <span class="pricing-period">/ Subs</span>
                        </div>
                        <h3 class="pricing-title">{{ $package->name }}</h3>
                    </div>
                    <ul class="pricing-feature-list">
                        <li class="pricing-feature">{{ $package->no_of_property }} Property Create</li>
                        <li class="pricing-feature">Responsive Design</li>
                        <li class="pricing-feature">Content Upload</li>
                    </ul>
                    <button class="pricing-action">Choose</button>
                </div>
            </div>
                @endif
            @endforeach
		</div>
		    <div class="view-property-btn d-flex justify-content-center"  data-aos="fade-down" data-aos-duration="1000">
				<a style="padding: 20px 40px;font-size: 20px;" href="{{ route('front.create_own_property') }}" class="btn-primary">Create Property</a>
			</div>
		</div>
		<!--<div class="bg-imgs">-->
		<!--	<img src="{{asset('public/frontend/assets/img/bg/price-bg.png')}}" class="bg-04" alt="Image">-->
		<!--</div>-->
	</section>
	
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
						<a href="{{ route('front.agent') }}" class="btn-primary">Become A Seller</a>
					</div>
				</div>
			</div>
		</div>				
		<div class="bg-imgs">
			<img src="{{asset('public/frontend/assets/img/icons/blue-circle.svg')}}" class="bg-06" alt="icon">
			<img src="{{asset('public/frontend/assets/img/icons/red-circle.svg')}}" class="bg-07" alt="icon">
		</div>
	</section>
	
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