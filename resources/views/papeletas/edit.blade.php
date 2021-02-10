@extends('papeletas.box')

@section('subtitle','Actualizacion de datos de la papeleta')

@section('title','Actualizar datos de la papeleta')

@section('body')
    {!! Form::model($papeleta, ['route' => ['papeletas.update', $papeleta->id], 'method' => 'PUT']) !!}
        @include('papeletas.partials.form')
    {!! Form::close() !!}
@endsection