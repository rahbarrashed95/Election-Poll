<style>
    .form-control {
        padding: 0.70rem 1.375rem;
    }
    .modal-content {
        background: #fff;
    }
</style>
<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit Property</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.property.update',[$item->id])}}" method="POST" enctype="multipart/form-data" id="ajax_form">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <h4>Property Information</h4>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Property Name</label>                               
                                <input type="text" id="title" class="form-control" name="title" placeholder="Title..." value="{{ $item->title }}">
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description"> Description </label>
                                <textarea placeholder="description" id="description" name="description" class="form-control">{!! $item->description !!}</textarea>
                            </div>
                        </div> 

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="floor_area">Property Type</label>       
                                <select class="form-select form-select-sm" id="category_id" name="cat_id">
                                    <option>Please Select</option>
                                    @foreach($categories as $cat)
                                        <option data-property="{{ $cat->name }}" value="{{ $cat->id }}" {{ ($cat->id == $item->cat_id) ? 'selected' : '' }} >{{ $cat->name }}</option>
                                    @endforeach                                     
                                </select>                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="floor_area">Property Category</label>       
                                <select class="form-select form-select-sm" id="sub_category_id" name="sub_cat_id">
                                     
                                </select>                                
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price"> Rent Price </label>
                                <input type="text" id="price" class="form-control" name="price" placeholder="Enter Price" value="{{ $item->price }}">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone"> Property Owner Contact Number </label>
                                <input type="text" id="phone" class="form-control" name="phone" placeholder="Enter Contact Number" value="{{ $item->phone }}">
                            </div>
                        </div>
                        
                        <h4>Property Details</h4>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="floor_area">Area (Sqft)</label>       
                                <input type="text" id="floor_area" class="form-control" name="floor_area" placeholder="Enter Area In Sqft" value="{{ $item->floor_area }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label for="bed">Advance/Deposite Amount</label>     
                                <input type="text" id="deposite_amount" class="form-control" name="deposite_amount" placeholder="Enter Advance/Deposite Amount" value="{{ $item->deposite_amount }}">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label for="bed">Available Date</label>     
                                <input type="date" id="availability_date" class="form-control" name="availability_date" placeholder="Enter Bed Number" value="{{ $item->availability_date }}">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label for="bed">Floor Number</label>     
                                <select id="floor_no" class="form-select form-select-sm" name="floor_no">
                                    <option value="1" {{ $item->floor_no == '1' ? 'selected' : '' }} >1</option>
                                    <option value="2" {{ $item->floor_no == '2' ? 'selected' : '' }} >2</option>
                                    <option value="3" {{ $item->floor_no == '3' ? 'selected' : '' }} >3</option>
                                    <option value="4" {{ $item->floor_no == '4' ? 'selected' : '' }} >4</option>
                                    <option value="5" {{ $item->floor_no == '5' ? 'selected' : '' }} >5</option>
                                    <option value="6" {{ $item->floor_no == '6' ? 'selected' : '' }} >6</option>
                                    <option value="7" {{ $item->floor_no == '7' ? 'selected' : '' }} >7</option>
                                    <option value="8" {{ $item->floor_no == '8' ? 'selected' : '' }} >8</option>
                                    <option value="9" {{ $item->floor_no == '9' ? 'selected' : '' }} >9</option>
                                    <option value="10" {{ $item->floor_no == '10' ? 'selected' : '' }} >10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 bedrooms">
                            <div class="form-group">                                
                                <label for="bed">Number Of Bedrooms</label>     
                                <select id="bed" class="form-select form-select-sm" name="bed">
                                    <option value="1" {{ $item->bed == '1' ? 'selected' : '' }} >1</option>
                                    <option value="2" {{ $item->bed == '2' ? 'selected' : '' }} >2</option>
                                    <option value="3" {{ $item->bed == '3' ? 'selected' : '' }} >3</option>
                                    <option value="4" {{ $item->bed == '4' ? 'selected' : '' }} >4</option>
                                    <option value="5" {{ $item->bed == '5' ? 'selected' : '' }} >5</option>
                                    <option value="6" {{ $item->bed == '6' ? 'selected' : '' }} >6</option>
                                    <option value="7" {{ $item->bed == '7' ? 'selected' : '' }} >7</option>
                                    <option value="8" {{ $item->bed == '8' ? 'selected' : '' }} >8</option>
                                    <option value="9" {{ $item->bed == '9' ? 'selected' : '' }} >9</option>
                                    <option value="10" {{ $item->bed == '10' ? 'selected' : '' }} >10</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4 bathrooms">
                            <div class="form-group">                                
                                <label for="bed">Number Of Bathrooms</label>     
                                <select id="bath" class="form-select form-select-sm" name="bath">
                                    <option value="1" {{ $item->bath == '1' ? 'selected' : '' }} >1</option>
                                    <option value="2" {{ $item->bath == '2' ? 'selected' : '' }} >2</option>
                                    <option value="3" {{ $item->bath == '3' ? 'selected' : '' }} >3</option>
                                    <option value="4" {{ $item->bath == '4' ? 'selected' : '' }} >4</option>
                                    <option value="5" {{ $item->bath == '5' ? 'selected' : '' }} >5</option>
                                    <option value="6" {{ $item->bath == '6' ? 'selected' : '' }} >6</option>
                                    <option value="7" {{ $item->bath == '7' ? 'selected' : '' }} >7</option>
                                    <option value="8" {{ $item->bath == '8' ? 'selected' : '' }} >8</option>
                                    <option value="9" {{ $item->bath == '9' ? 'selected' : '' }} >9</option>
                                    <option value="10" {{ $item->bath == '10' ? 'selected' : '' }} >10</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-4 belconies">
                            <div class="form-group">                                
                                <label for="bed">Number Of Belconies</label>     
                                <select id="belcony" class="form-select form-select-sm" name="belcony">
                                    <option value="1" {{ $item->belcony == '1' ? 'selected' : '' }} >1</option>
                                    <option value="2" {{ $item->belcony == '2' ? 'selected' : '' }} >2</option>
                                    <option value="3" {{ $item->belcony == '3' ? 'selected' : '' }} >3</option>
                                    <option value="4" {{ $item->belcony == '4' ? 'selected' : '' }} >4</option>
                                    <option value="5" {{ $item->belcony == '5' ? 'selected' : '' }} >5</option>
                                    <option value="6" {{ $item->belcony == '6' ? 'selected' : '' }} >6</option>
                                    <option value="7" {{ $item->belcony == '7' ? 'selected' : '' }} >7</option>
                                    <option value="8" {{ $item->belcony == '8' ? 'selected' : '' }} >8</option>
                                    <option value="9" {{ $item->belcony == '9' ? 'selected' : '' }} >9</option>
                                    <option value="10" {{ $item->belcony == '10' ? 'selected' : '' }} >10</option>
                                </select>
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label for="bed">Construction Status</label>     
                                <select id="construction_status" class="form-select form-select-sm" name="construction_status">
                                    <option value="Under Construction" {{ $item->belcony == 'Under Construction' ? 'selected' : '' }} >Under Construction</option>
                                    <option value="Completed" {{ $item->construction_status == 'Completed' ? 'selected' : '' }} >Completed</option>
                                    <option value="Upcoming" {{ $item->construction_status == 'Upcoming' ? 'selected' : '' }} >Upcoming</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">                                
                                <label for="bed">Flooring Type</label>     
                                <select id="floor_type" class="form-select form-select-sm" name="floor_type">
                                    <option value="Marble" {{ $item->floor_type == 'Marble' ? 'selected' : '' }} >Marble</option>
                                    <option value="Tiles" {{ $item->floor_type == 'Tiles' ? 'selected' : '' }} >Tiles</option>
                                    <option value="Mosaic" {{ $item->floor_type == 'Mosaic' ? 'selected' : '' }} >Mosaic</option>
                                    <option value="Cement" {{ $item->floor_type == 'Cement' ? 'selected' : '' }} >Cement</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-12 drawing">
						    <div class="form-group">
                                <label>Attached with Drawing Room</label>
                                <div style="display: flex;">
                                    <input id="attach_drawing_room" style="width: auto;" type="radio" name="attach_drawing_room" value="separate_from_drawing_room"
                                    {{ $item->attach_drawing_room == 'separate_from_drawing_room' ? 'checked' : '' }}>
                                    <label for="attach_drawing_room" style="margin-top: 12px;margin-left: 2%;">Separate from Drawing Room</label>
                                </div>
                                <div style="display: flex;">
                                    <input id="combined_drawing_dining_room" style="width: auto;" type="radio" name="attach_drawing_room" value="combined_drawing_dining_room"
                                    {{ $item->attach_drawing_room == 'combined_drawing_dining_room' ? 'checked' : '' }}>
                                    <label for="combined_drawing_dining_room" style="margin-top: 12px;margin-left: 2%;">Combined Drawing & Dining Room</label>
                                </div>
                            </div>
						</div>
						
						<h4>Utility & Bill Details</h4>
						
						<div class="col-md-4">
    						<div class="form-group">
                                <label>Gas Facility</label>
                                <div style="display: flex;">
                                    <input id="gas_bill_included" style="width: auto;" type="radio" name="gas_facility" value="gas_bill_included"
                                    {{ $item->gas_facility == 'gas_bill_included' ? 'checked' : '' }}>
                                    <label for="gas_bill_included" style="margin-top: 12px;margin-left: 5%;">Gas Bill Included</label>
                                </div>
                                <div style="display: flex;">
                                    <input id="gas_card" style="width: auto;" type="radio" name="gas_facility" value="gas_card"
                                    {{ $item->gas_facility == 'gas_card' ? 'checked' : '' }}>
                                    <label for="gas_card" style="margin-top: 12px;margin-left: 5%;">Gas Card</label>
                                </div>
                                <div style="display: flex;">
                                    <input id="cylinder" style="width: auto;" type="radio" name="gas_facility" value="cylinder"
                                    {{ $item->gas_facility == 'cylinder' ? 'checked' : '' }}>
                                    <label for="cylinder" style="margin-top: 12px;margin-left: 5%;">Cylinder Gas</label>
                                </div>
    						</div>
    					</div>
						<div class="col-md-4">
							<div class="form-group">
                                <label>Electricity Bill</label>
                                <div style="display: flex;">
                                    <input id="included_in_rents" style="width: auto;" type="radio" name="electricity_bill" value="included_in_rent"
                                    {{ $item->electricity_bill == 'included_in_rent' ? 'checked' : '' }}>
                                    <label for="included_in_rents" style="margin-top: 12px;margin-left: 5%;">Included In Rent</label>
                                </div>
                                <div style="display: flex;">
                                    <input id="prepaid_meter" style="width: auto;" type="radio" name="electricity_bill" value="prepaid_meter"
                                    {{ $item->electricity_bill == 'prepaid_meter' ? 'checked' : '' }}>
                                    <label for="prepaid_meter" style="margin-top: 12px;margin-left: 5%;">Pre-paid Meter</label>
                                </div>
                                <div style="display: flex;">
                                    <input id="postpaid_meter" style="width: auto;" type="radio" name="electricity_bill" value="postpaid_meter"
                                    {{ $item->electricity_bill == 'postpaid_meter' ? 'checked' : '' }}>
                                    <label for="postpaid_meter" style="margin-top: 12px;margin-left: 5%;">Post-paid Meter</label>
                                </div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
                                <label>Water Bill</label>
                                <div style="display: flex;">
                                    <input id="included_in_rent" style="width: auto;" type="radio" name="water_bill" value="included_in_rent"
                                    {{ $item->water_bill == 'included_in_rent' ? 'checked' : '' }}>
                                    <label for="included_in_rent" style="margin-top: 12px;margin-left: 5%;">Included In Rent</label>
                                </div>
                                <div style="display: flex;">
                                    <input id="separate_bill" style="width: auto;" type="radio" name="water_bill" value="separate_bill"
                                    {{ $item->water_bill == 'separate_bill' ? 'checked' : '' }}>
                                    <label for="separate_bill" style="margin-top: 12px;margin-left: 5%;">Separate Bill</label>
                                </div>
							</div>
						</div>
						
						<label for="description"> Amenities </label>
                        
                        
                        @php
                            $amenity_options = [
                                'Air Conditioning',
                                'Microwave',
                                'Lawn',
                                'Swimming Pool',
                                'TV Cable',
                                'Refrigerator',
                                'Dryer',
                                'WiFi',
                                'Barbeque',
                                'Valet Trash',
                                'Parks',
                                'Laundry',
                                'Rooftop Gardens',
                                'Sporting Facilities'
                            ];
                        @endphp
                        
                        @foreach($amenity_options as $key => $amenity)
                            @if($key == 3)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="amenities[]" value="{{ $amenity }}" class="form-check-input"
                                                    {{ in_array($amenity, $selected_amenities) ? 'checked' : '' }}>
                                                {{ $amenity }} <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @elseif($key == 4 && $key == 7)
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="amenities[]" value="{{ $amenity }}" class="form-check-input"
                                                    {{ in_array($amenity, $selected_amenities) ? 'checked' : '' }}>
                                                {{ $amenity }} <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="amenities[]" value="{{ $amenity }}" class="form-check-input"
                                                    {{ in_array($amenity, $selected_amenities) ? 'checked' : '' }}>
                                                {{ $amenity }} <i class="input-helper"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        
                          <!--<div class="form-group">-->
                          <!--  <div class="form-check form-check-primary">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Air Conditioning" class="form-check-input" checked=""> Air Conditioning <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-success">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Lawn" class="form-check-input" checked=""> Lawn <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-info">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Swimming Pool" class="form-check-input" checked=""> Swimming Pool <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-danger">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="TV Cable" class="form-check-input" checked=""> TV Cable <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-warning">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Refrigerator" class="form-check-input" checked=""> Refrigerator <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-warning">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Dryer" class="form-check-input" checked=""> Dryer <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                            
                          <!--</div>-->
                        
                        <div class="col-md-6">                       
                          <!--<div class="form-group">-->
                          <!--<div class="form-check form-check-warning">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="WIFI" class="form-check-input" checked=""> WIFI <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-warning">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Barbeque" class="form-check-input" checked=""> Barbeque <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-primary">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Valet Trash" class="form-check-input" checked=""> Valet Trash <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-success">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Park" class="form-check-input" checked=""> Park <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-info">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Rooftop Garden" class="form-check-input" checked=""> Rooftop Garden <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                          <!--  <div class="form-check form-check-danger">-->
                          <!--    <label class="form-check-label">-->
                          <!--      <input type="checkbox" name="amenities[]" value="Sporting Facilities" class="form-check-input" checked=""> Sporting Facilities <i class="input-helper"></i></label>-->
                          <!--  </div>-->
                           
                          <!--</div>-->
                        </div>
                        
                        <h4>Property Document</h4>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="price"> Property Multi Image </label>
                                <input type="file" name="property_image[]" multiple class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone"> Property Floor Plan </label>
                                <input type="file" name="floor_plan" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="phone"> Select Video File </label>
                                <input type="file" class="form-control" name="video_url" accept="video/*">
                            </div>
                        </div>
                        
                        <h4>Property Location</h4>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location"> City </label>
                                <select id="city_id" class="form-control form-select-sm" name="city_id">
                                    <option>Please Select </option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}" {{ ($city->id == $item->city_id) ? 'selected' : '' }} >{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location"> Area </label>
                                <select id="area_id" class="form-control form-select-sm" name="area_id">
                                    <option>Please Select </option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="landmark"> Address </label>
                                <input type="text" id="address" class="form-control" name="landmark" placeholder="Enter Landmark" value="{{ $item->landmark }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="post_code"> Post Code </label>
                                <input type="text" id="post_code" class="form-control" name="post_code" placeholder="Enter Reception Number" value="{{ $item->post_code }}">
                            </div>
                        </div>  
                    </div>
                    <br>    
                    
                    
                    <button type="submit" class="btn btn-gradient-primary btn-icon-text">
                        Submit 
                    </button>
                    
                </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">{{ __('category.close') }}</button>
      </div>
    </div>
  </div>

  <script>
  
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{ route('admin.ckeditor.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        extraPlugins: 'justify', // Include the justify plugin
        toolbar: [
            { name: 'clipboard', items: ['Cut', 'Copy', 'Paste', 'Undo', 'Redo'] },
            { name: 'editing', items: ['Scayt'] },
            { name: 'basicstyles', items: ['Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'RemoveFormat'] },
            { name: 'paragraph', items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'] },
            { name: 'insert', items: ['Image', 'Table', 'HorizontalRule', 'SpecialChar'] }
            // Add other toolbar items as needed
        ]
    });
    
    $(document).ready(function(){
        find_sub_cat();
        find_area();
    });
    
    $(document).on('change','select#category_id',function(){
        find_sub_cat();
    });
    $(document).on('change','select#city_id',function(){
        find_area();
    });
    
    function find_sub_cat(){
        let property = $('select#category_id').find(':selected').data('property');
               
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
          let cat_id = $('select#category_id').find(':selected').val();
          $.ajax({
              method: 'GET',
              url: '{{ route("admin.get_sub_cat") }}',  
              data: { cat_id },  
              success: function(res){
                if(res.status){
                  $('select#sub_category_id').html(res.html_view);
                }
              }
          });
    }
    
    function find_area(){
        let city_id = $('select#city_id').val();
        $.ajax({
            method: 'GET',
            url: '{{ route("admin.get_city") }}',  
            data: { city_id },  
            success: function(res){
                if(res.status){
                  $('select#area_id').html(res.html_view);
                }
            }
        });
    }
    
  </script>