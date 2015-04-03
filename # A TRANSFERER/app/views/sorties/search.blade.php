@extends('layouts.master')

@section('title')
@parent
:: results
@stop

@section('content')



@if (Session::has('message'))
<div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

<h1>Ces annonces correspondent à vos critères</h1>

<center>
   <div class="row">
@foreach ($results as $result)
<div class="col-lg-4">
   <img class="img-thumbnail" src="../{{ $result->photo }}">
      <h3>{{ $result->title }}</h3>
      <p>{{ $result->description }}</p>

      <p><a class="btn btn-default" href="../annonce/{{ $result->id }}" role="button">{{ $result->price }}€</a></p>
<br><br><br>      </div>

      

      @endforeach
</div>




</center>


@stop