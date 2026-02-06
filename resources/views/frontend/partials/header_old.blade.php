<style>

.search_div {
    width: 30px;
    transition: width 1s ease-in-out; /* Smooth transition */
}

.search_section {
    display: none;
}

.search_section.visible {
    display: block;
}

.btn-effect {
  display: inline-block;
    background: -webkit-gradient(linear, left top, right top, from(#f3722e), to(#ff9900));
    background: linear-gradient(90deg, #f3722e 0%, #ff9900 100%);
    z-index: 1;
    overflow: hidden;
    padding: 3.5px 13px;
    color: #fff;
    border-radius: 35px;
    border: none;
    font-size: 11px;
    outline: none;
    font-weight: 600;
    -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
    position: relative;
    text-decoration: none;
}
.btn-effect::after {
  position: absolute;
  content: "";
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: -webkit-gradient(
    linear,
    left top,
    right top,
    from(#ff9900),
    to(#f3722e)
  );
  background: linear-gradient(90deg, #ff9900 0%, #f3722e 100%);
  -webkit-transform: translateY(0px) rotate(0deg);
  transform: translateY(0px) rotate(0deg);
  opacity: 0;
  -webkit-transition: all 0.5s ease;
  transition: all 0.5s ease;
  z-index: -1;
}
.btn-effect:hover {
  color: #000;
}
.btn-effect:hover::after {
  opacity: 0.45;
  -webkit-transform: translateY(5px) rotate(-45deg);
  transform: translateY(5px) rotate(-45deg);
}



    .custom-btn {
      width: 130px;
      height: 40px;
      color: #fff;
      border-radius: 5px;
      padding: 10px 25px;
      font-family: 'Lato', sans-serif;
      font-weight: 500;
      background: transparent;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      display: inline-block;
       box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
       7px 7px 20px 0px rgba(0,0,0,.1),
       4px 4px 5px 0px rgba(0,0,0,.1);
      outline: none;
    }
    
    .btn-12{
  position: relative;
  right: 20px;
  bottom: 20px;
  border:none;
  box-shadow: none;
  width: 130px;
  height: 40px;
  line-height: 42px;
  -webkit-perspective: 230px;
  perspective: 230px;
}
.btn-12 span {
  background: rgb(0,172,238);
  background: linear-gradient(0deg, rgba(0,172,238,1) 0%, rgba(2,126,251,1) 100%);
  display: block;
  position: absolute;
  width: 143px;
  height: 40px;
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  border-radius: 5px;
  margin:0;
  text-align: center;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  -webkit-transition: all .3s;
  transition: all .3s;
  font-size: 13px;
}
.btn-12 span:nth-child(1) {
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001;
  -webkit-transform: rotateX(90deg);
  -moz-transform: rotateX(90deg);
  transform: rotateX(90deg);
  -webkit-transform-origin: 50% 50% -20px;
  -moz-transform-origin: 50% 50% -20px;
  transform-origin: 50% 50% -20px;
}
.btn-12 span:nth-child(2) {
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  transform: rotateX(0deg);
  -webkit-transform-origin: 50% 50% -20px;
  -moz-transform-origin: 50% 50% -20px;
  transform-origin: 50% 50% -20px;
}
.btn-12:hover span:nth-child(1) {
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  -webkit-transform: rotateX(0deg);
  -moz-transform: rotateX(0deg);
  transform: rotateX(0deg);
}
.btn-12:hover span:nth-child(2) {
  box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
 color: transparent;
  -webkit-transform: rotateX(-90deg);
  -moz-transform: rotateX(-90deg);
  transform: rotateX(-90deg);
}

    
</style>



<body>    
<!-- Preloader -->
<div id="preloader">
    <div class="preloader-inner">
        <div class="spinner"></div>
        <div class="loading-text">
            <!--<span data-preloader-text="N" class="characters">N</span>-->
            <!--<span data-preloader-text="U" class="characters">U</span>-->
            <!--<span data-preloader-text="K" class="characters">K</span>-->
            <a href="{{ route('front.home') }}" class="light_logo">                                    
                <img src="{{ getImage('settings',getInfo('logo'))}}" alt="" class="img-fluid side_logo"> 
            </a>
        </div>
    </div>
</div>

<header class="header">
    
    <!-- Top Bar -->
            <div class="header-top">
                <div class="container">
                    <div class="d-none d-xl-flex justify-content-between align-items-center flex-wrap">
                        <!-- Left Box -->
                        
                        <!-- Right Box -->
                        <div class="right-box d-flex align-items-center">

                            <ul class="info-list">
                                <li><a href="{{ getInfo('email') }}"><span style="color: #fff;" class="icon bi bi-envelope-fill"></span>{{ getInfo('contact') }}</a></li>
                                <li><a href="#"><span class="icon bi bi-geo-alt-fill" style="color: #fff;"></span>{{ getInfo('address') }}</a></li>
                            </ul>

                            <!-- Button Box -->
                            
                        </div>
                        
                        <div class="left-box d-flex align-items-center">
                            <!-- Social Box -->
                            <div class="social-box">
                                <ul>
                                @foreach(social_items() as $item)
                                    <li><a href="{{ $item->link }}" class="{{ $item->icon }}"></a></li>                                   
                                @endforeach
                                </ul>
                            </div>
                            
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            
            <div class="header-lower">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12" style="display: flex;">
                        <div class="col-md-3 col-4 logo_section">
                            <div class="logo">
                                <a href="{{ route('front.home') }}" class="light_logo">                                    
                                    <img src="{{ getImage('settings',getInfo('logo'))}}" alt="" class="img-fluid side_logo"> 
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 menu_section">
                            <div class="mainnav d-none d-xl-block" style="padding-top: 10px;padding-bottom: 10px;">
                                    <ul class="main-menu" style="text-align: right;margin-right: 10px;">
                                    <!--<li class="menu-item"><a href="{{ route('front.home') }}">Home</a></li>    -->
                                    @foreach(menu_items() as $item)
                                        <li class="menu-item menu-item-has-children">
                                            @if(!empty($item->page->slug))
                                            <a href="{{ route('front.parent-page-details', [$item->page->slug]) }}">{{ $item->page->title }}</a>
                                            @endif
                                            @php 
                                               $submenu = App\Models\SubMenu::with('page')->where('parent_id', $item->page_id)->orderBy('serial')->get();
                                            @endphp
                                            @if(count($submenu))
                                                <ul class="sub-menu">
                                                    @foreach ($submenu as $sub_item)
                                                        <li class="menu-item">
                                                            @if(!empty($sub_item->page))
                                                                <a href="{{ route('front.page-details', [$sub_item->page->slug]) }}" 
                                                                    style="color: #fff;border-bottom: 1px solid #fff;">
                                                                {{ $sub_item->page->title }}
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            
                                        </li>
                                    @endforeach
                                    <li><button 
                                    style="background: none;border: none;color: #C91789;"
                                    type="submit" class="form-control-submit"><i class="bi bi-search"></i></button></li>
                                    <!--<li class="menu-item"><a href="{{ route('front.contact_us') }}">Contact</a></li> -->
                                    
                                  
                                </ul>
                               
                            </div>
                        </div>
                        <div class="col-md-3 col-8 btn_section" style="text-align: right;padding-top: 24px;">
                            <a href="#" class="btn-effect">Sponsor A Surgery</a>&nbsp;
                            <a href="#" class="btn-effect">Help Fight Cancer</a>
                             <button type="button" class="mr_menu_toggle d-xl-none">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                        <div class="search_section" style="position: absolute;top: 67px;right: 278px;width: 25%;">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>

            <!-- Lower Bar -->
            <div class="header-inner" style="display: none;">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between">
                        <!-- Left Part -->
                        <div class="header_left_part d-flex align-items-center">
                            <div class="logo">
                                <a href="{{ route('front.home') }}" class="light_logo">                                    
                                    <img src="{{ getImage('settings',getInfo('logo'))}}" alt="" class="img-fluid side_logo"> 
                                </a>
                            </div>
                        </div>

                        <!-- Right Part -->
                        <div class="header_right_part d-flex align-items-center" style="width: 69%;">
                            <div class="mainnav d-none d-xl-block" style="padding-top: 10px;padding-bottom: 10px;width: 71%;">
                                    <ul class="main-menu" style="text-align: right;margin-right: 10px;">
                                    <!--<li class="menu-item"><a href="{{ route('front.home') }}">Home</a></li>    -->
                                    @foreach(menu_items() as $item)
                                        <li class="menu-item menu-item-has-children">
                                            @if(!empty($item->page->slug))
                                            <a href="{{ route('front.parent-page-details', [$item->page->slug]) }}">{{ $item->page->title }}</a>
                                            @endif
                                            @php 
                                               $submenu = App\Models\SubMenu::with('page')->where('parent_id', $item->page_id)->orderBy('serial')->limit(5)->get();
                                            @endphp
                                            @if(count($submenu))
                                                <ul class="sub-menu">
                                                    @foreach ($submenu as $sub_item)
                                                        <li class="menu-item">
                                                            @if(!empty($sub_item->page))
                                                                <a href="{{ route('front.page-details', [$sub_item->page->slug]) }}" 
                                                                    style="color: #fff;border-bottom: 1px solid #fff;">
                                                                {{ $sub_item->page->title }}
                                                                </a>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            
                                        </li>
                                    @endforeach
                                    <li><button 
                                    style="background: none;border: none;color: #C91789;"
                                    type="submit" class="form-control-submit"><i class="bi bi-search"></i></button></li>
                                    <!--<li class="menu-item"><a href="{{ route('front.contact_us') }}">Contact</a></li> -->
                                    
                                  
                                </ul>
                               
                            </div>

                            
                            
                            <!-- <div class="wptb-item--button">-->
                            <!--    <a class="btn-readmore style-default" href="contact-1.html" style="width: 30%;background: #fff !important;color: #000;">-->
                            <!--        <span-->
                            <!--        style="font-family: Jost, ui-sans-serif, system-ui, sans-serif;font-weight: 700;"-->
                            <!--        class="btn-readmore--text">Sponsor A Surgery </span>-->
                            <!--    </a>-->
                            <!--</div>-->
                           
                           
                           <a href="#" class="btn-effect">Sponsor A Surgery</a>
                           &nbsp;
                           <a href="#" class="btn-effect">Help Fight Cancer</a>
                           
                            <div class="search_section" style="position: absolute;top: 67px;right: 278px;width: 25%;">
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <!--<button class="custom-btn btn-12" style="margin-left: 2%;"><span>Sponsor A Surgery</span><span>Sponsor A Surgery</span></button>-->
                            <!--<button class="custom-btn btn-12" style="margin-left: 2%;"><span>Help Fight Cancer</span><span>Help Fight Cancer</span></button>-->

                            <button type="button" class="mr_menu_toggle d-xl-none">
                                <i class="bi bi-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
			</div>
		</header>