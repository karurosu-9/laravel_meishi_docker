@extends('layouts.layouts')

@section('title', '詳細')

@section('content')

<table>
    @csrf
    <tr>
        <th>会社名</th>
        <td>{{$card->corp}}</td>
    </tr>
    <tr>
        <th>役職</th>
        <td>{{$card->title}}</td>
    </tr>
    <tr>
        <th>名前</th>
        <td>{{$card->name}}</td>
    </tr>
    <tr>
        <th>郵便番号</th>
        <td>{{$card->postal}}</td>
    </tr>
    <tr>
        <th>住所</th>
        <td>{{$card->address}}</td>
    </tr>
    <tr>
        <th>電話番号</th>
        <td>{{$card->tel}}</td>
    </tr>
    <tr>
        <th>FAX</th>
        <td>{{$card->fax}}</td>
    </tr>
    <tr>
        <th>携帯番号</th>
        <td>{{$card->mobile}}</td>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <td>{{$card->mail}}</td>
    </tr>
    <tr>
        <th>HP</th>
        <td>{{$card->hp}}</td>
    </tr>
</table>
<div class="button">
    <button type="button" onclick='location.href="{{route('card.edit', ['card' => $card])}}"'>編集</button>
    <button type="button" onclick='location.href="{{route('card.delete', ['card' => $card])}}"'>削除</button>
</div>

@endsection
