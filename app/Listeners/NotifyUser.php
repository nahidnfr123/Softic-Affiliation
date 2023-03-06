<?php

namespace App\Listeners;

use App\Events\TransactionEvent;
use App\Models\AffiliateUser;
use App\Models\Commission;
use App\Notifications\CommissionNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyUser
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TransactionEvent $event): void
    {
        foreach ($event->commissions as $commission) {
            $data = [];
            $data['amount'] = $commission['amount'];
            $data['notifiable'] = $commission['id'];
            $data['type'] = Commission::class;
            AffiliateUser::findOrFail($commission->affiliate_user_id)->notify(new CommissionNotification($data));
        }
    }
}
