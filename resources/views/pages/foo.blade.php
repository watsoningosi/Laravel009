@extends('layouts.adlay')

@section('admin-content')
<div class="col-md-12">
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4 pull-right">
                            <a class="btn btn-sm btn-primary" href="/pages/create"> Add Post</a>
                        </div>

                        <div class="card1">

                            <div class="card-title1">
                                <h1>Admin</h1>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <colgroup>
                                            <col width="2%">
                                            <col width="12%">
                                            <col width="30%">
                                            <col width="10%">
                                            <col width="10%">
                                            <col width="9%">
                                        </colgroup>
                                        <thead>

                                            <td>#</td>
                                            <td>Title</td>
                                            <td>Exerpt</td>
                                            <td>Photo</td>
                                            <td>Created at</td>
                                            <td>Actions</td>
                                        </thead>
                                        <tbody>
                                            @foreach ($post as $post)
                                                <tr>
                                                    <td>{{ $post->id }}</td>
                                                    <td> {{ $post->title }}</td>
                                                    <td>{{ $post->exerpt }}</td>
                                                    <td><img src="/images/{{ $post->image }}" width="150"
                                                            height="90" alt=""></td>
                                                    <td>{{ $post->created_at }}</td>
                                                    <td>
                                                        <form id="delete-frm" class=""
                                                            action="{{ route('post.destroy', $post->id) }}"
                                                            method="post">
                                                            <a class="btn btn-sm btn-primary"
                                                                href="{{ route('post.edit', $post->id) }}">Edit</a>
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
