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
        <h5 class="modal-title" id="staticBackdropLabel">Update Candidate</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.candidates.update',[$item->id])}}" method="POST" id="ajax_form">
              @csrf
              @method('PUT')
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="name">Name</label>                               
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name..." value="{{ $item->name }}">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="party">Party</label>                               
                                <input type="text" id="party" class="form-control" name="party" placeholder="Party..." value="{{ $item->party }}">
                            </div>
                        </div>  

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="division_id">Division</label>                               
                            <select class="form-select form-select-sm" id="division_id" name="division_id">
                                <option>Please Select</option>
                                @foreach($divisions as $division)
                                    <option value="{{ $division->id }}"  @if($division->id == $item->division_id) selected @endif>{{ $division->name }}</option>
                                @endforeach                                     
                            </select> 
                        </div>
                    </div>    
                    
                     <div class="col-md-4">
                            <div class="form-group">
                                <label for="district_id">District</label>                               
                                <select class="form-select form-select-sm select2" id="district_id" data-selected="{{ $item->district_id }}" name="district_id">
                                                                       
                                </select> 
                            </div>
                        </div> 
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="seat_id">Seat</label>                               
                                <select class="form-select form-select-sm select2" id="seat_id" data-selected="{{ $item->seat_id }}" name="seat_id">
                                                                       
                                </select> 
                            </div>
                        </div> 

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="image">Image</label>                               
                                <input type="file" id="image" class="form-control" name="image">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="marka_image">Marka Image</label>                               
                                <input type="file" id="marka_image" class="form-control" name="marka_image">    
                            </div>
                        </div>
   
                    </div>
                    <br>                  
                   
                    <button type="submit" class="btn btn-gradient-primary btn-icon-text">
                    Update </button>
                </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">  {{ __('category.close') }}</button>
      </div>
    </div>
  </div>
