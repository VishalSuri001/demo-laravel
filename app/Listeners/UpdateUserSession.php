<?php

namespace App\Listeners;

use App\Events\LoggedUserUpdate;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserSession
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
     * @param  \App\Events\LoggedUserUpdate  $event
     * @return void
     */
    public function handle(LoggedUserUpdate $event)
    {
        //
    }
}
