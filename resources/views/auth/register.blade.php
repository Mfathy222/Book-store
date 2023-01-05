<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

    <title>register</title>
</head>
<body>

    <div class="container w-50">
<form action="{{url('register')}}" method="POST">

    <input type="text" name="name"  id="" class="form-control mb-2">
    <input type="email" name="email"  id="" class="form-control mb-2">
    <input type="password" name="password"  id="" class="form-control mb-2" >
    <input type="password" name="password_confirmation"  id="" class="form-control mb-2" >

    <button type="submit">register</button>




</form>

    </div>











    <script src="{{asset('js/bootstrap.min.js')}}"></script>

</body>
</html>