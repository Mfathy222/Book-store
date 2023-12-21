@extends('categories.layout')

@section('title')
all categories
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection

@section('contenet')

<h1>all Categories</h1> <br>
{{-- دا لينك بيروح علي صفحه انشاء ويسجل في داتا بيز --}}
<a href="{{ url('categories/create') }}"> add new category</a> <br>
{{-- هنا عملنا لوب علشان ياخد من المتغير يعرض منه التايتل في كل مره --}}
@foreach ($categories as $category)
{{-- وهنا عرضناه مع لينك علشان ندخل عليه نعرض كل الي فيه عن طريق صفحه ال show --}}
{{ $loop->iteration }} - <a href="{{ url("categories/show/$category->id") }}">{{ $category->title }}</a> <br>
@endforeach
<br>
@if (session()->has('success'))
{{ session()->get('success') }}
@endif
<br>
{{-- دا ليناكات للصفحات متحدده في البجينات --}}
{{$categories->links()}}
@endsection


@section('js')
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@endsection
