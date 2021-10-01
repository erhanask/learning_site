<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Home</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top:50px">
                <h4>Admin Dashboard</h4>
                <table class="table table-stripped">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{auth()->user()->name}}</td>
                            <td>{{auth()->user()->email}}</td>
                            <td>{{auth()->user()->phone}}</td>
                            {{-- <td>
                                <a href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form action="{{route('admin.logout')}}" method="POST" class="d-none" id="logout-form">@csrf</form>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</body>
</html>