<style>
table tbody tr td:first-child input {
    width: 118%;
    height: 33px;
    margin-top: 0%;
}

.cke_notification_warning {
    display: none;
}

.cke_notification_message {
    display: none;
}

.cke_notification_close {
    display: none;
}

</style>

<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add {{ucfirst($type)}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('admin.pages.store')}}" method="POST" id="ajax_form">
              @csrf
              <div class="row">                 

                  <div class="col-md-4 mb-2" style="display: none;">
                      <div class="form-group">
                          <strong >{{ __('page.Type') }}</strong>
                          <input type="text" class="form-control" value="news-articles" name="type" placeholder="Enter Type...">
                      </div>
                  </div>

                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('page.Title') }}</strong>
                          <input type="text" id="title" class="form-control" name="title" placeholder="Enter Title...">
                          <input type="hidden" id="slug" class="form-control" name="slug">
                      </div>
                  </div>

                  <div class="col-md-12 mb-2">
                      <div class="form-group">
                          <strong > {{ __('Short Description') }} </strong>
                          <textarea class="form-control" id="short_description" name="short_description"></textarea>
                      </div>
                  </div>   
                  
                  <div class="col-md-12 mb-2">
                      <div class="form-group">
                          <strong > {{ __('page.Description') }} </strong>
                          <textarea class="form-control" id="description" name="description"></textarea>
                      </div>
                  </div>   
                  
                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('Seo Title') }}</strong>
                          <input type="text" id="seo_title" class="form-control" name="seo_title" placeholder="Enter Seo Title...">
                      </div>
                  </div>

                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong > {{ __('Seo Description') }} </strong>
                          <textarea class="form-control" id="seo_description" name="seo_description"></textarea>
                      </div>
                  </div>
                  
                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('Seo Keyword') }}</strong>
                          <input type="text" id="seo_keyword" class="form-control" name="seo_keyword" placeholder="Enter Seo Keyword...">
                      </div>
                  </div>
                  
                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('page.Icon') }}</strong>
                          <input type="file" class="form-control" name="icon">
                      </div>
                  </div> 
                  
                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('page.Thumbnail') }}</strong>
                          <input type="file" class="form-control" name="thumbnail">
                      </div>
                  </div> 

                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('page.Header Image') }}</strong>
                          <input type="file" class="form-control" name="header_image">
                      </div>
                  </div>                  
                 
              </div>
              <input type="submit" value="{{ __('page.Save') }}" class="btn btn-success">
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
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
    
    CKEDITOR.replace('short_description', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>