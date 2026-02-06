
@extends('frontend.app')
@section('content')

     <!-- Breadcrumb -->
     <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Add New Property</h2>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="index.html">Home </a></li>
                                <li>Add New Property</li>
                            </ul>
                        </div>
                    </div>
                    <div class="breadcrumb-border-img">
                        <img src="assets/img/bg/line-bg.png" class="img-fluid" alt="Image">
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->

            <!-- Content -->
			<div class="content inner-content">
				<div class="container">
                   
                    <form action="{{ route('front.subscription') }}" method="POST" id="subscription_form" enctype="multipart/form-data">
                        @csrf

					<!-- Property Information -->
					<div class="row" id="packageinfo">
                       
						<div class="col-lg-6">                           
                            <div class="property-info">
                                <h4>Package Information</h4>
                            
                                <h5>Available Package</h4>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>                                    
                                            <th scope="col">Package Name</th>
                                            <th scope="col">Package Price</th>
                                            <th scope="col">Number Of Property Create</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($packages as  $package)
                                        <tr>                                    
                                            <td>{{ $package->name }}</td>
                                            <td>{{ $package->price }}</td>
                                            <td>{{ $package->no_of_property }}</td>
                                        </tr>   
                                        @endforeach
                                    </tbody>
                                </table>
                                <span style="color: red;font-weight: 900;">N.B: If you have any promo code, then use code and subscribe.</span>
                            </div>
						</div>
						
						<div class="col-lg-6"> 
							<div class="add-property-wrap">
                                <div class="row">	
                                <div class="col-md-12">
                                    <div class="review-form">        
                                    <label class="custom_check mb-0">
                                        <input type="checkbox" id="usePromo" name="promo_code" value="1">
                                        <span class="checkmark"></span> Have you promo code ?
                                    </label>
                                    </div>
                                </div>

                                <div class="col-md-6 promo_code" id="promo_section" style="display: none;">
                                    <div class="review-form">
                                        <label>Promo Code</label>											
                                        <input type="text" class="form-control" placeholder="Enter Promo Code" name="promo_code" id="promo_code">        
                                    </div>
                                </div>

                                <div class="col-md-6" id="package_section">
                                    <div class="review-form">
                                        <label>Package Name</label>											
                                        <select id="property_type" name="package_id" class="form-control">
                                            <option>Select Package</option>
                                            @foreach($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    
                                <!-- <div class="col-md-12">
                                <div class="review-form">
                                    <label class="custom_check mb-0">
                                        <input type="checkbox" name="promo_code" value="Air Conditioning">
                                        <span class="checkmark"></span> Have you promo code ?
                                    </label>
                                </div>

                                    <div class="col-md-6 promo_code">
                                            <div class="review-form">
											<label>Promo Code</label>											
                                            <input type="text" class="form-control" name="promo_code">
										</div>
									</div>
                                
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
									<div class="col-md-6">
										<div class="review-form">
											<label>Package Name</label>											
                                            <select id="property_type" name="package_id" class="form-control">
                                                <option>Select Package</option>
                                                @foreach($packages as $package)
                                                    <option value="{{ $package->id }}">{{ $package->name }}</option>
                                                @endforeach
                                            </select>
										</div>
									</div> -->

                                    

                                    <div id="package_details" class="col-md-6">

                                    </div>

                                    <div class="col-md-12" style="padding-bottom: 20px;">                           
                                        <div class="">							 
                                            <button type="submit" class="btn btn-primary">Subscribe</button>
                                        </div>
                                    </div>
									
								</div>
                            </div>
						</div>   
					</div> 
					<!-- /Property Information -->					
					

                    </form>
				</div>
			</div>
			<!-- /Content -->

            <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script>


				$(document).ready(function(){
					// Set toastr options globally
					toastr.options = {
						"timeOut": 5000,            // Notification will disappear after 5 seconds
						"extendedTimeOut": 0,       // Don't extend the notification time when hovering
						"closeButton": true,        // Optional: Add a close button
						"progressBar": true,        // Optional: Add a progress bar
						"preventDuplicates": true   // Avoid duplicate notifications
					};

					// Check if there are any stored toastr messages after the page reload
					if (sessionStorage.getItem('toastr_message')) {
						// Get stored message
						var message = sessionStorage.getItem('toastr_message');
						var type = sessionStorage.getItem('toastr_type');
						
						// Display the message using toastr
						if (type === 'success') {
							toastr.success(message);
						} else if (type === 'error') {
							toastr.error(message);
						}
						
						// Clear the stored message after showing
						sessionStorage.removeItem('toastr_message');
						sessionStorage.removeItem('toastr_type');
					}
				});


                $(function () {
                    $('#property_type').on('change', function () {
                    let cat_id = $(this).val();
                    $.ajax({
                        url: "{{ route('front.get_property_cat') }}",
                        method: "GET",
                        data: {cat_id},
                        success: function(res){
                            if(res.status){
                                $('select#property_category').html(res.html_data);
                            }
                        }
                    });
                    
                    });
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

                $(document).on('submit','form#subscription_form', function(e) {    
                    e.preventDefault(); 
                    
                    var url=$(this).attr('action');
                    var method=$(this).attr('method');
                    var formData = new FormData($(this)[0]);
                   
                    $.ajax({
                        type: method,
                        url: url,
                        data: formData,
                        async: false,
                        processData: false,
                        contentType: false,
                        success: function(res) {                            
                            if(res.status==true){
								sessionStorage.setItem('toastr_message', res.msg);
								sessionStorage.setItem('toastr_type', 'success'); 
                                // toastr.success(res.msg);
                                window.location.reload();
                            }else if(res.status==false){
                                toastr.error(res.msg);
                            }                            
                        }
                    });
                });
                    
                $(document).on('submit','form#properties_form', function(e) {    
                    e.preventDefault(); 
                    
                    var url=$(this).attr('action');
                    var method=$(this).attr('method');
                    var formData = new FormData($(this)[0]);
                   
                    $.ajax({
                        type: method,
                        url: url,
                        data: formData,
                        async: false,
                        processData: false,
                        contentType: false,
                        success: function(res) {                            
                            if(res.status==true){
								sessionStorage.setItem('toastr_message', res.msg);
								sessionStorage.setItem('toastr_type', 'success'); 
                                // toastr.success(res.msg);
                                window.location.reload();
                            }else if(res.status==false){
                                toastr.error(res.msg);
                            }                            
                        }
                    });
                });

            </script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function(){
    $('#usePromo').change(function(){
        if($(this).is(':checked')) {
            $('#promo_section').show();     // Promo code div show
            $('#package_section').hide();    // Package div hide
        } else {
            $('#promo_section').hide();      // Promo code div hide
            $('#package_section').show();    // Package div show
        }
    });
});
</script>

@endsection
