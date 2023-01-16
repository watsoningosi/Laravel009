<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchase;
use App\Models\Payment;
use App\Notifications\PaymentReceived;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Notification as FacadesNotification;

class PaymentController extends Controller
{
   
    public function index()
    {
     
    }

    public function create()
    {
        return view('pages.payment');
    }


    public function store(Request $request)
    {

        ProductPurchase::dispatch('toy');
        

      /*  request()->user()->notify(new PaymentReceived(1000));
      #  FacadesNotification::send(request()->user(), new PaymentReceived());

        return redirect('notifications')
                    ->with('message', 'payment sent');
                    */
    }

 
}
 