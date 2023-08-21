<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $product->name }} Price </title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="h-screen bg-gray-100">
<div class="container px-4 mx-auto">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $product->name }}
        </h2>
    </x-slot>
    
    @foreach ($charts as $chart)
    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>
    
    </div>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    @endforeach
</body>
</html>
