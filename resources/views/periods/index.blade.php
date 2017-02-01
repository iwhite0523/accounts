@extends('layout')

@section('head')
    {!! Charts::assets() !!}
@stop

@section('content')
    <div>
        <nav class="sideBar">
            <h1>Archives</h1>
            <div class="mosaic">
                <div class="tabs">
                @foreach ($periods as $period)
                        <div class="tab" id="{{ $period->id }}"><a href="periods/{{ $period->id }}">{{ $period->title }}</a></div>
                @endforeach
                </div>
            </div>

            <h3>Add New Period</h3>
            <form method="POST" action="/periods">
                <div class="form-group">
                    Date:<input type="date" name="periodStart" value="2017-01-01" class="form-control"><br/>
                    Title:<input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit">Add Period</button>
                </div>
                {{ csrf_field() }}
            </form>
        </nav>
        <section class="chart">
            {!! $chart->render() !!}
        </section>
    </div>
@stop
