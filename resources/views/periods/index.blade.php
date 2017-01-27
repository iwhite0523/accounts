@extends('layout')

@section('head')
    {!! Charts::assets() !!}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    function replaceText() {
        document.getElementById("demo").innerHTML = "Paragraph changed.";
    }

    function loadDoc(period) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

            }
        };
        document.getElementById("demo").innerHTML = $.getScript("http://localhost:8000/periods/" + period + "/charts/only");
        xhttp.send();
    }
</script>
<script>
    $(document).ready(function() {
        $("div.tab").click(function() {
            loadDoc(34);
        });
    });
</script>
@stop

@section('content')
    <table><tr><th>
<div class="sideBar">
    <h3>Add New Period</h3>
    <div class="sideBar__section">
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
        <div class="mosaic">
            <div class="tabs">
            @foreach ($periods as $period)
                    <div class="tab" id="{{ $period->id }}">{{ $period->title }}</div>
            @endforeach
            </div>
        </div>
    </div>
</div></th><th>
<div id="demo"></div>
            </th></tr></table>
@stop
