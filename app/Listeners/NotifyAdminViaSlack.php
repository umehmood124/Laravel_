<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminViaSlack
{
    public function handle(NewCustomerHasRegisterEvent $event)
    {
        dump("Notify Admin ");
    }
}
