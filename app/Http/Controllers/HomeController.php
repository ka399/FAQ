<?php

namespace App\Http\Controllers;

use \App\Http\Repository\QuestionRepository;
use App\Question;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


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
    public function index(QuestionRepository $questionRepository)
    {

        $questions = $questionRepository->getQuestionsList();

        //return home view with questions with $questions variable passed into it.
        //return view('home')-> with('questions',$questions);
        return view('home', compact('questions'));
    }

}
