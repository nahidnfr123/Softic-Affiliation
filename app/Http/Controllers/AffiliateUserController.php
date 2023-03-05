<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAffiliateUserRequest;
use App\Http\Requests\UpdateAffiliateUserRequest;
use App\Models\AffiliateUser;

class AffiliateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $affiliateUsers = AffiliateUser::all();
        return view('affiliate.index', compact('affiliateUsers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('affiliate.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAffiliateUserRequest $request)
    {
        $data = $request->validated();
        AffiliateUser::create($data);
        return redirect()->route('affiliate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(AffiliateUser $affiliateUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AffiliateUser $affiliateUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAffiliateUserRequest $request, AffiliateUser $affiliateUser)
    {
        $data = $request->validated();
        $affiliateUser->update($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AffiliateUser $affiliateUser)
    {
        //
    }
}
