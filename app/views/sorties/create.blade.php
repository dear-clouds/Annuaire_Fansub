@extends('layouts.master')

@section('title')
@parent
:: Poster une sortie
@stop

@section('content')
</nav>

<h1>Poster une sortie</h1>

{{ HTML::ul($errors->all() )}}

<div class="form-group">

{{ Form::open(array('url' => 'sortie','files'=>true)) }}

		{{Form::label('image','Image')}}
        <div class="form-control">
            {{ Form::file('file','',array('id'=>'')) }}
		</div>


        
        <br/>




	{{Form::label('categorie','Catégorie')}}
	{{ Form::select('categorie', array(
	'Animes' => 'Animes',
	'Séries' => 'Séries',
	'Films' => 'Films',
	'Mangas' => 'Mangas',
	'Emissions' => 'Emissions',
	'Doujinshis' => 'Doujinshis',
	'Karaokes' => 'Karaokes',
	'OAV' => 'OAV',
	'Autre' => 'Autre'
	), null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{Form::label('title','Titre')}}
	{{Form::text('title', null,array('class' => 'form-control'))}}
</div>


<div class="form-group">
	{{Form::label('description','Description')}}
	{{Form::textarea('description', null,array('class' => 'ckeditor'))}}
	<script type="text/javascript" src="<?= url('ckeditor/ckeditor.js') ?>"></script>
	<script>CKEDITOR.replace('content');</script>
</div>

<div class="form-group">
	{{Form::label('orgine','Pays d\'origine')}}
	{{Form::text('origine', null,array('class' => 'form-control'))}}
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
	{{Form::label('type','Type')}}
	{{ Form::select('type', array(
	'Softsub' => 'Softsub',
	'Hardsub' => 'Hardsub',
	'Softsub & Hardsub' => 'Les deux'
	), null, array('class' => 'form-control')) }}
</div>

<div class="form-group">
	{{Form::label('karaokes','Karaokes inclus')}}
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


<div class="form-group">
	{{Form::label('access','Accès à la release')}}
	{{ Form::select('access', array(
	'Libre accès' => 'Libre accès',
	'Inscription sur le site' => 'Inscription sur le site',
	'Inscription sur le forum' => 'Inscription sur le forum',
	'Un taux de messages postés sur le forum' => 'Un taux de messages postés sur le forum',
	'Accès privé' => 'Acces privé'
	), null, array('class' => 'form-control')) }}
</div>

{{Form::submit('Créer', array('class' => 'btn btn-primary'))}}
{{ Form::close() }}

@stop