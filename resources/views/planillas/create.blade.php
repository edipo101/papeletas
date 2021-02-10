@extends('planillas.box')

@section('subtitle','Nuevo registro')

@section('bread-box')
    {{ breadcrumbs('planillascreate') }}
@endsection

@section('title','Registrar nueva planilla')

@section('body')
    {!! Form::open(['route' => 'planillas.store']) !!}
    @include('planillas.partials.form')
    {!! Form::close() !!}
@endsection