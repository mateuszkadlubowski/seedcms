<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;
use Illuminate\Support\Facades\Password as PasswordFacade;

class AuthController extends Controller
{
    public function login(): View
    {
        return view('auth.login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        $login = filter_var($validated['username'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $login => $validated['username'],
            'password' => $validated['password'],
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            Auth::user()->last_login = now();
            Auth::user()->save();

            return redirect()->intended('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('auth.login');
    }

    public function registerView(): View|RedirectResponse
    {
        if (!config('admin.register_users')) {
            return redirect()->route(config('auth.default_home'));
        }

        return view('auth.register');
    }

    public function register(Request $request): RedirectResponse
    {
        if (!config('admin.register_users')) {
            return redirect()->route('admin.dashboard');
        }

        $request->validate([
            'username' => ['required', 'string', 'max:255', Rule::unique(User::class)],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => ['required', 'string', Password::default(), 'confirmed'],
        ]);


        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('admin.dashboard');
    }

    public function forgotPasswordView(): View
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request): RedirectResponse
    {
        $request->validate(['email' => 'required|email']);

        $status = PasswordFacade::sendResetLink(
            $request->only('email')
        );

        return $status === PasswordFacade::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }
}


/*
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\View\View;

    public function resetPasswordView(string $token): View
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request): RedirectResponse
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = PasswordFacade::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === PasswordFacade::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }



    public function verifyEmail(): View|RedirectResponse
    {

        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route(config('auth.default_home'));
        }

        return view('auth.verify-email');
    }

    public function verificationSend(Request $request): RedirectResponse
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');

    }

    public function verificationVerify(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        return redirect()->route(config('auth.default_home'))->with('success', __('auth.verify_email.success'));
    }

    public function confirmPasswordView(): View
    {
        return view('auth.confirm-password');
    }

    public function confirmPassword(Request $request): RedirectResponse
    {

        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => __('auth.confirm_password.failed')
            ]);
        }

        $request->session()->passwordConfirmed();

        return redirect()->intended();
    }


//Validator::make($input, [
//'password' => $this->passwordRules(),
//])->validate();
//
//$user->forceFill([
//'password' => Hash::make($input['password']),
//])->save();
}

 */
