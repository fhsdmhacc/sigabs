<?php

namespace App\Livewire\Accounts;

use Cjmellor\BrowserSessions\Facades\BrowserSessions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class AccountIndex extends Component
{
    use Interactions;

    public string $title = 'Akun';

    public $sessions;

    #[Rule('required|string')]
    public string $password = '';

    public function mount()
    {
        $this->sessions = BrowserSessions::sessions();
    }

    public function logout()
    {
        Auth::logout();
        
        request()->session()->invalidate();
        
        request()->session()->regenerateToken();
        
        $this->redirect(route('login'), navigate: true);
    }

    public function logoutOtherBrowserSessions()
    {
        $this->validate();

        if (! Hash::check($this->password, Auth::user()->password)) {
            return $this->addError('password', 'The password does not match our records.');
        }

        Auth::logoutOtherDevices($this->password);

        DB::table('sessions')
            ->where('user_id', '=', Auth::user()->getAuthIdentifier())
            ->where('id', '!=', request()->session()->getId())
            ->delete();

        $this->toast()->success('Berhasil!', 'Anda berhasil mengeluarkan seluruh sesi dari browser lain.');

        $this->dispatch('logout-success');
    }

    public function render()
    {
        return view('livewire.accounts.account-index')->title($this->title);
    }
}
