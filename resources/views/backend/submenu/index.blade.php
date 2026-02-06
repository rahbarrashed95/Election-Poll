@extends('backend.partials.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">{{ __('submenu.Sub Menu') }} </h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="">{{ __('submenu.Dashboard') }}</a></li>
            <li class="breadcrumb-item active"> {{ __('submenu.Sub Menu Items') }} </li>
        </ol>

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                {{ __('menu.Manage Sub Menu') }} 

                @if(auth()->user()->can('submenu.create'))
                <a href="{{ route('admin.submenus.create',['type'=>'submenu'])}}" class="btn btn-primary btn-sm btn_modal">
                        {{ __('submenu.Item Add') }}
                </a>
                @endif
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>{{ __('submenu.Sl') }}</th>                                        
                                        <th>{{ __('Page Title') }}</th>                                
                                        <th>{{ __('submenu.Title') }}</th>                                
                                        <th>{{ __('submenu.Serial') }}</th>                                
                                                                    
                                        <th style="width: 125px;">{{ __('menu.Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $key=>$item)
                                    <tr>                                      
                                    
                                        <td> {{$key+1}}</td>                                                                    
                                        <td> {{ $item->parentPage ? $item->parentPage->title : ''}}</td>                                        
                                        <td> {{ $item->page ? $item->page->title : '' }}</td>                                        
                                        <td> {{$item->serial}}</td>                                       
                                           
                                        <td>
                                            @can('menu.edit')
                                            <a href="{{ route('admin.submenus.edit',[$item->id])}}" class="btn-sm btn_modal btn btn-primary"> 
                                                <i class="fa fa-edit "></i></a>
                                            @endcan
                                            @can('menu.delete')
                                                <a href="{{ route('admin.submenus.destroy',[$item->id])}}" class="delete btn-sm btn btn-danger"> 
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

<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>


                
@endsection



