@extends('layouts.master')

@section('title')
@parent
:: Membres
@stop

@section('content')

<p class="pull-right"><a href="files" class="btn btn-default btn-lg"><img src="../img/folder.png" alt="upload"> Gérer les uploads</a></p>

<h1>Membres</h1>


@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Date d'inscription</th>
			<th>Role</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
		@foreach($users as $key => $value)
		<tr>
			<td>{{ $value->username }}</td>
			<td>{{ $value->email }}</td>
			<td>{{ $value->created_at }}</td>
			<td>{{ $value->role }}</td>
			<td>

				{{ Form::open(array('url' => 'users/' . $value->id, 'class' => 'pull-right')) }}
				{{ Form::hidden('_method', 'DELETE') }}
				{{ Form::submit('Supprimer', array('class' => 'btn btn-danger')) }}
				{{ Form::close() }}

				<a class="btn btn-small btn-success" href="{{ URL::to('users/' . $value->id) }}" target="_blank">Voir</a>

				<a class="btn btn-small btn-warning" href="{{ URL::to('users/' . $value->id . '/edit') }}">Editer</a>

			</td>
		</tr>
		@endforeach
	</tbody>
</table>

</div>


@stop