@extends('frontend.app')
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb">
        <div class="container">
            <div class="bread-crumb-head">
                <div class="breadcrumb-title">
                    <h2>{{ $item->title }}</h2>
                </div>
                <div class="breadcrumb-list">
                    <ul>
                        <li><a href="index-2.html">Home </a></li>
                        <li>{{ $item->title }}</li>
                    </ul>
                </div>
            </div>
            <div class="breadcrumb-border-img">
                <img src="{{ asset('public/frontend/assets/img/bg/line-bg.png')}}" alt="Line Image">
            </div>
        </div>
    </div>
    <!-- Breadcrumb -->

    <!-- Detail View Section -->
    <section class="buy-detailview">
        <div class="container">

			<!-- Details -->
            <div class="row align-items-center page-head">
                <div class="col-lg-12">
                    {!! $item->description !!}
                </div>
            </div>
			<!-- /Details -->
			
        </div>
    </section>
	<!-- /Detail View Section -->
		
@endsection

			