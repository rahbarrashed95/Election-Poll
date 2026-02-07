        
<table class="table table-bordered table-striped">
    <thead>
    <tr class="table-primary">
        <th style="width: 1%">SL.</th>
        <th style="width: 2%">Image</th>
        <th style="width: 2%">Marka Image</th>
        <th style="width: 25%">Name</th>                                        
        <th>Party</th>                                                                                                                                                                                                                                                                                              
        <th>Division</th>     
        <th>Seat</th>                                                                                                                                
        <th style="width: 125px;">Action</th>                         
    </tr>
    </thead>
    <tbody>
    @foreach($items as $key=>$item)
    <tr>
        <td> {{$key+1}}</td>
        <td> 
            <img style="height: 50px;width: 50px;border-radius: 10%;" src="{{ asset('candidates/'.$item->image) }}" width="50" height="50">    
        </td>  
        <td> 
            <img style="height: 50px;width: 50px;border-radius: 10%;" src="{{ asset('candidates/'.$item->marka_image) }}" width="50" height="50">    
        </td>        
        <td> {{$item->name}}</td>                                        
        <td> {{$item->party}}</td>      
        <td> {{$item->division_name}}</td>                                                                                                                                                                                              
        <td> {{$item->seat_name}}</td>  
                                                                                       
        <td>
            @can('products.edit')
            <a href="{{ route('admin.candidates.edit',[$item->id])}}" title="Edit" class="btn btn-gradient-dark btn-icon-text btn-sm btn_edit"> 
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