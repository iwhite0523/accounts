@extends('layout')
@section('content')
<ul>
  @foreach ($periods as $period)
    <table>
      <tr><th>
          <h1> <a href="/periods/{{ $period->id }}"> {{ $period->title }} </a> </h1></th><th>
      <form method="POST" action="/periods/{{$period->id}}">
        {{ method_field('DELETE') }}
        <div class="form-group">
          <button type="submit"><img id="flag" src="/img/trash.png" width="15" height="15" class="delete"></button>
        </div>
        {{ csrf_field() }}
      </form></th></tr>
    </table>
    @foreach ($period->accounts as $account)
      <li> <a href="/periods/accounts/{{ $account->id }}"> {{ $account->title }} </a> </li>
      @endforeach
  @endforeach
</ul>
<h3>Add New Period</h3>
<form method="POST" action="periods">
  <div class="form-group">
    Date:<input type="date" name="periodStart" class="form-control"><br/>
    Title:<input type="text" name="title" class="form-control">
  </div>
  <div class="form-group">
    <button type="submit">Add Period</button>
  </div>
  {{ csrf_field() }}
</form>
@stop
