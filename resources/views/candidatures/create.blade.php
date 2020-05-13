@extends('layouts.app')

@section('content')

    <h1>Postuler</h1>

    {!! Form::open(['action'=>'CandidaturesController@store', 'method'=>'POST']) !!}

        <div class="form-group">
            {{ Form::label('nom','Nom') }}
            {{ Form::text('nom','', ['class'=>'form-control', 'placeholder'=>'Nom']) }}
        </div>

        <div class="form-group">
            {{ Form::label('Prénoms','Prénoms') }}
            {{ Form::text('Prénoms','', ['class'=>'form-control', 'placeholder'=>'Prénoms']) }}
        </div>

        <div class="form-group">
            {{ Form::label('DateNaissance','Date de naissance') }}
            {{ Form::Date('DateNaissance','', ['class'=>'form-control', 'placeholder'=>'Date de naissance']) }}
        </div>

        <div class="form-group">
            {{ Form::label('Adresse','Adresse') }}
            {{ Form::text('Adresse','', ['class'=>'form-control', 'placeholder'=>'Adresse']) }}
        </div>

        <div class="form-group">
            {{ Form::label('cin','CIN') }}
            {{ Form::text('cin','', ['class'=>'form-control', 'placeholder'=>'CIN']) }}
        </div>

        <div class="form-group">
            {{ Form::label('resumeCV','Resumé CV') }}
            {{ Form::textarea('resumeCV','', ['class'=>'form-control', 'placeholder'=>'Resumé CV']) }}
        </div>

        <div class="form-group">
            {{ Form::label('experience','Expérience') }}
            {{ Form::textarea('experience','', ['class'=>'form-control', 'placeholder'=>'Expérience']) }}
        </div>

        <div class="form-group">
            {{ Form::label('lm','Lettre de motivation') }}
            {{ Form::textarea('lm','', ['class'=>'form-control', 'placeholder'=>'Lettre de Motivation']) }}
        </div>

        {{ Form::submit('Envoyer',['class'=>'btn btn-success']) }}

    {!! Form::close() !!}

@endsection