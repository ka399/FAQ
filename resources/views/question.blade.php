@extends('layouts.app')
{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('ViewQuestion',$question->id)}}
@endsection
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-9">
                <div class="card">

                    <div class="card-header">
                        <strong>Question Title : {{$question->title}} <br/></strong>
                            <i>Posted on :
                        {{$question->created_at->format('l M 6, Y h:i A')}}
                            </i>
                    </div>

                    <div class="card-body">
                        {{$question->body}}
                    </div>
                    <div class="card-footer">

                        <a class="btn btn-outline-primary float-left"
                           href="{{ route('answers.create', ['question_id'=> $question->id])}}">
                            Post Answer
                        </a>
                        <a class="btn btn-outline-primary float-right"
                           href="{{ route('question.edit',['id'=> $question->id])}}">
                            Edit
                        </a>

                        {{ Form::open(['method'  => 'DELETE', 'route' => ['question.destroy', $question->id]])}}
                        <button class="btn btn-outline-danger float-right mr-2" value="submit" type="submit" id="submit">Delete
                        </button>
                        {!! Form::close() !!}
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <b>{{$question->answers->count()}} Answers</b>
                    </div>

                    <div class="card-body">
                        @forelse($question->answers as $answer)
                            <div class="card">
                                <div class="card-header">
                                    <b>Answered by :</b> {{$answer->GetUserName($answer->user_id)}}
                                    <b>on :</b> <i>{{$answer->created_at->format('l M 6, Y h:i A')}}</i>

                                </div>
                                <div class="card-body">{{$answer->body}}</div>
                                <div class="card-footer">

                                    <a class="btn btn-link float-right"
                                       href="{{ route('answers.show', ['question_id'=> $question->id,'answer_id' => $answer->id]) }}">
                                        View more>>
                                    </a>

                                </div>
                            </div>
                        @empty
                            <div class="card">

                                <div class="card-body"> No Answers</div>
                            </div>
                        @endforelse


                    </div>
                </div>
            </div>
    @include("includes.archive")


@endsection