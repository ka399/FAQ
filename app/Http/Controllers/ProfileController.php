<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Profile;
use App\User;
use Image;



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
        $input =Profile::ValidateInputs($request);


        $input = request()->all();

        //create new profile instance populated with inputs
        $profile = new Profile($input);

        $profile->LoadAvatar($request,$profile);


        //associate with the logged in user
        $profile->user()->associate(Auth::user());

        //Save Profile in database
        $profile->save();

        //Redirect to home page...Profile gets created
        return redirect()->route('home')->with('message', 'Profile Created Successfully!');
    }

    /**
     * Display the user profile.
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
     * Show the form for editing the user profile.
     *
     * @param  int  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($user, $profile)
    {
        //Find the corresponding user
        $user = User::find($user);

        //Get the user profile
        $profile = $user->profile;

        //Set the edit variable = true
        $edit = TRUE;

        //display the profile form in edit mode
        return view('profileForm', ['profile' => $profile, 'edit' => $edit ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  use App\Profile $user
     * @param  use App\User $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user, $profile)
    {
        $input =Profile::ValidateInputs($request);

        //find profile
        $profile = Profile::find($profile);

        //set edited parameters
        $profile->fname = $request->fname;
        $profile->lname = $request->lname;
        $profile->body = $request->body;
        $profile->LoadAvatar($request,$profile);

        //Update Profile
        $profile->save();

        //display Home Page.
        return redirect()->route('home')->with('message', 'Profile Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user,$profile)
    {
        //Find the corresponding user
        $user = User::find($user);

        //Get the user profile
        $profile = $user->profile;
        $profile->delete();
        return redirect()->route('home')->with('message', 'Profile Deleted Successfully!');

    }


}
