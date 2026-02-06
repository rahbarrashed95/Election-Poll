        
<table class="table table-bordered table-striped">
    <thead>
    <tr class="table-primary">
        <th style="width: 1%">SL.</th>
        <th>City Name</th>                                                        
        <th>City Image</th>                                                        
        <th style="width: 125px;">Action</th>                         
    </tr>
    </thead>
    <tbody>
    @foreach($items as $key=>$item)
    <tr>
        <td> {{$key+1}}</td>
        <td> {{$item->city}}</td>    
        <td>
            <img src="{{ asset('backend/city/'. $item->image) }}" width="80" style="background: gray;">
        </td>                               
        <td>
            @can('products.edit')
            <a href="{{ route('admin.cities.edit',[$item->id])}}" title="Edit" class="btn btn-gradient-dark btn-icon-text btn-sm btn_modal"> 
                <i class="mdi mdi-file-check btn-icon-append"></i> 
            </a>                                          
            @endcan
            @can('products.delete')
                <a href="{{ route('admin.cities.destroy',[$item->id])}}" title="Delete" class="btn btn-gradient-danger btn-sm delete action-icon"> 
                    <i class="fa fa-trash"></i></a>
            @endcan
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>