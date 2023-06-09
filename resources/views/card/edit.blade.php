@extends('layouts.layouts')

@section('title', '名刺編集')

@section('content')

@if ($errors->any())
    <div class="error">
        <p class="p_error">※入力に問題があります。再入力してください。</p>
        @foreach ($errors->all() as $error)
            <p>※{{$error}}</p>
        @endforeach
    </div>
@endif
<form action="{{route('card.edit', ['card' => $card])}}" method="POST" onsubmit="return editCheck();">
    <table>
        @csrf
        <tr>
            <th>会社名</th>
            <td><input type="text" name="corp" style="width:200px" value="{{$card->corp}}"></td>
        </tr>
        <tr>
            <th>役職</th>
            <td><input type="text" name="title" style="width:200px" value="{{$card->title}}"></td>
        </tr>
        <tr>
            <th>名前</th>
            <td><input type="text" name="name" style="width:200px" value="{{$card->name}}"></td>
        </tr>
        <tr>
            <th>
                郵便番号<br>
                住所<br>
            </th>
            <td>
                <div class="h-adr">
                    <span class="p-country-name" style="display:none;">Japan</span>
                    <input type="text" class="p-postal-code" size="8" name="postal" maxlength="8" style="width:200px" value="{{$card->postal}}"><br>
                    <input type="text" class="p-region p-locality p-street-address p-extended-address" name="address" style="width:200px" value="{{$card->address}}" />
                </div>
            </td>
        </tr>
        <tr>
            <th>電話番号</th>
            <td><input type="text" name="tel" style="width:200px" value="{{$card->tel}}"></td>
        </tr>
        <tr>
            <th>FAX</th>
            <td><input type="text" name="fax" style="width:200px" value="{{$card->fax}}"></td>
        </tr>
        <tr>
            <th>携帯番号</th>
            <td><input type="text" name="mobile" style="width:200px" value="{{$card->mobile}}"></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><input type="text" name="mail" style="width:200px" value="{{$card->mail}}"></td>
        </tr>
        <tr>
            <th>HP</th>
            <td><input type="text" name="hp" style="width:200px" value="{{$card->hp}}"></td>
        </tr>
    </table>
    <div class="button">
        <input type="button" onclick='location.href="{{route('card.show', ['card' => $card])}}"' value="戻る">
        <input type="submit" value="更新">
    </div>
</form>

<script>
    function editCheck() {
        var msg = confirm('この内容で更新してよろしいですか？');
        return msg;
    }
</script>

@endsection
