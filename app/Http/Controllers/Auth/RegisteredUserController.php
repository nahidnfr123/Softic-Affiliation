<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\AffiliateUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'promo_code' => ['nullable', 'string', 'exists:' . AffiliateUser::class . ',promo_code'],
            'dob' => ['date', 'date', 'before:' . Carbon::now()->sub(12, 'year'), 'after:' . Carbon::now()->sub(120, 'year')],
        ], [
            'dob.before' => 'Your age must be at-least 12 years old.',
            'dob.after' => 'Your age is too much! Please do other good things in life.'
        ]);

        $affiliate_user_id = null;
        if ($request->promo_code) {
            $affiliate_user = AffiliateUser::where('promo_code', $request->promo_code)->first();
            $affiliate_user_id = $affiliate_user->id;
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'promo_code' => $request->promo_code,
            'dob' => $request->dob,
            'affiliate_user_id' => $affiliate_user_id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
