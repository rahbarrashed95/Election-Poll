
<div class="product-custom"  data-aos="fade-down" data-aos-duration="2000">
    <div class="profile-widget">
        <div class="doc-img">
            <a href="{{ route('front.rent_details',[$property->id]) }}" class="property-img">
                <img class="img-fluid" alt="Property Image" src="{{asset('public/backend/property/'.$property->floor_plan)}}">
            </a>
            <div class="product-amount">
                <h5><span>{{ $property->price }} Tk</span></h5>
            </div>
            <!--<div class="featured">-->
            <!--    <span>Featured</span>-->
            <!--</div>-->
            <!--<div class="new-featured">-->
            <!--    <span>New</span>-->
            <!--</div>	-->
            
            @guest													
            <a href="javascript:void(0);">
                <div class="favourite selected">
                    <span><i class="fa-regular fa-heart"></i></span>
                </div>
            </a>											
            @else 
                <a data-property-id="{{ $property->id }}" data-user-id="{{ Auth::user()->id }}" data-url="{{ route('front.property.store') }}" href="javascript:void(0);" class="property_form">
                    <div class="favourite selected">
                        <span><i class="fa-regular fa-heart"></i></span>
                    </div>
                </a>
            @endguest

        </div>
        <div class="pro-content">
            <div class="rating">
                <span class="rating-count">
                    <i class="fa-solid fa-star checked"></i>
                    <i class="fa-solid fa-star checked"></i>
                    <i class="fa-solid fa-star checked"></i>
                    <i class="fa-solid fa-star checked"></i>
                    <i class="fa-solid fa-star checked"></i>
                </span>
                <span class="rating-review">Excellent</span>
            </div>
            <h3 class="title">
                <a href="rent-details.html">{{ $property->title }}</a> 
            </h3>
            <p><i class="feather-map-pin"></i> {{ $property->location }}</p>
            <ul class="d-flex details">
                <li>
                    <img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
                    {{ $property->bed }} Beds
                </li>
                <li>
                    <img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
                    {{ $property->bath }} Baths
                </li>
                <li>
                    <img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
                    {{ $property->floor_area }} Sqft
                </li>
            </ul>
            <ul class="property-category d-flex justify-content-between align-items-center">
                <li class="user-info">
                    <a href="#"><img src="{{asset('public/frontend/assets/img/profiles/avatar-01.jpg')}}" class="img-fluid avatar" alt="User"></a>
                    <div class="user-name">
                        <h6><a href="#">Marc Silva</a></h6>
                        <p>Newyork</p>
                    </div>													
                </li>
                <li>
                    <a href="{{ route('front.rent_details',[$property->id]) }}" class="btn-primary">View</a>
                </li>
            </ul>
        </div>
    </div>		
</div>