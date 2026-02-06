<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

Use App\Models\Slider;
Use App\Models\Social;
Use App\Models\Feature;
Use App\Models\Service;
Use App\Models\CountryVisa;
Use App\Models\AboutUs;
Use App\Models\ChooseUs;
Use App\Models\Faq;
Use App\Models\Testimonial;
Use App\Models\Brand;
Use App\Models\Blog;
Use App\Models\Appointment;
Use App\Models\Page;
Use App\Models\SubMenu;
Use App\Models\Registration;
Use App\Models\ForeignRegistration;
Use App\Models\College;
Use App\Models\Country;
Use App\Models\Menu;
use App\Models\ExecutiveDirector;
use App\Models\OurStory;
use App\Models\SliderSection;
use App\Models\Property;
use App\Models\WorkStep;
use App\Models\User;
use App\Models\PropertyCategory;
use App\Models\PropertySubCategory;
use App\Models\AmenitiesProperty;
use App\Models\City;
use App\Models\District;
use App\Models\Area;
use App\Models\PropertyInterest;
use App\Models\Package;
use App\Models\Subscription;
use App\Models\Contact;
use App\Models\Agent;
use App\Models\PropertyFavourite;
use Auth;
use Hash;
use File;
use Image;
use DB;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {       
        $slider_items = Slider::where('status', 1)->latest()->get();
        // $social_items = Social::where('status', 1)->latest()->get();
        $feature_items = Feature::where('status', 1)->latest()->get();
        $feature_items = Feature::where('status', 1)->latest()->get();
        $country_items = CountryVisa::where('status', 1)->latest()->get();
        $service_items = Page::where(['type' => 'service','status' => 1])->latest()->get();
        $about_page = AboutUs::where('status', 1)->first();
        $choose_us = ChooseUs::where('status', 1)->get();
        // $faq_items = Faq::where('status', 1)->get();
        // $testimonial_items = Testimonial::where('status', 1)->get();
        $brand_items = Brand::where('status', 1)->get();
        $blog_items = Blog::where('status', 1)->get();
        $ed = ExecutiveDirector::first();
        $our_story = OurStory::first();
        $nuk_items = Page::where(['type' => 'NUK Programs','status' => 1])->latest()->limit(6)->get();
        $news_items = Page::where(['type' => 'news-articles','status' => 1])->latest()->limit(6)->get();
        $slider_sections = SliderSection::get(); 
        
        // $properties = Property::where('status',1)->latest()->get();
        // $properties = Property::leftJoin('property_favourites','property_favourites.property_id','=','properties.id')
        //             ->where('properties.status',1)
        //             ->select('properties.*','property_favourites.id','property_favourites.property_id','property_favourites.user_id')->orderBy('id','desc')->get();
        
        $properties = Property::leftJoin('property_favourites', 'property_favourites.property_id', '=', 'properties.id')
                    ->where('properties.status', 1)
                    ->select(
                        'properties.*',
                        'property_favourites.id as favourite_id',
                        'property_favourites.user_id as favourite_user_id'
                    )
                    ->orderBy('properties.id', 'desc')
                    ->get();
       
        $work_steps = WorkStep::orderBy('id','asc')->get();
        $property_types = PropertyCategory::all();
        $sub_types = PropertySubCategory::all();
        $testimonial_items = Testimonial::where('status', 1)->get();
        $faq_items = Faq::where('status', 1)->get();
        $cities = City::all();
        // $cities = District::select('district')->distinct()->get();
        $social_items = Social::where('status', 1)->latest()->get();
        $page_items = Page::latest()->limit(5)->get();
        
        $top_areas = Area::withCount('properties')
                    ->orderByDesc('properties_count')
                    ->limit(3)
                    ->get();
        
        // $topAreaIds = Property::select('area_id')
        //             ->groupBy('area_id')
        //             ->orderByRaw('COUNT(*) DESC')
        //             ->limit(3)
        //             ->pluck('area_id');
                    
        // // Step 2: Get full area info for those area_ids
        // $areas = Area::whereIn('id', $topAreaIds)->get()->keyBy('id');         

        return view('frontend.home.index', compact('properties','work_steps','property_types','sub_types','cities','testimonial_items','faq_items','social_items','page_items','top_areas'));
        // return view('frontend.home.index', compact('slider_items','social_items','feature_items','service_items','country_items','about_page','choose_us','faq_items','testimonial_items','brand_items','blog_items','ed','our_story','nuk_items','news_items','slider_sections'));
    }
    
    public function dashboard(){
        $user = User::find(Auth::user()->id);
        $items = Property::where('owner_id',Auth::user()->id)->latest()->get();
        $favourites = PropertyFavourite::where('user_id',Auth::user()->id)->latest()->get();
        $packages = Package::where('status', 1)->whereNot('name','free')->latest()->get();
        $active_property_count = Property::where('owner_id',Auth::user()->id)->where('status', 1)->count();
        $draft_property_count = Property::where('owner_id',Auth::user()->id)->where('status', 0)->count();
        $favourite_property_count = PropertyFavourite::where('user_id',Auth::user()->id)->count();
        // dd($active_property);
        
        return view('frontend.profile.dashboard', compact('user','items','favourites','packages','active_property_count','draft_property_count','favourite_property_count'));
    }
    
    public function showPageBackend(Request $request) {
        
    $page_id = $request->id;
    $menu = Menu::where('page_id', $page_id)->first();
    if ($menu) {
        
        $page_item = Page::find($page_id);
        
        return response()->json([
            'status' => true,
            'url' => route('front.parent-page-details', ['slug' => $page_item->slug])
        ]);
    }
   
    $subMenu = SubMenu::where('page_id', $page_id)->first();
    if ($subMenu) {
        
        $page_item = Page::find($page_id);
        
        return response()->json([
            'status' => true,
            'url' => route('front.page-details', ['slug' => $page_item->slug]) 
        ]);
    }
    
    return response()->json(['status' => false]);
}

    public function getThanag(Request $request)
    {
        // $lat = $request->input('lat');
        // $lon = $request->input('lon');
       
        // if (empty($lat) || empty($lon)) {
        //     return response()->json(['error' => 'Latitude and longitude are required'], 422);
        // }
        
        // $apiKey = env('GOOGLE_MAP_API_KEY');
        // $params = [
        //     'latlng' => $lat . ',' . $lon,
        //     'key' => $apiKey,
        // ];

        // $apiKey = env('GOOGLE_MAP_API_KEY', 'AIzaSyDqzGcjUF26pJWvWma1kCdNj5hYGYrkuDw');
        
        // $params['latlng'] = $lat . ',' . $lon;
        // $params['key'] = $apiKey;
        // $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', $params);
        // $data = $response->json();
        
        // $apiKey = env('GOOGLE_MAP_API_KEY', 'AIzaSyDqzGcjUF26pJWvWma1kCdNj5hYGYrkuDw');
        
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        
        if (empty($lat) || empty($lon)) {
            return response()->json(['error' => 'Latitude and longitude are required'], 422);
        }
        
        $params = [
            'latlng' => "$lat,$lon",
            'key' => $apiKey,
        ];
        
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', $params);
        $data = $response->json();
        
        $thana = null;
        
        if (!empty($data['results'])) {
            foreach ($data['results'][0]['address_components'] as $component) {
                if (in_array('sublocality_level_1', $component['types']) || 
                    in_array('locality', $component['types']) ||
                    in_array('administrative_area_level_2', $component['types'])) {
                    $thana = $component['long_name'];
                    break;
                }
            }
        }
        
        dd($thana);
        
        if ($thana) {
            dd($thana);
            return response()->json(['thana' => $thana]);
        } else {
            return response()->json(['error' => 'Thana not found'], 404);
        }
        
        // $test=[];
        
        // if (!empty($data['results'])) {
        //     foreach ($data['results'][0]['address_components'] as $component) {
        //         if (in_array('sublocality_level_1', $component['types']) ||
        //             in_array('administrative_area_level_3', $component['types'])) {
        //              $test[]=$component['long_name']; // ✅ Return only the Thana name
        //         }
        //     }
        //     dd($test);
        // }
        
        $suggested = Property::join('areas', 'properties.area_id', '=', 'areas.id')
                    ->where('areas.area_name', $test)
                    ->select('properties.*') // ensure correct fields
                    ->get();
                    
        return response()->json([
            'properties' => $suggested->isNotEmpty() ? $suggested : 'No Data Found !!'
        ]);
    }
    
     public function getThana(Request $request)
    {
        
        $lat = $request->input('lat');
        $lon = $request->input('lon');
        
        if (empty($lat) || empty($lon)) {
            return response()->json(['error' => 'Latitude and longitude are required'], 422);
        }
        
        $apiKey = env('GOOGLE_MAP_API_KEY', 'AIzaSyDqzGcjUF26pJWvWma1kCdNj5hYGYrkuDw');
        
        $params = [
            'latlng' => "$lat,$lon",
            'key' => $apiKey,
        ];
        
        $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', $params);
        $data = $response->json();
        
        $thana = null;
        
        if (!empty($data['results'])) {
            foreach ($data['results'][0]['address_components'] as $component) {
                if (in_array('administrative_area_level_2', $component['types'])) {
                    $thana = $component['long_name'];
                    break;
                }
            }
        }
        
        dd($thana);
        
        
    //   $lat = $request->input('lat');
    //     $lon = $request->input('lon');
    //     // dd($lat,$lon);
    //     if (empty($lat) || empty($lon)) {
    //         return response()->json(['error' => 'Latitude and longitude are required'], 422);
    //     }

    //     // Get Google API key from .env or fallback key
    //     $apiKey = env('GOOGLE_MAP_API_KEY', 'AIzaSyDqzGcjUF26pJWvWma1kCdNj5hYGYrkuDw');
        
        // // Build the Google Geocoding API URL
        // $geoUrl = "https://maps.googleapis.com/maps/api/geocode/json?latlng={$lat},{$lon}&key={$apiKey}";
    
        // // Initialize cURL 
        // $ch = curl_init($geoUrl);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($ch);
    
        // // Check for cURL errors
        // if (curl_errno($ch)) {
        //     return response()->json(['error' => 'Curl error: ' . curl_error($ch)], 500);
        // }
        // curl_close($ch);
    
        // $geoData = json_decode($response, true);
    
        // // Check if API returned OK
        // if (!isset($geoData['status']) || $geoData['status'] !== 'OK') {
        //     return response()->json([
        //         'error' => $geoData['error_message'] ?? 'Failed to retrieve location data',
        //         'status' => $geoData['status'] ?? 'Unknown'
        //     ], 400);
        // }
    
        // // Possible address component types that might indicate the "thana"
        // $possibleTypes = [
        //     'sublocality_level_1',
        //     'sublocality',
        //     'administrative_area_level_3',
        //     'locality',
        //     'postal_town',
        //     'neighborhood',
        // ];

        // // Loop through results to find the thana
        // foreach ($geoData['results'] as $result) {
        //     foreach ($result['address_components'] as $component) {
        //         if (!empty(array_intersect($component['types'], $possibleTypes))) {
        //             return response()->json([
        //                 'thana' => $component['long_name']
        //             ]);
        //         }
        //     }
        // }
        // // If nothing found, return Not Found
        // return response()->json(['thana' => 'Not found'], 404);
        
        
        // test dev
            // $params['latlng'] = $lat . ',' . $lon;
            // $params['key'] = $apiKey;
            // $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', $params);
            // $data = $response->json();
            // $test=[];
            
            // if (!empty($data['results'])) {
            //     foreach ($data['results'][0]['address_components'] as $component) {
            //         if (in_array('sublocality_level_1', $component['types']) ||
            //             in_array('administrative_area_level_3', $component['types'])) {
            //              $test[]=$component['long_name']; // ✅ Return only the Thana name
            //         }
            //     }
            //     dd($test);
            // }
        
        $suggested = Property::join('areas', 'properties.area_id', '=', 'areas.id')
                    ->where('areas.area_name', $test)
                    ->select('properties.*') // ensure correct fields
                    ->get();
                    
        // $suggested = Property::join('areas', 'properties.area_id', '=', 'areas.id')
        //             ->where('areas.area_name', $areaName)
        //             ->select('properties.*')
        //             ->get();
    
        return response()->json([
            'properties' => $suggested->isNotEmpty() ? $suggested : 'No Data Found !!'
        ]);
                    
        // if(count($suggested_properties)){
        //     return response()->json([
        //         'properties' => $properties
        //     ]);
        // } else {
        //     return response()->json([
        //         'properties' => 'No Data Found !!'
        //     ]);
        // }
        
    }

    public function all_property(Request $request){

        if(request()->ajax()){
            
            $sub_types = request()->get('sub_types', []);          
            $types = request()->get('types', []);    
            $city_id = request()->city_id;   
            $area_id = request()->area_id;  
            $bed = request()->bed;  
            $bath = request()->bath;  
            $min_price = request()->min_price;  
            $max_price = request()->max_price;  
            $pro_type = request()->pro_type;  
            $search = request()->search;  
            
            $query = Property::leftJoin('property_categories as pc','properties.cat_id','=','pc.id')
                    ->leftJoin('property_sub_categories as psc','properties.sub_cat_id','=','psc.id')
                    ->leftJoin('cities as c','properties.city_id','=','c.id')
                    ->leftJoin('areas as a','properties.area_id','=','a.id')                           
                    ->select('properties.id','properties.title','properties.thumb_img','properties.location','properties.bed','properties.bath','properties.floor_area','properties.price','pc.name as cat_name','psc.name as sub_cat_name','c.city as city','a.area_name as area');
              
            
            if(!empty($pro_type)){
                $query->where('properties.pro_type', $pro_type);
            }
          
            if(!empty($sub_types)){
                $query->whereIn('sub_cat_id', $sub_types);
            }

            if (!empty($types)) {
                $query->whereIn('cat_id', $types);
            }

            if (!empty($city_id)) {
                $query->where('properties.city_id', $city_id);
            }

            if (!empty($area_id)) {
                $query->where('properties.area_id', $area_id);
            } 

            if (!empty($bed)) {
                $query->where('properties.bed', $bed);
            }

            if (!empty($bath)) {
                $query->where('properties.bath', $bath);
            }
            
            if ($request->has('min_price') && $request->has('max_price')) {
                $min_price = (int) $request->input('min_price');
                $max_price = (int) $request->input('max_price');
            
                $query->whereBetween('price', [$min_price, $max_price]);
            }
            
            // if(!empty($min_price) && !empty($max_price)){
            //     // dd($min_price, $max_price);
            //     $query->whereBetween('properties.price',[$min_price, $max_price]);
            // }

            if(!empty($search)){
                $query->where(function($row) use ($search){
                    $row->where('properties.title','like','%'.$search.'%')
                        ->orWhere('properties.location','like','%'.$search.'%')
                        ->orWhere('properties.landmark','like','%'.$search.'%');
                });
            }
        

            $filtered_properties = $query->paginate(100);      
            
            // dd($filtered_properties); 

            $property_data = view('frontend.property.property_data', compact('filtered_properties'))->render();           
            return response()->json(['success'=>true,'property_data'=>$property_data]);
        }

        $sub_types = PropertySubCategory::all();
        $types = PropertyCategory::all();
        $cities = City::all();
        $areas = Area::all();
        
        return view('frontend.property.search_property', compact('sub_types','types','cities','areas'));
    }

    public function rent_details(string $id){
        $item = Property::with('amenities')->find($id);    
        $similiar_items = Property::where('cat_id', $item->cat_id)
                        ->where('sub_cat_id', $item->sub_cat_id)
                        ->where('city_id', $item->city_id)
                        ->where('id', '!=', $item->id)
                        ->get();
       
        if(!empty(Auth::user()->id)){
            $user_id = Auth::user()->id;
            $existance = PropertyInterest::where(['property_id'=>$id,'user_id'=>Auth::user()->id])->exists(); 
        } else {
            $existance = '';
        }
        
        return view('frontend.rent.rent_details', compact('item','existance','similiar_items'));
    }

    public function blog_list(){
      
        $items = Blog::all();
        
        $social_items = Social::where('status', 1)->latest()->get();
        $sub_types = PropertySubCategory::all();
        $cities = City::all();
        $page_items = Page::latest()->limit(5)->get();

        return view('frontend.property.blog_list', compact('items','social_items','sub_types','cities','page_items'));
    }
    
    public function sell_property(){
        $packages = Package::where('status', 1)->whereNot('name','free')->latest()->get();
        return view('frontend.property.sell_property', compact('packages'));
    }
    
    public function city_by_property(string $id){
      
        $items = Property::where('area_id', $id)->get();
        
        $social_items = Social::where('status', 1)->latest()->get();
        $sub_types = PropertySubCategory::all();
        $cities = City::all();
        $page_items = Page::latest()->limit(5)->get();

        return view('frontend.property.details', compact('items','social_items','sub_types','cities','page_items'));
    }
    
    public function category_by_property(string $id){
        $items = Property::where('sub_cat_id', $id)->get();
        $social_items = Social::where('status', 1)->latest()->get();
        $sub_types = PropertySubCategory::all();
        $cities = City::all();
        $page_items = Page::latest()->limit(5)->get();

        return view('frontend.property.details', compact('items','social_items','sub_types','cities','page_items'));
    }
    
    public function list_property(){
        $items = Property::where('owner_id',Auth::user()->id)->get();
        return view('frontend.profile.list_property', compact('items'));
    }
    
    public function favourite_property(){
        $favourites = PropertyFavourite::where('user_id',Auth::user()->id)->get();
        return view('frontend.profile.favourite_property', compact('favourites'));
    }
    
    public function subs_price(){
        $packages = Package::where('status', 1)->whereNot('name','free')->latest()->get();
        return view('frontend.property.show_packages',compact('packages'));   
    }

    public function user_login(){
        if (auth()->check()) {
            return redirect()->route('front.home');
        }
        return view('auth.user_login');
    }

    public function user_register(){
        return view('auth.user_register');
    }

    public function login_user(Request $request){
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = \App\Models\User::where('email', $credentials['email'])->first();
        
        if (!$user) {
            return response()->json(['status' => false, 'msg' => 'Your login email or password is wrong. Please try again!']);
        }
        
        if (!Hash::check($credentials['password'], $user->password)) {
            return response()->json(['status' => false, 'msg' => 'Your login email or password is wrong. Please try again!']);
        }
        
        if ($user->status != 1) {
            return response()->json(['status' => false, 'msg' => 'You have no permission to login. Please contact support.']);
        }
        
        Auth::login($user);
        
        return response()->json(['status' => true, 'msg' => 'Login Successful', 'url' => route('front.home')]);

    }

    public function register_user(Request $request){
        $data = $request->validate([
            'name' =>  'required|min:3',
            'user_type' =>  'required',
            'email' =>  'required|unique:users',
            'phone' =>  'required|unique:users',
            'password' =>  'required|min:6|same:confirm_password',
            'role' =>  '',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type = $request->user_type;
        $user->password = Hash::make($request->confirm_password);

        $role = 'Property Owner';

        $user->save();

        $user->assignRole($role);
        $route = route('front.user_login');
        // dd($route);
        return response()->json(['success'=>true,'url'=>$route]);
    }

    public function user_logout(Request $request)
    {        
        Auth::logout();        
        return redirect()->route('front.home');
    }    

    public function store_contact(Request $request){

        $data=$request->validate([
            'name' => '',
            'email' => ''
        ]); 
        
        Contact::create($data);
       
        return response()->json([
            'status'=>true,
            'msg'=>'Contact Created Successfully!',                      
        ]);
    }
    
    public function update_profile(Request $request){
        $data=$request->validate([
            'name' => '',
            'phone' => '',
            'email' => '',
            'city' => '',
            'address' => '',
            'user_type' => '',
        ]); 
        
        $user = auth()->user();
        if ($request->filled('old_password') && $request->filled('password')) {
            if (!Hash::check($request->old_password, $user->password)) {
                return response()->json([
                    'status'=>false,
                    'msg'=>'Old password does not matched!',                      
                ]);
            }
            // Update new password
            $data['password'] = Hash::make($request->password);
        }
        
        if($request->hasFile('image')) {                

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('image')->move(public_path('backend/user'), $fileName);
            $data['image']=$fileName;      
        } 
        
        $user->update($data);
       
        return response()->json([
            'status'=>true,
            'msg'=>'Profile Updated Successfully!',                      
        ]);
    } 
    
    public function agent(){
        return view('frontend.page.agent');
    }
    
    public function store_agent(Request $request){
        
        if(Auth::user()->hasRole('superadmin')) {
            return response()->json([
                'status'=>false,
                'msg'=>'Sorry',                      
            ]);
        }

        $data=$request->validate([
            'name' => '',
            'phone' => '',
            'email' => '',
            'reason' => ''
        ]); 
        
        Agent::create($data);
       
        return response()->json([
            'status'=>true,
            'msg'=>'Agent Created Successfully!',                      
        ]);
    }
    
    public function store_property(Request $request){

        $data=$request->validate([
            'user_id' => 'required',
            'property_id' => 'required',
        ]);      
        
        $user_id = $request->user_id;
        $property_id = $request->property_id;    
        
        $result = PropertyFavourite::where(['user_id' => $user_id, 'property_id' => $property_id])->first();
        
        if(!empty($result)){
            $result->delete();
            return response()->json([
                'success'=>true,
                'msg'=>'Remove From Favourite Successfully!',                      
            ]); 
        } else {
           PropertyFavourite::create(['property_id'=>$property_id,'user_id'=>$user_id]);
       
            return response()->json([
                'success'=>true,
                'msg'=>'Property Added To Favourite Successfully!',                      
            ]); 
        }
        
        
    }

    public function create_own_property()
    {     
        
        if (!auth()->check()) {
            return view('auth.user_login');
        }

        $check_subs = false;
        $item = Subscription::with('package')->where(['user_id'=> Auth::user()->id,'is_expired'=>0])->first();
       
        if($item){                
            $package_property_count = $item->package->no_of_property;
            
            $propery_count = Property::where(['owner_id' => Auth::user()->id,'subscription_id' => $item->id])->count();
            
            if($package_property_count <= $propery_count){               
                // return response()->json(['status'=>false,'msg'=>'Limit Cross']);
                $item->update(['is_expired'=>'1']);
                $check_subs = false;
            } else {
                $check_subs = true;
            }
            
        }        
           
        if($check_subs) {
            $property_types = PropertyCategory::all();
            $cities = City::all();            
            return view('frontend.property.create', compact('property_types','cities'));
        }

        $packages = Package::where('status', 1)->whereNot('name','free')->latest()->get();
        return view('frontend.property.show_package',compact('packages'));        
    }

    public function subscription(Request $request){
       
        $data=$request->validate([            
            'package_id'=> ''            
        ]);

       $data['user_id'] = auth()->user()->id;     

       if(!empty($request->promo_code)){

            $check = Subscription::where('package_id', 4)->first();
            if($check){
                return response()->json(['status'=>false ,'msg'=>'You Already Used This Coupon ðŸ¥º !!']);
            }

            $item = Package::where('promo_code', $request->promo_code)->first();
            if($item) {
                $data['package_id'] = $item->id;
            } else {
                return response()->json(['status'=>false ,'msg'=>'Wrong Coupon ðŸ¥º !!']);
            }
       }     

       $property = Subscription::create($data);
            
       return response()->json(['status'=>true ,'msg'=>'Subscribed Successfully !!']);
    }   

    public function get_city(Request $request){
        $areas = Area::where('city_id', $request->city_id)->get();
        $html_view = view('frontend.property.area_data', compact('areas'))->render();
        return response()->json([
            'status' => true,
            'html_view' => $html_view,
        ]);
    }

    public function get_property_cat(Request $request){
        $sub_cat = PropertySubCategory::where('category_id', $request->cat_id)->get();
        $amenity_options = AmenitiesProperty::where('category_id', $request->cat_id)->get();
        $selectedAmenities = $request->selectedAmenities;
        $amenities_html_view = view('frontend.property.amenities_data', compact('amenity_options','selectedAmenities'))->render(); 
        $html_view = view('frontend.property.sub_cat_data', compact('sub_cat'))->render();  
       
        return response()->json([
            'status' => true,
            'html_data' => $html_view,
            'amenities_html_view' => $amenities_html_view
        ]);
    }
    
    public function get_property_cats(Request $request){
        $sub_cat = PropertySubCategory::where('category_id', $request->cat_id)->get();
        $amenity_options = AmenitiesProperty::where('category_id', $request->cat_id)->get();
        $amenities_html_view = view('frontend.property.amenities_datas', compact('amenity_options'))->render(); 
        $html_view = view('frontend.property.sub_cat_data', compact('sub_cat'))->render();  
       
        return response()->json([
            'status' => true,
            'html_data' => $html_view,
            'amenities_html_view' => $amenities_html_view
        ]);
    }
    
    public function get_property_cat_checkbox(Request $request){
        
        $typeIds = $request->input('type_ids', []);
        $sub_cat = PropertySubCategory::whereIn('category_id', $typeIds)->get();
        $html_view = view('frontend.property.sub_cat_data_checkbox', compact('sub_cat'))->render();  
        return response()->json([
            'status' => true,
            'html_data' => $html_view
        ]);
    }

    public function store_owner_property(Request $request){

        $data = $request->validate([
            'title'=> 'required',
            'pro_type'=> 'required',
            'phone'=> 'required',
            'description'=> 'required',
            'floor_area'=> '',
            'availability_date'=> '',
            'cat_id'=> 'required',
            'sub_cat_id'=> 'required',
            'bed'=> '',
            'bath'=> '',
            'price'=> 'required',
            'location'=> '',
            'area_id'=> '',
            'city_id'=> '',
            'post_code'=> '',
            'landmark'=> '',
            'reception'=> '',
            'video_url'=> '',
            'floor_no'=> '',
            'floor_type'=> '',
            'belcony'=> '',
            'attach_drawing_room'=> '',
            'water_bill'=> '',
            'electricity_bill'=> '',
            'gas_facility'=> '',
            'floor_plan' => 'nullable|file|mimes:jpeg,png,pdf|max:10240'
        ], [
            'title.required' => 'Title is required.',
            'phone.required' => 'Phone number is required.',
            'description.required' => 'Please enter a description.',
            'cat_id.required' => 'Category is required.',
            'sub_cat_id.required' => 'Sub-category is required.',
            'price.required' => 'Price must be specified.',
            'floor_plan.file' => 'Floor plan must be a file.',
            'floor_plan.mimes' => 'Floor plan must be a JPEG, PNG, or PDF file.',
            'floor_plan.max' => 'Floor plan may not be greater than 10MB.',
        ]);

       $data['owner_id'] = auth()->user()->id;  
       
       $item = Subscription::with('package')->where('user_id', Auth::user()->id)->where('is_expired',0)->first();       
       $data['subscription_id'] = $item->id;
       if($request->hasFile('floor_plan')) {        
           $originName = $request->file('floor_plan')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('floor_plan')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('floor_plan')->move(public_path('backend/property'), $fileName);
           $data['floor_plan']=$fileName;
       }  

    //   if($request->hasFile('thumb_img')) {    
    //       $image = Image::make($request->file('thumb_img'));
    //       $originName = $request->file('thumb_img')->getClientOriginalName();
    //       $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //       $extension = $request->file('thumb_img')->getClientOriginalExtension();
    //       $fileName =$fileName.time().'.'.$extension;
           
    //       $destation_path1 = 'backend/property/'.$fileName;
    //       $image->resize(416,293);
    //       $image->save(public_path().'/'.$destation_path1);
           
    //       $data['thumb_img']=$fileName;
    //   }    

       if($request->hasFile('video_url')) {        
           $originName = $request->file('video_url')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('video_url')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('video_url')->move(public_path('backend/property'), $fileName);
           $data['video_url']=$fileName;
       }       

        $property = Property::create($data);

        $amenities = [];

        foreach ($request->input('amenities') as $amenity) {
            $amenities[] = ['name' => $amenity];
        }

        $property->amenities()->createMany($amenities);
        
        if ($request->hasFile('property_image')) {
            $property_images = [];
            $allImages = $request->file('property_image');
        
            foreach ($allImages as $key => $pro_img) {
                $image = Image::make($pro_img);
                $originName = $pro_img->getClientOriginalName();
                $fileName = pathinfo($originName, PATHINFO_FILENAME);
                $extension = $pro_img->getClientOriginalExtension();
                $fileName = $fileName . time() . $key . '.' . $extension;
        
                if ($key == 0) {
                    // ✅ First image → thumbnail only
                    $thumb_path = 'backend/property/' . $fileName;
                    $image->resize(416, 293);
                    $image->save(public_path($thumb_path));
        
                    // Save thumb image in property table
                    $property->update(['thumb_img' => $fileName]);
                } else {
                    // ✅ All other images → gallery images
                    $img_path = 'backend/property_image/' . $fileName;
                    $image->resize(817, 446);
                    $image->save(public_path($img_path));
        
                    $property_images[] = ['image' => $fileName, 'property_id' => $property->id];
                }
            }
        
            // Save gallery images only (excluding the thumbnail)
            if (!empty($property_images)) {
                $property->property_image()->createMany($property_images);
            }
        }


    //     if($request->hasFile('property_image')){
           
    //         $property_image = [];
            
    //         foreach($request->file('property_image') as $key => $pro_img){          
                
    //             $image = Image::make($pro_img);
    //             $originName = $pro_img->getClientOriginalName();               
    //             $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //             $extension = $pro_img->getClientOriginalExtension();
    //             $fileName =$fileName.time().'.'.$extension;
            
    //             $destation_path1 = 'backend/property_image/'.$fileName;
    //             $image->resize(817,446);
    //             $image->save(public_path().'/'.$destation_path1);    
                
    //             $property_image[] = ['image' => $fileName, 'property_id' => $property->id]; 
                             
    //         }                   
    //         $property->property_image()->createMany($property_image);
    //   }     
       return response()->json(['status'=>true ,'msg'=>'Property Upload Successfully !!']);
    }
    
    public function update_owner_property(Request $request, string $id){

        $data = $request->validate([
            'title'=> 'required',
            'pro_type'=> 'required',
            'phone'=> 'required',
            'description'=> 'required',
            'floor_area'=> '',
            'availability_date'=> '',
            'cat_id'=> 'required',
            'sub_cat_id'=> 'required',
            'bed'=> '',
            'bath'=> '',
            'price'=> 'required',
            'location'=> '',
            'area_id'=> '',
            'city_id'=> '',
            'post_code'=> '',
            'landmark'=> '',
            'reception'=> '',
            'video_url'=> '',
            'floor_no'=> '',
            'floor_type'=> '',
            'belcony'=> '',
            'attach_drawing_room'=> '',
            'water_bill'=> '',
            'electricity_bill'=> '',
            'gas_facility'=> '',
            'floor_plan' => 'nullable|file|mimes:jpeg,png,pdf|max:10240'
        ], [
            'title.required' => 'Title is required.',
            'phone.required' => 'Phone number is required.',
            'description.required' => 'Please enter a description.',
            'cat_id.required' => 'Category is required.',
            'sub_cat_id.required' => 'Sub-category is required.',
            'price.required' => 'Price must be specified.',
            'floor_plan.file' => 'Floor plan must be a file.',
            'floor_plan.mimes' => 'Floor plan must be a JPEG, PNG, or PDF file.',
            'floor_plan.max' => 'Floor plan may not be greater than 10MB.',
        ]);

       $data['owner_id'] = auth()->user()->id;  
       
       $item = Subscription::with('package')->where('user_id', Auth::user()->id)->where('is_expired',0)->first();       
       $data['subscription_id'] = $item->id;
       if($request->hasFile('floor_plan')) {        
           $originName = $request->file('floor_plan')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('floor_plan')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('floor_plan')->move(public_path('backend/property'), $fileName);
           $data['floor_plan']=$fileName;
       }  

    //   if($request->hasFile('thumb_img')) {    
    //       $image = Image::make($request->file('thumb_img'));
    //       $originName = $request->file('thumb_img')->getClientOriginalName();
    //       $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //       $extension = $request->file('thumb_img')->getClientOriginalExtension();
    //       $fileName =$fileName.time().'.'.$extension;
           
    //       $destation_path1 = 'backend/property/'.$fileName;
    //       $image->resize(416,293);
    //       $image->save(public_path().'/'.$destation_path1);
           
    //       $data['thumb_img']=$fileName;
    //   }    

       if($request->hasFile('video_url')) {        
           $originName = $request->file('video_url')->getClientOriginalName();
           $fileName = pathinfo($originName, PATHINFO_FILENAME);
           $extension = $request->file('video_url')->getClientOriginalExtension();
           $fileName =$fileName.time().'.'.$extension;
       
           $request->file('video_url')->move(public_path('backend/property'), $fileName);
           $data['video_url']=$fileName;
       }       
        $property = Property::find($id);
        $property->update($data);
        
        $property->amenities()->delete();
        $amenities = [];

        foreach ($request->input('amenities') as $amenity) {
            $amenities[] = ['name' => $amenity];
        }

        $property->amenities()->createMany($amenities);
        
        if ($request->hasFile('property_image')) {

    // ✅ Optional: Delete old images (from DB and/or disk)
    // Delete old thumb image file
    if ($property->thumb_img && file_exists(public_path('backend/property/' . $property->thumb_img))) {
        unlink(public_path('backend/property/' . $property->thumb_img));
    }

    // Delete old gallery images from disk
    foreach ($property->property_image as $img) {
        $imagePath = public_path('backend/property_image/' . $img->image);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    // Delete old gallery records from DB
    $property->property_image()->delete();

    // ✅ Handle new image upload
    $property_images = [];
    $allImages = $request->file('property_image');

    foreach ($allImages as $key => $pro_img) {
            $image = Image::make($pro_img);
            $originName = $pro_img->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $pro_img->getClientOriginalExtension();
            $fileName = $fileName . time() . $key . '.' . $extension;
    
            if ($key == 0) {
                // First image → new thumbnail
                $thumb_path = 'backend/property/' . $fileName;
                $image->resize(416, 293);
                $image->save(public_path($thumb_path));
    
                $property->update(['thumb_img' => $fileName]);
            } else {
                // Gallery images
                $img_path = 'backend/property_image/' . $fileName;
                $image->resize(817, 446);
                $image->save(public_path($img_path));
    
                $property_images[] = ['image' => $fileName, 'property_id' => $property->id];
            }
        }
    
        if (!empty($property_images)) {
            $property->property_image()->createMany($property_images);
        }
    }

        
        // if ($request->hasFile('property_image')) {
        //     $property_images = [];
        //     $allImages = $request->file('property_image');
        
        //     foreach ($allImages as $key => $pro_img) {
        //         $image = Image::make($pro_img);
        //         $originName = $pro_img->getClientOriginalName();
        //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //         $extension = $pro_img->getClientOriginalExtension();
        //         $fileName = $fileName . time() . $key . '.' . $extension;
        
        //         if ($key == 0) {
        //             // ✅ First image → thumbnail only
        //             $thumb_path = 'backend/property/' . $fileName;
        //             $image->resize(416, 293);
        //             $image->save(public_path($thumb_path));
        
        //             // Save thumb image in property table
        //             $property->update(['thumb_img' => $fileName]);
        //         } else {
        //             // ✅ All other images → gallery images
        //             $img_path = 'backend/property_image/' . $fileName;
        //             $image->resize(817, 446);
        //             $image->save(public_path($img_path));
        
        //             $property_images[] = ['image' => $fileName, 'property_id' => $property->id];
        //         }
        //     }
        
        //     // Save gallery images only (excluding the thumbnail)
        //     if (!empty($property_images)) {
        //         $property->property_image()->createMany($property_images);
        //     }
        // }


    //     if($request->hasFile('property_image')){
           
    //         $property_image = [];
            
    //         foreach($request->file('property_image') as $key => $pro_img){          
                
    //             $image = Image::make($pro_img);
    //             $originName = $pro_img->getClientOriginalName();               
    //             $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //             $extension = $pro_img->getClientOriginalExtension();
    //             $fileName =$fileName.time().'.'.$extension;
            
    //             $destation_path1 = 'backend/property_image/'.$fileName;
    //             $image->resize(817,446);
    //             $image->save(public_path().'/'.$destation_path1);    
                
    //             $property_image[] = ['image' => $fileName, 'property_id' => $property->id]; 
                             
    //         }                   
    //         $property->property_image()->createMany($property_image);
    //   }     
       return response()->json(['status'=>true ,'msg'=>'Property Upload Successfully !!']);
    }

    public function profile(string $id){
        $user = User::find($id);
        return view('frontend.profile.index', compact('user'));
    }

    public function interest(Request $request){

        $property = Property::find($request->property_id);        
        $user = User::find($request->user_id);
        PropertyInterest::create(['property_id'=>$request->property_id,'user_id'=>$request->user_id]);
        return response()->json(['status'=>true,'data'=>'','phone'=>$property->phone]);
    }

    public function service_details($service_id){
        $item = Service::find($service_id);
        $social_items = Social::where('status', 1)->latest()->get();
        return view('frontend.service.index', compact('item','social_items'));
    }
    
    public function edit_property(string $id){
        $item=Property::find($id);   
        $cities = City::all(); 
        $categories = PropertyCategory::all(); 
        $property_types = PropertyCategory::all();
        $selected_amenities = DB::table('property_amenities')
                            ->where('property_id', $id)
                            ->pluck('name')
                            ->toArray();
        return view('frontend.property.edit', compact('item','categories','cities','selected_amenities','property_types'));
    }

    public function about_page() {
        $item = AboutUs::first();
        $social_items = Social::where('status', 1)->latest()->get();
        return view('frontend.about.index', compact('item','social_items'));
    }

    public function make_appointment(Request $request){           
        Appointment::create([
            'name'  => $request->name,
            'phone'  => $request->phone,
            'country'  => $request->country,
            'service'  => $request->service,
            'date'  => $request->appoint_date,
            'time'  => $request->time
        ]);
        return redirect()->back();
    }

    public function blog_comment(Request $request){           
        Appointment::create([
            'name'  => $request->name,
            'phone'  => $request->phone,
            'country'  => $request->country,
            'service'  => $request->service,
            'date'  => $request->appoint_date,
            'time'  => $request->time
        ]);
        return redirect()->back();
    }
    
    public function student_register(Request $request){
        Registration::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'mobile'  => $request->mobile,
            'dob'  => $request->dob,
            'address'  => $request->address,
            'preferred_country'  => $request->preferred_country,
            'how_know'  => $request->how_know,
            'language'  => $request->language,
            'score'  => $request->score,
            'highest_qualification'  => $request->highest_qualification,
            'gpa'  => $request->gpa
        ]);
        return redirect()->back();
    }
    
    public function foreign_student_register(Request $request){
        
        $data = $request->validate([
            'name'  => '',    
            'father_name'  => '',    
            'mother_name'  => '',    
            'mow'  => '',    
            'email'  => '',    
            'address'  => '',    
            'state'  => '',    
            'ten_passing'  => '',    
            'twelve_passing'  => '',    
            'gpa'  => '',    
            'score'  => '',    
            'college'  => '',    
            'message'  => ''
        ]);
        
        if($request->hasFile('attach_file')) {
            
            $originName = $request->file('attach_file')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('attach_file')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('attach_file')->move(public_path('frontend/registration'), $fileName);
            $data['attach_file']=$fileName; 
        }
        
        ForeignRegistration::create($data);
        return redirect()->back();
        
        // ForeignRegistration::create([
        //     'name'  => $request->name,
        //     'father_name'  => $request->father_name,
        //     'mother_name'  => $request->mother_name,
        //     'mow'  => $request->mow,
        //     'email'  => $request->email,
        //     'address'  => $request->address,
        //     'state'  => $request->state,
        //     'ten_passing'  => $request->ten_passing,
        //     'twelve_passing'  => $request->twelve_passing,
        //     'gpa'  => $request->gpa,
        //     'score'  => $request->score,
        //     'college'  => $request->college,
        //     'message'  => $request->message
        // ]);
       
    }

    public function contact_us(){
        $social_items = Social::where('status', 1)->latest()->get();
        return view('frontend.contact.index', compact('social_items'));
    }

    public function blog_details(string $slug){
        $item = Blog::where('slug', $slug)->first();
        $recent_items = Blog::limit('3')->get();
        return view('frontend.blog.blog_details', compact('item','recent_items'));
    }

    public function page_details(string $slug){
        $item = Page::where('slug', $slug)->first();
        return view('frontend.page.page_details', compact('item'));
    }
    
    public function more_msg(){
        $item = ExecutiveDirector::first();
        return view('frontend.page.more_msg', compact('item'));
    }
    
    public function our_story(){
        $item = OurStory::first();
        return view('frontend.page.our_story', compact('item'));
    }
    
    public function parent_page_details(string $slug){
        $item = Page::where('slug', $slug)->first();
        $sub_items = SubMenu::with('page')->where('parent_id', $item->id)->get();
        return view('frontend.page.parent_page_details', compact('sub_items','item'));
    }
    
    public function registration(){
        $country_items = Country::all();
        return view('frontend.page.registration', compact('country_items'));
    }
    
    public function foreign_registration(){
        $college_items = College::all();
        return view('frontend.page.foreign_registration', compact('college_items'));
    }
    
    public function privacy_page_details(){
        $item = Page::where('slug','privacy-policy')->first();
        return view('frontend.page.page_details', compact('item'));
    }
    
    public function term_page_details(){
        $item = Page::where('slug','term-of-use')->first();
        return view('frontend.page.page_details', compact('item'));
    }
    
    public function support(){
        $item = Page::where('slug','support')->first();
        return view('frontend.page.page_details', compact('item'));
    }
    
    public function contact(){
        return view('frontend.page.contact');
    }
    
    public function get_thanas_by_district(Request $request){
        $thanas = District::where('district', $request->district_id)->distinct()->get('thana');
        return response()->json($thanas);
    }
    
    public function destroy_property(string $id){
        $item=Property::find($id);
        
        deleteImage('property',$item->image);
        $item->delete();

        return response()->json(['status'=>true ,'msg'=>'Property Deleted !!']);
    }
    
    public function prop_status_changes(string $id){
        $property = Property::find($id);
        $status = $property->status == '1' ? '0' : '1';
        $property->status = $status;
        $property->update();
        return response()->json(['status'=>true,'msg'=>'Status Changed']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
