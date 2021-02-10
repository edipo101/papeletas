@extends('papeletas.box')

@section('subtitle','Nuevo registro')

@section('title','Registrar nueva papeleta')

@section('body')
    {!! Form::open(['route' => ['papeletas.store',$planilla->id]]) !!}
    @include('papeletas.partials.form')
    {!! Form::close() !!}
@endsection