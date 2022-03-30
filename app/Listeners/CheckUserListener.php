<?php

namespace App\Listeners;

use App\Events\CheckUser;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CheckUserListener
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
     * @param  \App\Events\CheckUser  $event
     * @return void
     */
    public function handle(CheckUser $event)
    {

        $user = User::find($event->check);
        $user->update([
            'check_in_at' => now()
        ]);
    }
}
