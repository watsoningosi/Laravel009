@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="sidebar-heading">
                        <h2>Send us a message</h2>
                    </div>
                    <form id="contact" action="/pages/contact" method="post">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="control-label" for="">Email</label>
                            <input class="form-control" type="text" name="email" id="email">
                            @error('email')
                                <p class="help alert-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        @if (session('message'))

                        <div style="color:green">
                            {{ session('message') }}
                        </div>
                            
                        @endif
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>

                        
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
