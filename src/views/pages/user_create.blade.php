@extends('layout::app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <h2>Create user</h2>

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors as $error)
                                <li>{{ $error[0] }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="username"
                               class="form-control"
                               id="exampleInputEmail"
                               value="{{ old('email') }}"
                               aria-describedby="emailHelp" placeholder="Enter email" required />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" name="username"
                               class="form-control"
                               id="exampleInputUsername"
                               value="{{ old('username') }}"
                               aria-describedby="usernameHelp" placeholder="Enter username" required />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password"
                               class="form-control"
                               id="exampleInputPassword1" placeholder="Password" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection


