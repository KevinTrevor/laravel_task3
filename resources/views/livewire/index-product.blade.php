<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Product list
    </h2>
</x-slot>
<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-indigo-600 dark:bg-indigo-650 dark:text-indigo-50">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    Details
                </th>
            </tr>
        </thead>
    @foreach ($products as $product)
        <tbody>
        <tr class="bg-white border-b dark:bg-gray-50 dark:border-indigo-700">
            <th scope="row" class="px-6 py-4 font-medium text-white-900 whitespace-nowrap dark:text-gray-950">
                {{ $product->name }}
            </th>
            <td class="px-6 py-4">
                <a href="/products/{{$product->id}}" class="text-white block w-full bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-200 font-medium rounded-lg text-sm px-4 py-2.5 text-center dark:focus:ring-blue-900">
                    View Details
                </a>
            </td>
        </tr>
        </tbody>
    @endforeach
</div>
