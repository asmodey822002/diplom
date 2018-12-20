<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }
    public function userData()
    {
        return Datatables::of(User::query())
        ->addColumn('roles', function(User $user){//добавляем колонку с ролями
            return $user->roles->pluck('name')->implode(', ');
        })
        ->addColumn('action', function ($user) {
            return '<a href="/admin/users/'.$user->id.'/edit" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a> | <span class="btn btn-xs btn-danger" data-id="'.$user->id.'"><i class="glyphicon glyphicon-remove"></i> Dellete</span>';
            })
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {//схитрим и используем стр. от edit
        $user=new User();
        $roles = Role::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|min:4|max:32',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6',
            'phone'=>'sometimes|nullable|regex:/^[0-9]{7,10}$/',
        ]);
        $user=new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        $user->password = \Hash::make($request->password);
        $user->save();
        $user->roles()->sync($request->roles);
        return redirect('/admin/users')->with('success', 'User added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User::find($id);
        return view();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles=Role::pluck('name', 'id');
        return view('admin.users.edit', compact('user', 'roles'));
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
        $this->validate($request, [
            'name'=>'required|min:4|max:32',
            'email'=>'required|email',
            'phone'=>'sometimes|nullable|regex:/^[0-9]{7,10}$/',
        ]);
        $user=User::find($id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->phone=$request->phone;
        if($request->password){
            $user->password = \Hash::make($request->password);
        }
        $user->roles()->sync($request->roles);
        $user->save();
        /*if(!$user->save()){
            return redirect('/admin/users/'.$user->id.'/edit');
        }*/
        return redirect('/admin/users')->with('success', 'User added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        if($user){
            $user->delete();
            //return redirect('admin/users');
        }
       // return redirect('admin/users');
    }
}
