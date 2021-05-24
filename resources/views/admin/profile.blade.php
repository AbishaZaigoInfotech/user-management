<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv= "X-UA-Compatible" content= "ie=edge">
        <title>Profile</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row" style="margin-top:55px">
            <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h1 align="center">User Profile</h1>
                    <div class="col-md-6">
                        <a href="logout">Logout</a>
                    </div>
                    <div class="col-md-6">
                    <a href="list">Users list</a>
                    </div>
                    <hr>
                    <table border="1">
                        <thead>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Profile Image</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$LoggedUserInfo->id}}</td>
                                <td>{{$LoggedUserInfo->name}}</td>
                                <td>{{$LoggedUserInfo->email}}</td>
                                <td><img src="{{asset('uploads/user/' . $LoggedUserInfo->file)}}" width="100px" height="100px" alt=" " /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </body>
</html>