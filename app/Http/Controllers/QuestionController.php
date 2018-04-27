<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    /**
     * This constructor will allow only authorised user to view the question
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * Show the form for creating a new question.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //get new question instance
        $question = new Question;

        //set edit variable as false : new question
        $edit = FALSE;

        //display the question view
        return view('questionForm', ['question' => $question,'edit' => $edit  ]);
    }

    /**
     * Store a newly created question in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validations
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);

        //get inputs
        $input = request()->all();

        //new instance
        $question = new Question($input);

        //set user ID
        $question->user()->associate(Auth::user());

        //SAVE
        $question->save();

        //Display the Home Page
        return redirect()->route('home')->with('message', 'New Question Saved Successfully!');
    }

    /**
     * Display the specified question user wants to view
     *
     * @param  int  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        return view('question')->with('question', $question);
    }

    /**
     * Show the form for editing the specified question.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $edit = TRUE;
        return view('questionForm', ['question' => $question, 'edit' => $edit ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $input = $request->validate([
            'body' => 'required|min:5',
        ], [
            'body.required' => 'Body is required',
            'body.min' => 'Body must be at least 5 characters',
        ]);
        $question->body = $request->body;
        $question->save();
        return redirect()->route('question.show',['question_id' => $question->id])->with('message', 'Question Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $id = $question->id;
        $question->delete();
        $message = 'Question Deleted Successfully!';
        return redirect()->route('home')->with('message', $message);
    }
}
