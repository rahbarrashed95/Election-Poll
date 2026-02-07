<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Property" />
    <meta name="author" content="Amir Hossain" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />    
    <title>Property Rent</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/vendors/ti-icons/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{ asset('public/backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/vendors/font-awesome/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('public/backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
    <!-- End plugin css for this page -->

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('public/backend/assets/css/style.css')}}">
    <!-- End layout styles -->
    <!--<link rel="shortcut icon" href="assets/images/favicon.png" />-->
    <!-- Favicon -->
	<link rel="shortcut icon" href="{{ getImage('settings',getInfo('favicon'))}}" type="image/x-icon">
  </head>
  <body>

    <style>
      #toast-container>.toast-success {    
        background: #51a351 !important;
      }
      .breadcrumb-item a {
        text-decoration: none;
      }
      .sidebar .nav .nav-item.active > .nav-link i {
          color: rgba(187, 168, 191, 0.9607843137);
      }
      .sidebar .nav .nav-item .nav-link i {
        color: rgba(187, 168, 191, 0.9607843137);
      }
    </style>

    <div class="container-scroller">      
      <!-- partial:partials/_navbar.html -->
      @include('backend.partials.header_nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('backend.partials.side_nav')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">                               
                @yield('content')
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a href="https://property.dotmaxbd.com/" target="_blank">Proerty Rent</a>. All rights reserved.</span>
                <!--<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>-->
                </div>
            </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>

    <div class="modal fade" id="common_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
    <div class="modal fade" id="common_modal_edit2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    
    <!-- container-scroller -->
    <!-- <script src="{{ asset('backend/js/ajax.js')}}"></script> -->
         <script src="{{ asset('backend/js/jquery.min.js')}}"></script>
    <!-- plugins:js -->
    <script src="{{ asset('public/backend/assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('public/backend/assets/vendors/chart.js/chart.umd.js')}}"></script>
    <script src="{{ asset('public/backend/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('public/backend/assets/js/off-canvas.js')}}"></script>
    <script src="{{ asset('public/backend/assets/js/misc.js')}}"></script>
    <script src="{{ asset('public/backend/assets/js/settings.js')}}"></script>
    <script src="{{ asset('public/backend/assets/js/todolist.js')}}"></script>
    <script src="{{ asset('public/backend/assets/js/jquery.cookie.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('public/backend/assets/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

    <script type="text/javascript">

    $(document).ready(function() {

      // Set toastr options globally
    toastr.options = {
        "timeOut": 5000,            // Notification will disappear after 5 seconds
        "extendedTimeOut": 0,       // Don't extend the notification time when hovering
        "closeButton": true,        // Optional: Add a close button
        "progressBar": true,        // Optional: Add a progress bar
        "preventDuplicates": true   // Avoid duplicate notifications
    };

    // Check if there are any stored toastr messages after the page reload
    if (sessionStorage.getItem('toastr_message')) {
        // Get stored message
        var message = sessionStorage.getItem('toastr_message');
        var type = sessionStorage.getItem('toastr_type');
        
        // Display the message using toastr
        if (type === 'success') {
            toastr.success(message);
        } else if (type === 'error') {
            toastr.error(message);
        }
        
        // Clear the stored message after showing
        sessionStorage.removeItem('toastr_message');
        sessionStorage.removeItem('toastr_type');
    }

      $(document).on('click','.btn_modal', function(e){ 
          e.preventDefault();
          var url = $(this).attr('href');    
          $.ajax({
            type:'GET',
            url:url,
            data:{},
            success:function(res){
                $('div#common_modal').html(res).modal('show');
            }
          });
      });

      $(document).on('click', 'a#show_page', function(e) {
          e.preventDefault();
          let url = $(this).attr('href');
          let id = $(this).data('id');

          $.ajax({
              url: url,
              method: 'GET',
              data: { id },
              success: function(res) {
                  if (res.status) {
                      window.open(res.url, '_blank'); 
                  }
              }
          });
      });

      $(document).on('submit','form#ajax_form', function(e) {
        
          e.preventDefault(); 
          $('span.textdanger').text('');
          var url=$(this).attr('action');
          var method=$(this).attr('method');
          var formData = new FormData($(this)[0]);
          $.ajax({
              type: method,
              url: url,
              data: formData,
              async: false,
              processData: false,
              contentType: false,
              success: function(res) {
                  
                  if(res.status==true){   
                    
                    sessionStorage.setItem('toastr_message', res.msg);
                    sessionStorage.setItem('toastr_type', 'success');                             
                      if(res.url){
                          document.location.href = res.url;
                      }else{
                          window.location.reload();
                      }                
                  }else if(res.status==false){
                      toastr.error(res.msg);
                  }
                  
              },
              error:function (response){
                  $.each(response.responseJSON.errors,function(field_name,error){
                      $(document).find('[name='+field_name+']').after('<span style="color:red">' +error+ '</span>')
                      toastr.error(error);
                  })
              }
          });
      });

      // ajax request for delete data
      $(document).on('click','a.delete', function(e) { 
          var form=$(this);
          e.preventDefault(); 
          swal({
            title: "Are you sure?",
            text: "You want To Delete!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#006400",
            confirmButtonText: "Yes, do it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

              var url=$(form).attr('href');

              $.ajax({
                  type: 'DELETE',
                  url: url,
                  data: {"_token": $('meta[name="csrf-token"]').attr('content')},
                  success: function(res) {
                      
                      if(res.status==true){                                                   
                          sessionStorage.setItem('toastr_message', res.msg);
                          sessionStorage.setItem('toastr_type', 'success');
                          if(res.url){
                              document.location.href = res.url;
                          }else{
                              window.location.reload();
                          }
                      }else if(res.status==false){
                          toastr.error(res.msg);
                      }
                      
                  },
                  error:function (response){
                      
                  }
              });
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
          });
      });

        // ajax request for delete data
        $(document).on('click','a.property_status', function(e) {
            var form=$(this);
            e.preventDefault(); 
            swal({
              title: "Are you sure?",
              text: "You want To Status Change!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#006400",
              confirmButtonText: "Yes, do it!",
              cancelButtonText: "No, cancel plz!",
              closeOnConfirm: false,
              closeOnCancel: false
            },
            function(isConfirm){
              if (isConfirm) {
                var url=$(form).attr('href');   
                $.ajax({
                    type: 'GET',
                    url: url,
                    data: {},
                    success: function(res) {
                        
                        if(res.status==true){
                            toastr.success(res.msg);
                            if(res.url){
                                document.location.href = res.url;
                            }else{
                                window.location.reload();
                            }
                        }else if(res.status==false){
                            toastr.error(res.msg);
                        }
                        
                    },
                    error:function (response){
                        
                    }
                });
              } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
              }
            });
        });

      $(document).on('click','a.multi_delete', function(e) {
          var form=$(this);
          e.preventDefault(); 
          swal({
            title: "Are you sure?",
            text: "You want To Delete!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#006400",
            confirmButtonText: "Yes, do it!",
            cancelButtonText: "No, cancel plz!",
            closeOnConfirm: false,
            closeOnCancel: false
          },
          function(isConfirm){
            if (isConfirm) {

              var url=$(form).attr('href');
              
              var page = $('input#single_check:checked').map(function(){
                return $(this).val();
              });
              var page_ids=page.get();
              
              $.ajax({
                  type: 'DELETE',
                  url: url,
                  data: {"_token": $('meta[name="csrf-token"]').attr('content'),page_ids},
                  success: function(res) {
                      
                      if(res.status==true){
                          toastr.success(res.msg);
                          if(res.url){
                              document.location.href = res.url;
                          }else{
                              window.location.reload();
                          }
                      }else if(res.status==false){
                          toastr.error(res.msg);
                      }
                      
                  },
                  error:function (response){
                      
                  }
              });
            } else {
              swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
          });
      });
        

    //   $(document).on('change','select#category_id',
    //       function(){
    //         let property = $(this).find(':selected').data('property');
                
    //         if(property == 'Commercial'){
    //           $('.bedrooms').hide(); 
    //           $('.bathrooms').hide(); 
    //           $('.belconies').hide(); 
    //           $('.drawing').hide(); 
    //         } else{
    //           $('.bedrooms').show(); 
    //           $('.bathrooms').show(); 
    //           $('.belconies').show(); 
    //           $('.drawing').show(); 
    //         } 
              
    //       let cat_id = $(this).val();         
    //       $.ajax({
    //           method: 'GET',
    //           url: '{{ route("admin.get_sub_cat") }}',  
    //           data: { cat_id },  
    //           success: function(res){
    //             if(res.status){
    //               $('select#sub_category_id').html(res.html_view);
    //             }
    //           }
    //       });
    //   }
    //   );

      $(document).on('change','select#city_id',
          function(){
          let city_id = $(this).val();         
          $.ajax({
              method: 'GET',
              url: '{{ route("admin.get_city") }}',  
              data: { city_id },  
              success: function(res){
                if(res.status){
                  $('select#area_id').html(res.html_view);
                }
              }
          });
      });
    });
    
    </script>

  </body>
</html>