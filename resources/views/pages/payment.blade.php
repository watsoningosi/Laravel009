@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="sidebar-heading">
                        <h2>Make payment</h2>
                    </div>
                    <form id="payment" action="/pages/payment" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        @if (session('message'))
                            <div style="color:
                #00FF00">
                                {{ session('message') }}
                            </div>
                        @endif

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
