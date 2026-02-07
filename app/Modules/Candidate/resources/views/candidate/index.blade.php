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
  <h3 class="page-title"> Candidate </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Candidate</a></li>
      <li class="breadcrumb-item active" aria-current="page">Candidate List</li>
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
                            <a href="{{ route('admin.candidates.create')}}" class="btn btn-primary btn-sm btn_modal add_btn">{{ __('Add Candidate') }}</a>
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

<div class="modal fade" id="common_modal_edit" tabindex="-1">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <!-- ajax content will come here -->
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function(){     
      get_data();
    });

$(document).on('click','.btn_edit', function(e){ 
    e.preventDefault();

    var url = $(this).attr('href');

    $.get(url, function(res){

        $('#common_modal_edit .modal-content').html(res);
        $('#common_modal_edit').modal('show');

        $('#common_modal_edit').one('shown.bs.modal', function () {

            let division_id  = $('#division_id').val();
            let district_id  = $('#district_id').data('selected'); 
            let seat_id     = $('#seat_id').data('selected');
            // ⬆️ blade থেকে পাঠাবে

            if (division_id) {
                loadDistricts(division_id, district_id, seat_id);
            }
        });

    });
});

function loadDistricts(division_id, selected_district_id = null, selected_seat_id = null) {
    $.ajax({
        url: "{{ route('admin.candidates.getByDivision') }}",
        method: 'GET',
        data: { division_id },
        success: function(res){
            if(res.status){
                let options = '<option>Please Select</option>';

                res.data.forEach(function(item){
                    let selected = selected_district_id == item.id ? 'selected' : '';
                    options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                });

                let districtSelect = $('#common_modal_edit').find('#district_id');
                districtSelect.html(options);

                // 🔥 auto load seats if editing
                if (selected_district_id) {
                    loadSeats(selected_district_id, selected_seat_id);
                }
            }
        }
    });
}

function loadSeats(district_id, selected_seat_id = null) {
    $.ajax({
        url: "{{ route('admin.candidates.getSeats') }}",
        method: 'GET',
        data: { district_id },
        success: function(res){
            if(res.status){
                let options = '<option>Please Select</option>';

                res.data.forEach(function(item){
                    let selected = selected_seat_id == item.id ? 'selected' : '';
                    options += `<option value="${item.id}" ${selected}>${item.name}</option>`;
                });

                $('#common_modal_edit').find('#seat_id').html(options);
            }
        }
    });
}

    $(document).on('change', 'select#division_id',
      function(){
        let division_id = $(this).val();
        $('select#seat_id').html('');
        $.ajax({
          url: "{{ route('admin.candidates.getByDivision') }}",
          method: 'GET',
          data: {division_id},
          success: function(res){
            if(res.status){
              let options = '<option>Please Select</option>';
              res.data.forEach(function(item){
                options += `<option value="${item.id}">${item.name}</option>`;
              });
              $('select#district_id').html(options);
            }
          }
        });
      }      
    );

    $(document).on('change', 'select#district_id',
      function(){
        let district_id = $(this).val();
        
        $.ajax({
          url: "{{ route('admin.candidates.getSeats') }}",
          method: 'GET',
          data: {district_id},
          success: function(res){
            if(res.status){
              let options = '<option>Please Select</option>';
              res.data.forEach(function(item){
                options += `<option value="${item.id}">${item.name}</option>`;
              });
              $('select#seat_id').html(options);
            }
          }
        });
      }      
    );

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
      let url = "{{ route('admin.candidates.index') }}?page="+page;

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





