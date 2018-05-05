@extends('layouts.app')
{{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('Home')}}
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Questions
                        <a class="btn btn-primary float-right" href="{{ route('question.create') }}">
                            Create a Question
                        </a>

                        <div class="card-body">

                            <div class="card-deck">
                                @forelse($questions as $question)
                                    <div class="col-sm-4 d-flex align-items-stretch">
                                        <div class="card mb-3 ">
                                            <div class="card-header">
                                                <small class="text-muted">
                                                    Updated: {{ $question->created_at->diffForHumans() }}
                                                    Answers: {{ $question->answers()->count() }}
                                                </small>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">{{$question->body}}</p>
                                            </div>
                                            <div class="card-footer">
                                                <p class="card-text">

                                                    <a class="btn btn-primary float-right" href="{{ route('question.show', ['id' => $question->id]) }}">
                                                        View
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    There are no questions to view, you can  create a question.
                                @endforelse
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                {{ $questions->links() }}
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-md-3">
                <div class="card sb-card">
                    <div class="card-body">

                        <h4><b>Archives</b></h4>

                        @foreach($archives as $stats)
                        <li>
                            <a href="{{ route('home.archive', ['month'=> $stats->month,'year' => $stats->year]) }}">
                                {{  date("F", mktime(0, 0, 0, $stats->month, 1)).' '. $stats->year.' ('.$stats->qcount.')' }}
                            </a>
                        </li>
                        @endforeach
                    </div>
                </div>
                <br/>
                <div class="card sb-card">
                    <div class="card-body">

                        <h4><b>Help</b></h4>
                        <li>
                            <a href="{{ route('home.myquestions', ['user_id' => Auth::user()->id]) }}">
                                My Questions
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">
                                All Questions
                            </a>
                        </li>

                    </div>
                </div>
            </div>

        </div>


@endsection