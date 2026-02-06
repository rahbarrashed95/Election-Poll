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
        <h5 class="modal-title" id="staticBackdropLabel">Update Testimonial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.testimonials.update',[$item->id])}}" method="POST" id="ajax_form">
              @csrf
              @method('PATCH')
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>                               
                                <input type="text" id="name" class="form-control" name="name" placeholder="Name..." value="{{ $item->name }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="designation">Designation</label>                               
                                <input type="text" id="designation" class="form-control" name="designation" placeholder="designation..." value="{{ $item->designation }}">
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
                                <label for="image"> Image </label>
                                <input type="file" class="form-control" name="image">
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

