@extends('layouts.app')

@if($edit === FALSE)
    {{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('CreateQuestion')}}
@endsection
@else()
    {{-- Breadcrumbs --}}
@section('breadcrumbs')
    {{ Breadcrumbs::render('EditQuestion',$question->id)}}
@endsection
@endif

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if($edit === FALSE)
                    <div class="card-header">Create Question</div>
                    @else()
                        <div class="card-header">Edit Question</div>
                        @endif
                    <div class="card-body">
                        @if($edit === FALSE)
                            {!! Form::model($question, ['action' => 'QuestionController@store']) !!}
                        @else()
                            {!! Form::model($question, ['route' => ['question.update', $question->id], 'method' => 'patch']) !!}
                        @endif
                        <div class="form-group">
                            {!! Form::label('body', 'Tip : How to quickly get a good answer') !!}
                            <p>1. Keep your question short and to the point.</p>
                            <p>2. Check for grammar or spelling errors.</p>
                            <p>3. Phrase it like a question.</p>
                            {!! Form::textarea('body', $question->body, ['class' => 'form-control','required' => 'required']) !!}
                        </div>
                        <button class="btn btn-outline-primary float-right" value="submit" type="submit" id="submit">Save
                        </button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection