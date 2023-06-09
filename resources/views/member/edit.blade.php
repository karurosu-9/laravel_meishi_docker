@extends('layouts.layouts')

<style>
    .error {
        color: red;
        font-weight: bold;
    }
</style>

@section('title', 'スタッフ編集')

@section('content')

@if ($errors->any())
    @foreach ($errors as $error)
        <p>{{$error}}</p>
    @endforeach
@endif
<form action="{{route('member.edit', ['member' => $member])}}" method="POST" onsubmit="return editCheck();">
    <table>
        @csrf
        <tr>
            <input type="hidden" name="id" value="{{$member->id}}">
            <th>Name </th>
            <td><input type="text" name="name" value="{{$member->name}}"></td>
        </tr>
    </table>
    <div class="button">
        <input type="button" onclick='lacation.href="{{route('member.list')}}"' value="戻る">
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
