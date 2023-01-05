@extends('categories.layout')
@section('title')
create
@endsection
@section('css')

@endsection
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@section('contenet')

<form action="{{url('categories')}}"   method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" id=""> <br>
    <textarea name="desc" id="" cols="30" rows="10"></textarea> <br>
    <button type="submit">add</button><br>
    <input type="file" name="image" id="">

</form> <br>
<a href="{{url('categories')}}">Go To Category Page</a>
<br>
@endsection


@section('js')
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@endsection

