@extends('layouts.app')

@section('content')
  @include("admin.partials.form", ["route"=>"admin.project.store", "method" => "POST", "project"=> $project])
@endsection