@extends('layouts.master')

@section('style')
    <style>
        body{background: green;
            color: white;}
    </style>
@endsection

@section('content')
{{--   블레이드 주석     --}}{{--


<h1>{{$greeting or 'hello'}} {{$name or ''}}</h1>--}}


{{--

@if($itemCount = count($items))
    <p>{{$itemCount}} 종류의 과일이 있습니다.</p>
@else
    <p>없다.</p>
@endif--}}

{{--

<ul>
    @foreach($items as $item)
        <li>{{$item}}</li>
    @endforeach
</ul>--}}


<?php
        $items =[];
?>
{{--
<ul>
    @forelse($items as $item)
        <li>{{$item}}</li>
    @empty
        <li>없다</li>
    @endforelse

</ul>

--}}

    <p>자식뷰의 content 섹션</p>
    @parent
    @include('partials.footer')
@endsection

@section('script')
    <script>
        alert('script section');
    </script>
@endsection