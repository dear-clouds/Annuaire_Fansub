@extends('layouts.master')

@section('title')
@parent
:: Editer
@stop

@section('content')
<div class="page-header">

    @if ( Auth::guest() )
    <h2>Tu n'as rien à faire là :)</h2>

    @else

    <h2>Editer <strong>{{ $upload->name }}</strong></h2>

    <p class="bg-danger">{{ HTML::ul($errors->all()) }}</p>

    {{ Form::model($upload, array('route' => array('upload.update', $upload->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'Nom') }}
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('description', 'Description') }}
        {{ Form::textarea('description', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Editer', array('class' => 'btn btn-primary')) }}
    <a href="javascript:window.history.go(-1)" class="btn btn-small btn-default">Annuler</a>

    {{ Form::close() }}

    
    @endif



</div>




@stop