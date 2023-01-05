@extends('categories.layout')

@section('title')
all categories
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection

@section('contenet')

<h1>all Categories</h1> <br>
<a href="{{ url('categories/create') }}"> add new category</a> <br>
@foreach ($categories as $category)
{{ $loop->iteration }} - <a href="{{ url("categories/show/$category->id") }}">{{ $category->title }}</a> <br>
@endforeach
<br>
@if (session()->has('success'))
{{ session()->get('success') }}
@endif
<br>

{{$categories->links()}}
@endsection


@section('js')
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection
