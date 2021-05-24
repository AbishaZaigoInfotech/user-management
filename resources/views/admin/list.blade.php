<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv= "X-UA-Compatible" content= "ie=edge">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
<h1>Members list</h1>
<div class="col-md-6">
    <a href="logout">Logout</a>
</div>
<h4>Number of registered users are {{count($users)}}</h4>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Profile Picture</th>
            <th width="280px">Action</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['name']}}</td>
            <td>{{$user['email']}}</td>
            <td><img src="{{asset('uploads/user/' . $user->file)}}" width="100px" height="100px" alt=" " /></td>
            <td>
                <div class="btn-group">
                <div class="container">
                <div class="row">
                <div class="col-6">
                    <a href="edit/{{$user->id}}" class="btn btn-primary btn-xs">Edit</a>
                </div>
                <div class="col-6">
                    <a href="delete/{{$user->id}}" class="btn btn-danger btn-xs">Delete</a>
                </div>
                </div>
                </div>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="link">
        {{$users->links()}}
    </div>

    <style>
        .w-5{
            display:none;
        }
        .link{
            margin-top:50px;
        }
    </style>
    </body>
    </html>