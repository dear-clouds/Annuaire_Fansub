@extends('layouts.master')

@section('title')
@parent
:: Annonces
@stop

@section('content')



@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<center>
   <div class="row">
@foreach ($annonces as $annonce)
<div class="col-lg-4">
   <a href="annonce/{{ $annonce->id }}"><img class="img-thumbnail" src="../{{ $annonce->photo }}"></a>
      <h3>{{ $annonce->title }}</h3>
      <p>{{ $annonce->description }}</p>

      <p><a class="btn btn-default" href="annonce/{{ $annonce->id }}" role="button">{{ $annonce->price }}€</a></p>
<br><br><br>      </div>

      

      @endforeach
</div>


{{ $annonces->links(); }}



</center>


@stop