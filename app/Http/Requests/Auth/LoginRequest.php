<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        // Rate limiting key (based on IP and username)
        $this->ensureIsNotRateLimited();

        // Check Credentials attempt to login
        if (! Auth::attempt($this->only('email', 'password'))) {
            // Counting Limit user who unsuccessfully loggin
            RateLimiter::hit($this->throttleKey());
            
            //Throw error if authenticate doesn't match
            throw ValidationException::withMessages([
                'errors' => trans( 'The provided credentials do not match our records.')
            ]);
        }

        // Reset the limit after successfully loggin
        RateLimiter::clear($this->throttleKey());
    }

    public function ensureIsNotRateLimited(): void
    {
        //Check Rate Limiter attempts
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        //Use facades events $request
        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'throttle' => trans('Too many login attempts. Please try again in :seconds seconds.', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    //Get the rate limiting throttle key for the request
    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
