
@extends('frontend.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .nav-pills .nav-link {
        text-align: left;
        color: #000;
    }
    
    .nav-pills .nav-link.active, .nav-pills .show>.nav-link {
        color: #000 !important;
        background-color: #FFF;
        border: 1px solid #0d6efd;
        border-radius: 10px;
    }
    
    .nav-pills .nav-link.active img,
    .nav-pills .show > .nav-link img {
        filter: brightness(0); /* turns image black */
    }
    
    .active_property {
        /*background: red;*/
        padding: 25px;
        text-align: center;
        /*width: 70%;*/
        /*height: 100px;*/
        border-radius: 20px;
        /*padding-top: 62px;*/
        margin-bottom: 20px;
    }
       section {
            color: #7a90ff;
            padding: 2em 0;
            min-height: 100%;
            position: relative;
            -webkit-font-smoothing: antialiased;
            z-index:10;
        }
        
        .pricing {
            display: -webkit-flex;
            display: flex;
            -webkit-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-justify-content: center;
            justify-content: center;
            width: 100%;
            margin: 0 auto;
        }
        
        .pricing-item {
            position: relative;
            display: -webkit-flex;
            display: flex;
            -webkit-flex-direction: column;
            flex-direction: column;
            -webkit-align-items: stretch;
            align-items: stretch;
            text-align: center;
            -webkit-flex: 0 1 330px;
            flex: 0 1 330px;
        }
        
        .pricing-action {
            color: inherit;
            border: none;
            background: none;
            cursor: pointer;
        }
        
        .pricing-action:focus {
            outline: none;
        }
        
        .pricing-feature-list {
            text-align: left;
        }
        
        .pricing-palden .pricing-item {
            font-family: 'Open Sans', sans-serif;
            cursor: default;
            color: #84697c;
            background: #fff;
            box-shadow: 0 0 10px rgba(46, 59, 125, 0.23);
            border-radius: 20px 20px 10px 10px;
            margin: 1em;
        }
        
        @media screen and (min-width: 66.25em) {
            .pricing-palden .pricing-item {
                margin: 1em -0.5em;
            }
            .pricing-palden .pricing__item--featured {
                margin: 0;
                z-index: 10;
                box-shadow: 0 0 20px rgba(46, 59, 125, 0.23);
            }
        }
        
        .pricing-palden .pricing-deco {
            border-radius: 10px 10px 0 0;
            background: linear-gradient(135deg,#4097f9,#0af0c7);
            padding: 4em 0 9em;
            position: relative;
            padding-left: 10px;
            padding-right: 10px;
        }
        
        .pricing-palden .pricing-deco-img {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 160px;
        }
        
        .pricing-palden .pricing-title {
            font-size: 0.75em;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 5px;
            color: #fff;
        }
        
        .pricing-palden .deco-layer {
            -webkit-transition: -webkit-transform 0.5s;
            transition: transform 0.5s;
        }
        
        .pricing-palden .pricing-item:hover .deco-layer--1 {
            -webkit-transform: translate3d(15px, 0, 0);
            transform: translate3d(15px, 0, 0);
        }
        
        .pricing-palden .pricing-item:hover .deco-layer--2 {
            -webkit-transform: translate3d(-15px, 0, 0);
            transform: translate3d(-15px, 0, 0);
        }
        
        .pricing-palden .icon {
            font-size: 2.5em;
        }
        
        .pricing-palden .pricing-price {
            font-size: 5em;
            font-weight: bold;
            padding: 0;
            color: #fff;
            margin: 0 0 0.25em 0;
            line-height: 0.75;
        }
        
        .pricing-palden .pricing-currency {
            font-size: 0.15em;
            vertical-align: top;
        }
        
        .pricing-palden .pricing-period {
            font-size: 0.15em;
            padding: 0 0 0 0.5em;
            font-style: italic;
        }
        
        .pricing-palden .pricing__sentence {
            font-weight: bold;
            margin: 0 0 1em 0;
            padding: 0 0 0.5em;
        }
        
        .pricing-palden .pricing-feature-list {
            margin: 0;
            padding: 0.25em 0 2.5em;
            list-style: none;
            text-align: center;
        }
        
        .pricing-palden .pricing-feature {
            padding: 1em 0;
        }
        
        .pricing-palden .pricing-action {
            font-weight: bold;
            margin: auto 3em 2em 3em;
            padding: 1em 2em;
            color: #fff;
            border-radius: 30px;
            background: linear-gradient(135deg,#a93bfe,#584efd);
            -webkit-transition: background-color 0.3s;
            transition: background-color 0.3s;
        }
        
        .pricing-palden .pricing-action:hover,
        .pricing-palden .pricing-action:focus {
            background: linear-gradient(135deg,#fd7d57,#f55d59);
        }
        
        .pricing-palden .pricing-item--featured .pricing-deco {
            padding: 5em 0 8.885em 0;
        }

@import url(//fonts.googleapis.com/css?family=Lato:300:400);

.header {
  position:relative;
  text-align:center;
  /*background-image: radial-gradient(circle at 39% 47%, rgba(107, 107, 107,0.08) 0%, rgba(107, 107, 107,0.08) 33.333%,rgba(72, 72, 72,0.08) 33.333%, rgba(72, 72, 72,0.08) 66.666%,rgba(36, 36, 36,0.08) 66.666%, rgba(36, 36, 36,0.08) 99.999%),radial-gradient(circle at 53% 74%, rgba(182, 182, 182,0.08) 0%, rgba(182, 182, 182,0.08) 33.333%,rgba(202, 202, 202,0.08) 33.333%, rgba(202, 202, 202,0.08) 66.666%,rgba(221, 221, 221,0.08) 66.666%, rgba(221, 221, 221,0.08) 99.999%),radial-gradient(circle at 14% 98%, rgba(184, 184, 184,0.08) 0%, rgba(184, 184, 184,0.08) 33.333%,rgba(96, 96, 96,0.08) 33.333%, rgba(96, 96, 96,0.08) 66.666%,rgba(7, 7, 7,0.08) 66.666%, rgba(7, 7, 7,0.08) 99.999%),linear-gradient(45deg, rgb(97, 14, 117),rgb(20, 32, 127));*/
  color:white;
}

.inner-header {
  height:100%;
  width:100%;
  margin: 0;
  padding: 0;
}

.flex { /*Flexbox for containers*/
  justify-content: center;
  align-items: center;
  text-align: center;
}

.waves {
  position:relative;
  width: 100%;
  height:150vh;
  margin-bottom:-7px; /*Fix for safari gap*/
  min-height:100px;
  max-height:250px;
}

/* Animation */

.parallax > use {
  animation: move-forever 25s cubic-bezier(.55,.5,.45,.5)     infinite;
}
.parallax > use:nth-child(1) {
  animation-delay: -2s;
  animation-duration: 7s;
}
.parallax > use:nth-child(2) {
  animation-delay: -3s;
  animation-duration: 10s;
}
.parallax > use:nth-child(3) {
  animation-delay: -4s;
  animation-duration: 13s;
}
.parallax > use:nth-child(4) {
  animation-delay: -5s;
  animation-duration: 20s;
}
@keyframes move-forever {
  0% {
   transform: translate3d(-90px,0,0);
  }
  100% { 
    transform: translate3d(85px,0,0);
  }
}
    
</style>

<section class="buy-detailview">
    <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical" style="background: #4267B2;border-radius: 10px;">
          <a style="color: #fff;line-height: 60px;" class="nav-link" id="panel1-tab" data-bs-toggle="pill" href="#panel1" role="tab" aria-controls="panel1" aria-selected="true"> <img style="margin-right: 10px;" src="{{ asset('public/backend/assets/images/overview.png') }}"> Overview</a>
          <a style="color: #fff;line-height: 60px;" class="nav-link" id="panel5-tab" data-bs-toggle="pill" href="#panel5" role="tab" aria-controls="panel5" aria-selected="true"><img style="margin-right: 10px;" src="{{ asset('public/backend/assets/images/account-settings.png') }}">Account Settings</a>
          <a style="color: #fff;line-height: 60px;" class="nav-link" id="panel2-tab" data-bs-toggle="pill" href="#panel2" role="tab" aria-controls="panel2" aria-selected="false"> <img style="margin-right: 10px;" src="{{ asset('public/backend/assets/images/manage-property.png') }}"> Manage Property</a>
          <a style="color: #fff;line-height: 60px;" class="nav-link" id="panel3-tab" data-bs-toggle="pill" href="#panel3" role="tab" aria-controls="panel3" aria-selected="false"> <img style="margin-right: 10px;" src="{{ asset('public/backend/assets/images/subscription.png') }}"> Subscription + Pricing</a>
          <a style="color: #fff;line-height: 60px;" class="nav-link" id="panel4-tab" data-bs-toggle="pill" href="#panel4" role="tab" aria-controls="panel4" aria-selected="false"> <img style="margin-right: 10px;" src="{{ asset('public/backend/assets/images/favourite-property.png') }}"> Favourite Property</a>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade" id="panel1" role="tabpanel" aria-labelledby="panel1-tab">
            <section class="buy-detailview" style="padding: 0px;">
                <div class="">
					<!-- Details -->
                    <div class="row align-items-center page-head">
                        
                        <div class="col-md-12" style="margin-bottom: 20px;">
                            <img src="{{ asset('public/backend/assets/images/ban.png') }}" style="width: 100%;height: 235px;">
                        </div>
                        
                            <div class="col-md-3">
                                <a href="#"> 
                                    <div class="active_property" style="background: #6C60FE;">
                                   <div class="row">
                                       <div class="col-md-6" 
                                       style="text-align: left;padding-left: 20px;margin-bottom: 15px;">
                                           <img style="margin-top: 10px;height: 25px;" src="{{ asset('public/frontend/assets/img/active.png') }}">
                                       </div>
                                       <div class="col-md-6" style="    text-align: left;
    padding-top: 10px;
    padding-left: 0px;
    padding-right: 20px;
    font-weight: 800;
    color: #fff;">{{ $active_property_count }}</div>
                                       <div class="col-md-12" style="text-align: center;
    padding-left: 20px;
    font-weight: 800;
    color: #fff;">Active Property</div>
                                   </div>
                                   <!--<h5>{{ $active_property_count }}</h5>-->
                                   <!--<h3>Active Property</h3>-->
                                   
                               </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#"> 
                                    <div class="active_property" style="background: #6C60FE;">
                                   <div class="row">
                                       <div class="col-md-6" 
                                       style="text-align: left;padding-left: 20px;margin-bottom: 15px;">
                                           <img style="margin-top: 10px;height: 25px;" src="{{ asset('public/frontend/assets/img/inactive.png') }}">
                                       </div>
                                       <div class="col-md-6" style="    text-align: left;
    padding-top: 10px;
    padding-left: 0px;
    padding-right: 20px;
    font-weight: 800;
    color: #fff;">{{ $draft_property_count }}</div>
                                       <div class="col-md-12" style="text-align: center;
    padding-left: 20px;
    font-weight: 800;
    color: #fff;">Draft Property</div>
                                   </div>
                                   <!--<h5>{{ $active_property_count }}</h5>-->
                                   <!--<h3>Active Property</h3>-->
                                   
                               </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#"> 
                                    <div class="active_property" style="background: #6C60FE;">
                                   <div class="row">
                                       <div class="col-md-6" 
                                       style="text-align: left;padding-left: 20px;margin-bottom: 5px;">
                                           <img style="margin-top: 10px;height: 35px;" src="{{ asset('public/frontend/assets/img/favourite.png') }}">
                                       </div>
                                       <div class="col-md-6" style="    text-align: left;
    padding-top: 10px;
    padding-left: 0px;
    padding-right: 20px;
    font-weight: 800;
    color: #fff;">{{ $favourite_property_count }}</div>
                                       <div class="col-md-12" style="text-align: center;
    padding-left: 20px;
    font-weight: 800;
    color: #fff;">Favourite Property</div>
                                   </div>
                                   <!--<h5>{{ $active_property_count }}</h5>-->
                                   <!--<h3>Active Property</h3>-->
                                   
                               </div>
                                </a>
                            </div>
                            <div class="col-md-3">
                                <a href="#"> 
                                    <div class="active_property" style="background: #6C60FE;">
                                   <div class="row">
                                       <div class="col-md-6" 
                                       style="text-align: left;padding-left: 20px;margin-bottom: 15px;">
                                           <img style="margin-top: 10px;height: 25px;" src="{{ asset('public/frontend/assets/img/balance.png') }}">
                                       </div>
                                       <div class="col-md-6" style="    text-align: left;
    padding-top: 10px;
    padding-left: 0px;
    padding-right: 20px;
    font-weight: 800;
    color: #fff;">{{ $active_property_count }}</div>
                                       <div class="col-md-12" style="text-align: center;
    padding-left: 20px;
    font-weight: 800;
    color: #fff;">Remaining Balance</div>
                                   </div>
                                   <!--<h5>{{ $active_property_count }}</h5>-->
                                   <!--<h3>Active Property</h3>-->
                                   
                               </div>
                                </a>
                            </div>
                            
                           <!--<div class="col-md-3">-->
                           <!--    <div class="active_property bg-success">-->
                           <!--        <h5>{{ $draft_property_count }}</h5>-->
                           <!--        <h3>In Draft</h3>-->
                                   
                           <!--    </div>-->
                           <!--</div>-->
                          <!-- <div class="col-md-4">-->
                          <!--     <div class="active_property bg-warning">-->
                          <!--         <h5>{{ $favourite_property_count }}</h5>-->
                          <!--         <h3>Wish List</h3>-->
                                   
                          <!--     </div>-->
                          <!-- </div>-->
                          <!--<div class="col-md-4">-->
                          <!--     <div class="active_property bg-primary">-->
                          <!--         <h5>50</h5>-->
                          <!--         <h3>Remaining Balance</h3>-->
                                   
                          <!--     </div>-->
                          <!-- </div>-->
                           <!--<div class="col-md-4">-->
                           <!--    <div class="active_property bg-info">-->
                           <!--        <h5>50</h5>-->
                           <!--        <h3>Edit Personal Details</h3>-->
                                   
                           <!--    </div>-->
                           <!--</div>-->
                           <!--<div class="col-md-4">-->
                           <!--    <div class="active_property bg-danger">-->
                           <!--        <h5>50</h5>-->
                           <!--        <h3>Manage Subscription</h3>-->
                                   
                           <!--    </div>-->
                           <!--</div>-->
                           
       <!--                     <div class="collapse-card sidebar-card" style="">-->
							<!--	<div id="review" class="card-collapse collapse show  collapse-view">-->
							<!--		<div class="review-card">-->
							<!--			<div class="property-review">-->
							<!--				<h5 class="card-title">Profile</h5>-->
							<!--				<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
							<!--				    @csrf-->
							<!--					<div class="row">-->
												    
							<!--						<div class="col-md-6">-->
							<!--							<div class="review-form">-->
							<!--								<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
							<!--							</div>-->
							<!--						</div>-->
							<!--						<div class="col-md-6">-->
							<!--							<div class="review-form">-->
							<!--								<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
							<!--							</div>-->
							<!--						</div>-->
							<!--						<div class="col-md-6">-->
							<!--							<div class="review-form">-->
							<!--								<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
							<!--							</div>-->
							<!--						</div>-->
							<!--						<div class="col-md-6">-->
							<!--							<div class="review-form">-->
							<!--								<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
							<!--							</div>-->
							<!--						</div>-->
													
							<!--						<div class="col-md-12">-->
							<!--							<div class="review-form submit-btn">-->
							<!--								<button type="submit" class="btn-primary">Update</button>-->
							<!--							</div>-->
							<!--						</div>-->
							<!--					</div>-->
							<!--				</form>-->
							<!--			</div>-->
							<!--		</div>-->
							<!--	</div>-->
							<!--</div>-->
                       
                    </div>
					<!-- /Details -->

                </div>
            </section>
          </div>
          <div class="tab-pane fade" id="panel5" role="tabpane5" aria-labelledby="panel5-tab">
            <section class="buy-detailview" style="padding: 0px;width: 100%;">
             <div class="container" style="padding-left: 0px;">
					<!-- Details -->
                    <div class="row align-items-center page-head">
                        <div class="col-lg-12">
                            <form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">
                                @csrf
                                <div class="collapse-card sidebar-card" style="">
    								<div id="review" class="card-collapse collapse show  collapse-view" style="padding-top: 0px;">
    									<div class="review-card">
    										<div class="property-review">
    										    <div class="row">
    										        <div class="col-md-7" style="display: flex;gap: 30px;">
    										            <div class="img_div">
    										                <img 
    										                style="background: #4267B2;border-radius: 50%;height: 85px;width: 85px;"
    										                src="{{ asset('public/backend/user/'.$user->image) }}">
    										            </div>
    										            <div class="txt_div">
    										                <h4>{{ $user->name }}</h4>
    										                <p style="margin-bottom: 0px;color: #000;">{{ $user->user_type }}</p>
    										                <p style="color: #000;">{{ $user->address }}, {{ $user->city }}</p>
    										            </div>
    										        </div>
    										        <div class="col-md-5"></div>
    										    </div>
    											<!--<h5 class="card-title">Profile</h5>-->
    											<!--<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
    											<!--    @csrf-->
    											<!--	<div class="row">-->
    												    
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    													
    											<!--		<div class="col-md-12">-->
    											<!--			<div class="review-form submit-btn">-->
    											<!--				<button type="submit" class="btn-primary">Update</button>-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--	</div>-->
    											<!--</form>-->
    										</div>
    									</div>
    								</div>
    							</div>
                                <div class="collapse-card sidebar-card" style="">
    								<div id="review" class="card-collapse collapse show  collapse-view" style="padding-top: 0px;">
    									<div class="review-card">
    										<div class="property-review">
    										    <div class="row">
    										        <h3>Personal Information</h3>
    										        <hr/>
    										        <div class="row">
    												    
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="password" class="form-control" placeholder="Enter New Password">
    														</div>
    													</div>
    													
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="phone" class="form-control" placeholder="Your Phone" value="{{$user->phone}}">
    														</div>
    													</div>
    													
    													<div class="col-md-6">
    														<div class="review-form">
    														    <select class="form-control" name="user_type">
    														        <option>Select User Type</option>
    														        <option value="buyer" {{ $user->user_type == 'buyer' ? 'selected' : '' }} >Buyer</option>
    														        <option value="seller" {{ $user->user_type == 'seller' ? 'selected' : '' }} >Seller</option>
    														        <option value="renter" {{ $user->user_type == 'renter' ? 'selected' : '' }} >Renter</option>
    														    </select>
    														</div>
    													</div>
    													
    													<div class="col-md-6">
    														<div class="review-form">
    														    <input type="file" name="image">
    														</div>
    													</div>
    												</div>
    										        <div class="col-md-5"></div>
    										    </div>
    											<!--<h5 class="card-title">Profile</h5>-->
    											<!--<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
    											<!--    @csrf-->
    											<!--	<div class="row">-->
    												    
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    													
    											<!--		<div class="col-md-12">-->
    											<!--			<div class="review-form submit-btn">-->
    											<!--				<button type="submit" class="btn-primary">Update</button>-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--	</div>-->
    											<!--</form>-->
    										</div>
    									</div>
    								</div>
    							</div>
                                <div class="collapse-card sidebar-card" style="">
    								<div id="review" class="card-collapse collapse show  collapse-view" style="padding-top: 0px;">
    									<div class="review-card">
    										<div class="property-review">
    										    <div class="row">
    										        <h3>Address</h3>
    										        <hr/>
    										        <div class="row">
    												    
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="city" class="form-control" placeholder="City" value="{{ $user->city }}">
    														</div>
    													</div>
    													<div class="col-md-6">
    														<div class="review-form">
    															<input type="text" name="address" class="form-control" placeholder="Address" value="{{ $user->address }}">
    														</div>
    													</div>
    												</div>
    										        <div class="col-md-5"></div>
    										    </div>
    											<!--<h5 class="card-title">Profile</h5>-->
    											<!--<form action="{{ route('front.update_contact') }}" method="POST" id="profile_form">-->
    											<!--    @csrf-->
    											<!--	<div class="row">-->
    												    
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="name" class="form-control" placeholder="Your Name" value="{{$user->name}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="email" name="email" class="form-control" placeholder="Your Email" value="{{$user->email}}">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="old_password" class="form-control" placeholder="Enter Old Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--		<div class="col-md-6">-->
    											<!--			<div class="review-form">-->
    											<!--				<input type="text" name="password" class="form-control" placeholder="Enter New Password">-->
    											<!--			</div>-->
    											<!--		</div>-->
    													
    											<!--		<div class="col-md-12">-->
    											<!--			<div class="review-form submit-btn">-->
    											<!--				<button type="submit" class="btn-primary">Update</button>-->
    											<!--			</div>-->
    											<!--		</div>-->
    											<!--	</div>-->
    											<!--</form>-->
    										</div>
    									</div>
    								</div>
    							</div>
    							<div class="col-md-3">
    								<div class="review-form submit-btn">
    									<button type="submit" class="btn-primary">Update</button>
    								</div>
    							</div>
							</form>
                        </div>
                    </div>
					<!-- /Details -->

                </div>
        </section>
          </div>
          <div class="tab-pane fade" id="panel2" role="tabpanel" aria-labelledby="panel2-tab">
            <section class="buy-detailview" style="padding: 0px;width: 100%;">
            <div class="row justify-content-center">
				@foreach($items as $item)
					<div class="slider-col col-md-4">
						<div class="product-custom"  data-aos="fade-down" data-aos-duration="2000">
							<div class="profile-widget">
								<div class="doc-img">
									<a href="{{ route('front.rent_details',[$item->id]) }}" class="property-img">
										<img class="img-fluid" alt="Property Image" src="{{asset('public/backend/property/'.$item->thumb_img)}}">
									</a>
									<div class="product-amount">
										<h5><span>{{ $item->price }} Tk </span></h5>
									</div>
									<!--<div class="featured">-->
									<!--	<span>Featured</span>-->
									<!--</div>-->
									<!--<div class="new-featured">-->
									<!--	<span>New</span>-->
									<!--</div>	-->
									
									@if($item->status == '1')
									
									<a class="property_status" href="{{ route('front.prop_status_changes',[$item->id])}}">
									    <img style="position: absolute;top: 20px;left: 20px;height: 30px;" src="{{ asset('public/frontend/assets/img/active.png') }}">
									</a>
									
									@else
									
									<a class="property_status" href="{{ route('front.prop_status_changes',[$item->id])}}">
									    <img style="position: absolute;top: 20px;left: 20px;height: 30px;" src="{{ asset('public/frontend/assets/img/inactive.png') }}">
									</a>
									
									@endif
									
									@guest													
									<a href="javascript:void(0);">
										<div class="favourite selected">
											<span><i class="fa-regular fa-heart"></i></span>
										</div>
									</a>											
									@else 
										<a data-property-id="{{ $item->id }}" data-user-id="{{ Auth::user()->id }}" data-url="{{ route('front.property.store') }}" href="javascript:void(0);" class="property_form">
											<div class="favourite selected">
												<span><i class="fa-regular fa-heart"></i></span>
											</div>
										</a>
									@endguest

								</div>
								<div class="pro-content">
									<div class="rating">
									    
										<span class="rating-count">
											<img src="{{ asset('public/frontend/assets/img/tick.png') }}">
										</span>
										<span class="rating-review">Shared Freehold </span>
										<span class="rating-count">
											<img src="{{ asset('public/frontend/assets/img/tick.png') }}">
										</span>
										<span class="rating-review">Waterfront</span>
									</div>
									<h3 class="title">
										<a href="{{ route('front.rent_details',[$item->id]) }}">{{ $item->title }}</a> 
									</h3>
									<p><i class="feather-map-pin"></i> {{ $item->landmark }}</p>
									<ul class="d-flex details">
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
											{{ $item->bed }} Beds
										</li>
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
											{{ $item->bath }} Baths
										</li>
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
											{{ $item->floor_area }} Sqft
										</li>
									</ul>
									<ul class="property-category d-flex justify-content-between align-items-center">
										<li style="margin: 0 auto;">
											<a class="btn-primary property_status" title="Active Status" href="{{ route('front.prop_status_changes',[$item->id])}}">
											   <i class="fa fa-check"></i>
											</a>
										</li>
										<li style="margin: 0 auto;">
											<a class="btn-primary btn_modal" title="Edit" href="{{ route('front.property.edit',[$item->id])}}">
											   <i class="fa fa-edit"></i>
											</a>
										</li>
										<li style="margin: 0 auto;">
											<a href="{{ route('front.rent_details',[$item->id]) }}" title="Show" class="btn-primary"><i class="fa fa-eye"></i></a>
										</li>
										<li style="margin: 0 auto;">
											<a href="{{ route('front.property.destroy',[$item->id])}}" title="Delete" class="btn-primary delete"><i class="fa fa-trash"></i></a>
										</li>
									</ul>
								</div>
							</div>		
						</div>										
					</div>
				@endforeach										
				<!--<div class="view-property-btn d-flex justify-content-center"  data-aos="fade-down" data-aos-duration="2000">-->
				<!--	<a href="{{ route('front.all_property') }}" class="btn-primary">View All Properties</a>-->
				<!--</div>-->
			</div>
        </section>
          </div>
          <div class="tab-pane fade" id="panel3" role="tabpanel" aria-labelledby="panel3-tab">
            <section class="buy-detailview" style="padding: 0px;width: 100%;">
        <div class="row justify-content-center pricing pricing-palden">
            @foreach($packages as $key => $package)
                @if($key % 2 == 0)
                    <div class="col-md-4">
                <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                    <div class="pricing-deco">
                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                        </svg>
                        <div class="pricing-price"><span class="pricing-currency">TK</span>{{ $package->price }}
                            <span class="pricing-period">/ Subs</span>
                        </div>
                        <h3 class="pricing-title">{{ $package->name }}</h3>
                    </div>
                    <ul class="pricing-feature-list">
                        <li class="pricing-feature">{{ $package->no_of_property }} Property Create</li>
                        <li class="pricing-feature">Responsive Design</li>
                        <li class="pricing-feature">Content Upload</li>
                    </ul>
                    <button class="pricing-action">Choose</button>
                </div>
            </div>
                @else
                    <div class="col-md-4">
                <div class="pricing-item features-item ja-animate" data-animation="move-from-bottom" data-delay="item-0" style="min-height: 497px;">
                    <div class="pricing-deco" style="background: linear-gradient(135deg,#a93bfe,#584efd)">
                        <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" y="0px">
                            <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                            <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                            <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                        </svg>
                        <div class="pricing-price"><span class="pricing-currency">TK</span>{{ $package->price }}
                            <span class="pricing-period">/ Subs</span>
                        </div>
                        <h3 class="pricing-title">{{ $package->name }}</h3>
                    </div>
                    <ul class="pricing-feature-list">
                        <li class="pricing-feature">{{ $package->no_of_property }} Property Create</li>
                        <li class="pricing-feature">Responsive Design</li>
                        <li class="pricing-feature">Content Upload</li>
                    </ul>
                    <button class="pricing-action">Choose</button>
                </div>
            </div>
                @endif
            @endforeach
		</div>
    </section>
          </div>
          <div class="tab-pane fade" id="panel4" role="tabpanel" aria-labelledby="panel4-tab">
            <section class="buy-detailview" style="padding: 0px;width: 100%;">
            <div class="row">
				@foreach($favourites as $item)
					<div class="slider-col col-md-4">
						<div class="product-custom"  data-aos="fade-down" data-aos-duration="2000">
							<div class="profile-widget">
								<div class="doc-img">
									<a href="{{ route('front.rent_details',[$item->property->id]) }}" class="property-img">
										<img class="img-fluid" alt="Property Image" src="{{asset('public/backend/property/'.$item->property->thumb_img)}}">
									</a>
									<div class="product-amount">
										<h5><span>{{ $item->property->price }} Tk </span></h5>
									</div>
									<!--<div class="featured">-->
									<!--	<span>Featured</span>-->
									<!--</div>-->
									<!--<div class="new-featured">-->
									<!--	<span>New</span>-->
									<!--</div>	-->
									
									@guest													
									<a href="javascript:void(0);">
										<div class="favourite selected">
											<span><i class="fa-regular fa-heart"></i></span>
										</div>
									</a>											
									@else 
										<a data-property-id="{{ $item->property->id }}" data-user-id="{{ Auth::user()->id }}" data-url="{{ route('front.property.store') }}" href="javascript:void(0);" class="property_form">
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
										<a href="{{ route('front.rent_details',[$item->property->id]) }}">{{ $item->property->title }}</a> 
									</h3>
									<p><i class="feather-map-pin"></i> {{ $item->property->landmark }}</p>
									<ul class="d-flex details">
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/bed-icon.svg')}}" alt="bed-icon" >
											{{ $item->property->bed }} Beds
										</li>
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/bath-icon.svg')}}" alt="bath-icon">
											{{ $item->property->bath }} Baths
										</li>
										<li>
											<img src="{{asset('public/frontend/assets/img/icons/building-icon.svg')}}" alt="building-icon">
											{{ $item->property->floor_area }} Sqft
										</li>
									</ul>
									<ul class="property-category d-flex justify-content-between align-items-center">
										<li style="margin: 0 auto;">
											<a class="btn-primary property_status" title="Active Status" href="{{ route('front.prop_status_changes',[$item->property->id])}}">
											   <i class="fa fa-check"></i>
											</a>
										</li>
										<li style="margin: 0 auto;">
											<a class="btn-primary btn_modal" title="Edit" href="{{ route('front.property.edit',[$item->property->id])}}">
											   <i class="fa fa-edit"></i>
											</a>
										</li>
										<li style="margin: 0 auto;">
											<a href="{{ route('front.rent_details',[$item->property->id]) }}" title="Show" class="btn-primary"><i class="fa fa-eye"></i></a>
										</li>
										<li style="margin: 0 auto;">
											<a href="{{ route('front.property.destroy',[$item->property->id])}}" title="Delete" class="btn-primary delete"><i class="fa fa-trash"></i></a>
										</li>
									</ul>
								</div>
							</div>		
						</div>										
					</div>
				@endforeach										
				<!--<div class="view-property-btn d-flex justify-content-center"  data-aos="fade-down" data-aos-duration="2000">-->
				<!--	<a href="{{ route('front.all_property') }}" class="btn-primary">View All Properties</a>-->
				<!--</div>-->
			</div>
        </section>
          </div>
        </div>
        <p>Something will be add here</p>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    $(document).ready(function(){
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
    });
    
    var activeTab = localStorage.getItem("activeTab");
    console.log("Saved tab:", activeTab);

    if (activeTab) {
        var triggerEl = document.querySelector('#v-pills-tab a[href="' + activeTab + '"]');
        console.log("Trigger element:", triggerEl);
        if (triggerEl) {
            var tab = new bootstrap.Tab(triggerEl);
            tab.show();
        }
    } else {
        // যদি saved tab না থাকে, তাহলে প্রথম tab active করো
        var firstTab = document.querySelector('#v-pills-tab a.nav-link');
        if (firstTab) {
            var tab = new bootstrap.Tab(firstTab);
            tab.show();
        }
    }

    var tabLinks = document.querySelectorAll('#v-pills-tab a');
    tabLinks.forEach(function(link) {
        link.addEventListener('shown.bs.tab', function(e) {
            localStorage.setItem("activeTab", e.target.getAttribute('href'));
            console.log("Set active tab:", e.target.getAttribute('href'));
        });
    });
    
    // var activeTab = localStorage.getItem("activeTab");
    
    // if (activeTab) {
    //     var triggerEl = document.querySelector('#v-pills-tab a[href="' + activeTab + '"]');
       
    //     if (triggerEl) {
    //         var tab = new bootstrap.Tab(triggerEl);
    //         tab.show();
    //     }
    // }

    // var tabLinks = document.querySelectorAll('#v-pills-tab a');
    // tabLinks.forEach(function(link) {
    //     link.addEventListener('shown.bs.tab', function(e) {
    //         localStorage.setItem("activeTab", e.target.getAttribute('href'));
    //     });
    // });
    
   
    // // Reload হলে saved tab restore করো
    // var activeTab = localStorage.getItem("activeTab");
    // alert(activeTab);
    // if (activeTab) {
    //     var tabTrigger = $('#v-pills-tab a[href="' + activeTab + '"]');
    //     if (tabTrigger.length) {
    //         tabTrigger.tab('show');
    //     }
    // }

    // // Click হলে save করো
    // $('#v-pills-tab a').on('shown.bs.tab', function(e) {
    //     alert('hi');
    //     localStorage.setItem("activeTab", $(e.target).attr('href'));
    // });
    
    
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
            text: "You want To Change Status!",
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

    $(document).on('submit','form#profile_form', function(e) {    
        e.preventDefault(); 
        
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
                    // toastr.success(res.msg);
                    window.location.reload();
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
    
    
</script>


@endsection