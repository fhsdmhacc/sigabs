<?php

namespace App\Livewire\Auth;

use App\Models\PasswordResetToken;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Url;
use Livewire\Component;

class ResetPassword extends Component
{
    public string $title = 'Atur Ulang Kata Sandi';

    public string $token = '';

    #[Url()]
    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public function save()
    {
        Validator::make(
            [
                'token' => $this->token,
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation
            ],
            [
                'token' => [
                    'required'
                ],
                'email' => [
                    'required',
                    'string',
                    'email',
                ],
                'password' => [
                    'required',
                    'string',
                    Password::min(8)->letters()->mixedCase()->numbers(),
                    'confirmed'
                ],
                'password_confirmation' => [
                    'required',
                    'string',
                    'same:password',
                ]
            ]
        )->validate();

        $password_reset_token =  PasswordResetToken::email($this->email);

        $user = User::email($this->email)->first();

        if (! $password_reset_token->first() or ! $user) {
            return $this->addError('email', 'We can\'t find a user with that email address.');
        }

        if (! Hash::check($this->token, $password_reset_token->nonExpired()->first()->token)) {
            return $this->addError('email', 'This password reset token is invalid.');
        }

        $user->forceFill([
            'password' => Hash::make($this->password)
        ])->setRememberToken(Str::random(60));

        $user->save();

        $password_reset_token->delete();

        return $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.reset-password')->title($this->title);
    }
}
