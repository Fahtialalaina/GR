@php
use App\User;
@endphp
@extends('layouts.app')

@section('content')

<div class="container">

    <table>
        <tr>
            <a href="/DemoLaravel/public/candidatures" class="btn btn-warning">< Retour</a>
            @php
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
            @endphp
            @if($user->hasRole('Admin'))    
            @if ($candidature->isNominer)
            <a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-primary">Voir reponse</a>
            @elseif ($candidature->isTested)
                <a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-primary">Nominer</a>
            @else
            <div class="alert alert-warning" role="alert">
                <p>Si cette candidature vous interresse, veillez tester cette personne!!</p>
            </div>
                <a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-primary">Tester</a>
            @endif
            @else
            @if (!$candidature->isSelectedToTest)
                <a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-primary">Modifier</a>
            @else
                <div class="alert alert-success" role="alert">
                    <p>Vous êtes selectionné pour un test, veillez répondre!!</p>
                </div>
                <a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-primary">Répondre</a>
            @endif
            @endif
        </tr>
</table>
    

{{-- 
<a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/repondre" class="btn btn-primary">Répondre</a>







{!! Form::open(['action'=>['CandidaturesController@storeTest', $candidature->id], 'method'=>'POST']) !!}
        
        <div class="form-group">
            {{ Form::label('Réponses','Réponses') }}
            {{ Form::textarea('Réponses',$candidature->Réponses, ['class'=>'form-control', 'placeholder'=>'Réponses']) }}
        </div>

        {{ Form::hidden('_method','PUT') }}
        {{ Form::submit('Envoyer',['class'=>'btn btn-success']) }}

    {!! Form::close() !!} --}}









{{-- <form method="POST" action="{{ route('/candidatures/{id}/repondre') }}"> 
    @csrf
    <div class="form-group row">
        <label for="Réponse" class="col-md-4 col-form-label text-md-right">{{ __('Réponse') }}</label>

        <div class="col-md-6">
            <input id="Réponse" type="textarea" class="form-control @error('Réponse') is-invalid @enderror" name="Réponse" value="{{ old('Réponse') }}" required autocomplete="Réponse" autofocus>

            @error('Réponse')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</form> --}}

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$candidature->nom}} {{$candidature->Prénoms}}</div>

                <div class="card-body">
                   
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>Nom</td>
                                    <td>{{$candidature->nom}}</td>
                                </tr>
                                <tr>
                                    <td>Prénom(s)</td>
                                    <td>{{$candidature->Prénoms}}</td>
                                </tr>
                                <tr>
                                    <td>Date de naissance</td>
                                    <td>{{$candidature->DateNaissance}}</td>
                                </tr>
                                <tr>
                                    <td>Adresse</td>
                                    <td>{{$candidature->Adresse}}</td>
                                </tr>
                                <tr>
                                    <td>CIN</td>
                                    <td>{{$candidature->cin}}</td>
                                </tr>
                                <tr>
                                    <td>Resumé CV</td>
                                    <td>{{$candidature->resumeCV}}</td>
                                </tr>
                                <tr>
                                    <td>Expérience</td>
                                    <td>{{$candidature->experience}}</td>
                                </tr>
                                <tr>
                                    <td>Lettre de motivation</td>
                                    <td>{{$candidature->lm}}</td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="card-footer"><small>Postulé le {{ $candidature->created_at }}</small></div>
                
                {{-- <div class="card-body">
                    @extends('candidatures.test')
                </div> --}}
            </div>
        </div>
    </div>
            {!! Form::open(['action'=>['CandidaturesController@destroy', $candidature->id], 'method'=>'POST', 'class'=>'pull-right']) !!}
            {{ Form::hidden('_method','DELETE') }}
            {{ Form::submit('Supprimer',['class'=>'btn btn-danger']) }}
            {!! Form::close() !!}
</div>
@endsection