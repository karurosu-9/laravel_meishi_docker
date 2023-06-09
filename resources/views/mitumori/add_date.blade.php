@extends('layouts/mitumori_check')

<style>
    .corp {
        border-bottom: 2px solid black;
        width: 330px;
        padding: auto;
        flex-basis: auto;
        white-space: nowrap;
    }

    .msg {
        color: red;
        font-weight: bold;
    }

    .date {
        margin-left: 50px;
    }

    .group {
        margin-top: 10px;
        display: flex;
    }
</style>

@section('title', '日付入力')

@section('content')

<div class="corp">
    {{$_POST['corp']}} 　　御中
</div>
<form action="{{route('mitumori.complete')}}" method="POST">
    @csrf
    <div class="group">
        <div class="msg">※日付を選択してください</div>
            <div class="date">
                <select name="year">
                    @for ($i = 2021; $i <= $year; $i++)
                        @if ($i === (int)$year)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select> 年
                <select name="month">
                    @for ($i = 1; $i <= 12; $i++)
                        @if ($i === (int)$month)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select> 月
                <select name="date">
                    @for ($i = 1; $i <= 31; $i++)
                        @if ($i === (int)$date)
                            <option value="{{$i}}" selected>{{$i}}</option>
                        @else
                            <option value="{{$i}}">{{$i}}</option>
                        @endif
                    @endfor
                </select> 日
            </div>
        </div>
    </div>
    <br>
    <br>
    <table cellpadding="2">
        <tr>
            <th width="500px">摘要</th>
            <th>数量</th>
            <th>単価</th>
            <th>金額</th>
            <th>備考</th>
        </tr>
        @for ($i = 1; $i <= $form_not_hosoku; $i++)
            @if( $kingaku[$i] === null )
                @break
            @endif
            <tr>
                <td>{{$tekiyo[$i]}}</td>
                <td>{{$suryo[$i]}}</td>
                <td>{{number_format((int)$tanka[$i])}}</td>
                <td>{{number_format((int)$kingaku[$i])}}</td>
                <td style='border:none'>{{$biko[$i]}}</td>
            </tr>
        @endfor
            <tr>
                <th>合計金額</th>
                <td></td>
                <td></td>
                <td></td>
                <td>{{number_format((int)$all_total_price)}}</td>
            </tr>
    </table>
    @for ($i = 1; $i <= $form_hosoku; $i++)
        <div class="hosoku">
            @if ($hosoku === null)
                @break
            @endif
            {{$hosoku[$i]}}
        </div>
    @endfor
    </div>
    <br>
    <br>
    @for ($i = 1; $i <= $form_not_hosoku; $i++)
        <input type="hidden" name="tekiyo{{$i}}" value="{{$tekiyo[$i]}}">
        <input type="hidden" name="suryo{{$i}}" value="{{$suryo[$i]}}">
        <input type="hidden" name="tanka{{$i}}" value="{{$tanka[$i]}}">
        <input type="hidden" name="kingaku{{$i}}" value="{{$kingaku[$i]}}">
        <input type="hidden" name="biko{{$i}}" value="{{$biko[$i]}}">
    @endfor
    @for ($i = 1; $i <= $form_hosoku; $i++)
         <input type="hidden" name="hosoku{{$i}}" value="{{$hosoku[$i]}}">
    @endfor
    <input type="hidden" name="corp" value="{{$corp}}">
    <input type="hidden" name="total_price" value="{{$all_total_price}}">
    <div class="button">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </div>
</form>

@endsection
