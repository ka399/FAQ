<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //gets the currently logged-in user object
        $user = Auth::user();

        //questions for a logged-in user shown in pages. per page 6 question will be displayed.
        $questions = $user->questions()->paginate(6);

        //return home view with questions with $questions variable passed into it.
        return view('home')-> with('questions',$questions);
    }
}
