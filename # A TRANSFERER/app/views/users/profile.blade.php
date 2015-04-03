@extends('layouts.master')

@section('title')
@parent
:: Editer Profil
@stop

@section('content')
<h1>Editer {{ $user->username }}</h1>

{{ HTML::ul($errors->all()) }}

{{ Form::model($user, array('route' => array('user.update'), 'method' => 'PUT','files' => true)) }}

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




@stop