@extends('layout')

@section('content')
  <h1> <a href="/periods/{{$period->id}}">{{ $period->title }} </a> </h1>
  <table style="width:50%">
    <tr>
      <th>Title</th>
      <th>Balance</th>
    </tr>
    @foreach ($period->accounts as $account)
      <tr>
        <th><a href="/periods/{{$period->id}}/accounts/{{$account->id}}"> {{ $account->title }}</a> </th>
        <th><a href="/periods/{{$period->id}}/accounts/{{$account->id}}"><font color="{{$account->getColor()}}"> ${{ $account->getBalance() }} </font></a></th>
        <th>
          <form method="POST" action="/periods/{{$period->id}}/accounts/{{$account->id}}">
            {{ method_field('PATCH') }}
            <div class="form-group">
              <button type="submit"><img id="flag" src="/img/edit.png" width="15" height="15" class="edit"></button>
            </div>
            {{ csrf_field() }}
          </form>
        </th>
        <th>
          <form method="POST" action="/periods/{{$period->id}}/accounts/{{$account->id}}">
            {{ method_field('DELETE') }}
            <div class="form-group">
              <button type="submit"><img id="flag" src="/img/trash.png" width="15" height="15" class="edit"></button>
            </div>
            {{ csrf_field() }}
          </form>
        </th>
      </tr>
    @endforeach
  </table>
  <h2>Final Total <font color="{{$period->getColor()}}">${{ $period->getAmount() }} </font></h2>
  <h3>Add New Account</h3>
  <form method="POST" action="{{$period->id}}/accounts">
    <div class="form-group" align-items>
      <table>
        <tr><th>Title:</th><th><input type="text" maxlength="32" name="title" class="form-control"></th></tr>
        <tr><th>Balance: $</th><th><input type="number" step="0.01" maxlength="32" value='0.00' placeholder='0.00' name="balance" class="form-control"></th></tr>
      </table>
    </div>
    <div class="form-group">
      <button type="submit">Add Account</button>
    </div>
    {{ csrf_field() }}
  </form>
@stop
