@extends('template')

@section('title')
  <title>Home</title>
@endsection


@section('content')

<div class="mt-2">  
<h2 class="text-center">{{ $page->pag_name }}</h2>
<p class="text-start">{{ $page->pag_body }}</p>
</div>



  <div class="container text-center mb-5">
  <div class="row">
  @foreach ($partners as $partner)

  <div class="col gy-3">


  <div class="card" style="width: 18rem;">

  <img 
  src="{{ asset('images/partners/'.$partner->par_logo) }}" 
  class="card-img-top" 
  alt="{{ $partner->par_name }}"
  style="height: 15rem;"
  >
  
  <div class="card-body">
    <a href="{{ $partner->par_website }}" class="btn btn-warning" target="_blank">Sitio web</a>
  </div>

</div>
</div>

  @endforeach
  </div>
  </div>

@endsection