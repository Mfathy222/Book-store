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
    <h4>add book</h4>
    <form action="{{url('books')}}"   method="post" enctype="multipart/form-data">
@csrf
        <input type="text" name="title" id=""> <br>
<textarea name="desc" id="" cols="30" rows="10"></textarea> <br>
<button type="submit">add book</button><br>
<input type="file" name="image" id="">
<h4>price</h4><input type="text" name="price" id="">

<select name="category_id" id="">
@foreach ($categories as $category )
<option value="{{$category->id}}">{{$category->title}}</option>
@endforeach
</select>


    </form> <br>
    <a href="{{url('books')}}">Go To books Page</a>
    <br>

    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>