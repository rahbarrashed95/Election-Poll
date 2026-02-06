@extends('frontend.app')
@section('content')

            <!-- Breadcrumb -->
            <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Profile</h2>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('front.home') }}">Home </a></li>
                                <li>Profile</li>
                            </ul>
                        </div>
                    </div>
                    <div class="breadcrumb-border-img">
                        <img src="{{asset('public/frontend/assets/img/bg/line-bg.png')}}" alt="Line Image">
                    </div>
                </div>
            </div>
            <!-- Breadcrumb -->

            <!-- Detail View Section -->
            <section class="buy-detailview">
                <div class="container" style="padding-left: 0px;">
					<!-- Details -->
                    <div class="row align-items-center page-head">
                        <div class="col-lg-12">
                            <form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">
                                @csrf
                                <div class="collapse-card sidebar-card" style="">
    								<div id="review" class="card-collapse collapse show  collapse-view" style="padding-top: 0px;">
    									<div class="review-card">
    										<div class="property-review">
    										    <div class="row">
    										        <div class="col-md-7" style="display: flex;gap: 30px;">
    										            <div class="img_div">
    										                <img 
    										                style="background: #4267B2;border-radius: 50%;height: 85px;width: 85px;"
    										                src="{{ asset('public/backend/user/'.$user->image) }}">
    										            </div>
    										            <div class="txt_div">
    										                <h4>{{ $user->name }}</h4>
    										                <p style="margin-bottom: 0px;color: #000;">{{ $user->user_type }}</p>
    										                <p style="color: #000;">{{ $user->address }}, {{ $user->city }}</p>
    										            </div>
    										        </div>
    										        <div class="col-md-5"></div>
    										    </div>
    											<!--<h5 class="card-title">Profile</h5>-->
    											<!--<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
    											<!--    @csrf-->
    											<!--	<div class="row">-->
    												    
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    													
    											<!--		<div class="col-md-12">-->
    											<!--			<div class="review-form submit-btn">-->
    											<!--				<button type="submit" class="btn-primary">Update</button>-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--	</div>-->
    											<!--</form>-->
    										</div>
    									</div>
    								</div>
    							</div>
                                <div class="collapse-card sidebar-card" style="">
    								<div id="review" class="card-collapse collapse show  collapse-view" style="padding-top: 0px;">
    									<div class="review-card">
    										<div class="property-review">
    										    <div class="row">
    										        <h3>Personal Information</h3>
    										        <hr/>
    										        <div class="row">
    												    
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="password" class="form-control" placeholder="Enter New Password">
    														</div>
    													</div>
    													
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="phone" class="form-control" placeholder="Your Phone" value="{{$user->phone}}">
    														</div>
    													</div>
    													
    													<div class="col-md-6">
    														<div class="review-form">
    														    <select class="form-control" name="user_type">
    														        <option>Select User Type</option>
    														        <option value="buyer" {{ $user->user_type == 'buyer' ? 'selected' : '' }} >Buyer</option>
    														        <option value="seller" {{ $user->user_type == 'seller' ? 'selected' : '' }} >Seller</option>
    														        <option value="renter" {{ $user->user_type == 'renter' ? 'selected' : '' }} >Renter</option>
    														    </select>
    														</div>
    													</div>
    													
    													<div class="col-md-6">
    														<div class="review-form">
    														    <input type="file" name="image">
    														</div>
    													</div>
    												</div>
    										        <div class="col-md-5"></div>
    										    </div>
    											<!--<h5 class="card-title">Profile</h5>-->
    											<!--<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
    											<!--    @csrf-->
    											<!--	<div class="row">-->
    												    
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    													
    											<!--		<div class="col-md-12">-->
    											<!--			<div class="review-form submit-btn">-->
    											<!--				<button type="submit" class="btn-primary">Update</button>-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--	</div>-->
    											<!--</form>-->
    										</div>
    									</div>
    								</div>
    							</div>
                                <div class="collapse-card sidebar-card" style="">
    								<div id="review" class="card-collapse collapse show  collapse-view" style="padding-top: 0px;">
    									<div class="review-card">
    										<div class="property-review">
    										    <div class="row">
    										        <h3>Address</h3>
    										        <hr/>
    										        <div class="row">
    												    
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="city" class="form-control" placeholder="City" value="{{ $user->city }}">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="address" class="form-control" placeholder="Address" value="{{ $user->address }}">
    														</div>
    													</div>
    												</div>
    										        <div class="col-md-5"></div>
    										    </div>
    											<!--<h5 class="card-title">Profile</h5>-->
    											<!--<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
    											<!--    @csrf-->
    											<!--	<div class="row">-->
    												    
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    													
    											<!--		<div class="col-md-12">-->
    											<!--			<div class="review-form submit-btn">-->
    											<!--				<button type="submit" class="btn-primary">Update</button>-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--	</div>-->
    											<!--</form>-->
    										</div>
    									</div>
    								</div>
    							</div>
    							<div class="col-md-3">
    								<div class="review-form submit-btn">
    									<button type="submit" class="btn-primary">Update</button>
    								</div>
    							</div>
							</form>
                        </div>
                    </div>
					<!-- /Details -->

                </div>
     <!--           <div class="container">-->
					<!-- Details -->
     <!--               <div class="row align-items-center page-head">-->
     <!--                   <div class="col-lg-8 offset-lg-2">-->
     <!--                       <div class="collapse-card sidebar-card" style="">-->
					<!--											<div id="review" class="card-collapse collapse show  collapse-view">-->
					<!--				<div class="review-card">-->
					<!--					<div class="property-review">-->
					<!--						<h5 class="card-title">Profile</h5>-->
											
					<!--							<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
					<!--						    @csrf-->
					<!--							<div class="row">-->
												    
					<!--								<div class="col-md-6">-->
					<!--									<div class="review-form">-->
					<!--										<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
					<!--									</div>-->
					<!--								</div>-->
					<!--								<div class="col-md-6">-->
					<!--									<div class="review-form">-->
					<!--										<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
					<!--									</div>-->
					<!--								</div>-->
					<!--								<div class="col-md-6">-->
					<!--									<div class="review-form">-->
					<!--										<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
					<!--									</div>-->
					<!--								</div>-->
					<!--								<div class="col-md-6">-->
					<!--									<div class="review-form">-->
					<!--										<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
					<!--									</div>-->
					<!--								</div>-->
													
					<!--								<div class="col-md-12">-->
					<!--									<div class="review-form submit-btn">-->
					<!--										<button type="submit" class="btn-primary">Update</button>-->
					<!--									</div>-->
					<!--								</div>-->
					<!--							</div>-->
					<!--						</form>-->
											
											
											<!--<form action="{{ route('front.store_contact') }}" method="POST" id="contact_form">-->
											<!--    @csrf-->
											<!--	<div class="row">-->
												    
											<!--		<div class="col-md-6">-->
											<!--			<div class="review-form">-->
											<!--				<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
											<!--			</div>-->
											<!--		</div>-->
											<!--		<div class="col-md-6">-->
											<!--			<div class="review-form">-->
											<!--				<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
											<!--			</div>-->
											<!--		</div>-->
											<!--		<div class="col-md-6">-->
											<!--			<div class="review-form">-->
											<!--				<input type="text" name="password" class="form-control" placeholder="Your Password">-->
											<!--			</div>-->
											<!--		</div>-->
													
											<!--		<div class="col-md-12">-->
											<!--			<div class="review-form submit-btn">-->
											<!--				<button type="submit" class="btn-primary">Submit Review</button>-->
											<!--			</div>-->
											<!--		</div>-->
											<!--	</div>-->
											<!--</form>-->
					<!--					</div>-->
					<!--				</div>-->
					<!--			</div>-->
					<!--		</div>-->
     <!--                   </div>-->
     <!--               </div>-->
					<!-- /Details -->

     <!--           </div>-->
            </section>
			<!-- /Detail View Section -->
			<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
            <script type="text/javascript">
            
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
				
				// $(document).on('submit','form#profile_form', function(e) {    
    //     e.preventDefault(); 
        
    //     var url=$(this).attr('action');
    //     var method=$(this).attr('method');
    //     var formData = new FormData($(this)[0]);
       
    //     $.ajax({
    //         type: method,
    //         url: url,
    //         data: formData,
    //         async: false,
    //         processData: false,
    //         contentType: false,
    //         success: function(res) {                            
    //             if(res.status==true){
				// 	sessionStorage.setItem('toastr_message', res.msg);
				// 	sessionStorage.setItem('toastr_type', 'success'); 
    //                 // toastr.success(res.msg);
    //                 window.location.reload();
    //             }else if(res.status==false){
    //                 toastr.error(res.msg);
    //             }                            
    //         },
    //         error:function (response){
    //             $.each(response.responseJSON.errors,function(field_name,error){
    //                 $(document).find('[name='+field_name+']').after('<span style="color:red">' +error+ '</span>')
    //                 toastr.error(error);
    //             })
    //         }
    //     });
    // });
            
                $(document).on('submit','form#contact_form', function(e) {    
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
            	
            	$(document).on('submit','form#profile_form', function(e) {    
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
            },
            error:function (response){
                $.each(response.responseJSON.errors,function(field_name,error){
                    $(document).find('[name='+field_name+']').after('<span style="color:red">' +error+ '</span>')
                    toastr.error(error);
                })
            }
        });
    });
            	
            </script>
@endsection

			