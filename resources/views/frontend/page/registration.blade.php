@extends('frontend.app')
@section('content')
<main class="wrapper">
            <!-- Page Header -->
            <div class="wptb-page-heading" style="background-image: url({{ asset('frontend/assets/img/background/page-header-bg.jpg') }});">
                <div class="container">
                    <div class="wptb-item--inner">
                        <h2 class="wptb-item--title "></h2>
                        <div class="wptb-breadcrumb-wrap">
                            <ul class="wptb-breadcrumb">
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
			
			<!-- Details Content -->
			<section class="blog-details">
				<div class="container">
					<div class="row">                    
                        <div class="col-lg-4" style="background: #476CD2;border-top-left-radius: 5px;border-bottom-left-radius: 5px;">
                            <div class="left_part" style="max-width: 425px;
                                background: #476cd2;
                                border-radius: 20px 0 0 20px;
                                padding: 170px 15px 50px;
                                box-sizing: border-box;">
                                <h2 style="color: #fff;margin-bottom: 35px;font-weight: 700;">Submit your study abroad application</h2>
                                <img src="https://iasbd.co.uk/assets/image/admin-registration/admin-registration-slider-img/1.png">
                                <p style="margin-top: 25px;color: #fff;">Let’s simplify your study abroad journey in your desired country.</p>
                            </div>
                        </div>
                       <div class="col-lg-8 col-md-7 mt-5 mt-md-0" style="padding-left: 0px;">
                            <div class="blog-details-inner">
                                <div class="card" style="box-shadow: 15px 20px 60px rgba(0, 0, 0, .12);border: none;">
                                                                    
                                        <div class="col-lg-12 col-md-7 mt-5 mt-md-0" style="padding: 50px;">
                                            <div class="blog-details-inner">
                                                <div class="post-content">
                                                    <div class="wptb-image-box1 wow fadeInLeft">
                                                    <div class="wptb-item--inner">
                                                    <form action="{{ route('front.student-register') }}" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <h5 style="margin-bottom: 15px;font-weight: 700;">General Information</h5>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="name">Name</label>
                                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="email">Email</label>
                                                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="mobile">Mobile</label>
                                                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Mobile">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="dob">Date Of Birth</label>
                                                                    <input type="text" class="form-control" id="dob" name="dob" placeholder="Enter Date Of Birth">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="address">Address</label>
                                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="preferred_country">Preferred Country</label>
                                                                    <select id="preferred_country" class="form-control" name="preferred_country">
                                                                        <option>Select Country</option>
                                                                        
                                                                        @foreach($country_items as $item)
                                                                            <option value="{{ $item->country_name }}">{{ $item->country_name }}</option>
                                                                        @endforeach
                                                                        
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="how_know">How did you know us?</label>
                                                                    <input type="text" class="form-control" id="how_know" name="how_know" placeholder="How did you know us?">
                                                                </div>
                                                            </div>
                                                            <h5 style="margin-bottom: 15px;margin-top: 15px;font-weight: 700;">English Language Test</h5>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="language">Language Proficiency</label>
                                                                    <select id="language" class="form-control" name="language">
                                                                        <option>Select Language</option>
                                                                        <option value="ielts">IELTS</option>
                                                                        <option value="toefl">TOEFL</option>
                                                                        <option value="gre">GRE</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="preferred_country">Score</label>
                                                                    <input type="text" class="form-control" id="score" name="score" placeholder="Enter Score">
                                                                </div>
                                                            </div>
                                                            <h5 style="margin-bottom: 15px;margin-top: 15px;font-weight: 700;">Academic Qualification</h5>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="highest_qualification">Last educational qualification</label>
                                                                    <input type="text" class="form-control" id="highest_qualification" name="highest_qualification" placeholder="Enter Preferred Country">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="gpa">Gpa</label>
                                                                    <input type="text" class="form-control" id="gpa" name="gpa" placeholder="Enter Gpa">
                                                                </div>
                                                            </div>
                                                      
                                                      </div>
                                                      <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                        
                                                    </div>
                                                </div>                      
                                                </div>
                                            </div>
                                        </div>
                                        
                                   
                                </div>
                            </div>

                        </div>
                    </div>
				</div>
			</section>
			<!-- End Details Content -->
			
		</main>
@endsection        