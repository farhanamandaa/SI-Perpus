<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Repositories\Users\UsersRepositories;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddUserController extends Controller
{

    protected $user;

    public function __construct(UsersRepositories $user)
    {
        $this->middleware('admin');
        $this->user =  $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $users = $this->user->showUsers();
        return view('admin.userlist',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $status =  Role::all();
        return view('admin.adduser', compact('status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role_id   =   request('role_id');
        // dd($role_id);
        $validatedData  =   $request->validate([
                'name'   =>  'required',
                'email'  =>  'required',
                'password'=> 'required',
        ]);
        
        // dd($validatedData);
        // $store = User::create([
        //     'name' => request('name'),
        //     'email'=> request('email'),
        //     'password' => Hash::make(request('password')),
        //     'role_id' => $role_id,
        // ]);

        $registerUser   =   $this->user->registerUser([
            'name'      =>  request('name'),
            'email'     =>  request('email'),
            'password'  =>  Hash::make(request('password')),
            'role_id'   =>  $role_id,
            ]);

        session()->flash('message','Akun berhasil dibuat.');
        return redirect('/admin/user_list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
