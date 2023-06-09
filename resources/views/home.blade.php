@extends('layouts.login')

@section('title', 'ホーム画面')

@section('content')

<form action="{{route('logout')}}" method="POST" name="form">
    @csrf
    <input type="hidden" name="logout">
</form>
<a href="{{route('top')}}">トップページへ</a>
<a href="javascript:form.submit()">ログアウト</a>
<p>ようこそ、{{Auth::user()->name}}さん</p>

@endsection