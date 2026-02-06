@extends('backend.partials.app')
@section('content')

<style>
    .form-control {
        padding: 0.70rem 1.375rem;
    }
    .add_btn {
        height: 37px;
        padding-top: 10px;
    }
    .btn.btn-icon-text .btn-icon-append, .ajax-upload-dragdrop .btn-icon-text.ajax-file-upload .btn-icon-append {
      margin-left: 0px;
    }
    .pagination {
      float: right;
    }
    .page-link {
      color: #000;
    }
    .page-link.active, .active > .page-link {    
        background: linear-gradient(89deg, #5e7188, #3e4b5b);
        border: 1px solid gray;
    }
</style>    

<div class="page-header">
  <h3 class="page-title">Package Information </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Package</a></li>
      <li class="breadcrumb-item active" aria-current="page">Package Information</li>
    </ol>
  </nav>
</div>

<div class="row">                                 
  <div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-12">
                <div class="row">
                    <div class="modal-content">
                        <div class="row modal-body">
                            <div class="col-lg-6 property-info">
							
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
                    </div>
                </div>                                                   
            </div>                        
        </div>                   
      </div>
    </div>
  </div>
</div>   

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<script type="text/javascript">

</script>  

@endsection

