@extends('layouts.layouts')

@section('title', '名刺削除')

@section('content')

<form action="{{route('card.delete', ['card' => $card])}}" method="POST" onsubmit="return deleteCheck();">
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
        <input type="button" onclick='location.href="{{route('card.show', ['card' => $card])}}"' value="戻る">
        <input type="submit" value="削除">
    </div>
</form>

<script>
    function deleteCheck() {
        var msg = confirm('この内容を削除してよろしいですか？');
        return msg;
    }
</script>

@endsection
