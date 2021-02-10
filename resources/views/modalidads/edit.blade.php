@extends('modalidads.box')

@section('subtitle','Actualizacion de datos de la modalidad')

@section('bread')
    {{ breadcrumbs('modalidadsedit') }}
@endsection

@section('title','Actualizar datos de la modalidad')

@section('body')
    {!! Form::model($modalidad, ['route' => ['modalidads.update', $modalidad->id], 'method' => 'PUT']) !!}
        @include('modalidads.partials.form')
    {!! Form::close() !!}
@endsection