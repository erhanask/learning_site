<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>

<body style="background-color: #b6d8dd;">

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top: 4rem;">
                <h4>Admin Login</h4>
                <form action="{{route('admin.check')}}" method="POST" autocomplete="off">

                    @if (Session::get('fail'))

                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                        
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter e-mail" value="{{old('email')}}">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}                                
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter password"value="{{old('password')}}">
                        <span class="text-danger">
                            @error('password')
                            {{$message}}                                
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Login</button>                        
                    </div>

                </form>
            </div>
        </div>
    </div>

</body>

</html>