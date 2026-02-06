<div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Service Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form action="{{route('admin.submenus.update',[$item->id])}}" method="POST" id="ajax_form">
              @csrf
              @method('PATCH')
              <div class="row">     
              
              <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('menu.Parent Page') }}</strong>
                          <select class="form-control" name="parent_id">
                                <option>Select Parent Page</option>
                                @foreach($pages as $page)
                                    <option value="{{ $page->id }}" {{ $page->id == $item->parent_id ? 'selected' : '' }} >{{ $page->title }}</option>
                                @endforeach
                          </select>
                      </div>
                  </div> 

                <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong >{{ __('menu.Page') }}</strong>
                          <select class="form-control" name="page_id">
                                <option>Select Page</option>
                                @foreach($pages as $page)
                                    <option value="{{ $page->id }}" {{ $page->id == $item->page_id ? 'selected' : '' }} >{{ $page->title }}</option>
                                @endforeach
                          </select>
                      </div>
                  </div> 
                  
                  <div class="col-md-4 mb-2">
                      <div class="form-group">
                          <strong > {{ __('menu.Serial') }} </strong>
                          <input type="text" class="form-control" name="serial" value="{{ $item->serial }}" ></textarea>
                      </div>
                    </div> 

              </div>

              <input type="submit" value="{{ __('Update') }}" class="btn btn-success">
              <hr>
          </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">{{ __('close') }}</button>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{route('admin.ckeditor.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>