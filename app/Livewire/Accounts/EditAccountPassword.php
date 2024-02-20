<?php

namespace App\Livewire\Accounts;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;

class EditAccountPassword extends Component
{
    public string $title = 'Ubah Kata Sandi Akun';

    public string $current_password;

    public string $password;

    public string $password_confirmation;

    public function save()
    {
        Validator::make(
            [
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation
            ],
            [
                'password' => [
                    'required',
                    'string',
                    Password::min(8)->letters()->numbers(),
                    'confirmed'
                ],
                'password_confirmation' => [
                    'required',
                    'string',
                    'same:password',
                ]
            ]
        )->validate();

        if (! Hash::check($this->current_password, auth()->user()->password)) {
            return $this->addError('current_password', 'Kata sandi saat ini tidak valid.');
        }

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        $this->redirect(route('accounts.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.accounts.edit-account-password')->title($this->title);
    }
}
