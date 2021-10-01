<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Home</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top:50px">
                <h4>User Dashboard</h4>
                <table class="table table-stripped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{auth()->user()->name}}</td>
                            <td>{{auth()->user()->email}}</td>
                            <td>
                                <a href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{route('user.logout')}}" method="POST" class="d-none" id="logout-form">@csrf</form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>