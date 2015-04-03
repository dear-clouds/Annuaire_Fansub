@extends('layouts.master')

@section('title')
@parent
:: Editer Profil
@stop

@section('content')
<h1>Editer {{ $user->username }}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('users.update'), 'method' => 'PUT')) }}

	<div class="form-group">
            {{Form::label('username','Nom d\'utilisateur*')}}
            {{Form::text('username', null,array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('email','Email*')}}
            {{Form::text('email', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('password','Mot de passe*')}}
            {{Form::password('password',array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('team','Team')}}
            {{Form::text('team', null,array('class' => 'form-control'))}}
        </div>

        <div class="form-group">
            {{Form::label('name','Prénom')}}
            {{Form::text('name', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('lastname','Nom')}}
            {{Form::text('lastname', null,array('class' => 'form-control'))}}
        </div>
        <div class="form-group">
            {{Form::label('birthdate','Date de naissance')}}
            {{Form::input('date', 'birthdate', null,array('class' => 'form-control'))}}
        </div>
        

	{{ Form::submit('Mettre à jour', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}


<h1>Annonces postées</h1>

@if ($annonces->count())
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Miniature</th>
            <th>Titre</th>
            <th>Prix</th>
            <th>Date d'ajout</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($annonces as $annonce)
        <tr>
            <td class="miniatures"><img class="miniatures" src="{{ $annonce->photo }}"></td>
            <td>{{ $annonce->title }}</td>
            <td>{{ $annonce->price }}</td>
            <td>{{ $annonce->created_at }}</td>
            <td>
                <a href="annonce/{{ $annonce->id }}" target="_blank" class="btn btn-small btn-info">Voir</a>
                <a href="annonce/{{ $annonce->id }}/edit" class="btn btn-small btn-warning">Editer</a>
                {{ Form::open(array('url' => 'annonce/' . $annonce->id, 'class' => 'pull-right')) }}
                {{ Form::hidden('_method', 'DELETE') }}
                {{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
                {{ Form::close() }}
            </td></tr>
            @endforeach

        </tbody>

    </table>

    {{ $annonces->links(); }}

    @else
    Aucune annonce postée.
    @endif

@stop