        
<table class="table table-bordered table-striped">
    <thead>
    <tr class="table-primary">
        <th style="width: 1%">SL.</th>
        <th>Name</th>                                        
        <th>Email</th>                                        
        <th>Status</th>                                                 
        <th style="width: 125px;">Action</th>                         
    </tr>
    </thead>
    <tbody>
    @foreach($items as $key=>$item)
    <tr>
        <td> {{$key+1}}</td>
        <td> {{$item->name}}</td>                                        
        <td> {{$item->email}}</td>                                        
        <td> <span class="badge bg-success">{{ $item->status == '1' ? 'Active' : 'De-Active' }}</span> </td>                         
        <td>
            
            <a href="{{ route('admin.users.edit',[$item->id])}}" title="Edit" class="btn btn-gradient-dark btn-icon-text btn-sm btn_modal"> 
                <i class="mdi mdi-file-check btn-icon-append"></i> 
            </a>                                          
            
                <a href="{{ route('admin.users.destroy',[$item->id])}}" title="Delete" class="btn btn-gradient-danger btn-sm delete action-icon"> 
                    <i class="fa fa-trash"></i></a>
           
            <a href="{{ route('admin.status_change',[$item->id])}}" title="Status" class="btn btn-gradient-success btn-sm status action-icon"> 
                    <i class="fa fa-check"></i></a>
        </td>
    </tr>
    @endforeach
    </tbody>
</table>

<p>{!! urldecode(str_replace("/?","?",$items->appends(Request::all())->render())) !!}</p>