@extends('layouts.mitumori')

@section('title', "補足編集")

@section('content')

<form action="{{route('mitumori.edit.date', ['mitumori' => $mitumori])}}" name="form" method="POST" onsubmit="return lengthCheck()">
    <table cellpadding="2">
        @csrf
        <tr>
            <th>補足</th>
        </tr>
        @for ($i = 1; $i <= $form_hosoku; $i++)
            <tr>
                <td>
                    <input type="text" name="hosoku{{$i}}" style="width: 500px" value="{{$mitumori['hosoku'.$i]}}">
                </td>
            </tr>
        @endfor
        @for ($i = 1; $i <= $form_not_hosoku; $i++)
            <input type="hidden" name="tekiyo{{$i}}" value="{{$tekiyo[$i]}}">
            <input type="hidden" name="suryo{{$i}}" value="{{$suryo[$i]}}">
            <input type="hidden" name="tanka{{$i}}" value="{{$tanka[$i]}}">
            <input type="hidden" name="kingaku{{$i}}" value="{{$kingaku[$i]}}">
            <input type="hidden" name="biko{{$i}}" value="{{$biko[$i]}}">
        @endfor
    </table>
    <input type="hidden" name="id" value="{{$mitumori}}">
    <br>
    <br>
    <div class="button">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </div>
</form>
<br>
<br>

<script type="text/javascript">
    function lengthCheck() {

function count(str) {
    let len = 0;

    for (let i = 0; i < str.length; i++) {
        (str[i].match(/[ -~]/)) ? len += 1: len += 2;
    }

    return len;

}

const limit = 255;
let hosoku = document.form.hosoku1.value;

if (count(hosoku) > limit) {
    alert("1行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku2.value;

if (count(hosoku) > limit) {
    alert("2行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku3.value;

if (count(hosoku) > limit) {
    alert("3行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku4.value;

if (count(hosoku) > limit) {
    alert("4行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku5.value;

if (count(hosoku) > limit) {
    alert("5行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku6.value;

if (count(hosoku) > limit) {
    alert("6行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku7.value;

if (count(hosoku) > limit) {
    alert("7行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku8.value;

if (count(hosoku) > limit) {
    alert("8行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku9.value;

if (count(hosoku) > limit) {
    alert("9行目が規定文字数を超えています。\n" + hosoku);
    return false;
}


hosoku = document.form.hosoku10.value;

if (count(hosoku) > limit) {
    alert("10行目が規定文字数を超えています。\n" + hosoku);
    return false;
}
}
</script>

@endsection
