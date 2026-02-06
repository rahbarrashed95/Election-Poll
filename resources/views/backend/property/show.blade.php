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
            <h5 class="modal-title" id="staticBackdropLabel">Property Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-3 d-flex mb-3">
                    <span>Property Title </span> : {{ $item->title }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>Property Type </span> : {{ $item->cat_name }}
                </div>
                <div class="col-md-4 d-flex">
                    <span>Property Category </span> : {{ $item->sub_cat_name }}
                </div>
                <div class="col-md-3 d-flex mb-3">
                    <span>Property Location </span> : {{ $item->location }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>City </span> : {{ $item->city }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>Area </span> : {{ $item->area }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>Landmark </span> : {{ $item->landmark }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>Price </span> : {{ $item->price }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>Bed </span> : {{ $item->bed }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>Bath </span> : {{ $item->bath }}
                </div>
                <div class="col-md-3 d-flex">
                    <span>Floor Area </span> : {{ $item->floor_area }}
                </div>
                <hr style="margin-top: 20px;margin-bottom: 20px;" />
                <div class="col-md-12">
                <h4>Interested Users</h4>
                <table class="table table-bordered table-striped">
                <thead>
                <tr class="table-primary">
                    <th style="width: 1%">SL.</th>
                    <th>Name</th>                                        
                    <th>Date</th>                                                                                             
                </tr>
                </thead>
                <tbody>
                @forelse ($item->interestedUsers as $key => $user)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $user->name }} </td>
                        <td>{{ \Carbon\Carbon::parse($user->pivot->created_at)->format('M d, Y H:i') }} </td>
                    </tr>
                @empty
                    <td>No users have shown interest yet.</td>
                @endforelse
                </tbody>                    
                </div>
            </div>
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

