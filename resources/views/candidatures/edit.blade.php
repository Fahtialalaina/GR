@php
use App\User;
@endphp

@extends('layouts.app')

@section('content')
@php
$user_id = auth()->user()->id;
$user = User::find($user_id);
@endphp
@if($user->hasRole('Admin'))
    @if (!$candidature->isTested)
        <h1>Posez la ou les questions! </h1>
        {!! Form::open(['action'=>['CandidaturesController@update', $candidature->id], 'method'=>'POST']) !!}

            <div class="form-group">
                {{ Form::label('Questions','Questions') }}
                {{ Form::textarea('Questions',$candidature->Réponses, ['class'=>'form-control', 'placeholder'=>'Quéstions']) }}
            </div>

            {{ Form::hidden('_method','PUT') }}
            {{ Form::submit('Envoyer',['class'=>'btn btn-success']) }}
        {!! Form::close() !!}
    @else
    <h1>Réponse au test</h1>
        {!! Form::open(['action'=>['CandidaturesController@update', $candidature->id], 'method'=>'POST']) !!}

            <div class="form-group">
                {{-- {{ Form::label('Réponses','Réponses') }} --}}
                {{-- {{ Form::textarea('Questions',$candidature->Réponses, ['class'=>'form-control', 'placeholder'=>'Quéstions']) }} --}}
                <p>{{$candidature->Réponses}}</p>
            </div>
            @if (!$candidature->isNominer)
            <p>Voullez-vous nominer cet candidature?</p>

            {{ Form::hidden('_method','PUT') }}
            {{ Form::submit('Nominer',['class'=>'btn btn-success']) }}
            @endif
        {!! Form::close() !!}
@endif
@else

@if ($candidature->isSelectedToTest)
<h1>Questions : </h1>

<P>{{$candidature->Questions}}?</P>

{!! Form::open(['action'=>['CandidaturesController@update', $candidature->id], 'method'=>'POST']) !!}

    <div class="form-group">
        {{ Form::label('Réponses','Réponses') }}
        {{ Form::textarea('Réponses',$candidature->Réponses, ['class'=>'form-control', 'placeholder'=>'Réponses']) }}
    </div>

    {{ Form::hidden('_method','PUT') }}
    {{ Form::submit('Envoyer',['class'=>'btn btn-success']) }}

{!! Form::close() !!}

@else
<h1>Modifier la candidature</h1>

{!! Form::open(['action'=>['CandidaturesController@update', $candidature->id], 'method'=>'POST']) !!}

    <div class="form-group">
        {{ Form::label('nom','Nom') }}
        {{ Form::text('nom',$candidature->nom, ['class'=>'form-control', 'placeholder'=>'Nom']) }}
    </div>

    <div class="form-group">
        {{ Form::label('Prénoms','Prénoms') }}
        {{ Form::text('Prénoms',$candidature->Prénoms, ['class'=>'form-control', 'placeholder'=>'Prénoms']) }}
    </div>

    <div class="form-group">
        {{ Form::label('DateNaissance','Date de naissance') }}
        {{ Form::Date('DateNaissance',$candidature->DateNaissance, ['class'=>'form-control', 'placeholder'=>'Date de naissance']) }}
    </div>

    <div class="form-group">
        {{ Form::label('Adresse','Adresse') }}
        {{ Form::text('Adresse',$candidature->Adresse, ['class'=>'form-control', 'placeholder'=>'Adresse']) }}
    </div>

    <div class="form-group">
        {{ Form::label('cin','CIN') }}
        {{ Form::text('cin',$candidature->cin, ['class'=>'form-control', 'placeholder'=>'CIN']) }}
    </div>

    <div class="form-group">
        {{ Form::label('resumeCV','Resumé CV') }}
        {{ Form::textarea('resumeCV',$candidature->resumeCV, ['class'=>'form-control', 'placeholder'=>'Resumé CV']) }}
    </div>

    <div class="form-group">
        {{ Form::label('experience','Expérience') }}
        {{ Form::textarea('experience',$candidature->experience, ['class'=>'form-control', 'placeholder'=>'Expérience']) }}
    </div>

    <div class="form-group">
        {{ Form::label('lm','Lettre de motivation') }}
        {{ Form::textarea('lm',$candidature->lm, ['class'=>'form-control', 'placeholder'=>'Lettre de Motivation']) }}
    </div>

    {{ Form::hidden('_method','PUT') }}
    {{ Form::submit('Envoyer',['class'=>'btn btn-success']) }}

{!! Form::close() !!}
@endif
@endif
@endsection