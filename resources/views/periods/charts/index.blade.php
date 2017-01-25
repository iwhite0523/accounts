@extends('layout')
@section('head')
    <title>{{ $chart->title }}</title>
    {!! Charts::assets() !!}
@stop

@section('content')
    <center>
        {!! $chart->render() !!}
    </center>
@stop
