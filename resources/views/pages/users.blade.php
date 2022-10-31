@extends('layouts.adlay')

@section('admin-content')
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <div class="col-md-12">
                        <div class="row">

                            <div class="card1">

                                <div class="card-title">
                                    <h1>Users</h1>
                                </div>
                                <div class="card-body">

                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-hover">


                                            <thead>

                                                <td>#</td>
                                                <td>Name</td>
                                                <td> Email</td>
                                                <td>Created At</td>
                                                <td>Previllage</td>
                                                <td>Actions</td>

                                            </thead>
                                            <tbody>
                                                @foreach ($user as $user)
                                                    <tr>
                                                        <td>{{ $user->id }}</td>
                                                        <td> {{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td>
                                                            @if (strlen($user->is_admin) == 1)
                                                                Admin
                                                            @else
                                                                Not Admin
                                                            @endif
                                                        </td>

                                                        <td>
                                                            <form id="delete-frm" class=""
                                                                action="{{ route('user.destroy', $user->id) }}"
                                                                method="post">
                                                                <a class="btn btn-sm btn-primary"
                                                                    href="{{ route('user.edit', $user->id) }}">Edit</a>
                                                                &nbsp;/&nbsp;
                                                                @method('DELETE')
                                                                @csrf
                                                                <button class="btn btn-sm btn-danger">Delete</button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
