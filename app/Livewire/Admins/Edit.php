<?php

namespace App\Livewire\Admins;

use App\Concerns\Livewire\WithReload;
use App\Concerns\Livewire\WithToast;
use App\Enums\Role;
use App\Library\Token;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component {
    use WithToast, WithReload;

    public $modal;

    public $firstname, $lastname, $email, $phone, $password;

    public User | null $user = null;

    function mount(){
        if($this->user) {
            $this->fill($this->user);
        }
    }

    function rules(){
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')->ignore($this->user?->id, 'id')],
            'phone' => 'nullable|string',
            'password' => 'nullable'
        ];
    }
    
    function save(){
        $validated = $this->validate();
        $validated['password'] = $this->user ? $this->user->password : Hash::make($this->password) ?? Hash::make(Token::text(8));
        $validated['role'] = Role::ADMIN;

        $this->user?->update($validated) ?? User::create($validated);

        $this->toast('User Information Saved', 'Success')->success();
        return $this->reload();
    }

    public function render(){
        return view('livewire.admins.edit');
    }
}
