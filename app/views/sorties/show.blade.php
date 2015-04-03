@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')


<div class="col-md-8">
    <h2>{{ $sortie->title }}</h2>
    <p><i>Ajouté le {{ $sortie->created_at }} par <a href="../profil/{{ $sortie->username }}">{{ $sortie->username }}</a></i></p>


    <p><img src="../{{ $sortie->photo }}" class="img-responsive img-rounded" alt="photo"></p>

    <blockquote><p><strong>Description :</strong></p>
    {{ $sortie->description }}</blockquote>

</div>


<div class="col-md-4 panel-group">


    <div class="text-center">
        <h1 class="jumbotron">{{ $sortie->team }}</h1>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Informations sur la release</h3>
        </div>
        <div class="panel-body">
            <p><strong>Catégorie : </strong>{{ $sortie->categorie }}</p>
            <p><strong>Pays d'origine : </strong>{{ $sortie->origine }}</p>
            <p><strong>Qualité : </strong>{{ $sortie->qualite }}</p>
            <p><strong>Type : </strong>{{ $sortie->type }}</p>
            <p><strong>Karaokes inclus : </strong>{{ $sortie->karaokes }}</p>
            <p><strong>Censuré : </strong>{{ $sortie->censure }}</p>
            <p><strong>Accès à la release : </strong>{{ $sortie->access }}</p>
        </div>
    </div>
</div>






@stop