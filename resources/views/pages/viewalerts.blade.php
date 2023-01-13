@extends('layouts.app')
@section('content')
    <div class="col-md-12">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="sidebar-heading">
                        <h2>Display Notifications</h2>
                    </div>
                    <ul>
                        @forelse ($notifications as $notification)

                        <li>
                            @if ($notification->type === 'App\Notifications\PaymentReceived')

                            Payment Received of amount  sh. {{ $notification->data['amount'] }}
                                
                            @endif
                        </li>
                        @empty
                        <li>You have no new Messages</li>
                            
                        @endforelse
                    </ul>
                    

                </div>
            </div>
        </div>
    </div>
@endsection
