
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
      <form action="{{route('admin.pages.update',[$item->id])}}" method="POST" enctype="multipart/form-data" id="ajax_form">
                    @csrf
                    @method('PATCH')
                    <div class="row">                                           
                        <div class="col-md-4 mb-2 d-none">
                            <div class="form-group">
                                <label >{{ __('page.Type') }}</label>
                                <input type="text" class="form-control" name="type" value="page" placeholder="Enter Type...">
                            </div>
                        </div>
                    
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label >{{ __('page.Title') }}</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $item->title }}" placeholder="Enter Title...">
                                <input type="hidden" id="slug" class="form-control" name="slug" value="{{ $item->slug }}">
                            </div>
                        </div> 

                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label >{{ __('page.Header Image') }}</label>
                                <input type="file" class="form-control" name="header_image">
                            </div>
                        </div>
                        
                        <div class="col-md-12 mb-2 d-none">
                            <div class="form-group">
                                <label > {{ __('Short Description') }} </label>
                                <textarea class="form-control" id="short_description" name="short_description">{{ $item->short_description }}</textarea>
                            </div>
                        </div>  

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <label > {{ __('page.Description') }} </label>
                                <textarea class="form-control" id="description" name="description"> {{ $item->description }} </textarea>
                            </div>
                        </div>    
                        
                        <div class="col-md-4 mb-2 d-none">
                            <div class="form-group">
                                <label >{{ __('Seo Title') }}</label>
                                <input type="text" id="seo_title" class="form-control" name="seo_title" value="{{ $item->seo_title }}" placeholder="Enter Seo Title...">
                            </div>
                        </div>

                        <div class="col-md-4 mb-2 d-none">
                            <div class="form-group">
                                <label > {{ __('Seo Description') }} </label>
                                <textarea class="form-control" id="seo_description" name="seo_description">{{ $item->seo_description }}</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-2 d-none">
                            <div class="form-group">
                                <label >{{ __('Seo Keyword') }}</label>
                                <input type="text" id="seo_keyword" class="form-control" name="seo_keyword" value="{{ $item->seo_keyword }}" placeholder="Enter Seo Keyword...">
                            </div>
                        </div>
                        
                        <div class="col-md-4 mb-2 d-none">
                            <div class="form-group">
                                <label >{{ __('page.Icon') }}</label>
                                <input type="file" class="form-control" name="icon">
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
  </script>
