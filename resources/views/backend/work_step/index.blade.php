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
    #toast-container>.toast-success {    
      background: #51a351 !important;
    }
</style>    

<div class="page-header">
  <h3 class="page-title"> Work Step </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Work Step</a></li>
      <li class="breadcrumb-item active" aria-current="page">Work Step List</li>
    </ol>
  </nav>
</div>
<div class="row">                                 
  <div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row" style="margin-bottom: 15px;">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        <select id="paginate" class="form-select">
                            <option>10</option>
                            <option>20</option>
                            <option>50</option>
                            <option>100</option>
                        </select>                            
                    </div> 
                    <div class="col-md-5">
                        @can('product_categories.create')
                            <a href="{{ route('admin.work-step.create')}}" class="btn btn-primary btn-sm btn_modal add_btn">{{ __('Add Work Step') }}</a>
                        @endif
                    </div>
                </div>                                                   
            </div>                          
            <div class="col-md-6">           
                <div class="col-md-6" style="float: right;">
                  <input type="text" id="search" placeholder="Search.." class="form-control" />
                </div>                                            
            </div>
        </div>                     
        <div class="data_section">

        </div>
      </div>
    </div>
  </div>
</div>   

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){     
      get_data();
    });

    $(document).on('change', 'select#paginate',
      function(){
        get_data();
      }      
    );

    $(document).on('keyup','input#search',
      function(){
        get_data();
      }
    );

    $(document).on('click','.pagination a',function(e){
          e.preventDefault();
          var page=$(this).attr('href').split('page=')[1]; 
          get_data(page);
      });

    function get_data(page=null){
      let paginate = $('select#paginate').val();
      let search_str = $('input#search').val();
      let url = "{{ route('admin.work-step.index') }}?page="+page;

      $.ajax({
        url: url,
        method: 'GET',
        data: {paginate, search_str},
        success: function(res){
          if(res.status){
            $('div.data_section').html(res.data);
          }
        }
      });

    }

</script>  

@endsection

