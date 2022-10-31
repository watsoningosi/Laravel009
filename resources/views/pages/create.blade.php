@extends('layouts.adlay')

@section('admin-content')
    <div class="col-lg-12">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <div class="col-md-12">
                        <div class="container-fluid">
                            <div class="row">

                                <h1>New Article</h1>
                                @if (Session::has('success'))
                                    <div class="alert alert-success text-center">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                <form method="post" action="/pages/create" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label class="control-label" for="">Title</label>
                                        <input class="form-control @error('title') alert-danger @enderror " type="text"
                                            name="title" id="title" value="{{ old('title') }}">
                                        @error('title')
                                            <p class="help alert-danger">{{ $errors->first('title') }}</p>
                                        @enderror

                                    </div>


                                    <div class="form-group mb-3">
                                        <label class="control-label" for="">Image</label>
                                        <input type="file" name="image" class="form-control" placeholder="image">
                                    </div>



                                    <div class="form-group mb-3">
                                        <label class="control-label" for="">Excerpt</label>
                                        <input class="form-control" type="text" name="exerpt" id="exerpt"
                                            value="{{ old('exerpt') }}">
                                        @error('exerpt')
                                            <p class="help alert-danger">{{ $errors->first('exerpt') }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label">Body </label>
                                        <textarea name="body" cols="19" rows="6" class="form-control" value="{{ old('body') }}"></textarea>
                                        @error('body')
                                            <p class="help alert-danger">{{ $errors->first('body') }}</p>
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
