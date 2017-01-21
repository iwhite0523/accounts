@extends('layout')
@section('content')
<h1>{{ $account->getTitle() }}</h1>
    <form method="POST" action="/periods/{{$account->period_id}}/accounts/{{$account->id}}">
        {{ method_field('PATCH') }}
        <div class="form-group" align-items>
            <table>
                <tr><th>Title:</th><th><input type="text" maxlength="32" name="title" value="{{ $account->title }}" class="form-control"></th></tr>
                <tr><th>Balance: $</th><th><input type="number" step="0.01" maxlength="32" value="{{ $account->balance }}" placeholder='0.00' name="balance" class="form-control"></th></tr>
            </table>
        </div>
        <div class="form-group">
            <button type="submit">Update Account</button>
        </div>
        {{ csrf_field() }}
    </form>
@stop
