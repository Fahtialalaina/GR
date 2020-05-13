@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Inscription</div>
        
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
        
                                <div class="form-group row">
                                    <label for="nom" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>
        
                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Prénoms" class="col-md-4 col-form-label text-md-right">{{ __('Prénoms') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="Prénoms" type="text" class="form-control @error('Prénoms') is-invalid @enderror" name="Prénoms" value="{{ old('Prénoms') }}" required autocomplete="Prénoms" autofocus>
        
                                        @error('Prénoms')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="DateNaissance" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="DateNaissance" type="date" class="form-control @error('DateNaissance') is-invalid @enderror" name="DateNaissance" value="{{ old('DateNaissance') }}" required autocomplete="" autofocus>
        
                                        @error('DateNaissance')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="Adresse" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="Adresse" type="text" class="form-control @error('Adresse') is-invalid @enderror" name="Adresse" value="{{ old('Adresse') }}" required autocomplete="Adresse" autofocus>
        
                                        @error('Adresse')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cin" class="col-md-4 col-form-label text-md-right">{{ __('CIN') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="cin" type="text" class="form-control @error('cin') is-invalid @enderror" name="cin" value="{{ old('cin') }}" required autocomplete="cin" autofocus>
        
                                        @error('cin')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <label for="resumeCV" class="col-md-4 col-form-label text-md-right">{{ __('Résume CV') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="resumeCV" type="textarea" class="form-control @error('resumeCV') is-invalid @enderror" name="resumeCV" value="{{ old('resumeCV') }}" required autocomplete="resumeCV" autofocus>
        
                                        @error('resumeCV')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="experience" class="col-md-4 col-form-label text-md-right">{{ __('Expérience') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="experience" type="textarea" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" required autocomplete="experience" autofocus>
        
                                        @error('experience')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lm" class="col-md-4 col-form-label text-md-right">{{ __('Lettre de motivation') }}</label>
        
                                    <div class="col-md-6">
                                        <input id="lm" type="textarea" class="form-control @error('lm') is-invalid @enderror" name="lm" value="{{ old('lm') }}" required autocomplete="lm" autofocus>
        
                                        @error('lm')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Envoyer') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
