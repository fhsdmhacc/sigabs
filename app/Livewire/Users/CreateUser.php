<?php

namespace App\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreateUser extends Component
{
    public string $title = 'Buat Pengguna Baru';

    public string $permission = 'create users';

    public $roles;

    #[Rule('required|string|max:250')]
    public string $name = '';

    #[Rule('required|email|string|max:250|unique:users,email')]
    public string $email = '';

    #[Rule('required|string|max:250')]
    public string $role = '';

    public function mount()
    {
        $this->authorize($this->permission);
    }

    public function save()
    {
        $this->authorize($this->permission);

        $this->validate();

        $user = User::create([
            'uuid' => Str::uuid(),
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $user->syncRoles($this->role);

        $this->redirect(route('users.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.users.create-user')->title($this->title);
    }
}
