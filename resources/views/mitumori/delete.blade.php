@extends('layouts/database')

@section('content')
    <script>
        alert('見積を削除しました。');
        location.href="{{route('mitumori.list')}}";
    </script>
@endsection
