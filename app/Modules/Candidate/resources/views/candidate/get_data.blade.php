        
<table class="table table-bordered table-striped">
    <thead>
    <tr class="table-primary">
        <th style="width: 1%">SL.</th>
        <th>Name</th>                                        
        <th>Marka</th>                                        
        {{-- <th>Image</th>                                         --}}
        {{-- <th>Division</th>                                                                                                                                    
        <th>District</th>                                                                                                                                     --}}
        <th>Seat</th>                                                                                                                                    
        <th style="width: 125px;">Action</th>                         
    </tr>
    </thead>
    <tbody>
    @foreach($items as $key=>$item)
    <tr>
        <td> {{$key+1}}</td>
        <td> {{$item->name}}</td>                                        
        <td> {{$item->marka}}</td>                                                                                 
        {{-- <td> {{$item->image}}</td>                                                                                  --}}
        {{-- <td> {{$item->division_name}}</td>                                                                                 
        <td> {{$item->district_name}}</td>                                                                                  --}}
        <td> {{$item->seat_name}}</td>                                                                                 
        <td>
            @can('products.edit')
            <a href="{{ route('admin.candidates.edit',[$item->id])}}" title="Edit" class="btn btn-gradient-dark btn-icon-text btn-sm btn_modal"> 
                <i class="mdi mdi-file-check btn-icon-append"></i> 
            </a>                                          
            @endcan
            @can('products.delete')
                <a href="{{ route('admin.candidates.delete',[$item->id])}}" title="Delete" class="btn btn-gradient-danger btn-sm delete action-icon"> 
                    <i class="fa fa-trash"></i></a>
            @endcan
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>