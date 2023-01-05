@extends('books.layout')
@section('title')
all books
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection
@section('contenet')

<h1>all books</h1> <br>
<a href="{{ url('books/create') }}"> add new book</a> <br>
@foreach ($books as $book)
{{ $loop->iteration }} - <a href="{{ url("books/show/$book->id") }}">{{ $book->title }}</a> <br>
    @endforeach
    <br>
    @if (session()->has('success'))
        {{ session()->get('success') }}
    @endif
<br>

{{$books->links()}}
@endsection

@section('js')

<script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection
