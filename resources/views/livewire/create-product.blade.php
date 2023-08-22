@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create a Product</h1>
    @vite('resources/css/app.css')
@stop

@section('content')
<div class="card md:container md:mx-auto">
  <div class="card-body">
    {!! Form::open(['route' => 'products.store']) !!}

      <div class="flex items-center border-b border-blue-500 py-2">
        {!! 
          Form::text('name', null, 
          ['class' => 'appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none', 
          'placeholder' => 'Product name'
          ]) 
        !!}
      </div>

      <div class="row flex border-b border-blue-500 py-2" id="urlInputs">
        <div class="col-12">
          {!! Form::url('urls[]', null, 
          ['class' => 'appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none', 
          'placeholder' => 'URL']) 
          !!}
        </div>
      </div>

      <div class='py-2'>
        <button class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded" type="button" id="addUrl">
          Add URL
        </button>
        <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
          Save
        </button>
      </div>
      
    {!! Form::close() !!}
  </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
  $('#addUrl').on('click', function() {
  
  var newUrlInput = 
  `
  <div class="col-12">
      {!! Form::url('urls[]', null, 
      ['class' => 'appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none', 
      'placeholder' => 'URL']) 
      !!}
  </div>
  `

  $('#urlInputs').append(newUrlInput);
  });
</script>
@stop