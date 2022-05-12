<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisterEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RegisterCustomerToNewsLetter
{
    public function handle(NewCustomerHasRegisterEvent $event)
    {
        dump("register New User to newsLetter");

    }
}
