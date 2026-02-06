
@extends('backend.partials.app')
@section('content')

<style>
    .form-control {
        padding: 0.70rem 1.375rem;
    }
    .add_btn {
        height: 37px;
        padding-top: 10px;
    }
    .btn.btn-icon-text .btn-icon-append, .ajax-upload-dragdrop .btn-icon-text.ajax-file-upload .btn-icon-append {
      margin-left: 0px;
    }
    .pagination {
      float: right;
    }
    .page-link {
      color: #000;
    }
    .page-link.active, .active > .page-link {    
        background: linear-gradient(89deg, #5e7188, #3e4b5b);
        border: 1px solid gray;
    }
</style>    

<div class="page-header">
  <h3 class="page-title"> Package </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Package</a></li>
      <li class="breadcrumb-item active" aria-current="page">Package List</li>
    </ol>
  </nav>
</div>

<div class="row">                                 
  <div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">                            
        <div class="data_section">
        <table class="table table-bordered table-striped">
            <thead>
            <tr class="table-primary">
                <th style="width: 1%">SL.</th>
                <th>Package Name</th>                                        
                <th>Package Price</th>                                                       
                <th>No Of Property</th>                                                       
                <th style="width: 125px;">Action</th>                         
            </tr>
            </thead>
            <tbody>
            @foreach($items as $key=>$item)
            <tr>
                <td> {{$key+1}}</td>
                <td> {{$item->name}}</td>                            
                <td> {{$item->price}}</td>                            
                <td> {{$item->no_of_property}}</td>                            
                                                         
                <td>            
                    <a href="{{ route('admin.packages.edit',[$item->id])}}" title="Edit" class="btn btn-gradient-dark btn-icon-text btn-sm btn_modal"> 
                        <i class="mdi mdi-file-check btn-icon-append"></i> 
                    </a>                                      
                    <a href="{{ route('admin.packages.destroy',[$item->id])}}" title="Delete" class="btn btn-gradient-danger btn-sm delete action-icon"> 
                            <i class="fa fa-trash"></i>
                    </a>           
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>   

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<script type="text/javascript">  

 

</script>  

@endsection
