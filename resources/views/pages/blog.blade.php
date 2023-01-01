@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="single">
                        <div class="about_img mt-3"><img class="img-fluid" src="/assets/images/{{ $post->image }}"></div>
                        <br>
                        <p class="lorem_text">Posted On: {{ $post->created_at }}
                        </p>
                        <h2 class="most_text">{{ $post->title }}</h2>
                        <p class="mb-3">{!! $post->body !!}</p>
                        <i class="fa fa-tag"></i>
                        <p class="pull-right d-flex">
                            @foreach ($post->tags as $tag)
                                <a class="mr-2" href="{{ route('tag',['tag' => $tag->name]) }}">{{ $tag->name }}</a>
                            @endforeach
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
