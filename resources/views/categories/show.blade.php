
@extends('categories.layout')

@section('title')
show
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection

@section('contenet')

@if (session()->has('success'))
{{ session()->get('success') }}
@endif
<h1> show category {{ $category->title}}</h1>

<h2>category title :{{ $category->title }}</h2> <br>
<h3>category desc :{{ $category->desc }}</h3>
<img src="{{asset("storage/$category->image")}}" width="200px" alt="" srcset="">

<br>
<a href="{{url('categories')}}">Go To category Page</a>
<a href="{{url("categories/edit/$category->id")}}">edit</a>

<form action="{{url("categories/$category->id")}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>

</form>

@endsection


@section('js')
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@endsection

