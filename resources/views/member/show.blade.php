@extends('layouts.layouts')

@section('title', '詳細')

@section('content')

<a href="{{route('member.list')}}">社員一覧</a><br>
<br>
<br>
    <table>
        <tr>
            <th>ID </th>
            <td>{{$member->id}}</td>
        </tr>
        <tr>
            <th>Name</th>
            <td>{{$member->name}}</td>
        </tr>
    </table>
    <div class="button">
        <button type="button" onclick='location.href="{{route('member.edit', ['member' => $member])}}"'>編集</button>
        <button type="button" onclick='location.href="{{route('member.delete', ['member' => $member])}}"'>削除</button>
    </div>

@endsection
