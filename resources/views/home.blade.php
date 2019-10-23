@extends('layouts.layout')
@section('title')
    Home
@endsection
@section('content')

<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

        <main role="main" class="inner cover">
          <h1 class="cover-heading">Bienvenido {{ auth()->user()->name }}</h1>
        </main>
      
      </div>


    @endsection




