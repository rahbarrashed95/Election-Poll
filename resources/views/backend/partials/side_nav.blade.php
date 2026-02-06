<nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="nav-profile-image">
                  <img src="{{ asset('public/backend/user/'.Auth::user()->image)}}" alt="profile" />
                  <span class="login-status online"></span>
                  <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                  <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                  <!-- <span class="text-secondary text-small">Project Manager</span> -->
                </div>
                <!--<i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>-->
              </a>
            </li>
            
            @if(Auth::user()->hasRole('Property Owner'))
                <!--<li class="nav-item">-->
                <!--  <a class="nav-link" href="{{ route('admin.create_property') }}">-->
                <!--    <span class="menu-title">Add Property</span>-->
                <!--    <i class="mdi mdi-home menu-icon"></i>-->
                <!--  </a>-->
                <!--</li> -->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                  </a>
                </li> 
                 <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#property" aria-expanded="false" aria-controls="property">
                    <span class="menu-title">Manage Your Property</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-building menu-icon"></i>
                  </a>
                  <div class="collapse" id="property">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.property.index')}}"> Property List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.profile',[Auth::user()->id]) }}">
                    <span class="menu-title">Profile Settings</span>
                    <i class="mdi mdi-home menu-icon"></i>
                  </a>
                </li> 
                <!--<li class="nav-item">-->
                <!--  <a class="nav-link" href="{{ route('admin.subs_pricing') }}">-->
                <!--    <span class="menu-title">Subscription & Pricing</span>-->
                <!--    <i class="mdi mdi-home menu-icon"></i>-->
                <!--  </a>-->
                <!--</li> -->
                <!--<li class="nav-item">-->
                <!--  <a class="nav-link" href="index.html">-->
                <!--    <span class="menu-title">Get Help</span>-->
                <!--    <i class="mdi mdi-home menu-icon"></i>-->
                <!--  </a>-->
                <!--</li> -->
                <!--<li class="nav-item">-->
                <!--  <a class="nav-link" href="index.html">-->
                <!--    <span class="menu-title">Billing Info & Inv</span>-->
                <!--    <i class="mdi mdi-home menu-icon"></i>-->
                <!--  </a>-->
                <!--</li> -->
                <li class="nav-item">
                  <a class="nav-link" href="index.html">
                    <span class="menu-title">Report</span>
                    <i class="mdi mdi-home menu-icon"></i>
                  </a>
                </li> 
            @else
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                  </a>
                </li>        
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#manage_area" aria-expanded="false" aria-controls="manage_area">
                    <span class="menu-title">Manage Area</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-area menu-icon"></i>
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
    
                  </a>
                  <div class="collapse" id="manage_area">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.areas.index')}}"> Area List </a>
                        <a class="nav-link" href="{{ route('admin.cities.index')}}"> City List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#cat_sub_cat" aria-expanded="false" aria-controls="cat_sub_cat">
                    <span class="menu-title">Manage Category</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </a>
                  <div class="collapse" id="cat_sub_cat">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.categories.index')}}"> Category List </a>
                        <a class="nav-link" href="{{ route('admin.sub-categories.index')}}"> Sub Category List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
                
                 <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#amenity_property" aria-expanded="false" aria-controls="amenity_property">
                    <span class="menu-title">Manage Your Amenity</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-building menu-icon"></i>
                  </a>
                  <div class="collapse" id="amenity_property">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.amenity-property.index')}}"> Amenity List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
                
                 <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#property" aria-expanded="false" aria-controls="property">
                    <span class="menu-title">Manage Your Property</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-building menu-icon"></i>
                  </a>
                  <div class="collapse" id="property">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.property.index')}}"> Property List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#social" aria-expanded="false" aria-controls="social">
                    <span class="menu-title">Manage Social Links</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                  </a>
                  <div class="collapse" id="social">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.social.index')}}"> Social List </a>                    
                      </li>                                       
                    </ul>
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#work_step" aria-expanded="false" aria-controls="work_step">
                    <span class="menu-title">How It Works</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-lightbulb-o menu-icon"></i>
                  </a>
                  <div class="collapse" id="work_step">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.work-step.index')}}"> Step List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
                <!--<li class="nav-item">-->
                <!--  <a class="nav-link" data-bs-toggle="collapse" href="#property" aria-expanded="false" aria-controls="property">-->
                <!--    <span class="menu-title">Manage Property</span>-->
                <!--    <i class="menu-arrow"></i>-->
                <!--    <i class="fa fa-building menu-icon"></i>-->
                <!--  </a>-->
                <!--  <div class="collapse" id="property">-->
                <!--    <ul class="nav flex-column sub-menu">-->
                <!--      <li class="nav-item">-->
                <!--        <a class="nav-link" href="{{ route('admin.property.index')}}"> Property List </a>-->
                <!--      </li>                                       -->
                <!--    </ul>-->
                <!--  </div>-->
                <!--</li>-->
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.agent_list') }}">
                    <span class="menu-title">Agent List</span>
                    <i class="mdi mdi-home menu-icon"></i>
                  </a>
                </li> 
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#testimonial" aria-expanded="false" aria-controls="testimonial">
                    <span class="menu-title">Manage Testimonial</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-comments menu-icon"></i>
                  </a>
                  <div class="collapse" id="testimonial">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.testimonials.index')}}"> Testimonial List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#faq" aria-expanded="false" aria-controls="faq">
                    <span class="menu-title">Manage Faq</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-question-circle menu-icon"></i>
                  </a>
                  <div class="collapse" id="faq">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.faqs.index')}}"> Faq List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#package" aria-expanded="false" aria-controls="package">
                    <span class="menu-title">Manage Package</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-question-circle menu-icon"></i>
                  </a>
                  <div class="collapse" id="package">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.packages.index')}}"> Package List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#page" aria-expanded="false" aria-controls="page">
                    <span class="menu-title">Manage Page</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-question-circle menu-icon"></i>
                  </a>
                  <div class="collapse" id="page">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.pages.index')}}"> Page List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#blog" aria-expanded="false" aria-controls="blog">
                    <span class="menu-title">Manage Blog</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-question-circle menu-icon"></i>
                  </a>
                  <div class="collapse" id="blog">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.blogs.index')}}"> Blog List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>
    
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                    <span class="menu-title">User Manage</span>
                    <i class="menu-arrow"></i>
                    <i class="fa fa-user menu-icon"></i>
                  </a>
                  <div class="collapse" id="auth">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.users.index')}}"> User List </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.roles.index')}}"> Role Manage </a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.permissions.index')}}"> Permission Manage </a>
                      </li>                  
                    </ul>
                  </div>
                </li>
    
                @if(auth()->user()->can('settings.view'))
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.business.index')}}" target="_blank">
                      <span class="menu-title">Settings</span>
                      <i class="fa fa-gear menu-icon"></i>
                    </a>
                  </li>
                @endif  
            @endif

          </ul>
        </nav>