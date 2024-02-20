<?php

namespace App\Livewire\Users;

use App\Models\User;
use Livewire\Attributes\Locked;
use Livewire\Component;

class EditUser extends Component
{
    public string $title = 'Ubah Pengguna';

    public string $permission = 'update users';

    #[Locked]
    public $id;

    public string $name = '';

    public string $email = '';

    public string $role = '';

    public function mount(User $user)
    {
        $this->authorize($this->permission);

        $this->id = $user->id;

        $this->name = $user->name;

        $this->email = $user->email;

        $this->role = $user->getRoleNames()[0] ?? '';
    }

    public function rules()
    {
        $user = User::findOrFail($this->id);

        return [
            'name' => 'required|string|max:250',
            'email' => 'required|string|max:250|unique:users,email,' . $user->id,
            'role' => 'nullable|string|max:250',
        ];
    }

    public function save()
    {
        $this->authorize($this->permission);

        $this->validate();

        $user = User::findOrFail($this->id);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $user->syncRoles($this->role);

        $this->redirect(route('users.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.users.edit-user')->title($this->title);
    }
}
