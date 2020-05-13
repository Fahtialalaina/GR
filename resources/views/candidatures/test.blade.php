    <h4>Le récruteur voulez-vous posez des questions. Veillez les-répondre</h4>

    {!! Form::open(['action'=>['CandidaturesController@storeTest', $candidature->id], 'method'=>'POST']) !!}

    <div class="form-group">
        <p>{{$candidature->Questions}}</p>
        {{ Form::label('Réponses', 'Réponses') }}
        {{ Form::text('Réponses','', ['class'=>'form-control', 'placeholder'=>'Réponses']) }}
    </div>

        {{ Form::hidden('_method','PUT') }}
        {{ Form::submit('Envoyer',['class'=>'btn btn-success']) }}

    {!! Form::close() !!}
