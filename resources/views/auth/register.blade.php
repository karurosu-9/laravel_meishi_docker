@extends('layouts.login')

@section('title', 'ユーザー登録画面')

@section('content')
@if ($errors->any())
    <div class="error">
        @foreach ($errors->all() as $error)
            <p>※{{$error}}</p>
        @endforeach
    </div>
@endif
<form action="{{route('register')}}" method="POST">
    <table>
        @csrf
        <tr>
            <th>ユーザー名</th>
            <td><input type="text" name="name" value="{{old('name')}}"></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><input type="email" name="email" value="{{old('email')}}"></td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th>パスワード(確認用)</th>
            <td><input type="password" name="password_confirmation"></td>
        </tr>
    </table>
    <div class="button">
        <input type="submit" value="登録">
    </div>
</form>
@endsection
