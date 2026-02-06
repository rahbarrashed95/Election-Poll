@extends('backend.partials.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ __('Local Register List') }} </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">{{ __('Dashboard') }}</a></li>
            <li class="breadcrumb-item active"> {{ __('Local Register List') }} </li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                {{ __('Manage Foreign Register') }} 
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('Sl') }}</th>
                                        <th>{{ __('Name') }}</th>                                                                                                     
                                        <th>{{ __('Email') }}</th>                                                                                                     
                                        <th>{{ __('Country') }}</th>                                                                                                     
                                        <th style="width: 125px;">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $key=>$item)
                                    <tr>                                      
                                    
                                        <td> {{$key+1}}</td>
                                        <td> {{$item->name}}</td>                                                                        
                                        <td> {{$item->email}}</td>                                                                        
                                        <td> {{$item->preferred_country}}</td>                                                                        
                                        <td>
                                            <!--@can('social.edit')-->
                                            <!--<a href="{{ route('admin.country.edit',[$item->id])}}" class="btn-sm btn_modal btn btn-primary"> -->
                                            <!--    <i class="fa fa-edit "></i></a>-->
                                            <!--@endcan-->
                                            @can('social.delete')
                                                <a href="{{ route('admin.country.destroy',[$item->id])}}" class="delete btn-sm btn btn-danger"> 
                                                    <i class="fa fa-trash "></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            
                        </div>

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</main>
                
@endsection

