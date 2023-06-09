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

@section('title', 'スタッフ新規登録')

@section('content')

@if ($errors->any())
    <div class="error">
        <p class="p_error">※入力に問題があります。再入力してください。</p>
        @foreach ($errors->all() as $error)
            <p>※{{$error}}</p>
        @endforeach
    </div>
@endif
<form action="{{route('member.add')}}" method="POST">
    <table>
        @csrf
        <tr>
            <th>Name: </th>
            <td><input type="text" name="name" value="{{old('name')}}" onsubmit="return addCheck();"></td>
        </tr>
    </table>
    <div class="button">
        <input class="btn" type="submit" value="登録">
    </div>
</form>

<script>
    function addCheck() {
        var msg = confirm('この内容で登録してもよろしいですか？');
        return msg;
    }
</script>

@endsection
