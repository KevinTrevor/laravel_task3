@extends('adminlte::page')

@section('title', 'Product Index')

@section('content_header')
    <h1>Product List</h1>
    @vite('resources/css/app.css')
@stop

@section('content')
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-600 dark:bg-gray-650 dark:text-blue-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Details
                </th>
            </tr>
        </thead>
    
        <tbody>
        @foreach ($products as $product)
        <tr class="bg-white border-b dark:bg-gray-50 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-gray-950">
                {{ $product->id }}
            </th>
            <th scope="row" class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-gray-950">
                {{ $product->name }}
            </th>
            <td class="px-6 py-4">
                <a href="/products/{{$product->id}}" class="text-white block w-full bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:focus:ring-blue-900">
                    View Details
                </a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    <div class="table-footer pt-2 pb-2">
        {{ $products->links() }}
    </div>
</div>
@stop

@section('footer')
    <livewire:footer>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop