<?php

namespace App\Listeners;

use App\Events\ProductPurchase;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GetCoupon
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ProductPurchase  $event
     * @return void
     */
    public function handle(ProductPurchase $event)
    {
        var_dump('Here is your coupon');
    }
}
