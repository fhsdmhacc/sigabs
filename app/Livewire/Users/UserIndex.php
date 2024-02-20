<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use TallStackUi\Traits\Interactions;

class UserIndex extends Component
{
    use WithPagination, Interactions;

    #[Url]
    public $search = '';

    public string $title = 'Pengguna';

    public string $permission = 'index users';

    public function mount()
    {
        $this->authorize($this->permission);
    }

    public function delete(User $user)
    {
        $user->delete();

        $this->toast()->success('Berhasil!', 'Anda telah berhasil menghapus pengguna ' . $user->name . '.')->send();
    }

    public function render()
    {
        return view('livewire.users.user-index', [
            'users' => User::with([
                'roles',
                'session',
            ])->filter([
                'search' => $this->search
            ])
            ->orderByDesc('id')
            ->fastPaginate(5)
        ])->title($this->title);
    }
}
