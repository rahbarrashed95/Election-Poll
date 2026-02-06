<!DOCTYPE html>
<html lang="en">
	
<!-- Mirrored from dreamsestate.dreamstechnologies.com/html/rent-property-grid-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 06:38:10 GMT -->
<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
		<title>DreamsEstate</title>
		
		<!-- Favicon -->
		<link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/bootstrap.min.css')}}">
				
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{asset('public/frontend/assets/plugins/fontawesome/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('public/frontend/assets/plugins/fontawesome/css/all.min.css')}}">

		<!-- Feathericon CSS -->
    	<link rel="stylesheet" href="{{asset('public/frontend/assets/css/feather.css')}}">

        <!-- Boxicons CSS -->
		<link rel="stylesheet" href="{{asset('public/frontend/assets/plugins/boxicons/css/boxicons.min.css')}}"> 

		<!-- Owl Carousel CSS -->
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/owl.carousel.min.css')}}">

        <!-- Slider Range CSS -->
        <link rel="stylesheet" href="{{asset('public/frontend/assets/plugins/range-slider/slider-range.css')}}">

		<!-- Select2 CSS -->
		<link rel="stylesheet" href="{{asset('public/frontend/assets/plugins/select2/css/select2.min.css')}}">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{asset('public/frontend/assets/css/style.css')}}">

	</head>		
	<body>
	    
	    @php
	    $property_types = App\Models\PropertyCategory::all();
        $sub_types = App\Models\PropertySubCategory::all();
        $testimonial_items = App\Models\Testimonial::where('status', 1)->get();
        $faq_items = App\Models\Faq::where('status', 1)->get();
        $cities = App\Models\City::all();
        $social_items = App\Models\Social::where('status', 1)->latest()->get();
        $page_items = App\Models\Page::latest()->limit(5)->get();
	    @endphp
	    
	    <style>
	        .noUi-base {
	            display: none;
	        }
	        
	        .ui-slider-horizontal .ui-slider-range {
                top: 0;
                height: 100%;
                background: #6C60FE;
            }
	        
	    </style>

		<!-- Loader -->
		<div class="page-loader">
			<div class="page-loader-inner">
				<img src="assets/img/icons/loader.svg" alt="Loader">
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
			</div>
		</div>
		<!-- /Loader -->
		
		<!-- Header -->			
            @include('frontend.partials.header')
		<!-- /Header -->

		<!-- Main Wrapper -->
		<div class="main-wrapper">

            <!-- Breadcrumb -->
        <div class="breadcrumb" style="padding: 40px 0;">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            @if(request()->pro_type == 'Sell')
                                <h2>Buy Property</h2>
                            @else
                                <h2>Rent Property</h2>
                            @endif
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('front.home') }}">Home</a></li>
                                <li>Search Your Property</li>
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
			<section class="feature-property-sec for-rent content">
				<div class="container">
                    

					<div class="row">
					    
					    <div class="advanced-search">
								
								<div class="row">
									<div class="col-lg-2">
									    <h3>Name/Location</h3>
										<div class="review-form form-wrap ">
											<input type="text" id="search" class="form-control" placeholder="Name/Location/Landmark">
											<span class="form-icon">
												<i class="bx bx-map"></i>
											</span>
										</div>
									</div>
									
									<div class="col-lg-2 col-sm-6 col-12">
									    <h3>City</h3>
									    <div class="review-form form-wrap ">
								            <select id="city_id" class="form-control select2">
											    <option value="">Select City</option>
                                                @foreach($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                @endforeach 
											</select>
										</div>
									</div>
									
									<div class="col-lg-2 col-sm-6 col-12">
									    <h3>Area</h3>
									    <div class="review-form form-wrap ">
								            <select id="area_id" class="form-control select2">
												    
											</select>
										</div>
									</div>
									
									<div class="col-lg-2 col-sm-6 col-12">
									    <h3>Pricing</h3>
									    <ul class="price-filter">
                                            <!--<h5>Price Range : </h5>-->
                                            <li class="d-flex justify-content-between">
                                                <div class="caption d-flex" style="gap: 20px;margin-bottom: 10px;">
                                                    <input class="form-control" type="text" name="min_price" id="min_price" value="{{ request('min_price') ?? 5000 }}" />
                                                    <input class="form-control" type="text" name="max_price" id="max_price" value="{{ request('max_price') ?? 50000 }}" />

                                                    <span style="display: none;" id="slider-range-value1"> to</span> 
                                                    <span style="display: none;" id="slider-range-value2"> </span>
                                                </div>
                                            </li>
                                            <li class="price-filter-inner">
                                                <div id="slider-range" class="range-bottom"></div>
                                            </li>
                                        </ul>
									</div>
									
									<div class="col-lg-2 col-sm-6 col-12">
									    <h3>Type</h3>
									    <div class="review-form form-wrap ">
								            <ul class="checkbox-list term-list">
                                                @foreach($types as $type)
                                                    <li>
                                                        <label class="custom_check">
                                                            <input id="type_id" class="type_id" type="checkbox" name="username" {{ (request()->type_id == $type->id) ? 'checked' : '' }} value="{{ $type->id }}">
                                                            <span class="checkmark"></span>  {{ $type->name }}
                                                        </label>
                                                    </li>
                                                @endforeach                                            
                                            </ul>
										</div>
									</div>
									
									<div class="col-lg-2 col-sm-6 col-12">
									    <h3>Category</h3>
									    <div class="review-form form-wrap ">
								            <ul class="checkbox-list term-list subb_cat">
                                                                                    
                                            </ul>
										</div>
									</div>
									
									
									
								</div>
							</div>

                        <!-- Sidebar -->
                        <div class="col-lg-4 theiaStickySidebar">
                            <div class="left-sidebar-widget">

                                <!-- Advanced Search -->
                                <div class="collapse-card">
									<h4 class="card-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#advance-search" aria-expanded="false">Advanced Search</a>
									</h4>
									<div id="advance-search" class="card-collapse collapse show">
										<ul class="show-list">
                                            <li class="review-form form-wrap">
                                                <input type="text" id="search" class="form-control" placeholder="Name/Location/Landmark">
                                                <span class="form-icon">
                                                    <i class="bx bx-search-alt"></i>
                                                </span>
                                            </li>
                                            <li class="review-form">
                                                <select id="city_id" class="form-control">
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}" {{ (request()->city_id == $city->id) ? 'selected' : '' }} >{{ $city->city }}</option>
                                                    @endforeach                                            
                                                </select>
                                            </li>
                                            <li class="review-form">
                                                <select id="area_id" class="form-control">
                                                    <option value="">Select Area</option>
                                                                                               
                                                </select>
                                            </li>
                                            <li class="review-form">
                                                <select id="bed" class="form-control">
                                                    <option value="">No of Bedrooms</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </li>
                                            <li class="review-form">
                                                <select id="bath" class="form-control">
                                                    <option value="">No of Bath</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </li>
                                            <li class="review-form">
                                                <input type="text" class="form-control" placeholder="Min Sqft">
                                            </li>
                                        </ul>
									</div>
								</div>
                                <!-- /Advanced Search -->

                                <!-- Types -->
                                <div class="collapse-card">
									<h4 class="card-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#types" aria-expanded="false">Type</a>
									</h4>
									<div id="types" class="card-collapse collapse show">
										<ul class="checkbox-list term-list">
                                            @foreach($types as $type)
                                                <li>
                                                    <label class="custom_check">
                                                        <input id="type_id" class="type_id" type="checkbox" name="username" {{ (request()->type_id == $type->id) ? 'checked' : '' }} value="{{ $type->id }}">
                                                        <span class="checkmark"></span>  {{ $type->name }}
                                                    </label>
                                                </li>
                                            @endforeach                                            
                                        </ul>
									</div>
								</div>
                                <!-- /Categories -->

                                <!-- Categories -->
                                <div class="collapse-card">
									<h4 class="card-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#categiries" aria-expanded="false">Categories</a>
									</h4>
									<div id="categiries" class="card-collapse collapse show">
										<ul class="checkbox-list term-list subb_cat">
                                                                                    
                                        </ul>
									</div>
								</div>
                                <!-- /Categories -->



                                <!-- Pricing -->
                                <div class="collapse-card">
									<h4 class="card-title">
										<a class="collapsed" data-bs-toggle="collapse" href="#pricing" aria-expanded="false">Pricing</a>
									</h4>
									<div id="pricing" class="card-collapse collapse show">
                                        <ul class="price-filter">
                                            <!--<h5>Price Range : </h5>-->
                                            <li class="d-flex justify-content-between">
                                                <div class="caption d-flex" style="gap: 20px;">
                                                    <input class="form-control" type="text" name="min_price" id="min_price" value="{{ request('min_price') ?? 5000 }}" />
                                                    <input class="form-control" type="text" name="max_price" id="max_price" value="{{ request('max_price') ?? 50000 }}" />

                                                    <span style="display: none;" id="slider-range-value1"> to</span> 
                                                    <span style="display: none;" id="slider-range-value2"> </span>
                                                </div>
                                            </li>
                                            <li class="price-filter-inner">
                                                <div id="slider-range" class="range-bottom"></div>
                                            </li>
                                        </ul>
									</div>
									
								</div>
                                <!-- /Pricing -->                             

                            </div>
                        </div>
                        <!-- /Sidebar -->

                        <div class="col-lg-8">
                            <div class="row" id="property_data">                            

                            </div>   
                                                  
                        </div>
                        
					</div>
				</div>
			</section>


		

		<!-- Search -->
			<div class="search-popup js-search-popup ">
				<a href="javascript:void(0);" class="close-button" id="search-close" aria-label="Close search">
					<i class="fa fa-close"></i>
				</a>
				<div class="popup-inner">
					<div class="inner-container">
						
							<h3>What Are You Looking for?</h3>
							
							<div class="row banner-property-info">
											<!--<div class="banner-property-grid">-->
											<!--	<input type="text" class="form-control" placeholder="Enter Keyword">-->
											<!--</div>-->
											
											<div class="col-lg-2 banner-property-grid">
												<select id="types_id" class="form-control">
													<option value="">Property Type</option>

													@foreach($property_types as $pt)
														<option value="{{ $pt->id }}" >{{ $pt->name }}</option>
													@endforeach
													
												</select>
											</div>
											
											<div class="col-lg-2 banner-property-grid">
												<select id="cityss_id" class="form-control select2">
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                    @endforeach 
													
												</select>
											</div>
											<div class="col-lg-2 banner-property-grid">
												<select id="areass_id" class="form-control select2">
												    
												</select>
											</div>
											
											
											<!--<div class="banner-property-grid">-->
											<!--	<input type="email" class="form-control" placeholder="Enter Address">-->
											<!--</div>-->
											
											
										
											<div class="col-lg-1 banner-property-grid">
												<a id="testBtn" class="btn-primary"><span><i class='feather-search'></i></span></a>
											</div>
										</div>
							
					
					</div>
				</div>
				
			</div>	
			<!-- /Search -->
			
			@include('frontend.partials.footer') 

		</div>		
		<!-- /Main Wrapper -->
		
		
	
		<!-- jQuery -->
		<script src="{{asset('public/frontend/assets/js/jquery-3.7.1.min.js')}}" type="096652b88990e3307562427c-text/javascript"></script>
		
		<!-- Bootstrap Bundle JS -->
		<script src="{{asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}" type="096652b88990e3307562427c-text/javascript"></script>
		
		<!-- Feather Icon JS -->
		<script src="{{asset('public/frontend/assets/js/feather.min.js')}}" type="096652b88990e3307562427c-text/javascript"></script>

		<!-- Owl Carousel JS -->
		<script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}" type="096652b88990e3307562427c-text/javascript"></script>

        <!-- Slider Rrange  JS -->
        <script src="{{asset('public/frontend/assets/plugins/range-slider/slider-range.js')}}" type="096652b88990e3307562427c-text/javascript"></script>

		<!-- Sticky Sidebar JS -->
		<script src="{{asset('public/frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js')}}" type="096652b88990e3307562427c-text/javascript"></script>
		<script src="{{asset('public/frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js')}}" type="096652b88990e3307562427c-text/javascript"></script>

		<!-- Select2 JS -->
		<script src="{{asset('public/frontend/assets/plugins/select2/js/select2.min.js')}}" type="096652b88990e3307562427c-text/javascript"></script>

		<!-- Custom JS -->
		<script src="{{asset('public/frontend/assets/js/script.js')}}" type="096652b88990e3307562427c-text/javascript"></script>
	
	<script src="{{asset('public/frontend/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}" data-cf-settings="096652b88990e3307562427c-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"91b79acd9f223366","version":"2025.1.0","serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"3ca157e612a14eccbb30cf6db6691c29","b":1}' crossorigin="anonymous"></script>

    <!-- jQuery -->
	<script src="{{asset('public/frontend/assets/js/jquery-3.7.1.min.js')}}" type="text/javascript"></script>
	
	<!-- jQuery (already included in your case) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- jQuery UI (add this!) -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>

<script>
$(document).ready(function () {
    
    // navigator.geolocation.getCurrentPosition(
    //     function (position) {
    //         let lat = position.coords.latitude;
    //         let lon = position.coords.longitude;
    //         alert("Latitude: " + lat);
    //         alert("Longitude: " + lon);
    //         // continue with fetch
    //     },
    //     function (error) {
    //         if (error.code === error.PERMISSION_DENIED) {
    //             alert("Please enable location access in your browser to get nearby results.");
    //         } else {
    //             alert("Geolocation error: " + error.message);
    //         }
    //     }
    // );
    
    navigator.geolocation.getCurrentPosition(function(position) {
        let lat = position.coords.latitude;
        let lon = position.coords.longitude;
        // alert(lat);
        // alert(lon);
    
        fetch('/send-location', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                lat: lat,
                lon: lon
            })
        })
        .then(res => res.json())
        .then(data => {
            if (Array.isArray(data.properties)) {
                alert(`Found ${data.properties.length} properties`);
            } else {
                alert(data.properties); // "No Data Found !!"
            }
            console.log('Response:', data);
            // alert(data.properties);
            // console.log('Nearest Thana:', data);
        });
    });
    
    get_area();
    
    $(document).on('change','select#cityss_id',function(){
                get_area();
            });
            
            function get_area(){
                let city_id = $('select#cityss_id').val(); 
               
                $.ajax({
                    method: 'GET',
                    url: '{{ route("front.get_city") }}',  
                    data: { city_id },  
                    success: function(res){
                        if(res.status){
                            $('select#areass_id').html(res.html_view);
                        }
                    }
                });
            }

    $('#testBtn').on('click', function(e){
        e.preventDefault();
        
        let type_id = $('#types_id').val();
        
        let params = {
            city_id: $('#cityss_id').val(),
            area_id: $('#areass_id').val(),
            type_id: type_id,
            min_price: $('#min_price').val(),
            max_price: $('#max_price').val()
        };

        console.log("Search Params:", params);

        let query = $.param(params);
        window.location.href = "{{ route('front.all_property') }}?" + query;
    });

});

</script>

<script>
    
</script>


    <script>
        $(function () {
            // Get the value from the input fields (already filled by Blade with request() values)
            let minPrice = parseInt($('#min_price').val()) || 5000;
            let maxPrice = parseInt($('#max_price').val()) || 50000;
        
            $("#slider-range").slider({
                range: true,
                min: 5000,
                max: 50000,
                values: [minPrice, maxPrice],
                slide: function (event, ui) {
                    $("#slider-range-value1").text(ui.values[0]);
                    $("#slider-range-value2").text(ui.values[1]);
        
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                    get_data(); // Call to refresh data
                }
            });
        
            // Set text values for price range preview
            $("#slider-range-value1").text(minPrice);
            $("#slider-range-value2").text(maxPrice);
        
        });

        $(document).ready(function() {
            
            const city_id = $('#city_id').val();
            const type_id = $('#type_id').val();
            const area_id = '{{ request("area_id") }}';
            
            if (city_id) {
                $.ajax({
                    method: 'GET',
                    url: '{{ route("front.get_city") }}',
                    data: { city_id: city_id },
                    success: function (res) {
                        if (res.status) {
                            $('#area_id').html(res.html_view);
                            $('#area_id').val(area_id); 
                        }
                    }
                });
            }
            
            if (type_id) {
                
                let selected_type_ids = $('input#type_id:checked').map(function () {
                    return $(this).val();
                }).get();
            
                $.ajax({
                    method: 'GET',
                    url: '{{ route("front.get_property_cat_checkbox") }}',
                    data: {
                        type_ids: selected_type_ids
                    },
                    success: function (res) {
                        if (res.status) {
                            $('ul.subb_cat').html(res.html_data);
                        }
                    }
                });
            }
        
            get_data();
            
        });

        $(document).on('keyup','#max_price',
            function(){
                get_data();
            }
        );
        
        $(document).on('keyup','#min_price',
            function(){
                get_data();
            }
        );
        
        $(document).on('keyup','#search',
            function(){
                get_data();
            }
        );

        $(document).on('change','#type_id',
            function(){
                get_data();
            }
        );

        $(document).on('change','#sub_type_id',
            function(){
                get_data();
            }
        );

        $(document).on('change','#city_id',
            function(){
                get_data();
            }
        );
        $(document).on('change','#area_id',
            function(){
                get_data();
            }
        );
        $(document).on('change','#bed',
            function(){
                get_data();
            }
        );
        
        $(document).on('change','#bath',
            function(){
                get_data();
            }
        );

        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            var page=$(this).attr('href').split('page=')[1]; 
            get_data(page);
        });

        $(document).on('change','select#city_id',
            function(){
            let city_id = $(this).val();     
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
        });
        
        $(document).on('click', 'input#type_id', function () {
            
            let selected_type_ids = $('input#type_id:checked').map(function () {
                return $(this).val();
            }).get();
        
            $.ajax({
                method: 'GET',
                url: '{{ route("front.get_property_cat_checkbox") }}',
                data: {
                    type_ids: selected_type_ids
                },
                success: function (res) {
                    if (res.status) {
                        $('ul.subb_cat').html(res.html_data);
                    }
                }
            });
            
        });

        function get_data(page=null){

            var selected_sub_types = $('.sub_type_id:checked').map(function() {
                return $(this).val();
            }).get();      

            var selected_types = $('.type_id:checked').map(function() {
                return $(this).val();
            }).get();           
            
            let city_id = $('#city_id').val();
           
            let area_id = $('#area_id').val();
          
            if (area_id == '') {
                area_id = '{{ request("area_id") }}'; 
            }
            
            let pro_type = '{{ request("pro_type") }}'; 
            
            let bed = $('#bed').val();
            let bath = $('#bath').val();
            let search = $('#search').val();
            
            let min_price = $('#min_price').val();
            let max_price = $('#max_price').val();
            
           
            $.ajax({
                url:"{{ route('front.all_property') }}?page="+page,
                method: 'GET',
                data: {
                    sub_types  : selected_sub_types,
                    types      : selected_types,
                    area_id    : area_id,
                    city_id    : city_id,
                    bed        : bed,
                    bath       : bath,
                    min_price  : min_price,
                    max_price  : max_price,
                    pro_type   : pro_type,
                    search     : search
                },
                success: function(res){
                    if(res.success){
                        $('div#property_data').html(res.property_data);
                    }
                }
            });
        }

    </script>

</body>

<!-- Mirrored from dreamsestate.dreamstechnologies.com/html/rent-property-grid-sidebar.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 05 Mar 2025 06:38:10 GMT -->
</html>