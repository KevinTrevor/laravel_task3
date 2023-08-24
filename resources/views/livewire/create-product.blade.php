@extends('adminlte::page')

@section('title', 'Create Product')

@section('content_header')
    <h1>Create a Product</h1>
    @vite('resources/css/app.css')
@stop

@section('content')
<div class="card md:container md:mx-auto">
  <div class="card-body">
    {!! Form::open(['route' => 'products.store']) !!}
    @csrf
      <div class='pb-2'>
        <button class="flex-shrink-0 bg-gray-500 hover:bg-gray-700 border-gray-500 hover:border-gray-700 text-sm border-4 text-white py-1 px-2 rounded" type="button" id="addUrl">
          Add URL
        </button>
        <button class="flex-shrink-0 bg-blue-500 hover:bg-blue-700 border-blue-500 hover:border-blue-700 text-sm border-4 text-white py-1 px-2 rounded" type="submit">
          Save
        </button>
      </div>
      <div class="flex items-center border-b border-blue-500 py-2">
        {!! 
          Form::text('name', null, 
          ['class' => 'form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none', 
          'placeholder' => 'Product name',
          'required' => 'required',
          ]) 
        !!}
        @error('neme')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="row flex border-b border-blue-500 py-2" id="urlInputs">
        <div class="col-12" style="display: flex; align-items: center; justify-content:space-evenly;">
          {!! Form::url('urls[]', null, 
          ['class' => 'form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none', 
          'placeholder' => 'URL',
          'required' => 'required',
          ]) 
          !!}
          <button class="col-2 flex-shrink-0 bg-red-500 hover:bg-red-700 border-red-500 hover:border-red-700 text-sm border-4 text-white py-1 px-2 rounded" type="button" onclick="deleteParent(this)">
            Delete
          </button>
          @error('urls[]')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          
        </div>
      </div>     
    {!! Form::close() !!}
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
<script>

  function deleteParent(button) {
    var parentDiv = button.parentNode;
    parentDiv.remove();
  }

  $('#addUrl').on('click', function() {
  
  var newUrlInput = 
  `
  <div class="col-12" style="display: flex; align-items: center; justify-content:space-evenly;">
      {!! Form::url('urls[]', null, 
      ['class' => 'form-control appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none', 
      'placeholder' => 'URL',
      'required' => 'required',
    ])
      !!}
      <button class="col-2 flex-shrink-0 bg-red-500 hover:bg-red-700 border-red-500 hover:border-red-700 text-sm border-4 text-white py-1 px-2 rounded" type="button" onclick="deleteParent(this)">
        Delete
      </button>
  </div>
  `

  $('#urlInputs').append(newUrlInput);
  });
</script>
@stop