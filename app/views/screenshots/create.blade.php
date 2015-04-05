@extends('layouts.master')

@section('title')
@parent
:: Poster un screenshot
@stop

@section('content')
</nav>

<h1>Poster un screenshot</h1>

{{ HTML::ul($errors->all() )}}

<div class="form-group">

	{{ Form::open(array('url'=>'screenshot','files'=>true)) }}

	{{Form::label('image','Screenshot')}}
	<div class="form-control">
		{{ Form::file('file','',array('id'=>'')) }}
	</div>


	
	<br/>

	{{Form::label('categorie','Catégorie')}}
	{{ Form::select('categorie', $categories, null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{Form::label('title','Titre du sujet (Anime/Drama ect.)')}}
	{{Form::text('title', null,array('class' => 'form-control'))}}
</div>


<div class="form-group">
	{{Form::label('team','Team de la release')}}
	{{Form::text('team', null,array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('time','Minute à laquelle est prise la capture (sous cette forme: HH:MM:SS)')}}
	{{Form::text('time', null,array('class' => 'form-control'))}}
</div>

<div class="form-group">
	{{Form::label('qualite','Qualité de la release')}}
	{{ Form::select('qualite', array(
	'Bluray 1080p' => 'Bluray 1080p',
	'Bluray 720p' => 'Bluray 720p',
	'DVD' => 'DVD',
	'1080p' => '1080p',
	'720p' => '720p',
	'480p' => '480p',
	'autre' => 'Autre (fortement déconseillé !)'
	), null, array('class' => 'form-control')) }}
</div>


<div class="form-group">
	{{Form::label('karaokes','Karaokes inclus ?')}}
	{{ Form::select('karaokes', array(
	'Oui' => 'Oui',
	'Non' => 'Non'
	), null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{Form::label('censure','Censure')}}
	{{ Form::select('censure', array(
	'Non' => 'Non',
	'Oui' => 'Oui'
	), null, array('class' => 'form-control')) }}
</div>


{{Form::submit('Ajouter', array('class' => 'btn btn-primary'))}}
{{ Form::close() }}

@stop