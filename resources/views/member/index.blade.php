@extends('layouts.layouts')

@section('title', "スタッフ一覧")

@section('content')

<br>
<button type="button" onclick='location.href="{{route('member.add')}}"'>スタッフ登録</button>
<br>
<br>
<table border="1" style="border-collapse: collapse;" cellpadding="1">
    <tr>
        <th>ID</th>
        <th>スタッフ名</th>
    </tr>
    @foreach ($members as $member)
    <tr>
        <th>{{$member->id}}</th>
        <td><a href="{{route('member.show', ['member' => $member])}}">{{$member->name}}</a></td>
    </tr>
    @endforeach
</table>
<br>
<br>

@endsection
