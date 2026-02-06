<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\User;
Use App\Models\Agent;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Hash;
use Auth;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // if(!auth()->user()->can('users.view'))
        // {
        //     abort(403, 'unauthorized');
        // }

        if(request()->ajax()){
            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = User::query();
            if(!empty($search_str)){
                $query->where('name','like','%'.$search_str.'%');
            }

            $items = $query->latest()->paginate($paginate);
            $data = view('backend.users.get_data', compact('items'))->render();           
            return response()->json(['status' => true, 'data' => $data]);    
        }

        return view('backend.users.index');
    }
    
    public function agent_list(Request $request)
    {
        // if(!auth()->user()->can('users.view'))
        // {
        //     abort(403, 'unauthorized');
        // }

        if(request()->ajax()){
            $paginate = request()->paginate;
            $search_str = request()->search_str;

            $query = Agent::query();
            if(!empty($search_str)){
                $query->where('name','like','%'.$search_str.'%');
            }

            $items = $query->paginate($paginate);
            $data = view('backend.users.get_agent_data', compact('items'))->render();    
            
            return response()->json(['status' => true, 'data' => $data]);    
        }

        return view('backend.users.agent');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if(!auth()->user()->can('user.create'))
        // {
        //     abort(403, 'unauthorized');
        // }

        $roles = Role::all();

        return view('backend.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(!auth()->user()->can('user.create'))
        // {
        //     abort(403, 'unauthorized');
        // }

        $data = $request->validate([
            'name' =>  'required|min:3',
            'email' =>  'required|unique:users',
            'password' =>  'required|min:6|same:confirm_password',
            'role' =>  'required',
        ]);
        
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->confirm_password);
        $user->save();

        $user->assignRole($request->role);

        return response()->json(['status'=>true ,'msg'=>'User has been created','url'=>route('admin.users.index')]);
    }
    

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // if(!auth()->user()->can('user.edit'))
        // {
        //     abort(403, 'unauthorized');
        // }

        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('backend.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // if(!auth()->user()->can('user.edit'))
        // {
        //     abort(403, 'unauthorized');
        // }

        // dd($request->all());
        

        $data = $request->validate([
            'name' =>  'required|min:3',
            'email' => 'required|email|unique:users,email,'.$id
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
       
        if($request->hasFile('image')) {                

            $originName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName =$fileName.time().'.'.$extension;        
            
            $request->file('image')->move(public_path('backend/user'), $fileName);
            $user['image']=$fileName;      
        } 

        if($request->password)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        $user->roles()->detach();
        $user->assignRole($request->role);
        if(Auth::user()->hasRole('Property Owner')) {
            $url = route('admin.dashboard');
        } else {
            $url = route('admin.users.index');
        }
        return response()->json(['status'=>true ,'msg'=>'User has been updated','url'=>$url]);
    }

    public function status_change(string $id){
        $user = User::find($id);
        $status = $user->status == '1' ? '0' : '1';
        $user->status = $status;
        $user->update();
        return response()->json(['status'=>true,'msg'=>'Status Changed']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
    public function delete_agent($id){
        Agent::destroy($id);

        return response()->json(['status'=> true, 'msg' => 'Agent has been deleted']);
    } 
     
    public function destroy($id)
    {
        // if(!auth()->user()->can('user.delete'))
        // {
        //     abort(403, 'unauthorized');
        // }

        User::destroy($id);

        return response()->json(['status'=> true, 'msg' => 'User has been deleted']);
    }

    public function profile(string $id){
        $user = User::find($id);
        $roles = Role::all();
        return view('backend.users.profile', compact('user','roles'));
    }

    public function userStatusUpdate($id){

        $st=request('status') ==null?'1':null;

        $item=User::find($id);
        $item->status=$st;
        $item->save();
        return back()->with('success','Status Updated !!');

    }

}
