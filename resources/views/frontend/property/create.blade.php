@extends('frontend.app')
@section('content')

    <style>
        .property-tabs {
            position: sticky;
            top: 70px;
            background: #fff;
            z-index: 999;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            text-align: center;
        }
    </style>

     <!-- Breadcrumb -->
     <div class="breadcrumb">
                <div class="container">
                    <div class="bread-crumb-head">
                        <div class="breadcrumb-title">
                            <h2>Add New Property</h2>
                        </div>
                        <div class="breadcrumb-list">
                            <ul>
                                <li><a href="{{ route('front.home') }}">Home </a></li>
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
                    <div class="property-tabs" style="display: none;">
                        <ul class="prop-tab">
							<li>
								<a href="#propertyinfo" class="active">Property Information</a>
							</li>
							<li>
								<a href="#location">Location</a>
							</li>
							<li>
								<a href="#property-details">Property Details</a>
							</li>
							<li>
								<a href="#amenities">Amenities</a>
							</li>
							<li>
								<a href="#documents">Documents</a>
							</li>
							<!--<li>-->
							<!--	<a href="#gallery">Gallery</a>-->
							<!--</li>-->
							<li>
								<a href="#videos">Videos</a>
							</li>
							<li>
								<a href="#description">Description</a>
							</li>
							<li>
								<a href="#floor-plan">Floor Plans</a>
							</li>
							
						</ul>
                    </div>

                    <form action="{{ route('front.store_owner_property') }}" method="POST" id="properties_form" enctype="multipart/form-data">
                        @csrf

					<!-- Property Information -->
					<div class="row" id="propertyinfo">
                       
						<div class="col-lg-4">                           
                            <div class="property-info">
                                <h4>Property Information</h4>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
                            </div>
						</div>
						
						<div class="col-lg-8"> 
							<div class="add-property-wrap">
                                <div class="row">
                                    
									<div class="col-md-6">
										<div class="review-form">
											<label>Property Name <span style="color: red">*</span> </label>
											<input type="text" class="form-control" name="title" placeholder="Enter Property Name">
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="review-form">
											<label> Type <span style="color: red">*</span> </label>
											<select class="form-control" name="pro_type">
											    <option>Select One</option>
												<option value="Sell">Sell</opton>
												<option value="Rent">Rent</opton>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="review-form">
											<label>Enter Description <span style="color: red">*</span> </label>
											<textarea class="form-control" name="description" rows="8" placeholder="Description"></textarea>									
										</div>
									</div>
									
									<div class="col-md-6">
										<div class="review-form">
											<label>Property Type <span style="color: red">*</span> </label>											
                                            <select id="property_type" name="cat_id" class="form-control">
                                                <option value="">Select Type</option>
                                                @foreach($property_types as $pt)
                                                    <option data-property="{{ $pt->name }}" value="{{ $pt->id }}">{{ $pt->name }}</option>
                                                @endforeach
                                            </select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="review-form">
											<label>Property Category <span style="color: red">*</span> </label>
											<select id="property_category" name="sub_cat_id" class="form-control">
												
											</select>
										</div>
									</div>
									<div class="col-md-6">
										<div class="review-form">
											<label>Rent Price <span style="color: red">*</span> </label>
											<input type="text" name="price" class="form-control" placeholder="Enter Rent Price">
										</div>
									</div>
									<div class="col-md-6">
										<div class="review-form">
											<label>Property Owner Contact Number <span style="color: red">*</span> </label>
											<input type="text" name="phone" class="form-control" placeholder="Enter Contact Number">
										</div>
									</div>
									
								</div>
                            </div>
						</div>   
					</div> 
					<!-- /Property Information -->
					
					<!-- Property location -->
					<div class="row" id="location">
						<div class="col-lg-4">                           
						   <div class="property-info">
							   <h4>Property Location</h4>
							   <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
						   </div>
					   </div>
					   
					   <div class="col-lg-8"> 
						   <div class="add-property-wrap">
							   <div class="row">
								   <div class="col-md-12">
								       <div id="map_div" class="map-container">
                                          <!--<iframe-->
                                          <!--  style="width: 100%;height: 300px;"-->
                                          <!--  id="mapFrame"-->
                                          <!--  width="600" height="450" style="border:0;"-->
                                          <!--  loading="lazy" allowfullscreen-->
                                          <!--  referrerpolicy="no-referrer-when-downgrade"-->
                                          <!--  src="">-->
                                          <!--</iframe>-->
                                        </div>
								   <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2967.8862835683544!2d-73.98256668525309!3d41.93829486962529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dd0ee3286615b7%3A0x42bfa96cc2ce4381!2s132%20Kingston%20St%2C%20Kingston%2C%20NY%2012401%2C%20USA!5e0!3m2!1sen!2sin!4v1670922579281!5m2!1sen!2sin" -->
								   <!--allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
									   <!-- <div class="review-form">
										   <label>Location</label>
										   <input type="text" name="location" class="form-control" placeholder="Enter Address">
									   </div> -->
								   </div>
								   <div class="col-md-6">
									   <div class="review-form">
										   <label>City</label>
										   <select id="city_id" name="city_id" class="form-control">
											   <option>Select City</option>
                                               @foreach($cities as $city)
											    <option value="{{ $city->id }}" data-name="{{ $city->city }}">{{ $city->city }}</option>
                                               @endforeach											   
										   </select>
									   </div>
								   </div>
								   <div class="col-md-6">
									   <div class="review-form">
										   <label>Area</label>
										   <select id="area_id" name="area_id" class="form-control">
											   
										   </select>
									   </div>
								   </div>
								   
								   <div class="col-md-6">
									   <div class="review-form">
										   <label>Address</label>
										   <input type="text" id="address" name="landmark" class="form-control" placeholder="Enter Landmark">
									   </div>
								   </div>

								   <div class="col-md-6">
									   <div class="review-form">
										   <label>Post Code (Optional)</label>
										   <input type="text" name="post_code" class="form-control" placeholder="Enter Post Code">
									   </div>
								   </div>
								   
								   <!-- <div class="col-md-12">
									<div class="review-form google-maps">
											<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2967.8862835683544!2d-73.98256668525309!3d41.93829486962529!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89dd0ee3286615b7%3A0x42bfa96cc2ce4381!2s132%20Kingston%20St%2C%20Kingston%2C%20NY%2012401%2C%20USA!5e0!3m2!1sen!2sin!4v1670922579281!5m2!1sen!2sin"  allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
										</div>
									</div> -->
							   </div>
						   </div>
					   </div>   
				   </div> 
				   <!-- /Property location -->	
					
					<!-- Property Details -->
					<div class="row" id="property-details">
						
						<div class="col-lg-4">                           
                            <div class="property-info">
                                <h4>Property Details</h4>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
                            </div>
						</div>
						
						<div class="col-lg-8"> 
							<div class="add-property-wrap">
                                <div class="row">	
                                
                                    <div class="col-md-4">
										<div class="review-form">
											<label>Area (Sqft)</label>
											<input type="text" name="floor_area" class="form-control" placeholder="Enter Area In Sqft">
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="review-form">
											<label>Advance/Deposit Amount</label>
											<input type="text" name="deposite_amount" class="form-control" placeholder="Enter Advance/Deposit Amount">
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="review-form">
											<label>Availability Date</label>
											<input type="date" name="availability_date" class="form-control">
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="review-form">
											<label>Floor Number</label>
											<select class="form-control" name="floor_no">
											     <option>Select One</option>
												<option value="1">1</opton>
												<option value="2">2</opton>
												<option value="3">3</opton>
												<option value="4">4</opton>
												<option value="5">5</opton>
												<option value="6">6</opton>
												<option value="7">7</opton>
												<option value="8">8</opton>
												<option value="9">9</opton>
												<option value="10">10</opton>											

											</select>
											<!-- <input type="text" name="bed" class="form-control" placeholder="Enter Value"> -->
										</div>
									</div>
									
									<div class="col-md-4 bedrooms">
										<div class="review-form">
											<label>Number of Bedrooms</label>
											<select class="form-control" name="bed">
											     <option>Select One</option>
												<option value="1">1</opton>
												<option value="2">2</opton>
												<option value="3">3</opton>
												<option value="4">4</opton>
												<option value="5">5</opton>
												<option value="6">6</opton>
												<option value="7">7</opton>
												<option value="8">8</opton>
												<option value="9">9</opton>
												<option value="10">10</opton>											

											</select>
											<!-- <input type="text" name="bed" class="form-control" placeholder="Enter Value"> -->
										</div>
									</div>
									<div class="col-md-4 bathrooms">
										<div class="review-form">
											<label>Number of Bathrooms</label>
											<select class="form-control" name="bath">
											     <option>Select One</option>
												<option value="1">1</opton>
												<option value="2">2</opton>
												<option value="3">3</opton>
												<option value="4">4</opton>
												<option value="5">5</opton>
												<option value="6">6</opton>
												<option value="7">7</opton>
												<option value="8">8</opton>
												<option value="9">9</opton>
												<option value="10">10</opton>											

											</select>
											<!-- <input type="text" name="bath" class="form-control" placeholder="Enter  Value"> -->
										</div>
									</div>
									
									<div class="col-md-4 belconies">
										<div class="review-form">
											<label>Number of Balconies</label>
											<select class="form-control" name="belcony">
											    <option>Select One</option>
												<option value="1">1</opton>
												<option value="2">2</opton>
												<option value="3">3</opton>
												<option value="4">4</opton>
												<option value="5">5</opton>
												<option value="6">6</opton>
												<option value="7">7</opton>
												<option value="8">8</opton>
												<option value="9">9</opton>
												<option value="10">10</opton>											

											</select>
											<!-- <input type="text" name="bed" class="form-control" placeholder="Enter Value"> -->
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="review-form">
											<label>Construction Status</label>
											<select class="form-control" name="construction_status">
											    <option>Select One</option>
												<option value="under-construction">Under Construction</opton>
												<option value="completed">Completed</opton>
												<option value="upcoming">Upcoming</opton>
											</select>
											<!-- <input type="text" name="bath" class="form-control" placeholder="Enter  Value"> -->
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="review-form">
											<label>Flooring Type</label>
											<select class="form-control" name="floor_type">
											    <option>Select One</option>
												<option value="Marble">Marble</opton>
												<option value="Tiles">Tiles</opton>
												<option value="Mosaic">Mosaic</opton>
												<option value="Cement">Cement</opton>
											</select>
											<!-- <input type="text" name="bed" class="form-control" placeholder="Enter Value"> -->
										</div>
									</div>
									
									
										<div class="col-md-6 drawing">
										<div class="review-form">
											<div class="review-form">
                                                <label>Attached with Drawing Room</label>
                                                <div style="display: flex;">
                                                    <input id="attach_drawing_room" style="width: auto;" type="radio" name="attach_drawing_room" value="separate_from_drawing_room">
                                                    <label for="attach_drawing_room" style="margin-top: 12px;margin-left: 5%;">Separate from Drawing Room</label>
                                                </div>
                                                <div style="display: flex;">
                                                    <input id="combined_drawing_dining_room" style="width: auto;" type="radio" name="attach_drawing_room" value="combined_drawing_dining_room">
                                                    <label for="combined_drawing_dining_room" style="margin-top: 12px;margin-left: 5%;">Combined Drawing & Dining Room</label>
                                                </div>
                                            </div>
										</div>
									</div>
									
									
												
									
								</div>
                            </div>
						</div>   
					</div> 
					<!-- Property Details -->
					
						<!-- Property Details -->
					<div class="row" id="property-details">
						
						<div class="col-lg-4">                           
                            <div class="property-info">
                                <h4>Utility & Bill Details</h4>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
                            </div>
						</div>
						
						<div class="col-lg-8"> 
							<div class="add-property-wrap">
                                <div class="row">				
									<div class="col-md-4">
										<div class="review-form">
											<div class="review-form">
                                                <label>Gas Facility</label>
                                                <div style="display: flex;">
                                                    <input id="gas_bill_included" style="width: auto;" type="radio" name="gas_facility" value="gas_bill_included">
                                                    <label for="gas_bill_included" style="margin-top: 12px;margin-left: 5%;">Gas Bill Included</label>
                                                </div>
                                                <div style="display: flex;">
                                                    <input id="gas_card" style="width: auto;" type="radio" name="gas_facility" value="gas_card">
                                                    <label for="gas_card" style="margin-top: 12px;margin-left: 5%;">Gas Card</label>
                                                </div>
                                                <div style="display: flex;">
                                                    <input id="cylinder" style="width: auto;" type="radio" name="gas_facility" value="cylinder">
                                                    <label for="cylinder" style="margin-top: 12px;margin-left: 5%;">Cylinder Gas</label>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="review-form">
											<div class="review-form">
                                                <label>Electricity Bill</label>
                                                <div style="display: flex;">
                                                    <input id="included_in_rents" style="width: auto;" type="radio" name="electricity_bill" value="included_in_rent">
                                                    <label for="included_in_rents" style="margin-top: 12px;margin-left: 5%;">Included In Rent</label>
                                                </div>
                                                <div style="display: flex;">
                                                    <input id="prepaid_meter" style="width: auto;" type="radio" name="electricity_bill" value="prepaid_meter">
                                                    <label for="prepaid_meter" style="margin-top: 12px;margin-left: 5%;">Pre-paid Meter</label>
                                                </div>
                                                <div style="display: flex;">
                                                    <input id="postpaid_meter" style="width: auto;" type="radio" name="electricity_bill" value="postpaid_meter">
                                                    <label for="postpaid_meter" style="margin-top: 12px;margin-left: 5%;">Post-paid Meter</label>
                                                </div>
                                            </div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="review-form">
											<div class="review-form">
                                                <label>Water Bill</label>
                                                <div style="display: flex;">
                                                    <input id="included_in_rent" style="width: auto;" type="radio" name="water_bill" value="included_in_rent">
                                                    <label for="included_in_rent" style="margin-top: 12px;margin-left: 5%;">Included In Rent</label>
                                                </div>
                                                <div style="display: flex;">
                                                    <input id="separate_bill" style="width: auto;" type="radio" name="water_bill" value="separate_bill">
                                                    <label for="separate_bill" style="margin-top: 12px;margin-left: 5%;">Separate Bill</label>
                                                </div>
                                            </div>
											<!-- <input type="text" name="bed" class="form-control" placeholder="Enter Value"> -->
										</div>
									</div>
								</div>
                            </div>
						</div>   
					</div> 
					<!-- Property Details -->
					
					<!-- Amenities -->
					<div class="row" id="amenities">
						
						<div class="col-lg-4">                           
                            <div class="property-info">
                                <h4>Amenities</h4>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
                            </div>
						</div>
						
						<div class="col-lg-8"> 
							<div class="add-property-wrap">
                                <div id="amenities_div" class="row">
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Air Conditioning" checked>-->
                                    <!--            <span class="checkmark"></span>-->
                                    <!--            <img width="20" height="20" src="https://img.icons8.com/windows/20/air-conditioner.png" alt="air-conditioner"/>-->
                                    <!--            <span style="margin-left: 7px;color: #000;">Air Conditioning</span>  -->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Lawn" checked>-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/external-vitaliy-gorbachev-lineal-vitaly-gorbachev/20/external-lawn-camping-vitaliy-gorbachev-lineal-vitaly-gorbachev.png" alt="external-lawn-camping-vitaliy-gorbachev-lineal-vitaly-gorbachev"/> <span style="margin-left: 7px;color: #000;"> Lawn </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Swimming Pool">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/swimming-pool.png" alt="swimming-pool"/> <span style="margin-left: 7px;color: #000;"> Swimming Pool </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Barbeque">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/barbeque.png" alt="barbeque"/> <span style="margin-left: 7px;color: #000;"> Barbeque </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Microwave" checked>-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/microwave.png" alt="microwave"/> <span style="margin-left: 7px;color: #000;"> Microwave </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="TV Cable">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/network-cable.png" alt="network-cable"/> <span style="margin-left: 7px;color: #000;"> TV Cable </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Dryer">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/hair-dryer.png" alt="hair-dryer"/> <span style="margin-left: 7px;color: #000;"> Dryer </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Parks">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/national-park.png" alt="national-park"/>  <span style="margin-left: 7px;color: #000;"> Parks </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Sporting Facilities" checked>-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/basketball-2.png" alt="basketball-2"/>  <span style="margin-left: 7px;color: #000;"> Sporting Facilities </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Valet Trash">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/trash--v1.png" alt="trash--v1"/> <span style="margin-left: 7px;color: #000;"> Valet Trash </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-4">-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Refrigerator">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/fridge.png" alt="fridge"/> <span style="margin-left: 7px;color: #000;"> Refrigerator </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="WiFi" checked>-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios-filled/20/wifi-logo.png" alt="wifi-logo"/> <span style="margin-left: 7px;color: #000;"> WiFi </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Laundry">-->
                                    <!--            <span class="checkmark"></span> <img width="20" height="20" src="https://img.icons8.com/ios/20/laundry-bag.png" alt="laundry-bag"/> <span style="margin-left: 7px;color: #000;"> Laundry </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--    <div class="review-form">-->
                                    <!--        <label class="custom_check mb-0">-->
                                    <!--            <input type="checkbox" name="amenities[]" value="Rooftop Gardens" checked>-->
                                    <!--            <span class="checkmark"></span> <img width="30" height="30" src="https://img.icons8.com/external-filled-color-icons-papa-vector/30/external-Rooftop-Recreational-Area-workplace-wellness-filled-color-icons-papa-vector.png" alt="external-Rooftop-Recreational-Area-workplace-wellness-filled-color-icons-papa-vector"/> <span style="margin-left: 7px;color: #000;"> Rooftop Gardens </span>-->
                                    <!--        </label>-->
                                    <!--    </div>-->
                                    <!--</div>-->
								</div>
                            </div>
						</div>   
					</div> 
					<!-- /Amenities -->

					<!-- Property Documents -->
					<div class="row" id="documents">
						<div class="col-lg-4">                           
                            <div class="property-info">
                                <h4>Property Images</h4>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
                            </div>
						</div>
						<div class="col-lg-8"> 
							<div class="add-property-wrap">
                                <div class="row">
                                    
                                    <div class="col-md-8">
										<!--<div class="review-form">-->
										<!--	<label>Property Thumbnail Image</label>-->
										<!--	<input type="file" name="thumb_img" class="form-control">-->
										<!--</div>-->
										<div class="review-form">
											<label>Property Multi Image</label>
											<input type="file" name="property_image[]" multiple class="form-control" required>
										</div>
									</div> 
									
									<div class="col-md-8">
										<div class="review-form">
											<label>Property Floor Plan</label>
											<input type="file" name="floor_plan" class="form-control">
										</div>
									</div>
									
									<!--<div class="col-md-12">-->
									<!--	<div class="upload-list">-->
									<!--		<ul>-->
									<!--			<li>Maximum number of files upload will be 5 files.</li>-->
									<!--		</ul>-->
											<!-- <p><i class="bx bx-check-double"></i>Document uploaded successfully</p> -->
									<!--	</div>-->
									<!--</div>-->
									
								</div>
                            </div>
						</div>   
					</div> 
					<!-- /Property Documents -->

					<!-- Property gallery -->
					<!--<div class="row" id="gallery">-->
					<!--	<div class="col-lg-4">                           -->
     <!--                       <div class="property-info">-->
     <!--                           <h4>Property Gallery</h4>-->
					<!--			 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
     <!--                       </div>-->
					<!--	</div>-->
					<!--	<div class="col-lg-8"> -->
					<!--		<div class="add-property-wrap">-->
     <!--                           <div class="row">									-->
					<!--				<div class="col-md-8">-->
					<!--					<div class="review-form">-->
					<!--						<label>Property Multi Image</label>-->
					<!--						<input type="file" name="property_image[]" multiple class="form-control">-->
					<!--					</div>-->
					<!--				</div>-->
					<!--				 <div class="col-md-4">-->
					<!--					<div class="review-form">-->
					<!--						<label class="d-none d-md-block">&nbsp;</label>-->
					<!--						<button class="btn btn-primary btn-upload"><i class="bx bx-cloud-upload"></i>Upload Photos</button>-->
					<!--					</div>-->
					<!--				</div>-->
					<!--				<div class="col-md-12">-->
					<!--					<div class="upload-list">-->
					<!--						<ul>-->
					<!--							<li>The maximum photo size is 8 MB. Formats: jpeg, jpg, png. Put the main picture first</li>-->
					<!--							<li>Maximum number of files upload will be 10 files.</li>-->
					<!--						</ul>-->
					<!--						 <p><i class="bx bx-check-double"></i>Photo uploaded successfully</p> -->
					<!--					</div>-->
					<!--				</div>-->
					<!--			</div>-->
     <!--                       </div>-->
					<!--	</div>   -->
					<!--</div> -->
					<!-- /Property gallery 

					<!-- Property Video -->
					<div class="row" id="videos">
						<div class="col-lg-4">                           
                            <div class="property-info">
                                <h4>Property Video</h4>
								<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p> -->
                            </div>
						</div>
						<div class="col-lg-8"> 
							<div class="add-property-wrap">
                                <div class="row">
									<div class="col-md-8">
										<div class="review-form">
											<label>Select Video File </label>
											<input type="file" name="video_url" accept="video/*">
										</div>
									</div>
									<!--<div class="col-md-8">-->
									<!--	<div class="review-form">-->
									<!--		<label class="d-none d-md-block">&nbsp;</label>-->
									<!--		<input type="text" class="form-control" placeholder="Enter Video Link">-->
									<!--	</div>-->
									<!--</div>-->
								</div>
                            </div>
						</div>   
					</div> 
					<!-- /Property Video -->
					
					<!-- Property Description -->
					<div class="row" id="description">
						<!-- <div class="col-lg-4">                           
                            <div class="property-info">
                                <h4>Description</h4>
								<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's</p>
                            </div>
						</div>
						<div class="col-lg-8"> 
							<div class="add-property-wrap">
                                <div class="row">
									<div class="col-md-12">
										<div class="review-form">
											<label>Enter Description of Property</label>
											<textarea class="form-control" name="description" rows="8" placeholder="Description"></textarea>
										</div>
									</div>
								</div>
                            </div>
						</div>    -->
					</div> 
					<!-- Property Description -->			
					

					

				   <!-- Property location -->
					<div class="row">
						<div class="col-md-12">                           
						   <div class="property-submit">							 
							  <button type="submit" class="btn btn-primary">Add Property</button>
						   </div>
					   </div>
					</div>
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
                    let property = $(this).find(':selected').data('property');
                    
                    if(property == 'Commercial'){
                       $('.bedrooms').hide(); 
                       $('.bathrooms').hide(); 
                       $('.belconies').hide(); 
                       $('.drawing').hide(); 
                    } else{
                       $('.bedrooms').show(); 
                       $('.bathrooms').show(); 
                       $('.belconies').show(); 
                       $('.drawing').show(); 
                    }
                    
                    let cat_id = $(this).val();
                    $.ajax({
                        url: "{{ route('front.get_property_cats') }}",
                        method: "GET",
                        data: {cat_id},
                        success: function(res){
                            if(res.status){
                                $('select#property_category').html(res.html_data);
                                $('div#amenities_div').html(res.amenities_html_view);
                            }
                        }
                    });
                    
                    });
                });
                
                let selectedCity = '';
                let selectedArea = '';
                const apiKey = 'AIzaSyDqzGcjUF26pJWvWma1kCdNj5hYGYrkuDw';

                $(document).on('change','select#city_id',
                    function(){
                        const city_id = $(this).val();
                        let cityName = $(this).find(':selected').data('name');
                        selectedCity = cityName;
              
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
                    updateMap();
                });
                
                $(document).on('change', '#area_id', function () {
                    let areaName = $(this).find(':selected').data('name');
                    selectedArea = areaName;
                    updateMap(); // show city + area map
                });
                
                $(document).on('keyup', '#address', function () {
                    updateMap(); // show city + area + address map
                });
                
                function updateMap() {
                    const address = $('#address').val();
                    let fullAddress = selectedCity;
                    if (selectedArea) fullAddress += ', ' + selectedArea;
                    if (address) fullAddress += ', ' + address;
                
                    const encodedAddress = encodeURIComponent(fullAddress);
                    // alert(encodedAddress);
                    const url = `https://www.google.com/maps/embed/v1/place?key=${apiKey}&q=${encodedAddress}`;
                
                    const iframe = `
                        <iframe
                            style="width: 100%;height: 300px;"
                            id="mapFrame"
                            width="600" height="450" style="border:0;"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="${url}">
                        </iframe>
                    `;
                
                    $('#map_div').html(iframe);
                }
                    
        //         $(document).on('submit','form#properties_form', function(e) {    
        //             e.preventDefault(); 
                    
        //             var url=$(this).attr('action');
        //             var method=$(this).attr('method');
        //             var formData = new FormData($(this)[0]);
                   
        //             $.ajax({
        //                 type: method,
        //                 url: url,
        //                 data: formData,
        //                 async: false,
        //                 processData: false,
        //                 contentType: false,
        //                 success: function(res) {                            
        //                     if(res.status==true){
								// sessionStorage.setItem('toastr_message', res.msg);
								// sessionStorage.setItem('toastr_type', 'success'); 
        //                         // toastr.success(res.msg);
        //                         window.location.reload();
        //                     }else if(res.status==false){
        //                         toastr.error(res.msg);
        //                     }                            
        //                 },
        //                 error:function (response){
        //                     $.each(response.responseJSON.errors,function(field_name,error){
        //                         $(document).find('[name='+field_name+']').after('<span style="color:red">' +error+ '</span>')
        //                         toastr.error(error);
        //                     })
        //                 }
        //             });
        //         });
        
                // $(document).on('submit','form#properties_form', function(e) {    
                //     e.preventDefault(); 
                    
                //     var $form = $(this);
                //     var $submitBtn = $form.find('button[type="submit"]');
                
                //     // বাটনটি disabled করুন
                //     $submitBtn.prop('disabled', true);
                
                //     var url = $form.attr('action');
                //     var method = $form.attr('method');
                //     var formData = new FormData($form[0]);
                   
                //     $.ajax({
                //         type: method,
                //         url: url,
                //         data: formData,
                //         async: false,
                //         processData: false,
                //         contentType: false,
                //         success: function(res) {                            
                //             if(res.status == true){
                //                 sessionStorage.setItem('toastr_message', res.msg);
                //                 sessionStorage.setItem('toastr_type', 'success'); 
                //                 window.location.reload();
                //             } else if(res.status == false){
                //                 toastr.error(res.msg);
                //                 $submitBtn.prop('disabled', false); // যদি error আসে, আবার enable
                //             }                            
                //         },
                //         error: function (response){
                //             $.each(response.responseJSON.errors, function(field_name, error){
                //                 $form.find('[name='+field_name+']').after('<span style="color:red">' +error+ '</span>');
                //                 toastr.error(error);
                //             });
                //             $submitBtn.prop('disabled', false); // validation error এ enable
                //         }
                //     });
                // });
                
                $(document).on('submit','form#properties_form', function(e) {    
                    e.preventDefault(); 
                    
                    var $form = $(this);
                    var $submitBtn = $form.find('button[type="submit"]');
                
                    // বাটনটি অবিলম্বে disabled
                    $submitBtn.prop('disabled', true);
                
                    // UI freeze এড়াতে Ajax trigger setTimeout এ
                    setTimeout(function() {
                        var url = $form.attr('action');
                        var method = $form.attr('method');
                        var formData = new FormData($form[0]);
                
                        $.ajax({
                            type: method,
                            url: url,
                            data: formData,
                            processData: false,
                            contentType: false,
                            success: function(res) {                            
                                if(res.status == true){
                                    sessionStorage.setItem('toastr_message', res.msg);
                                    sessionStorage.setItem('toastr_type', 'success'); 
                                    window.location.reload();
                                } else if(res.status == false){
                                    toastr.error(res.msg);
                                    $submitBtn.prop('disabled', false); // আবার enable
                                }                            
                            },
                            error: function (response){
                                $.each(response.responseJSON.errors, function(field_name, error){
                                    $form.find('[name='+field_name+']').after('<span style="color:red">' +error+ '</span>');
                                    toastr.error(error);
                                });
                                $submitBtn.prop('disabled', false); // validation error এ enable
                            }
                        });
                    }, 10); // 10ms delay, UI refresh আগে button disable হবে
                });
                
                $(document).on('keypress','#address', function(){
                    const address = encodeURIComponent($(this).val());
                    // if (!address) return alert('Enter address');
                    const url = `https://www.google.com/maps/embed/v1/place?key=${apiKey}&q=${address}`;
                    const iframe = `<iframe
                                    style="width: 100%;height: 300px;"
                                    id="mapFrame"
                                    width="600" height="450" style="border:0;"
                                    loading="lazy" allowfullscreen
                                    referrerpolicy="no-referrer-when-downgrade"
                                    src="${url}">
                                  </iframe>`;
                    $('#map_div').html(iframe);
                });
            </script>

@endsection
