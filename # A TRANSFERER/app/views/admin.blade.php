@extends('layouts.master')

@section('title')
@parent
:: Sorties
@stop

@section('content')

<p class="pull-right"><a href="users" class="btn btn-default btn-lg"><img src="../img/folder.png" alt="upload"> Gérer les membres</a></p>

<h1>Sorties</h1>


@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Catégorie</th>
      <th>Prix</th>
      <th>Posté par</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sorties as $key => $value)
    <tr>
      <td>{{ $value->title }}</td>
      <td>{{ $value->categorie }}</td>
      <td>{{ $value->price }}</td>
      <td>{{ $value->username }}</td>
      <td>

        {{ Form::open(array('url' => 'sortie/' . $value->id, 'class' => 'pull-right')) }}
        {{ Form::hidden('_method', 'DELETE') }}
        {{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
        {{ Form::close() }}

        <a class="btn btn-small btn-success" href="{{ URL::to('sortie/' . $value->id) }}" target="_blank">Voir</a>

        <a class="btn btn-small btn-warning" href="{{ URL::to('sortie/' . $value->id . '/edit') }}">Editer</a>

      </td>
    </tr>
    @endforeach
  </tbody>
</table>

</div>


@stop