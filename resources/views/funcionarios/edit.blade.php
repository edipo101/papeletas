@extends('funcionarios.box')

@section('subtitle','Actualizacion de datos del funcionario')

@section('bread')
    {{ breadcrumbs('funcionariosedit') }}
@endsection

@section('title','Actualizar datos del modalidad')

@section('body')
    {!! Form::model($funcionario, ['route' => ['funcionarios.update', $funcionario->id], 'method' => 'PUT']) !!}
        @include('funcionarios.partials.form')
    {!! Form::close() !!}
@endsection