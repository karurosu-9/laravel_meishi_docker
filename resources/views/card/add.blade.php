@extends('layouts.layouts')

<style>
    .error {
        color: red;
        font-weight: bold;
    }

    .p-postal-code {
        margin-bottom: 5px;
    }

    .p_error {
        font-size: 22px;
    }
</style>

@section('title', '名刺登録')

@section('content')

@if ($errors->any())
    <div class="error">
        <p class="p_error">※入力に問題があります。再入力してください。</p>
        @foreach ($errors->all() as $error)
            <p>※{{$error}}</p>
        @endforeach
    </div>
@endif
<form action="{{route('card.add')}}" method="POST" onsubmit="return addCheck();">
    <table>
        @csrf
        <tr>
            <th>会社名</th>
            <td><input type="text" name="corp" style="width:200px" value="{{old('corp')}}"></td>
        </tr>
        <tr>
            <th>役職</th>
            <td><input type="text" name="title" style="width:200px" value="{{old('title')}}"></td>
        </tr>
        <tr>
            <th>名前</th>
            <td><input type="text" name="name" style="width:200px" value="{{old('name')}}"></td>
        </tr>
        <tr>
            <th>
                郵便番号<br>
                住所<br>
            </th>
            <td>
                <div class="h-adr">
                    <span class="p-country-name" style="display:none;">Japan</span>
                    <input type="text" class="p-postal-code" size="8" name="postal" maxlength="8" style="width:200px" value="{{old('postal')}}"><br>
                    <input type="text" class="p-region p-locality p-street-address p-extended-address" name="address" style="width:200px" value="{{old('address')}}"/>
                    <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>
                </div>
            </td>
        </tr>
        <tr>
        <tr>
            <th>電話番号</th>
            <td><input type="text" name="tel" style="width:200px" value="{{old('tel')}}"></td>
        </tr>
        <tr>
            <th>FAX</th>
            <td><input type="text" name="fax" style="width:200px" value="{{old('fax')}}"></td>
        </tr>
        <tr>
            <th>携帯番号</th>
            <td><input type="text" name="mobile" style="width:200px" value="{{old('mobile')}}"></td>
        </tr>
        <tr>
            <th>メールアドレス</th>
            <td><input type="text" name="mail" style="width:200px" value="{{old('mail')}}"></td>
        </tr>
        <tr>
            <th>HP</th>
            <td><input type="text" name="hp" style="width:200px" value="{{old('hp')}}"></td>
        </tr>
    </table>
    <div class="button">
        <input type="submit" value="登録">
    </div>
</form>

<script>
    function addCheck() {
        var msg = confirm('この内容で登録してもよろしいですか?');
        return msg;
    }
</script>

@endsection
