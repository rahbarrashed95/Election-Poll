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
        <h5 class="modal-title" id="staticBackdropLabel">Edit Sub Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.sub-categories.update',[$item->id])}}" method="POST" enctype="multipart/form-data" id="ajax_form">
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
                                <label for="name">Property Category</label>                               
                                <select class="form-select form-select-sm" name="category_id">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" {{ ($cat->id == $item->category_id) ? 'selected' : '' }} >{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>                       
                                    
                        <div class="col-md-6">                            
                            <div class="form-group">
                                <label>image</label>
                                <input type="file" name="image" class="form-control">                                
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
  </script>