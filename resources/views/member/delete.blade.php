@extends('layouts.layouts')

@section('title', "スタッフ削除")

@section('content')

<form action="{{route('member.delete', ['member' => $member])}}" method="POST" onsubmit="return deleteCheck();">
    <table>
        @csrf
        <tr>
            <th>Name </th>
            <td>{{$member->name}}</td>
        </tr>
    </table>
    <div class="button">
        <input type="button" onclick='location.href="{{route('member.show', ['member' => $member])}}"' value="戻る">
        <input type="submit" value="削除">
    </div>
</form>

<script>
    function deleteCheck() {
        var msg = confirm('この内容を削除してもよろしいですか？');
        return msg;
    }
</script>

@endsection
