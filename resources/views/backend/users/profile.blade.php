@extends('backend.partials.app')
@section('content')

<style>
    .form-control {
        padding: 0.70rem 1.375rem;
    }
    .add_btn {
        height: 37px;
        padding-top: 10px;
    }
    .btn.btn-icon-text .btn-icon-append, .ajax-upload-dragdrop .btn-icon-text.ajax-file-upload .btn-icon-append {
      margin-left: 0px;
    }
    .pagination {
      float: right;
    }
    .page-link {
      color: #000;
    }
    .page-link.active, .active > .page-link {    
        background: linear-gradient(89deg, #5e7188, #3e4b5b);
        border: 1px solid gray;
    }
</style>    

<div class="page-header">
  <h3 class="page-title"> Profile </h3>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="#">Profile</a></li>
      <li class="breadcrumb-item active" aria-current="page">Profile</li>
    </ol>
  </nav>
</div>
<div class="row">                                 
  <div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
      <form action="{{route('admin.users.update', $user->id)}}" method="POST" id="ajax_form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
            
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="name..." value="{{$user->name}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="email" readonly value="{{$user->email}}">
                            </div>
                        </div>
             
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Password..." autocomplete="off" autofocus="off">
                            </div>
                        </div>
                        
                        <div class="col-md-6 d-none">
                            <div class="form-group">
                                <label for="role">Role</label>
                                 <select name="role" id="role" class="form-control">
                                    <option value="" disabled selected>Choose a Role</option>
                                    @foreach($roles as $role)
                                            <option value="{{$role->name}}" @if($role->name == $user->hasRole($role))  selected @endif>{{$role->name}}</option>
                                               
                                    @endforeach
                                 </select>   
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" id="image" class="form-control" name="image">
                            </div>
                        </div>
                        
                    </div>
                    <br>
                    <input type="submit" value="Update" class="btn btn-success">
                    <hr>
                </form>
      </div>
    </div>
  </div>
</div>   

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>


@endsection

