<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Models\AffiliateUser;
use App\Models\Commission;
use App\Models\Transaction;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->guard('web')->id())->latest()->get();
        return view('transaction.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('transaction.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->guard('web')->id();

        $transaction = Transaction::create($data);

        $user = auth()->guard('web')->user();
        if ($user && $user->affiliateUser) {
            $affiliateUser = $user->affiliateUser;
            if ($affiliateUser->affiliate_user_id) {
                $affiliateUser->affiliateUser->commission()->create([
                    'amount' => ($transaction * 10) / 100,
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'affiliate_user_id' => $affiliateUser->id,
                    'through_user_id' => $affiliateUser->affiliate_user_id,
                ]);
                $affiliateUser->commission()->create([
                    'amount' => ($transaction * 20) / 100,
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'affiliate_user_id' => $affiliateUser->id,
                ]);
            } else {
                $affiliateUser->commission()->create([
                    'amount' => ($transaction * 30) / 100,
                    'user_id' => $user->id,
                    'transaction_id' => $transaction->id,
                    'affiliate_user_id' => $affiliateUser->id,
                ]);
            }
        }
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
