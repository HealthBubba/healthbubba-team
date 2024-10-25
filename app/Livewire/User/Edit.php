<?php

namespace App\Livewire\User;

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

    public $code, $firstname, $lastname, $email, $phone, $password;

    public User | null $user = null;

    function mount(){
        $this->generate();

        if($this->user) {
            $this->fill($this->user);
        }
    }

    function rules(){
        return [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'nullable|string',
            'code' => ['required', Rule::unique('users', 'code')->ignore($this->user?->id, 'id')],
            'password' => 'nullable'
        ];
    }

    function generate(){
        $this->code = strtoupper(Token::alphaNum(8, User::class, 'code'));
    }
    
    function save(){
        $validated = $this->validate();
        $validated['password'] = $this->user ? $this->user->password : Hash::make($this->password) ?? Hash::make(Token::text(8));
        $validated['role'] = Role::MARKETER;

        $this->user?->update($validated) ?? User::create($validated);

        $this->toast('User Information Saved', 'Success')->success();
        return $this->reload();
    }

    public function render(){
        return view('livewire.user.edit');
    }
}
