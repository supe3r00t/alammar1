<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return back()->with('success','تم تسجيل دخول!');

        return redirect()->intended(RouteServiceProvider::HOME);
    }


    public function login(Request $request){

        $validatedData = $request->validate([

            'email'=>'required',
            'password'=>'required',

        ]);

        if (!auth()->attempt($validatedData)){

            return response()->json(['message'=>'invalid login details'],401);
        }

        $accessToken =auth()->user()->createToken('authToken')->accessToken;

        return ['user'=> auth()->user(), 'access_token' => $accessToken];
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
