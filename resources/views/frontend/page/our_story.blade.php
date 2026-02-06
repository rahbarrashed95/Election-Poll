@extends('frontend.app')
@section('title', $item->title)
@section('content')
<main class="wrapper">
            <!-- Page Header -->
			<!-- Details Content -->
			<section class="blog-details" style="margin-top: 100px;">
				<div class="container">
					<div class="row">                   
                        <div class="col-lg-12 col-md-7 mt-5 mt-md-0">
                            <div class="img_div text-center mb-5">
                                <img src="{{ asset('public/backend/our_story/'.$item->image) }}" />
                            </div>
                            <div class="blog-details-inner">
                                <div class="post-content">
                                    {!! $item->description !!}            
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</section>
			<!-- End Details Content -->
			
		</main>
@endsection        