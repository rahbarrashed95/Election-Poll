  <!-- Include jQuery if not already included -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- Toastr CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<!-- Select2 CSS and JS -->
<link rel="stylesheet" href="{{ asset('public/frontend/assets/plugins/select2/css/select2.min.css') }}">
<script src="{{ asset('public/frontend/assets/plugins/select2/js/select2.min.js') }}"></script>


  
   @foreach($filtered_properties as $property)
   
    <!-- Rent -->
        <div class="col-lg-4 col-md-4">
            <div class="product-custom">
                <div class="profile-widget">
                    <div class="doc-img">
                        <a href="{{ route('front.rent_details',[$property->id]) }}" class="property-img">
                            <img class="img-fluid" alt="Property Image" src="{{ asset('public/backend/property/' . $property->thumb_img) }}">
                        </a>
                        <div class="product-amount">
                            <h5>
                                <span>
                                    @if(!empty($property->price))
                                        {{ $property->price }} Tk
                                    @endif
                                </span>
                            </h5>
                        </div>
                        <!--<div class="featured">-->
                        <!--    <span>Featured</span>-->
                        <!--</div>-->
                        <!--<div class="new-featured">-->
                        <!--    <span>New</span>-->
                        <!--</div>-->
                        
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
                        <p><i class="feather-map-pin"></i> {{ $property->location }}</p>
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
                            <!--<a href="agent-grid.html">-->
                            <!--    <img src="{{asset('public/frontend/assets/img/profiles/avatar-01.jpg')}}" class="img-fluid avatar" alt="User">-->
                            <!--</a>-->
                            <!--    <div class="user-name">-->
                            <!--        <a href="agent-grid.html">Marc Silva</a>-->
                            <!--        <p>Newyork</p>-->
                            <!--    </div>													-->
                            <!--</li>-->
                            <li style="margin: 0 auto;">
                                <a href="{{ route('front.rent_details',[$property->id]) }}" class="btn-primary">View Details</a>
                            </li>
                        </ul>
                    </div>
                </div>		
            </div>
        </div>
        <!-- /Rent --> 
     
    @endforeach

    <p>{!! urldecode(str_replace("/?","?",$filtered_properties->appends(Request::all())->render())) !!}</p>
    

    <script>
        $('.property_form').on('click', function (e) {

				e.preventDefault();	
				
				var user_id = $(this).data('user-id');
				var property_id = $(this).data('property-id');		
				var addToPropertyUrl = $(this).data('url');	
						
				
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}'
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
    </script>
    
    
    
    