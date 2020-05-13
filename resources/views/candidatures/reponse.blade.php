@extends('layouts.app')

@section('content')


    <h1>Modifier la candidature</h1>

    {!! Form::open(['action'=>['CandidaturesController@update', $candidature->id], 'method'=>'POST']) !!}
        
        <div class="form-group">
            {{ Form::label('lm','Lettre de motivation') }}
            {{ Form::textarea('lm',$candidature->lm, ['class'=>'form-control', 'placeholder'=>'Lettre de Motivation']) }}
        </div>

        {{ Form::hidden('_method','PUT') }}
        {{ Form::submit('Envoyer',['class'=>'btn btn-success']) }}

    {!! Form::close() !!}

@endsection