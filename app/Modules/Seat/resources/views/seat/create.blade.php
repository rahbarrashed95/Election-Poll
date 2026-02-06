<style>
    .form-control {
        padding: 0.70rem 1.375rem;
    }
    .modal-content {
        background: #fff;
    }
</style>
<div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create Seat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.seats.store')}}" method="POST" enctype="multipart/form-data" id="ajax_form">
                    @csrf
                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">Name</label>                               
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name..." value="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="district_id">District</label>                               
                                <select class="form-select form-select-sm select2" id="district_id" name="district_id">
                                    <option>Please Select</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                                    @endforeach                                     
                                </select> 
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

