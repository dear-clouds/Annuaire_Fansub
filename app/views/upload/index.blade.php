@extends('layouts.master')

@section('title')
@parent
:: Fichiers
@stop

@section('content')



<p class="pull-right"><a href="users" class="btn btn-default btn-lg"><img src="../img/users.png" alt="users"> Gérer les utilisateurs</a> </p>

<h1>Fichiers</h1>

@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
         <th>Miniature</th>
         <th>Nom</th>
         <th>Description</th>
         <th>Ajouté par</th>
         <th>Date d'ajout</th>
         <th>Actions</th>
     </tr>
 </thead>
 <tbody>
    @foreach($uploads as $key => $value)
    <tr>
        <td class="miniatures"><img class="miniatures" src="../{{ $value->url }}"></td>
        <td>{{ $value->name }}</td>
        <td>{{ $value->description }}</td>
        <td>{{ $value->user_id }}</td>
        <td>{{ $value->created_at }}</td>
        <td>

            {{ Form::open(array('url' => 'upload/' . $value->id, 'class' => 'pull-right')) }}
            {{ Form::hidden('_method', 'DELETE') }}
            {{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
            {{ Form::close() }}

            <a class="btn btn-small btn-success" href="{{ URL::to('upload/' . $value->id) }}" target="_blank">Voir</a>

            <a class="btn btn-small btn-warning" href="{{ URL::to('upload/' . $value->id . '/edit') }}">Editer</a>

        </td>
    </tr>
    @endforeach
</tbody>
</table>

{{ $uploads->links(); }}


</div>


@stop