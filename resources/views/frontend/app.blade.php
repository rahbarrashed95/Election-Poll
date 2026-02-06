    <!-- Main Head -->
    @include('frontend.partials.head') 
    <!-- End Main Head -->	
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

		<!-- Loader -->
		<!-- <div class="page-loader">
			<div class="page-loader-inner">
				<img src="{{asset('public/frontend/assets/img/icons/loader.svg')}}" alt="Loader">
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
				<label><i class="fa-solid fa-circle"></i></label>
			</div>
		</div> -->
		<!-- /Loader -->

		<!-- Main Wrapper -->
		<div class="main-wrapper">

			<!-- Header -->			
            @include('frontend.partials.header')
			<!-- /Header -->
			@yield('content')
            <!-- Footer -->
			@include('frontend.partials.footer') 
			<!-- /Footer -->

			<!-- Search -->
			<div class="search-popup js-search-popup ">
				<a href="javascript:void(0);" class="close-button" id="search-close" aria-label="Close search">
					<i class="fa fa-close"></i>
				</a>
				<div class="popup-inner">
					<div class="inner-container">
						
							<h3>What Are You Looking for?</h3>
							
							<div class="row banner-property-info" style="justify-content: center;">
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
												<select id="citys_id" class="form-control select2">
                                                    @foreach($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                                                    @endforeach 
													
												</select>
											</div>
											<div class="col-lg-2 banner-property-grid">
												<select id="areas_id" class="form-control select2">
												    
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
			
			

		</div>		
		<!-- /Main Wrapper -->

		<!-- scrollToTop start -->
		<div class="progress-wrap active-progress">
			<svg class="progress-circle svg-content" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
			</svg>
		</div>

<script>
$(document).ready(function () {
    
    get_area();
    
    $(document).on('change','select#citys_id',function(){
        get_area();
    });
    
    function get_area(){
        let city_id = $('select#citys_id').val(); 
        
        $.ajax({
            method: 'GET',
            url: '{{ route("front.get_city") }}',  
            data: { city_id },  
            success: function(res){
                if(res.status){
                    $('select#areas_id').html(res.html_view);
                }
            }
        });
    }

    $('#testBtn').on('click', function(e){
        e.preventDefault();
        
        let type_id = $('#types_id').val();
       
        let params = {
            city_id: $('#citys_id').val(),
            area_id: $('#areas_id').val(),
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
		
		
	

		
		<!-- scrollToTop end -->
        @include('frontend.partials.js')