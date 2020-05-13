@extends('layouts.app')

@section('content')

<H1>CANDIDATURES RECUS</H1>
@if (count($candidatures)>0)
    <div class="card">
        <ul class="list-group list-group-flush">
            @foreach ($candidatures as $candidature)
                <li class="list-group-item">

                    @if($candidature->isNominer)
                        <h3><a class="nominer" href="/DemoLaravel/public/candidatures/{{$candidature->id}}">{{ $candidature->nom }} {{ $candidature->Prénoms }}</a></h3>
                    @else
                        <h3><a href="/DemoLaravel/public/candidatures/{{$candidature->id}}">{{ $candidature->nom }} {{ $candidature->Prénoms }}</a></h3>
                    @endif

                    
                    <small>Postulé le {{ $candidature->created_at }}</small>

                    @if (($candidature->isTested)&&(!$candidature->isNominer))
                        <p>Réponses : </p><p>{{ $candidature->Réponses }}</p>
                        {{-- <a href="{{ action('CandidaturesController@update', ['id'=>$candidature->id,'Request'=>'']) }}" class="btn btn-primary">Nominer</a> --}}
                        <a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-warning">Voir</a>
                    @endif

                </li>
            @endforeach
        </ul>
    </div>
@else

@endif

@endsection