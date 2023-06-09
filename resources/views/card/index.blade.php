@extends('layouts.layouts')

@section('title', '名刺一覧')

@section('content')

<br>
<button type="button" onclick='location.href="{{route('card.add')}}"'>名刺登録</button>
<br>
<br>
<table border="1" rules="cols" style="border-collapse: collapse;" cellpadding="1">
    <tr>
        <th>会社名</th>
        <th>電話番号</th>
        <th colspan="4">HP</th>
    </tr>
    <tr>
        <th>住所</th>
        <th>FAX</th>
        <th>役職</th>
        <th>名前</th>
        <th>携帯番号</th>
        <th>メールアドレス</th>
    </tr>
    @foreach ($cards as $card)
        <tr>
            <td><a href="{{route('card.show', ['card' => $card])}}">{{$card->corp}}</a></td>
                <td>{{$card->tel}}</td>
                <td colspan="4">{{$card->hp}}</td>
            </tr>
            <tr>
                <td>{{$card->address}}</td>
                <td>{{$card->fax}}</td>
                <td>{{$card->title}}</td>
                <td>{{$card->name}}</td>
                <td>{{$card->mobile}}</td>
                <td>{{$card->mail}}</td>
            </tr>
    @endforeach
</table>

@endsection
