@extends('layouts.adlay')
@section('admin-content')
    <div class="col-lg-12">
        <div class="container">
            <div class="row">
                <div class="form">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">


                                <div id="page">
                                    <h1>Update Article </h1>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success text-center">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-hidden="true">&times;</button>
                                            {{ Session::get('success') }}
                                        </div>
                                    @endif
                                    <form method="post" action="/pages/blog/{{ $post->id }}">
                                        @csrf
                                        @method('put')

                                        <div class="form-group mb-3">
                                            <label class="control-label" for="">Title</label>
                                            <input class="form-control" type="text" name="title"
                                                value="{{ $post->title }}" id="title">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label" for="">Excerpt</label>
                                            <input class="form-control" type="text" name="exerpt" id="exerpt"
                                                value="{{ $post->exerpt }}">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label" for="">Image</label>
                                            <input type="file" name="image" class="form-control" placeholder="image">
                                            <img src="/assets/images/{{ $post->image }}" width="300px">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label class="control-label">Body </label>
                                            <textarea name="body" cols="19" rows="6" class="form-control">{{ $post->body }}</textarea>
                                        </div>

                        

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
