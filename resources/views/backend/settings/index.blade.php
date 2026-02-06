@extends('backend.partials.app')
@section('content')
    <div class="page-header">
        <h3 class="page-title"> Settings </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Settings</li>
        </ol>
        </nav>
    </div>

    <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">                    
                    <form action="{{route('admin.business.store')}}" method="POST" enctype="multipart/form-data" id="ajax_form">
                    @csrf
                    <div class="row">
                
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('account.Site Name') }}</label>                               
                                <input type="text" id="last_name" class="form-control" name="name" placeholder="Full name..." value="{{ $item?$item->name:'' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">                                
                                <label for="name">{{ __('account.Email Address') }}</label>     
                                <input type="text" id="email" class="form-control" name="email" placeholder="Email Address" value="{{ $item?$item->email:'' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">{{ __('account.Contact Number') }}</label>                                  
                                <input type="text" id="contact" class="form-control" name="contact" placeholder="Contact Number " value="{{ $item?$item->contact:'' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alternative_conatct">{{ __('account.Contact Phone') }} </label>
                                <input type="text" id="alternative_conatct" class="form-control" name="alternative_conatct" placeholder="ALterNative Contact Number " value="{{ $item?$item->alternative_conatct:'' }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alternative_conatct"> {{ __('account.Address') }} </label>
                                <textarea placeholder="Address" name="address" class="form-control">{{ $item?$item->address:'' }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alternative_conatct"> {{ __('account.Description') }} </label>
                                <textarea placeholder="Description" name="note" class="form-control">{{ $item?$item->note:'' }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6 mb-5">                            
                            <div class="form-group">
                                <label>Logo upload</label>
                                <input type="file" name="logo" class="form-control">                                
                            </div>
                        </div>
                        
                        <div class="col-md-6 mb-5">
                            <div class="form-group">
                                <label>Favicon upload</label>
                                <input type="file" name="favicon" class="form-control">
                            </div>                           
                        </div>
                        
                    </div>
                    <br>                   
                    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>                    
                </form>
                  </div>
                </div>
              </div>
        </div>

                
@endsection

