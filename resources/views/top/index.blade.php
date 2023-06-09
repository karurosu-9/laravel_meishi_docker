<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>トップメニュー</title>
</head>

<style>
    body {
        text-align: center;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
        width: 450px;
    }

    span {
        margin: 250px;
        padding: 100px;
        border: 2px solid #da4033;
        border-radius: 8px;
        position: relative;
    }

    span::before {
        background-color: #fff;
        color: #da4033;
        content: "マスター管理";
        font-weight: bold;
        position: absolute;
        padding: 0 20px;
        left: 10px;
        top: -10px;
    }

    .box {
        margin: 2em 0;
        background: #c0c0c0;
    }

    .box .box-title {
        font-size: 1.2em;
        background: #808080;
        padding: 4px;
        text-align: center;
        color: #FFF;
        font-weight: bold;
        letter-spacing: 0.05em;
    }

    .box p {
        padding: 15px 20px;
        margin: 0;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
    }

    h1 {
        margin-bottom: 0;
    }
</style>

<body>

    <form action="{{route('logout')}}" method="POST" name="form">
        @csrf
        <input type="hidden" name="logout">
    </form>
    <a href="javascript:form.submit()">ログアウト</a>

    <br>
    <br>
    <br>
    <h2 class="title">トップメニュー</h2>
    <br>
    <div class="content">
        <div class="box">
            <div class="box-title">マスターメニュー</div>
            <p><a href="{{route('member.list')}}">社員一覧</a></p>
            <p><a href="{{route('card.list')}}">名刺一覧</a></p>
            <p><a href="{{route('mitumori.list')}}">見積一覧</a></p>
            <p><a href="{{route('mitumori.add.price')}}">見積入力</a></p>
        </div>
    </div>
    <br>
    <br>
</body>

</html>
