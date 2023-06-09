@extends('layouts.login')

@section('title', "ログイン画面")

@section('content')

@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p>※{{$error}}</p>
        @endforeach
    </div>
@endif
<form action="{{route('login')}}" method="POST">
    <table>
        @csrf
        <tr>
            <th>メールアドレス</th>
            <td><input type="email" name="email" value="{{old('email')}}"></td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td><input type="password" name="password"></td>
        </tr>
    </table>
    <div class="button">
        <input type="submit" value="ログイン">
    </div>
</form>
@endsection
