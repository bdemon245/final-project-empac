<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->has('profile_image')) {
            $ext = $request->profile_image->extension();
            $fileName = "$request->username.$ext";
            $path = $request->profile_image->storeAs('uploads/avaters/admin', $fileName, 'public');
            $avater = $request->input('avater', $path);
        } else {
            $avater = $request->avater;
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'confirmed', Password::defaults()],
            'username' => 'bail|required|string|max:255|unique:' . User::class,
            'confirm_password' => 'bail|required|same:password',
            'profile_image' => 'bail|required_without:avater|image|max:1024',
            'role' => 'bail|required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'avater' => $avater
        ]);

        event(new Registered($user));

        Auth::login($user);

        dd($user);
        return redirect(RouteServiceProvider::HOME)->with('success', "Registered Successfully");
    }
}
