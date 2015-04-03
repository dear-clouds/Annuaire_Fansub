@extends('layouts.master')

@section('title')
@parent
:: Home
@stop

@section('content')
<div class="page-header">

    @if ( Auth::guest() )
    <h2>Salut !</h2>

    Blabla

    @else
        <div class=".col-md-4" style="text-align: center;">
            <h2>{{ $upload->name }}</strong></h2>
            <p><i>Ajouté le {{ $upload->created_at }}</i></p>


                <p><img src="../{{ $upload->url }}" class="img-thumbnail"></p>

                 <pre> {{ $upload->description }}</pre>
                

        @endif


        <br><br>



</div>


    @stop