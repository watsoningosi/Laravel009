@extends('layouts.app')

@section('content')
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="wrapper">
                    <div class="col-md-12">
                        <div class="row">
                            @forelse ($post as $post)
                                <div class="col-md-6 mb-3">
                                    <div class="blog-post">
                                        <div class="card-img"><img class="img-fluid" src="/assets/images/{{ $post->image }}" alt="Blog img"
                                                style="width: 600px; height:400px"></div>
                                        <p class="lorem_text">Posted On: {{ $post->created_at }}
                                        </p>
                                        <h2 class="most_text"><a
                                                href="/pages/blog/{{ $post->id }}">{{ $post->title }}</a></h2>
                                        <div class="card-body">
                                            <p class="lorem_text">{{ $post->exerpt }}</p>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <p>No relevant articles Yet</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
