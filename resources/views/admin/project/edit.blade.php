@extends('layouts.app')

@section('content')
    @include("admin.partials.form", ["route"=>"admin.project.update", "method"=>"PUT", "project"=>$project])
@endsection