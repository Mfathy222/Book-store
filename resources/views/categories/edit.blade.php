@extends('categories.layout')

@section('title')
edit
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection



@section('contenet')
{{-- action="{{url("categories/$category->id")}}" علشان لما نضغط علي ايديت --}}
<form action="{{url("categories/$category->id")}}" method="post" enctype="multipart/form-data">
    @csrf
    {{-- @method('PUT') علشان فورم مفيهاش غير post ,get واحنا مستخدمين put  --}}
    @method('PUT')
{{--value="{{$category->title}}" هنا عرضنا الداتا الي موجوده في تايتل  --}}
    <input type="text" name="title" id="" value="{{$category->title}}"> <br>
{{--{{$category->desc}} هنا عرضنا الداتا الي موجوده في ديسكريبشن  --}}
    <textarea name="desc" id="" cols="30" rows="10">{{$category->desc}}</textarea> <br>
    <img src="{{asset("storage/$category->image")}}" width="200px" alt="" srcset="">
    <br>
    <button type="submit">edit</button><br>
    <input type="file" name="image" id="">

</form> <br>

<a href="{{url('categories')}}">Go To Category Page</a>

@endsection


@section('js')
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@endsection

