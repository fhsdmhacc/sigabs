<?php

namespace App\Livewire\Auth;

use App\Models\User;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ForgotPassword extends Component
{
    use WithRateLimiting, Interactions;

    public string $title = 'Lupa Kata Sandi';

    #[Rule('required|string|email')]
    public string $email = '';

    public function save()
    {
        try {
            $this->rateLimit(3, 180);
        } catch (TooManyRequestsException $exception) {
            Log::warning('Too many request forgot password {ip}', [
                'ip' => $exception->ip
            ]);

            throw ValidationException::withMessages([
                'email' => "Too many request, please wait for {$exception->minutesUntilAvailable} minutes to try again.",
            ]);
        }

        $this->validate();

        $user = User::email($this->email)->first();

        if (! $user) {
            return $this->addError('email', 'We can\'t find a user with that email address.');
        }

        $user->sendPasswordResetNotification(
            Password::createToken($user)
        );

        $this->toast()->success('Berhasil!', 'Kami telah mengirimkan tautan, silakan cek kotak masuk atau spam pada email Anda untuk mengatur ulang kata sandi.');
    }

    public function render()
    {
        return view('livewire.auth.forgot-password')->title($this->title);
    }
}
