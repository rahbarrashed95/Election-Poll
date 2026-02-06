<style>
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

@extends('backend.partials.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">ED Message</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">{{ __('slider.Dashboard') }}</a></li>           
        </ol>

        <div class="card mb-4">            
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">                     
                    <form action="{{route('admin.exec-dir.update',[$item->id])}}" method="POST" id="ajax_form">
                        @csrf
                        @method('PATCH')
                        <div class="row">                                                         

                            <div class="col-md-4 mb-2">
                                <div class="form-group">
                                    <strong >{{ __('slider.Title') }}</strong>
                                    <input type="text" class="form-control" name="title" value="{{ $item->title}}" placeholder="Enter Title...">
                                </div>
                            </div>                                
                            
                            <div class="col-md-4 mb-2">
                                <div class="form-group">
                                    <strong > {{ __('Image') }} </strong>
                                    <input type="file" class="form-control" name="image">
                                </div>
                            </div> 
                            
                            <div class="col-md-12 mb-2">
                                <div class="form-group">
                                    <strong > {{ __('Message') }} </strong>
                                    <textarea class="form-control" name="message">{{ $item->message }}</textarea>
                                </div>
                            </div>
                            
                        </div>

                        <input type="submit" value="{{ __('Update') }}" class="btn btn-success">
                        <hr>
                    </form>              
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>

<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>

<script type="text/javascript">
    CKEDITOR.replace('message', {
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
                
@endsection

