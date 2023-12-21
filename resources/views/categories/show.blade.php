
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
{{-- وعرضنا منه تايتل  $category هنا في كونترولر حطينا الداتا في متغير اسمه   --}}
<h1> show category {{ $category->title}}</h1>
{{-- وعرضنا منه تايتل  $category هنا في كونترولر حطينا الداتا في متغير اسمه   --}}

<h2>category title :{{ $category->title }}</h2> <br>
{{-- وعرضنا منه desc  $category هنا في كونترولر حطينا الداتا في متغير اسمه   --}}

<h3>category desc :{{ $category->desc }}</h3>
<img src="{{asset("storage/$category->image")}}" width="200px" alt="" srcset="">

<br>
{{--{{url('categories')}} هنا علشان نرجع للصفحه دي  --}}
<a href="{{url('categories')}}">Go To category Page</a>
{{--{{url("categories/edit/$category->id")}} هنا علشان نروح للتعديل ومع الid  --}}
<a href="{{url("categories/edit/$category->id")}}">edit</a>


{{-- علشان اسخدم المسح لازم تبقي جوة فورم  --}}
<form action="{{url("categories/$category->id")}}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>

</form>

@endsection


@section('js')
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@endsection

