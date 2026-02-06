<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Slider Section Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('admin.slider-section.update',[$item->id])}}" method="POST" id="ajax_form">
              @csrf
              @method('PATCH')
              <div class="row">                     
           
                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('Number') }}</strong>
                          <input type="text" id="number" class="form-control" name="number" value="{{ $item->number }}" placeholder="Enter Number...">                        
                      </div>
                  </div>     

                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('Title') }}</strong>
                          <input type="text" id="title" class="form-control" name="title" value="{{ $item->title }}" placeholder="Enter Title...">                        
                      </div>
                  </div>                              
                  
                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('page.Icon') }}</strong>
                          <input type="file" class="form-control" name="icon">
                      </div>
                  </div>                   
                  
              </div>

              <input type="submit" value="{{ __('page.Update') }}" class="btn btn-success">
              <hr>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">{{ __('page.close') }}</button>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  
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

CKEDITOR.replace('short_description', {
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

    
  
    // CKEDITOR.replace('description', {
    //     filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
    
    // CKEDITOR.replace('short_description', {
    //     filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
    //     filebrowserUploadMethod: 'form'
    // });
</script>