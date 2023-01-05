<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <title>Document</title>
</head>
<body>

    <form action="{{url("books/$book->id")}}" method="post" enctype="multipart/form-data">
@csrf
@method('PUT')

        <input type="text" name="title" id="" value="{{$book->title}}"> <br>
<textarea name="desc" id="" cols="30" rows="10">{{$book->desc}}</textarea> <br>
<img src="{{asset("storage/$book->image")}}" width="200px" alt="" srcset="">
<br>
<button type="submit">edit</button><br>
<input type="file" name="image" id="">
<h5>price</h5>
<input type="text" name="price" id="" value="{{$book->price}}"> <br>
<select name="category_id" id="">
<option value="{{$book->category->id}}">{{$book->category->title}}</option>
@foreach ($categories as $category )
<option value="{{$category->id}}">{{$category->title}}</option>
@endforeach
</select>


    </form> <br>

    <a href="{{url('books')}}">Go To book Page</a>



    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>