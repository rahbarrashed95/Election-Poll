<?php
use Illuminate\Support\Facades\Route;


//Frontend

use App\Http\Controllers\Frontend\HomeController as FrontHomeController;
use App\Http\Controllers\Frontend\GoogleAuthController;


// Backend

use App\Http\Controllers\Backend\SliderController; 
use App\Http\Controllers\Backend\SocialController; 
use App\Http\Controllers\Backend\FeatureController; 
use App\Http\Controllers\Backend\CountryVisaController; 
use App\Http\Controllers\Backend\ServiceController; 
use App\Http\Controllers\Backend\AboutUsController; 
use App\Http\Controllers\Backend\ChooseUsController; 
use App\Http\Controllers\Backend\FaqController; 
use App\Http\Controllers\Backend\TestimonialController; 
use App\Http\Controllers\Backend\BrandController; 
use App\Http\Controllers\Backend\BlogController; 
use App\Http\Controllers\Backend\AppointmentController; 
use App\Http\Controllers\Backend\PageController; 
use App\Http\Controllers\Backend\MenuController; 
use App\Http\Controllers\Backend\SubMenuController; 
use App\Http\Controllers\Backend\CollegeController; 
use App\Http\Controllers\Backend\CountryController; 
use App\Http\Controllers\Backend\ForeignRegistrationController; 
use App\Http\Controllers\Backend\RegistrationController; 
use App\Http\Controllers\Backend\ExecutiveDirectorController; 
use App\Http\Controllers\Backend\OurStoryController; 
use App\Http\Controllers\Backend\SliderSectionController; 
use App\Http\Controllers\Backend\PropertyController; 
use App\Http\Controllers\Backend\WorkStepController; 
use App\Http\Controllers\Backend\PropertyCategoryController; 
use App\Http\Controllers\Backend\PropertySubCategoryController; 
use App\Http\Controllers\Backend\AreaController; 
use App\Http\Controllers\Backend\CityController; 
use App\Http\Controllers\Backend\PackageController; 
use App\Http\Controllers\Backend\AmenitiesPropertyController; 

// Old

use App\Http\Controllers\Backend\PurchaseController; 
use App\Http\Controllers\Backend\SellController; 
use App\Http\Controllers\Backend\CustomerController; 
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\OrderPaymentController; 
use App\Http\Controllers\Backend\ProductController;  
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\EmployeeController; 
use App\Http\Controllers\Backend\EmployeeTypeController; 
use App\Http\Controllers\Backend\AttendanceController;
use App\Http\Controllers\Backend\ExpenseCategoryController;
use App\Http\Controllers\Backend\TransactionController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\MembershipTypeController;
use App\Http\Controllers\Backend\MembershipController;
use App\Http\Controllers\Backend\BusinessController;
use App\Http\Controllers\Backend\ApiController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/sitemap.xml', function () {
    // Serve the sitemap.xml from the root directory
    return Response::file(base_path('sitemap.xml'));
});

Route::get('/robots.txt', function () {
    // Serve the sitemap.xml from the root directory
    return Response::file(base_path('robots.txt'));
});

Route::group(['as'=>'front.'], function() {
    Route::controller(FrontHomeController::class)->group(function(){
        Route::get('/', 'index')->name('home');
        Route::get('about/page','about_page')->name('about_page');
        Route::post('make/appointment','make_appointment')->name('make.appointment');
        Route::post('blog/comment','blog_comment')->name('blog-comment');
        Route::get('contact/us','contact_us')->name('contact_us');
        Route::get('/registration','registration')->name('registration');
        Route::get('/foreign/registration','foreign_registration')->name('foreign-registration');
        Route::get('blog/{slug}','blog_details')->name('blog-details');
        Route::get('page/{slug}','page_details')->name('page-details');
        Route::get('executive-director-message','more_msg')->name('more_msg');
        Route::get('our-story','our_story')->name('our_story');
        Route::get('parent/{slug}','parent_page_details')->name('parent-page-details');
        Route::post('student/register','student_register')->name('student-register');
        Route::post('foreign/student/register','foreign_student_register')->name('foreign-student-register');
        Route::get('show/page','showPageBackend')->name('showPageBackend');
        
        Route::get('privacy-page-details','privacy_page_details')->name('privacy-page-details');
        Route::get('term-page-details','term_page_details')->name('term-page-details');
        Route::get('support','support')->name('support');

        Route::get('rent_details/{id}','rent_details')->name('rent_details');

        Route::get('user-login','user_login')->name('user_login');
        Route::post('login-user','login_user')->name('login_user');       
        Route::post('register-user','register_user')->name('register_user');       
        Route::get('user-logout','user_logout')->name('user_logout');      

        Route::get('create-own-property','create_own_property')->name('create_own_property');      
        
        Route::post('store-property','store_property')->name('property.store');       

        Route::get('profile/{id}','profile')->name('profile');       

        Route::get('get-pro-cat','get_property_cat')->name('get_property_cat');       
        Route::get('get-pro-cats','get_property_cats')->name('get_property_cats');       
        Route::get('get-pro-cat-checkbox','get_property_cat_checkbox')->name('get_property_cat_checkbox');       
        Route::get('get-city','get_city')->name('get_city');   
        
        Route::get('blog-list','blog_list')->name('blog_list');     
        
        Route::get('dashboard','dashboard')->name('dashboard');       

        Route::post('store-owner-property','store_owner_property')->name('store_owner_property'); 
        Route::post('update-owner-property/{id}','update_owner_property')->name('update_owner_property'); 
        
         // Interest

        Route::get('interest','interest')->name('interest');

        // City By Property

        Route::get('city-by-property/{id}','city_by_property')->name('city_by_property');  
        
        Route::get('category-by-property/{id}','category_by_property')->name('category_by_property');        

        // Search Property

        Route::get('all-property','all_property')->name('all_property');
        Route::get('buy-property','buy_property')->name('buy_property');
        Route::get('sell-property','sell_property')->name('sell_property');
        
        Route::get('list-property','list_property')->name('list_property');
        Route::get('favourite-property','favourite_property')->name('favourite_property');
        Route::get('subs-price','subs_price')->name('subs_price');


        Route::get('edit-property/{id}','edit_property')->name('property.edit');
        Route::delete('destroy-property/{id}','destroy_property')->name('property.destroy');
        Route::get('prop-status-changes/{id}','prop_status_changes')->name('prop_status_changes');


        Route::post('subscription','subscription')->name('subscription');
        Route::get('contact','contact')->name('contact');
        Route::get('agent','agent')->name('agent');
        Route::post('store-contact','store_contact')->name('store_contact');
        Route::post('update-contact','update_profile')->name('update_contact');
        Route::post('store-agent','store_agent')->name('store_agent');
        
        Route::post('/send-location','getThana');
        
        Route::get('get-thanas-by-district','get_thanas_by_district')->name('get-thanas-by-district');     
    });

    Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
    Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);
    
    Route::get('auth/facebook', [GoogleAuthController::class, 'redirectFacebook'])->name('facebook-auth');
    Route::get('auth/facebook/call-back', [GoogleAuthController::class, 'callbackFacebook']);
});

// Backend

Route::group(['prefix' => 'admin','middleware' => 'auth','as'=>'admin.'], function() {

    Route::controller(ReportController::class)->group(function(){
        Route::group(['prefix' => 'reports','as'=>'reports.'], function() {

            Route::get('/worker-payment','workerPayment')->name('workerPayment');
            Route::get('/employee-payment','employeePayment')->name('employeePayment');
            Route::get('/employee-payment-history','employeePaymentHistory')->name('employeePaymentHistory');
            Route::get('/customer-payment','customerPayment')->name('customerPayment');
            Route::get('/supplier-payment','SupplierPayment')->name('supplierPayment');
            Route::get('/product-sell','productSell')->name('productSell');
            Route::get('/profit-loss','profitLoss')->name('profitLoss');
            Route::get('/account-transfer','accountTransfer')->name('accountTransfer');

            Route::get('/category-sell','categorySell')->name('categorySell');
            Route::get('/product-stock','productSTock')->name('productSTock');
            Route::get('/all-payment','allPayment')->name('allPayment');
            Route::get('/expesne','expenseReport')->name('expenseReport');
            Route::get('/order-delivery-check','orderDeliveryCheck')->name('orderDeliveryCheck');   
                      

        });
        
    });
            
    Route::post('/ckeditor-upload',[HomeController::class,'ckeditor_upload'])->name('ckeditor.upload');
    Route::get('/dashboard',[HomeController::class,'index'])->name('dashboard');
    Route::resource('sliders',SliderController::class);
    Route::resource('social',SocialController::class);
    Route::resource('feature',FeatureController::class);
    Route::resource('visa_immigrations',CountryVisaController::class);    
    Route::resource('services',ServiceController::class);    
    Route::resource('abouts',AboutUsController::class);     
    Route::resource('chooses',ChooseUsController::class);     
    Route::resource('faqs',FaqController::class);     
    Route::resource('testimonials',testimonialController::class);     
    Route::resource('brands',BrandController::class);     
    Route::resource('blogs',BlogController::class);     
    Route::resource('appointments',AppointmentController::class);     
    Route::resource('pages',PageController::class);     
    
    Route::get('all-nuk-pages',[PageController::class,'all_nuk_pages'])->name('all_nuk_pages');     
    Route::get('create-nuk-pages',[PageController::class,'create_nuk_pages'])->name('create_nuk_pages');     
    Route::get('edit-nuk-pages/{id}',[PageController::class,'edit_nuk_pages'])->name('edit_nuk_pages');     
    
    Route::get('all-news-articles',[PageController::class,'all_news_articles'])->name('all_news_articles');     
    Route::get('create-news-articles',[PageController::class,'create_news_articles'])->name('create_news_articles');     
    Route::get('edit-news-articles/{id}',[PageController::class,'edit_news_articles'])->name('edit_news_articles');     
    
    
    Route::get('all-network-pages',[PageController::class,'all_network_pages'])->name('all_network_pages');     
    Route::get('create-network-pages',[PageController::class,'create_network_pages'])->name('create_network_pages');     
    Route::get('edit-network-pages/{id}',[PageController::class,'edit_network_pages'])->name('edit_network_pages');  
    
    
    Route::get('all-story-pages',[PageController::class,'all_story_pages'])->name('all_story_pages');     
    Route::get('create-story-pages',[PageController::class,'create_story_pages'])->name('create_story_pages');     
    Route::get('edit-story-pages/{id}',[PageController::class,'edit_story_pages'])->name('edit_story_pages');  
    
    Route::resource('exec-dir',ExecutiveDirectorController::class);     
    Route::resource('our-story',OurStoryController::class);   
    Route::resource('slider-section',SliderSectionController::class); 

    Route::delete('multi-page-delete',[PageController::class,'multi_page_delete'])->name('multi_page_delete');

    Route::resource('menus',MenuController::class);     
    Route::resource('submenus',SubMenuController::class);     
    Route::resource('college',CollegeController::class);     
    Route::resource('country',CountryController::class);    
    Route::resource('foreign-country',ForeignRegistrationController::class);     
    Route::resource('local-country',RegistrationController::class);    
    
    

    // For Property 

    Route::resource('property',PropertyController::class);      
    
    Route::get('creates-property',[PropertyController::class,'create_property'])->name('create_property');  
    Route::get('property-status-change/{id}',[PropertyController::class,'prop_status_change'])->name('prop_status_change');  

    // For Work Step

    Route::resource('work-step',WorkStepController::class);     

    // For Category

    Route::resource('categories',PropertyCategoryController::class);   

    Route::resource('sub-categories',PropertySubCategoryController::class);     

    Route::get('get-sub-cat}',[PropertyController::class,'get_sub_cat'])->name('get_sub_cat');
    
    Route::get('subscriptions-pricing',[PropertyController::class,'subs_pricing'])->name('subs_pricing');

    // For Area

    Route::resource('areas',AreaController::class);   
    
    // For City

    Route::resource('cities',CityController::class);      

    Route::get('get-city}',[PropertyController::class,'get_city'])->name('get_city');
    
    // For Profile

    Route::get('agent-list',[UserController::class,'agent_list'])->name('agent_list');
    
    Route::get('profile/{id}',[UserController::class,'profile'])->name('profile');

    Route::get('status-change/{id}',[UserController::class,'status_change'])->name('status_change');

    // For Package

    Route::resource('packages',PackageController::class);         
    Route::resource('amenity-property',AmenitiesPropertyController::class);         
    
    
    Route::get('get-property-cat',[PropertyController::class, 'get_property_category'])->name('get_property_category');   
    
    // Old
    Route::get('/suppliers',[CustomerController::class,'getSuppliers'])->name('suppliers.index');
    Route::resource('customers',CustomerController::class);
    Route::resource('users',UserController::class);
    Route::resource('roles',RoleController::class);
    Route::resource('permissions',PermissionController::class);
    Route::resource('purchases',PurchaseController::class);
    Route::resource('sells',SellController::class);
    Route::resource('products',ProductController::class);
    Route::resource('employees',EmployeeController::class);
    Route::resource('api-attendance',ApiController::class);
    
    Route::get('/get-employee-payment/{id}',[EmployeeController::class,'getEmployeePayment'])->name('getEmployeePayment');
    Route::post('/store-employee-payment/{id}',[EmployeeController::class,'storeEmployeePayment'])->name('storeEmployeePayment');

    
    Route::resource('attendance',AttendanceController::class);
    Route::resource('transactions',TransactionController::class);
    Route::resource('memberships',MembershipController::class);
    Route::get('/membership/payment/list',[MembershipController::class,'paymentList'])->name('memberships.paymentList');
    Route::get('/membership/get/payment',[MembershipController::class,'getPayment'])->name('memberships.getPayment');
    Route::post('/membership/store-payment',[MembershipController::class,'storePayment'])->name('memberships.storePayment');


    Route::resource('business',BusinessController::class);
    Route::resource('product-categories', ProductCategoryController::class, 
        ['names' => 'product_categories']);
    Route::resource('order-payments', OrderPaymentController::class, ['names' => 'order_payments']);
    Route::resource('employee-types', EmployeeTypeController::class, ['names' => 'employee_types']);
    Route::resource('membership-types', MembershipTypeController::class, ['names' => 'membership_types']);
    Route::resource('expense-categories', ExpenseCategoryController::class, ['names' => 'expense_categories']);

    Route::get('/get-purchase-product',[PurchaseController::class,'getPurchaseProduct'])->name('getPurchaseProduct');
    Route::get('/purchase-product-entry',[PurchaseController::class,'purchaseProductEntry'])->name('purchaseProductEntry');
    Route::get('/get-sell-product',[SellController::class,'getSellProduct'])->name('getSellProduct');
    Route::get('/sell-product-entry',[SellController::class,'sellProductEntry'])->name('sellProductEntry');
    
    Route::get('/sell-invoice/{id}',[SellController::class,'sellInvoice'])->name('sellInvoice');
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
