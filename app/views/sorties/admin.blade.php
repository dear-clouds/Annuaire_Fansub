@extends('layouts.master')

@section('title')
@parent
:: Admin
@stop

@section('content')


<p class="pull-right"><a href="admin/users" class="btn btn-default btn-lg"><img src="img/users.png" alt="users"> Gérer les utilisateurs</a> 
  <a href="admin/annonces" class="btn btn-default btn-lg"><img src="img/folder.png" alt="annonces"> Gérer les annonces</a></p>
<br>

@if ($users->count())
<h1>Derniers membres inscrits</h1>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Date de naissance</th>
      <th>Date d'inscription</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($users as $user)
    <tr>
      <td>{{ $user->username }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->lastname }}</td>
      <td>{{ $user->birthdate }}</td>
      <td>{{ $user->created_at }}</td>

    </tr>
    @endforeach

  </tbody>

</table>

@else
Il n'y a aucun membre.
@endif

<br><br>


@if ($annonces->count())
<h1>Dernières annonces postées</h1>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Miniature</th>
      <th>Titre</th>
      <th>Ajouté par</th>
      <th>Prix</th>
      <th>Date d'ajout</th>
    </tr>
  </thead>

  <tbody>
    @foreach ($annonces as $annonce)
    <tr>
      <td class="miniatures"><img class="miniatures" src="{{ $annonce->photo }}"></td>
      <td>{{ $annonce->title }}</td>
      <td>{{ $annonce->username }}</td>
      <td>{{ $annonce->price }}</td>
      <td>{{ $annonce->created_at }}</td>

    </tr>
    @endforeach

  </tbody>

</table>


@else
Il n'y a aucune annonce.
@endif



@stop