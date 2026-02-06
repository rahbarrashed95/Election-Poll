 <!-- Core JS -->
 <script src="{{ asset('public/frontend/assets/js/jquery-3.6.0.min.js') }}"></script>

<!-- Framework -->
<script src="{{ asset('public/frontend/assets/js/bootstrap.min.js') }}"></script>

<!-- WOW Scroll Effect -->
<script src="{{ asset('public/frontend/plugins/wow/wow.min.js') }}"></script>

<!-- Swiper Slider -->
<script src="{{ asset('public/frontend/plugins/swiper/swiper-bundle.min.js') }}"></script>

<!-- Odometer Counter -->
<script src="{{ asset('public/frontend/plugins/odometer/appear.js') }}"></script>
<script src="{{ asset('public/frontend/plugins/odometer/odometer.js') }}"></script>

<!-- Fancybox -->
<script src="{{ asset('public/frontend/plugins/fancybox/jquery.fancybox.min.js') }}"></script>

<!-- Flatpickr -->
<script src="{{ asset('public/frontend/plugins/flatpickr/flatpickr.min.js') }}"></script>

<!-- Nice Select -->
<script src="{{ asset('public/frontend/plugins/nice-select/jquery.nice-select.min.js') }}"></script>

<!-- Theme Custom JS -->
<script src="{{ asset('public/frontend/assets/js/theme.js') }}"></script>



</body>

<!-- Mirrored from wpthemebooster.com/demo/themeforest/html/immigway/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Sep 2024 11:58:39 GMT -->
</html>

<script>
    $(document).on('submit', 'form#appointment_form', function(e){
        e.preventDefault();
        
        let method = $(this).attr('method');
        let url = $(this).attr('action');
        var formData = new FormData($(this)[0]);
        alert(url);
        $.ajax({
            url     : url,
            method  : method,
            data    : formData,
            success : function(res){
                if(res.status){
                    window.location.reload();
                }
            }
        });
    });

    $(document).on('submit', 'form#comment_form', function(e){
        e.preventDefault();
        
        let method = $(this).attr('method');
        let url = $(this).attr('action');
        var formData = new FormData($(this)[0]);
        
        $.ajax({
            url     : url,
            method  : method,
            data    : formData,
            async: false,
            processData: false,
            contentType: false,
            success : function(res){
                if(res.status){
                    window.location.reload();
                }
            }
        });
    });
    
    $('.submenu_opener').on('click', function() {
        var $li = $(this).closest('li');
        $li.toggleClass('nav_open');
    
        var $submenu = $li.find('.sub-menu');
    
        if ($submenu.is(':visible')) {
            $submenu.removeClass('show').slideUp(300);
        } else {
            $submenu.addClass('show').slideDown(300);
        }
    });
    
    $(document).on('click', 'button.form-control-submit', function() {
        $('.search_section').toggleClass('visible');
    });
    
    // $(document).on('click', 'input#search_here',
    //     function () {
    //         $('.search_div').css('width', '60%');
    //     }
    // );
    
    $(document).on('click', function (event) {
        if ($(event.target).closest('.search_div, input#search_here').length) {
            $('.search_div').css('width', '60%');
        } else {
            $('.search_div').css('width', '30px'); // Default width
        }
    });
    
</script>