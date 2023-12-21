@extends('categories.layout')
@section('title')
create
@endsection
@section('css')

@endsection
<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@section('contenet')
{{-- {{url('categories')}} دا علشان اول لما اطغض علي add --}}
<form action="{{url('categories')}}"   method="post" enctype="multipart/form-data">

    {{--@csrf في الفورم علشان للحمايه ومتظهرش صفحه ايرور  بنسخدم  --}}
    @csrf

    {{-- {{old('title')}}علشان نعرض الداتا القديمه --}}
    <input type="text" name="title"id="" value="{{old('title')}}" > <br>
    {{-- @error دي ميثود بتعرض الايورور لو الشروط متحققتش --}}
    @error('title')
    {{$messagge}}
    @enderror
        {{-- {{old('title')}}علشان نعرض الداتا القديمه --}}
    <textarea name="desc" id="" cols="30" rows="10">{{old('desc')}}</textarea> <br>
        {{-- @error دي ميثود بتعرض الايورور لو الشروط متحققتش --}}
    @error('desc')
    {{$messagge}}
    @enderror
    <button type="submit">add</button><br>
    <input type="file" name="image" id="">

</form> <br>
<a href="{{url('categories')}}">Go To Category Page</a>
<br>
@endsection


@section('js')
<script src="{{asset('js/bootstrap.min.js')}}"></script>

@endsection

