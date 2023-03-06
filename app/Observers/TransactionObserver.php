<?php

namespace App\Observers;

use App\Events\TransactionEvent;
use App\Models\Commission;
use App\Models\transaction;

class TransactionObserver
{
    /**
     * Handle the transaction "created" event.
     */
    public function created(transaction $transaction): void
    {
        $user = auth()->guard('web')->user();
        if ($user && $user->affiliateUser) {
            $affiliateUser = $user->affiliateUser;
            $commissions = [];
            if ($affiliateUser->affiliate_user_id) {
                $commissions [] = Commission::create([
                    'amount' => round(($transaction->amount / 100) * 20, 2),
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'affiliate_user_id' => $affiliateUser->id,
                ]);
                $commissions [] = Commission::create([
                    'amount' => round(($transaction->amount / 100) * 10, 2),
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'affiliate_user_id' => $affiliateUser->affiliate_user_id,
                    'through_user_id' => $affiliateUser->id, // Child Affiliate User ...
                ]);
            } else {
                $commissions [] = Commission::create([
                    'amount' => round(($transaction->amount / 100) * 30, 2),
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'affiliate_user_id' => $affiliateUser->id,
                ]);
            }
            TransactionEvent::dispatchIf(count($commissions), $commissions);
        }

    }

    /**
     * Handle the transaction "updated" event.
     */
    public function updated(transaction $transaction): void
    {
        //
    }

    /**
     * Handle the transaction "deleted" event.
     */
    public function deleted(transaction $transaction): void
    {
        //
    }

    /**
     * Handle the transaction "restored" event.
     */
    public function restored(transaction $transaction): void
    {
        //
    }

    /**
     * Handle the transaction "force deleted" event.
     */
    public function forceDeleted(transaction $transaction): void
    {
        //
    }
}
