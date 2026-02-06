
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
        <h5 class="modal-title" id="staticBackdropLabel">Edit Package</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('admin.packages.update',[$item->id])}}" method="POST" enctype="multipart/form-data" id="ajax_form">
                    @csrf
                    @method('PATCH')
                    <div class="row">                                           
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label >{{ __('Package Name') }}</label>
                                <input type="text" class="form-control" name="name" value="{{ $item->name }}" placeholder="Enter Package Name...">
                            </div>
                        </div>
                    
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label >{{ __('Package Price') }}</label>
                                <input type="text" id="price" class="form-control" name="price" value="{{ $item->price }}" placeholder="Enter Price...">
                                
                            </div>
                        </div> 
                        
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label >Number Of Property</label>
                                <input type="text" id="price" class="form-control" name="no_of_property" value="{{ $item->no_of_property }}" placeholder="Enter No Of Property...">
                                
                            </div>
                        </div> 

                        <div class="col-md-12 mb-2" style="display: none;">
                            <div class="form-group">
                                <label > {{ __('page.Description') }} </label>
                                <textarea class="form-control" id="description" name="description"> {{ $item->description }} </textarea>
                            </div>
                        </div>  
                        
                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label > {{ __('Short Description') }} </label>
                                <textarea class="form-control" id="details" name="details">{{ $item->details }}</textarea>
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
    $("#title").on("focusout",function(e){
        $("#slug").val(convertToSlug($(this).val()));
    });
    
    function convertToSlug(Text){
        return Text
            .toLowerCase()
            .replace(/[^\w ]+/g,'')
            .replace(/ +/g,'-');
    }
    
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

CKEDITOR.replace('details', {
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
