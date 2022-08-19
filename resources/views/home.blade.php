@extends('template')

@section('title')
  <title>Home</title>
@endsection


@section('content')

  <h2 align="center">{{ $page->pag_name }}</h2>
  <p align="center">{{ $page->pag_body }}</p>


  <hr>
  <div class="columns-3">
  @foreach ($partners as $partner)

  <p>{{ $partner->par_name }}</p>

  <img class="w-full aspect-video h-10" src="{{ asset('images/partners.png') }}" />


  @endforeach
  </div>

@endsection