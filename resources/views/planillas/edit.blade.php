@extends('planillas.box')

@section('subtitle','Actualizacion de datos de la planilla')

@section('bread-box')
    {{ breadcrumbs('planillasedit') }}
@endsection

@section('title','Actualizar datos de la planilla')

@section('body')
    {!! Form::model($planilla, ['route' => ['planillas.update', $planilla->id], 'method' => 'PUT']) !!}
        @include('planillas.partials.form')
    {!! Form::close() !!}
@endsection