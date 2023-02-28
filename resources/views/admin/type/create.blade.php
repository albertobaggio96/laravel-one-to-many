@extends('layouts.app')

@section('content')
  @include("admin.partials.typeForm", ["route"=>"admin.types.store", "method" => "POST", "type"=> $type])
@endsection