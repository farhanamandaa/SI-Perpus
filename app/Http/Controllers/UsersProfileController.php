<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;

class UsersProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id        =   auth()->user()->id;
        $userData       =   User::find($user_id);
        $profileData    =   $userData->profile;
        return view('user.userprofile', compact(['userData','profileData']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id    =   auth()->user()->id;
        $profile    = Profile::firstOrCreate(['user_id' => $user_id]);
        $profile->phone_number  = request('phone_number');
        $profile->address       = request('address');
        $profile->user_id       = $user_id;
        $profile->save();
        // $storeData  =   Profile::save([
        //     'phone_number'  =>  request('phone_number'),
        //     'address'       =>  request('address'),
        //     'user_id'       =>  $user_id,
        // ]);

        return redirect(route('user.profile'));
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
