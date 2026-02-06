<div class="table table-responsive">        
    <table class="table table-bordered">
    <thead>
    <tr class="table-primary">
        <th style="width: 1%">SL.</th>
        <th>Property Name</th>                                        
        <th>Property Type</th>                                        
        <th>Property Sub Type</th>                                        
        <th>City</th>                                        
        <th>Area</th>                                        
        <th>Active Status</th>                                        
        <th style="width: 125px;">Action</th>                         
    </tr>
    </thead>
    <tbody>
    @foreach($items as $key=>$item)
    <tr>
        <td> {{$key+1}}</td>
        <td> {{$item->title}}</td>                             
        <td> {{$item->cat_name}}</td>                             
        <td> {{$item->sub_cat_name}}</td>                             
        <td> {{$item->city}}</td>                             
        <td> {{$item->area}}</td>    
        <td>
            <a href="{{ route('admin.prop_status_change',[$item->id])}}" class="property_status">
                <span class="badge bg-success">{{ $item->status == '1' ? 'Active' : 'De-Active' }}</span>
            </a>
        </td>                               
        <td>
            
            <a href="{{ route('admin.property.edit',[$item->id])}}" title="Edit" class="btn btn-gradient-dark btn-icon-text btn-sm btn_modal"> 
                <i class="mdi mdi-file-check btn-icon-append"></i> 
            </a>                                          
            
            <a href="{{ route('admin.property.destroy',[$item->id])}}" title="Delete" class="btn btn-gradient-danger btn-sm delete action-icon"> 
                    <i class="fa fa-trash"></i>
            </a>

            <a href="{{ route('admin.property.show',[$item->id])}}" title="Show" class="btn btn-gradient-success btn-sm btn_modal action-icon"> 
                    <i class="fa fa-eye"></i>
            </a>
           
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>