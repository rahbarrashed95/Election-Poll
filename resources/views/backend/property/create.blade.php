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
        <h5 class="modal-title" id="staticBackdropLabel">Create Property</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.property.store')}}" method="POST" enctype="multipart/form-data" id="ajax_form">
                    @csrf
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>                               
                                <input type="text" id="title" class="form-control" name="title" placeholder="Title..." value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="floor_area">Floor Area</label>                               
                                <input type="text" id="floor_area" class="form-control" name="floor_area" placeholder="Floor Area..." value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="floor_area">Property Type</label>       
                                <select class="form-select form-select-sm" id="category_id" name="cat_id">
                                    <option>Please Select</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach                                     
                                </select>                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="floor_area">Property Sub Type</label>       
                                <select class="form-select form-select-sm" id="sub_category_id" name="sub_cat_id">
                                                                 
                                </select>                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">                                
                                <label for="bed">Bed</label>     
                                <input type="text" id="bed" class="form-control" name="bed" placeholder="Enter Bed Number" value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bath">Bath</label>                                  
                                <input type="text" id="bath" class="form-control" name="bath" placeholder="Enter Bath Number " value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price"> Price </label>
                                <input type="text" id="price" class="form-control" name="price" placeholder="Enter Price" value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location"> Location </label>
                                <input type="text" id="location" class="form-control" name="location" placeholder="Enter Location" value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="location"> City </label>
                                <select id="city_id" class="form-control form-select-sm" name="city_id">
                                    <option>Please Select </option>
                                    @foreach($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->city }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="floor_area">Area</label>       
                                <select id="area_id" class="form-select form-select-sm" id="area_id" name="area_id">
                                                                 
                                </select>                                
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="landmark"> Landmark </label>
                                <input type="text" id="landmark" class="form-control" name="landmark" placeholder="Enter Landmark" value="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="reception"> Reception </label>
                                <input type="text" id="reception" class="form-control" name="reception" placeholder="Enter Reception Number" value="">
                            </div>
                        </div>    

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="video_url"> Video (Embedded Url) </label>
                                <input type="text" id="video_url" class="form-control" name="video_url" placeholder="Enter Video Url" value="">
                            </div>
                        </div>   

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="special_tags"> Special Tags </label>
                                <input type="text" id="special_tags" class="form-control" name="special_tags" placeholder="Enter Special Tags By Comma Separate" value="">
                            </div>
                        </div>    

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description"> Description </label>
                                <textarea placeholder="description" id="description" name="description" class="form-control"></textarea>
                            </div>
                        </div>                 
                       
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label>Thumb Image </label>
                                <input type="file" name="floor_plan" class="form-control">                                
                            </div>
                        </div>    
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"> Multiple Image Upload </label>
                                <input type="file" class="form-control" name="property_image[]" multiple>
                            </div>
                        </div>   
                        
                        <label for="description"> Amenities </label>
                        <div class="col-md-6">
                        
                          <div class="form-group">
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Air Condition" class="form-check-input" checked=""> Air Condition <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-success">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Lawn" class="form-check-input" checked=""> Lawn <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-info">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Swimming Pool" class="form-check-input" checked=""> Swimming Pool <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="TV Cable" class="form-check-input" checked=""> TV Cable <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-warning">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Refrigerator" class="form-check-input" checked=""> Refrigerator <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-warning">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Dryer" class="form-check-input" checked=""> Dryer <i class="input-helper"></i></label>
                            </div>
                            
                          </div>
                        </div>
                        <div class="col-md-6">                       
                          <div class="form-group">
                          <div class="form-check form-check-warning">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="WIFI" class="form-check-input" checked=""> WIFI <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-warning">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Barbeque" class="form-check-input" checked=""> Barbeque <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-primary">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Valet Trash" class="form-check-input" checked=""> Valet Trash <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-success">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Park" class="form-check-input" checked=""> Park <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-info">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Rooftop Garden" class="form-check-input" checked=""> Rooftop Garden <i class="input-helper"></i></label>
                            </div>
                            <div class="form-check form-check-danger">
                              <label class="form-check-label">
                                <input type="checkbox" name="amenities[]" value="Sporting Facilities" class="form-check-input" checked=""> Sporting Facilities <i class="input-helper"></i></label>
                            </div>
                           
                          </div>
                        </div>
                        
                    </div>
                    <br>                  
                   
                    <button type="submit" class="btn btn-gradient-primary btn-icon-text">
                    Submit </button>
                </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">  {{ __('category.close') }}</button>
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
  </script>

