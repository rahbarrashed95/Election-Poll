@extends('frontend.app')
@section('title', $item->title)
@section('content')

<style>
    .blogDetails .wptb-image-box1 .wptb-item--inner .wptb-item--icon {
    width: 70px;
    height: 70px;
    background-color: var(--color-two);
    line-height: 1;
    border: 5px solid var(--color-white);
    position: absolute;
    right: 37%;
    top: 0;
    transform: translate(0, calc(-50% - 5px));
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: var(--transition-base);
}

.wptb-image-box1 .wptb-item--inner .wptb-item--holder {
    position: relative;
    padding: 30px 36px;
    width: 100%;
    min-height: 0;
    border: 1px solid var(--color-light);
    border-top: 0;
    background-color: var(--color-white);
    border-radius: 0;
    transition: var(--transition-base);
}

</style>

<main class="wrapper">
            <!-- Page Header -->
            <div class="wptb-page-heading" style="background-image: url({{ asset('public/backend/page/'. $item->header_image) }});">
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
			<section class="blog-details blogDetails">
			    
				<div class="container">
				    
				    <div class="row">
				        @if(!empty($item->description))
				            {!! $item->description !!}
				        @endif
				    </div>
				    
					<div class="row">                   
                   
                        @foreach($sub_items as $item)
                        
                            <div class="col-lg-6 col-md-6 mt-5 mt-md-0">
                                <div class="wptb-blog-grid1" style="margin-bottom: 20px; visibility: visible; animation-name: fadeInLeft;">
                                    <div class="wptb-item--inner" style="display: block;min-height: 0px;">
                                        <div class="row" style="padding: 10px 20px 10px 20px">
                                            <div class="inner_div d-flex" style="border: 1px dashed #00000036;border-radius: 10px;">
                                                <div class="col-md-6">
                                                    <div class="image" style="padding: 30px;">
                                                        @if(!empty($item->page))
                                                            <a href="{{ route('front.page-details', [$item->page->slug]) }}" class="wptb-item-link">
                                                                <img src="{{ asset('public/backend/page/'.$item->page->thumbnail) }}" alt="img" style="border-radius: 15px;">
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="text_div" style="padding: 30px;">
                                                        <h5 class="wptb-item--title">
                                                            @if(!empty($item->page))
                                                                <a href="{{ route('front.page-details', [$item->page->slug]) }}">{{ Str::limit($item->page->title, 36) }}</a>
                                                            @endif
                                                        </h5>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        @endforeach
                        
                    </div>
				</div>
			</section>
			<!-- End Details Content -->
			
		</main>
@endsection        