<nav class="navbar align-items-start sidebar fixed accordion p-0 bg_dark active">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="{{ route('admin.dashboard')}}">
            <div class="sidebar-brand-text pt-3">
                <img src="{{ getImage('settings',getInfo('logo'))}}" alt="" class="img-fluid side_logo">
            </div>
        </a>
        
        <ul class="navbar-nav text-light accordionSidebar">            
            <li class="nav-item {{ segment1('dashboard')}}">
                <a class="nav-link" href="{{ route('admin.dashboard')}}"><i class="fas fa-tachometer-alt" ></i><span>Dashboard</span></a>
            </li>

            @if(auth()->user()->can('social.view'))
            <li class="nav-item dropdown {{ segmentsingle('social')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Social Links Manage</span>
                </a>
                  <div class="dropdown_content  {{ segment1('social')}}">
                    <a href="{{ route('admin.social.index')}}" class="link {{ segmentsingle('social')}}">Social Link List</a>                    
                </div>
            </li>
            @endif
            
            @if(auth()->user()->can('sliders.view'))
            <li class="nav-item dropdown {{ segmentsingle('sliders')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Slider Manage</span>
                </a>
                  <div class="dropdown_content  {{ segment1('sliders')}}">
                    <a href="{{ route('admin.sliders.index')}}" class="link {{ segmentsingle('sliders')}}">Slider List</a>                    
                </div>
            </li>
            @endif
            
            @if(auth()->user()->can('blogs.view'))
            <li class="nav-item dropdown {{ segmentsingle('blogs')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Manage Slider Section</span>
                </a>
                  <div class="dropdown_content  {{ segment1('blogs')}}">
                    <a href="{{ route('admin.slider-section.index')}}" class="link {{ segmentsingle('blogs')}}">Slider Section</a>                                             
                </div>
            </li>
            @endif 
            
            @if(auth()->user()->can('blogs.view'))
            <li class="nav-item dropdown {{ segmentsingle('blogs')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Message Of ED</span>
                </a>
                  <div class="dropdown_content  {{ segment1('blogs')}}">
                    <a href="{{ route('admin.exec-dir.index')}}" class="link {{ segmentsingle('blogs')}}">Message Of ED</a>                  
                </div>
            </li>
            @endif  
            
            @if(auth()->user()->can('blogs.view'))
            <li class="nav-item dropdown {{ segmentsingle('blogs')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Story</span>
                </a>
                  <div class="dropdown_content  {{ segment1('blogs')}}">
                    <a href="{{ route('admin.our-story.index')}}" class="link {{ segmentsingle('our_story')}}">Story</a>                    
                </div>
            </li>
            @endif  

            @if(auth()->user()->can('blogs.view'))
            <!--<li class="nav-item dropdown {{ segmentsingle('blogs')}}">-->
            <!--    <a class="nav-link" href="#">-->
            <!--    <i class="fas fa-sliders-h"></i><span>Manage Blog</span>-->
            <!--    </a>-->
            <!--      <div class="dropdown_content  {{ segment1('blogs')}}">-->
            <!--        <a href="{{ route('admin.blogs.index')}}" class="link {{ segmentsingle('blogs')}}">Blog List</a>                    -->
            <!--    </div>-->
            <!--</li>-->
            @endif
            
            @if(auth()->user()->can('page.view'))
            <li class="nav-item dropdown {{ segmentsingle('page')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Nuk Programs</span>
                </a>
                  <div class="dropdown_content  {{ segment1('page')}}">
                    <a href="{{ route('admin.all_nuk_pages')}}" class="link {{ segmentsingle('page')}}">Nuk Programs</a>                    
                </div>
            </li>
            @endif
            
            @if(auth()->user()->can('page.view'))
            <li class="nav-item dropdown {{ segmentsingle('page')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>News & Articles</span>
                </a>
                  <div class="dropdown_content  {{ segment1('page')}}">
                    <a href="{{ route('admin.all_news_articles')}}" class="link {{ segmentsingle('page')}}">News & Articles</a>                    
                </div>
            </li>
            @endif
            
            @if(auth()->user()->can('page.view'))
            <li class="nav-item dropdown {{ segmentsingle('page')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Network</span>
                </a>
                  <div class="dropdown_content  {{ segment1('page')}}">
                    <a href="{{ route('admin.all_network_pages')}}" class="link {{ segmentsingle('page')}}">Network</a>                    
                </div>
            </li>
            @endif
            
            @if(auth()->user()->can('page.view'))
            <li class="nav-item dropdown {{ segmentsingle('page')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Our Story</span>
                </a>
                  <div class="dropdown_content  {{ segment1('page')}}">
                    <a href="{{ route('admin.all_story_pages')}}" class="link {{ segmentsingle('page')}}">Our Story</a>                    
                </div>
            </li>
            @endif
            
            @if(auth()->user()->can('page.view'))
            <li class="nav-item dropdown {{ segmentsingle('page')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Manage Page</span>
                </a>
                  <div class="dropdown_content  {{ segment1('page')}}">
                    <a href="{{ route('admin.pages.index')}}" class="link {{ segmentsingle('page')}}">Page List</a>                    
                </div>
            </li>
            @endif

            @if(auth()->user()->can('menu.view'))
            <li class="nav-item dropdown {{ segmentsingle('menu')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Manage Menu</span>
                </a>
                  <div class="dropdown_content  {{ segment1('page')}}">
                    <a href="{{ route('admin.menus.index')}}" class="link {{ segmentsingle('menu')}}">Menu Items</a>                    
                </div>
            </li>
            @endif

            @if(auth()->user()->can('submenu.view'))
            <li class="nav-item dropdown {{ segmentsingle('submenu')}}">
                <a class="nav-link" href="#">
                <i class="fas fa-sliders-h"></i><span>Manage Sub Menu</span>
                </a>
                  <div class="dropdown_content  {{ segment1('submenu')}}">
                    <a href="{{ route('admin.submenus.index')}}" class="link {{ segmentsingle('submenu')}}">Sub Menu Items</a>                    
                </div>
            </li>
            @endif

            <li class="nav-item dropdown {{ segment1('users')}} {{ segment1('roles')}} {{ segment1('permissions')}} ">
                <a class="nav-link" href="#">
                    <i class="fas fa-luggage-cart" ></i><span>User Manage</span>
                </a>
                  <div class="dropdown_content">
                    <a href="{{ route('admin.users.index')}}" class="link {{ segment1('users')}}">User List</a>
                    <a href="{{ route('admin.roles.index')}}" class="link {{ segment1('roles')}}">Role Manage</a>
                    <a href="{{ route('admin.permissions.index')}}" class="link {{ segment1('permissions')}}">Permission Manage</a>
                </div>
            </li>


            <li class="nav-item dropdown d-none">
                <a class="nav-link" href="#">
                    <i class="fas fa-luggage-cart" ></i><span>Contact Manage</span>
                </a>
                  <div class="dropdown_content">
                    <a href="{{ route('admin.customers.index')}}" class="link active">Customer List</a>
                    <a href="{{ route('admin.suppliers.index')}}" class="link active">Supplier List</a>
                </div>
            </li>


            <li class="nav-item dropdown {{ segment1('products')}} {{ segment1('product-categories')}} d-none">
                <a class="nav-link" href="#">
                    <i class="fas fa-luggage-cart" ></i><span>Product</span>
                </a>
                  <div class="dropdown_content">
                    <a href="{{ route('admin.products.index')}}" class="link {{ segment1('products')}}">Product List</a>
                    <a href="{{ route('admin.product_categories.index')}}" class="link {{ segment1('product-categories')}}">Category Manage</a>
                </div>
            </li>

            <li class="nav-item dropdown {{ segment1('purchases')}} d-none">
                <a class="nav-link" href="#">
                    <i class="fas fa-luggage-cart" ></i><span>Purchase Manage</span>
                </a>
                  <div class="dropdown_content">
                    <a href="{{ route('admin.purchases.index')}}" class="link {{ segmentsingle('purchases')}}">Purchase List</a>
                    <a href="{{ route('admin.purchases.create')}}" class="link {{ segmentMulti('purchases','create')}}">Purchase Add</a>

                </div>
            </li>

            <li class="nav-item dropdown {{ segment1('sells')}} d-none">
                <a class="nav-link" href="#">
                    <i class="fas fa-luggage-cart" ></i><span>Sell Manage</span>
                </a>
                  <div class="dropdown_content">
                    <a href="{{ route('admin.sells.index')}}" class="link {{ segmentsingle('sells')}}">Sell List</a>
                    <a href="{{ route('admin.sells.create')}}" class="link {{ segmentMulti('sells','create')}}">Sell Add</a>
                </div>
            </li>

            @if(auth()->user()->can('expenses.view'))

            <li class="nav-item dropdown {{ segment1('transactions')}} {{ segment1('expense-categories')}} d-none">
                <a class="nav-link" href="#">
                    <i class="fas fa-luggage-cart" ></i><span> Manage Expense </span>
                </a>
                  <div class="dropdown_content">
                    <a href="{{ route('admin.transactions.index')}}" class="link {{ segmentsingle('transactions')}}">Expense List</a>
                    <a href="{{ route('admin.transactions.create')}}" class="link {{ segmentMulti('transactions','create')}}">Expense Add</a>
                    <a href="{{ route('admin.expense_categories.index')}}" class="link {{ segment1('expense-categories')}}">Expense Category List</a>
                    
                </div>
            </li>

            @endif

            @if(auth()->user()->can('memberships.view') || auth()->user()->can('employee_types.view'))
            <li class="nav-item dropdown {{ segment1('memberships')}} {{ segment1('membership-types')}} d-none">
                <a class="nav-link" href="#">
                    <i class="fas fa-luggage-cart" ></i><span>Membership Manage</span>
                </a>
                  <div class="dropdown_content {{ segment1('memberships')}} {{ segment1('membership-types')}}">
                    <a href="{{ route('admin.memberships.index')}}" class="link {{ segment1('memberships')}}">Membership List</a>
                    <a href="{{ route('admin.membership_types.index')}}" class="link {{ segment1('membership-types')}}">Membership Type List</a>
                </div>
            </li>
            @endif

            <li class="nav-item dropdown {{ segment1('membership')}} d-none">
                <a class="nav-link" href="#">
                    <i class="far fa-user-circle" ></i><span>Payment</span>
                </a>
                  <div class="dropdown_content {{ segment1('membership')}}">
                    <a href="{{ route('admin.memberships.getPayment')}}" class="link {{ segment2('get')}}">Membership Payment</a>
                    <a href="{{ route('admin.memberships.paymentList')}}" class="link {{ segment2('payment')}}">Membership Payment List</a>
                </div>
            </li>

    
            @can('report.all_payment')
            <li class="nav-item dropdown {{ segment1('reports')}} d-none">
                <a class="nav-link" href="#">
                    <i class="far fa-user-circle" ></i><span>Reporting</span>
                </a>
                <div class="dropdown_content segment2('all-payment')">
                    <a href="{{ route('admin.reports.allPayment')}}" class="link segment2('all-payment')">Membership List</a>
                    <a href="{{ route('admin.reports.productSTock')}}" class="link segment2('product-stock')">Product Stock</a>
                    <a href="{{ route('admin.reports.productSell')}}" class="link segment2('product-sell')">Product Sell</a>
                    <a href="{{ route('admin.reports.expenseReport')}}" class="link segment2('expesne')">Expense Report</a>
                </div>
            </li>
            @endcan

        </ul>
        <div class="w-100">
            <ul class="navbar-nav text-light fixed_sidebar_height">
                
            </ul>
            <!--<ul class="navbar-nav text-light accordionSidebar fixed-logout">-->
            <!--    <div class="menu_header">Preference</div>-->
            <!--    @if(auth()->user()->can('settings.view'))-->
            <!--    <li class="nav-item {{ segment1('business')}}">-->
            <!--        <a class="nav-link" href="{{ route('admin.business.index')}}"><i class="fas fa-tools"></i><span>Settings</span></a>-->
            <!--    </li>-->
                
            <!--    <li class="nav-item {{ segment1('api-attendance')}}">-->
            <!--        <a class="nav-link" href="{{ route('admin.api-attendance.index')}}"><i class="fas fa-tools"></i><span>Get Api Data</span></a>-->
            <!--    </li>-->
            <!--    @endif-->
               
            <!--</ul>-->
        </div>
        <!-- <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0 text-light sidebar_toggler" type="button"><i class="fa fa-angle-left"></i></button></div> -->
    </div>
</nav>