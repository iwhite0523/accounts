@extends('layout')
@section('content')
<ul>
  @foreach ($periods as $period)
    <h1> <a href="/periods/{{ $period->id }}"> {{ $period->title }} </a></h1>
    @foreach ($period->accounts as $account)
      <li> <a href="/periods/accounts/{{ $account->id }}"> {{ $account->title }} </a> </li>
      @endforeach
  @endforeach
</ul>
<h3>Add New Period</h3>
<form method="POST" action="periods">
  <div class="form-group">
    <textarea name="title" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <button type="submit">Add Period</button>
  </div>
  {{ csrf_field() }}
</form>
@stop
