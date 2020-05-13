
@extends('layouts.app')

@section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Votre Candidature :</div>
                        
                        <div class="card-body">
                            

                            @if(count($candidatures) > 0)
                            <table class="table table-striped">
                                <tr>
                                    <th>Contenu</th>
                                    <th></th>
                                </tr>
                                @foreach ($candidatures as $candidature)
                                    <tr>
                                        @if ($candidature->isSelectedToTest)
                                            <div class="alert alert-success" role="alert">
                                                <p>Vous êtes selectionné pour un test, veillez répondre!!</p>
                                            </div>
                                        @endif
                                        @if ($candidature->isNominer)
                                            <div class="alert alert-success" role="alert">
                                                <p>Félicitations, vous êtes nominé à ce poste!</p>
                                            </div>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th><a href="/DemoLaravel/public/candidatures/{{$candidature->id}}">{{ $candidature->nom }} {{ $candidature->Prénoms }}</a></th>
                                        @if ($candidature->isSelectedToTest)
                                            <th><a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-warning">Répondre</a></th>
                                        @elseif (!$candidature->isNominer)
                                            <th><a href="/DemoLaravel/public/candidatures/{{$candidature->id}}/edit" class="btn btn-warning">Modifier</a></th>
                                        @endif
                                    </tr>
                                @endforeach
                            </table>
                             @else
                             <p>Aucune candidature, veuillez postuler...</p>
                             <a class="btn btn-primary" href="{{ route('candidatures.create') }}">Postuler</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection