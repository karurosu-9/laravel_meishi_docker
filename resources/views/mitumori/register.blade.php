@extends('layouts.database')

@section('content')

    <script>
        alert('見積内容を登録しました。');
        location.href="{{route('mitumori.list')}}";
    </script>

@endsection
