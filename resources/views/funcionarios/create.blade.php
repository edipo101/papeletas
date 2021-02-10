@extends('funcionarios.box')

@section('subtitle','Nuevo registro')

@section('bread')
    {{ breadcrumbs('funcionarioscreate') }}
@endsection

@section('title','Registrar nuevo funcionario')

@section('body')
    {!! Form::open(['route' => 'funcionarios.store']) !!}
    @include('funcionarios.partials.form')
    {!! Form::close() !!}
@endsection