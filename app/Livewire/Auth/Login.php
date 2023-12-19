<?php

namespace App\Livewire\Auth;

use App\Models\User;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    use WithRateLimiting;

    public string $title = 'Masuk';

    #[Rule('required|string|email')]
    public string $email = '';

    #[Rule('required|string')]
    public string $password = '';

    #[Rule('nullable|boolean')]
    public bool $remember_me = false;

    public function mount()
    {
        $this->email = request()->email ?? '';
    }

    public function save()
    {
        try {
            $this->rateLimit(5, 180);
        } catch (TooManyRequestsException $exception) {
            Log::warning('Too many request login {ip}', [
                'ip' => $exception->ip
            ]);

            throw ValidationException::withMessages([
                'email' => "Too many request, please wait for {$exception->minutesUntilAvailable} minutes to try again.",
            ]);
        }

        $this->validate();

        $user = User::email($this->email)->first();

        if (!$user or !Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember_me)) {
            $this->reset('password', 'remember_me');

            return $this->addError('email', 'The provided credentials do not match our records.');
        }

        session()->regenerate();

        return $this->redirect(route('home'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.login')->title($this->title);
    }
}
