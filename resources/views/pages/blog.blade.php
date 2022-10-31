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

                        {!! $post->body !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
