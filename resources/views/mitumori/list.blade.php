@extends('layouts.mitumori_list')

@section('title', '見積一覧')

@section('content')

<table cellpadding="2">
    <tr>
        <th>伝票番号</th>
        <th>社名</th>
        <th>日付</th>
        <th></th>
    </tr>
    @foreach ($mitumori_list as $val)
        <tr>
            <td><a href="{{route('mitumori.show', ['mitumori' => $val])}}">{{$val->num}}</a></td>
            <td>{{$val->corp}}</td>
            <td>{{$val->date}}</td>
            <td><button type="button" name="print" onclick='location.href="{{route('mitumori.print', ['mitumori' => $val])}}"'>印刷</button></td>
        </tr>
    @endforeach
</table>

@endsection
