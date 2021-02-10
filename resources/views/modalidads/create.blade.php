@extends('modalidads.box')

@section('subtitle','Nuevo registro')

@section('bread')
    {{ breadcrumbs('modalidadscreate') }}
@endsection

@section('title','Registrar nueva modalidad')

@section('body')
    {!! Form::open(['route' => 'modalidads.store']) !!}
    @include('modalidads.partials.form')
    {!! Form::close() !!}
@endsection