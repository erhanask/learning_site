<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin kayıt</title>
    <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4" style="margin-top:4rem;">

                <h4>Admin Register</h4>
                <form action="{{ route('admin.create') }}" method="POST" autocomplete="off">
                    @if (Session::get('success'))
                    {{Session::get('success')}}
                    @endif
                    @if (Session::get('fail'))
                    {{Session::get('fail')}}
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter Name"
                            value="{{old('name')}}">
                        <span class="text-danger">
                            @error('name')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Enter E-mail"
                            value="{{old('email')}}">
                        <span class="text-danger">
                            @error('email')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone"
                            value="{{old('phone')}}">
                        <span class="text-danger">
                            @error('phone')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password"
                            value="{{old('password')}}">
                        <span class="text-danger">
                            @error('password')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="cpassword">Confirm Password</label>
                        <input type="password" class="form-control" name="cpassword" placeholder="Enter Password Again"
                            value="{{old('cpassword')}}">
                        <span class="text-danger">
                            @error('cpassword')
                            {{$message}}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                    <a href="{{route('admin.login')}}">I Already Have An Account</a>

                </form>

            </div>
        </div>
    </div>

</body>

</html>