@extends('layouts.adlay')

@section('admin-content')
    <div class="col-lg-12">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <div class="col-md-6">
                        <div class="container-fluid">
                            <div class="row">

                                <h1>New User</h1>
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form method="post" action="/pages/newuser">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label class="control-label" for="">Name</label>
                                        <input class="form-control @error('name') alert-danger @enderror " type="text"
                                            name="name" id="name" value="{{ old('name') }}" required
                                            autocomplete="name">

                                        <br>
                                        @error('name')
                                            <strong class="toast">
                                                <p class="help alert-danger">{{ $errors->first('name') }}</p>
                                            </strong>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label" for="">Email</label>
                                        <input class="form-control @error('email') alert-danger @enderror " type="email"
                                            name="email" id="email" value="{{ old('email') }}"required
                                            autocomplete="Email">
                                        <br>
                                        @error('email')
                                            <strong class="toast">
                                                <p class="help alert-danger">{{ $errors->first('email') }}</p>
                                            </strong>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label" for="">Admin</label>
                                        <div class="col-md-6">
                                            <!-- col-md-6 Begin -->

                                            <select name="is_admin" class="form-control selectpicker"
                                                @error('is_admin') alert-danger @enderror
                                                value="{{ old('is_admin') }}"required autocomplete="admin" data-size="5">
                                                <!-- form-control Begin -->

                                                <option selected disabled> Admin Previllage
                                                <option value="0"> No </option>
                                                <option value="1"> Yes</option>

                                            </select><!-- form-control Finish -->

                                        </div><!-- col-md-6 Finish -->
                                        <br>
                                        @error('is_admin')
                                            <strong class="toast">
                                                <p class="help alert-danger">{{ $errors->first('is_admin') }}</p>
                                            </strong>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label" for="">Password</label>
                                        <input class="form-control @error('password') alert-danger @enderror "
                                            type="password" name="password" id="password" value="{{ old('password') }}"
                                            required autocomplete="password">
                                        <br>
                                        @error('password')
                                            <strong class="toast">
                                                <p class="help alert-danger">{{ $errors->first('password') }}</p>
                                            </strong>
                                        @enderror

                                    </div>


                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
