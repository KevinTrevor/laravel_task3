@extends('adminlte::page')

@section('title', "Product Pricing")

@section('head')

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@vite('resources/css/app.css')

@stop

@section('content_header')
    <h1> {{ $product->name }} </h1>
@stop

@section('content')
<head>
    
</head>

<body class="h-screen bg-gray-100">
<div class="card">
    <div class="card-body bg-gray-300">
        @foreach ($charts as $chart)
        <div class="container px-4 mx-auto">
            <div class="p-2 m-5 bg-white rounded shadow">
                {!! $chart->container() !!}
            </div>
            
        </div>

        <script src="{{ $chart->cdn() }}"></script>

        {{ $chart->script() }}
        @endforeach
    </div>
</div>
</body>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop