<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new profile instance
        $profile = new Profile();

        //set the edit variable as false, because its a new profile
        $edit = FALSE;

        //return the profile view --> new profile create form
        return view('profileForm', ['profile' => $profile,'edit' => $edit  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validate the input
        $input = $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'body' => 'required',
        ], [
            'fname.required' => ' First Name is required',
            'lname.required' => ' Last Name is required',
            'body.required' => ' Body is required',
        ]);

        $input = request()->all();

        //create new profile instance populated with inputs
        $profile = new Profile($input);

        //associate with the logged in user
        $profile->user()->associate(Auth::user());

        //Save Profile in database
        $profile->save();

        //Redirect to home page...Profile gets created
        return redirect()->route('home')->with('message', 'Profile Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the logged in user
        $user = Auth::user();

        //get the profile instance for that user
        $profile = $user->profile;

        //load the profile view with profile instance
        return view('profile')->with('profile', $profile);

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
