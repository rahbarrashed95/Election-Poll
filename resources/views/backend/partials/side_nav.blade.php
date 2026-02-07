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
            
          
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <span class="menu-title">Dashboard</span>
                    <i class="mdi mdi-home menu-icon"></i>
                  </a>
                </li> 
             
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#manage_seats" aria-expanded="false" aria-controls="manage_seats">
                    <span class="menu-title">Manage Seats</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-area menu-icon"></i>
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
    
                  </a>
                  <div class="collapse" id="manage_seats">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.seats.index')}}"> Seat List </a>
                      </li>                                       
                    </ul>
                  </div>
                </li>

                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="collapse" href="#manage_candidates" aria-expanded="false" aria-controls="manage_candidates">
                    <span class="menu-title">Manage Candidates</span>
                    <i class="menu-arrow"></i>
                    <i class="mdi mdi-area menu-icon"></i>
                    <i class="fa fa-area-chart" aria-hidden="true"></i>
    
                  </a>
                  <div class="collapse" id="manage_candidates">
                    <ul class="nav flex-column sub-menu">
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.candidates.index')}}"> Candidate List </a>
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
    
                
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.business.index')}}" target="_blank">
                      <span class="menu-title">Settings</span>
                      <i class="fa fa-gear menu-icon"></i>
                    </a>
                  </li>

          </ul>
        </nav>