@extends('layout::app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 col-md-6 offset-md-3">
                <h2>Details of user</h2>
                <a role="button" href="{{ route('user.create') }}">Create User</a>

                <table class="table table-responsive">
                    <tr>
                        <td>Username</td>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                </table>

                <a role="button" href="{{ route('user.edit') }}">Edit User</a>
                <form action="{{ route('user.delete') }}" method="post">
                    <input type="hidden" name="id" value="{{ $user->id }}" />
                    <button type="submit" class="btn btn-danger">Delete user</button>
                </form>
            </div>
        </div>
    </div>
@endsection


