<style>
    .bi-circle-fill::before {
    content: "\f287";
    visibility: hidden;
}
</style>

<footer class="footer style1" style="background-image: url('assets/img/background/bg-1.jpg');">
            <div class="footer-top" style="background: #F2F2F2;">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-xl-5 mb-5 mb-xl-0 footer_left">
                            <div class="logo" style="margin-top: 30px;">
                                <a href="{{ route('front.home') }}" class="light_logo">                                    
                                    <img src="{{ getImage('settings',getInfo('logo'))}}" alt="" class="img-fluid side_logo" style="width: 50%;">
                                </a>
                            </div>
                            <p class="text-two" style="margin-top: 24px;
    color: #C91789;
    font-weight: 400;
    padding-right: 218px;
    line-height: 25px;
    font-size: 15px;
    margin-left: 16%;">
                                {{ getInfo('address') }}
                            </p>
                        </div>

                        <div class="col-xl-7">
                            <div class="row">
                                
                                <div class="col-md-4 col-sm-6 mb-5 mb-md-0">
                                    <div class="footer-widget footer-links">
                                        <h5 class="widget-title" style="color: #C91789;font-weight: 600;">Useful Links</h5>
                                        <div class="footer-nav">
                                            <ul>
                                                <li class="menu-item"><a href="about.html"> About Company</a></li>
                                                <li class="menu-item"><a href="timeline.html"> Our Experience</a></li>
                                                <li class="menu-item"><a href="case.html"> Case Studies</a></li>
                                                <li class="menu-item"><a href="#"> Travel Insurance</a></li>
                                                <li class="menu-item"><a href="appointments.html">Get Appointment</a></li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 mb-5 mb-md-0">
                                    <div class="footer-widget footer-links" style="text-align: center;">
                                        <h5 class="widget-title" style="color: #C91789;font-weight: 600;">Area Coverage</h5>
                                        <img src="{{ asset('public/frontend/assets/img/wave.png') }}" style="display: block;text-align: center;justify-content: center;margin: 0 auto;">
                                    </div>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 mb-5 mb-md-0" style="text-align: right;">
                                    <div class="footer-widget footer-links">
                                        <h5 class="widget-title social_link" style="color: #C91789;font-weight: 600;">Social Links</h5>
                                        <div class="d-flex align-items-center social_item" style="float: right;">
                                            <div class="social-box">
                                                <ul style="display: flex;gap: 20px;">
                                                @foreach(social_items() as $item)
                                                    <li><a href="{{ $item->link }}" class="{{ $item->icon }}"></a></li>                                   
                                                @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom Part -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-inner justify-content-center">
                        <div class="copyright">
                            <p style="font-size: 13px;">&copy;Copyright 2024 <a href="{{ route('front.home') }}" style="color: #fff;">NUK</a>. All rights reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="totop">
            <a class="top_bottom" href="#"><i style="position: absolute;top: -5px;left: 12px;" class="bi bi-chevron-up"></i></a>
        </div>