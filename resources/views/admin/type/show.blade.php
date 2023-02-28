@extends('layouts.app')

@section('content')
  <section class="text-center pt-5">

    <h1>{{ $type->type }}</h1>
    <h2>{{ $type->id }}</h2>
  </section>
@endsection