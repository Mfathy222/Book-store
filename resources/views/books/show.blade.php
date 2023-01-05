
@extends('books.layout')
@section('title')
show book
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection
@section('contenet')

@if (session()->has('success'))
{{ session()->get('success') }}
@endif
    <h1> show {{ $book->title}} </h1>
    <h4>category={{$book->category->title}}</h4>

    <h2>book title :{{ $book->title }}</h2> <br>
    <h3>book desc :{{ $book->desc }}</h3>
    <img src="{{asset("storage/$book->image")}}" width="200px" alt="" srcset="">

    <br>
    <a href="{{url('books')}}">Go To book Page</a>
    <a href="{{url("books/edit/$book->id")}}">edit</a>

    <form action="{{url("books/$book->id")}}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">delete</button>

    </form>
    @endsection




    @section('js')
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

@endsection
