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
                                                    <form action="{{ route('front.foreign-student-register') }}" method="POST" enctype="multipart/form-data">
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
                                                                    <label for="father_name">Father's Name</label>
                                                                    <input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Father's Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="mother_name">Mother's Name</label>
                                                                    <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter Mother's Name">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="mow">Mobile/WhatsApp</label>
                                                                    <input type="text" class="form-control" id="mow" name="mow" placeholder="Enter Mobile Or WhatsApp Number">
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
                                                                    <label for="address">Address</label>
                                                                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="state">State</label>
                                                                    <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                                                                </div>
                                                            </div>
                                                            <h5 style="margin-bottom: 15px;font-weight: 700;">Passing Year</h5>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="ten_passing">10th</label>
                                                                    <select id="ten_passing" class="form-control" name="ten_passing">
                                                                        <option>Please Select</option>
                                                                        <option value="2021">2021</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2024">2024</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="twelve_passing">12th</label>
                                                                    <select id="twelve_passing" class="form-control" name="twelve_passing">
                                                                        <option>Please Select</option>
                                                                        <option value="2022">2022</option>
                                                                        <option value="2023">2023</option>
                                                                        <option value="2024">2024</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <h5 style="margin-bottom: 15px;font-weight: 700;">Educational Background</h5>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="gpa">Gpa</label>
                                                                    <input type="text" class="form-control" id="gpa" name="gpa" placeholder="Physics, Chemistry, Biology">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="score">Merit Score</label>
                                                                    <input type="text" class="form-control" id="score" name="score" placeholder="Enter Score">
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="choose_college">Choose College</label>
                                                                    <select id="choose_college" class="form-control" name="college">
                                                                        <option>Please Select</option>
                                                                        @foreach($college_items as $item)
                                                                        <option value="{{ $item->college_name }}">{{ $item->college_name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="message">Message</label>
                                                                    <input type="text" class="form-control" id="message" name="message" placeholder="Write Message">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 mb-2">
                                                                <div class="form-group">
                                                                    <label for="attach_file">Attach File</label>
                                                                    <input type="file" class="form-control" id="attach_file" name="attach_file">
                                                                </div>
                                                            </div>
                                                            <!--<h5 style="margin-bottom: 15px;margin-top: 15px;font-weight: 700;">English Language Test</h5>-->
                                                            <!--<div class="col-md-6 mb-2">-->
                                                            <!--    <div class="form-group">-->
                                                            <!--        <label for="language">Language Proficiency</label>-->
                                                            <!--        <select id="language" class="form-control" name="language">-->
                                                            <!--            <option>Select Language</option>-->
                                                            <!--            <option value="ielts">IELTS</option>-->
                                                            <!--            <option value="toefl">TOEFL</option>-->
                                                            <!--            <option value="gre">GRE</option>-->
                                                            <!--        </select>-->
                                                            <!--    </div>-->
                                                            <!--</div>-->
                                                            
                                                            <!--<h5 style="margin-bottom: 15px;margin-top: 15px;font-weight: 700;">Academic Qualification</h5>-->
                                                      
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