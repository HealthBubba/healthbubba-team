<?php

namespace App\Livewire\User;

use App\Concerns\Livewire\WithReload;
use App\Concerns\Livewire\WithToast;
use App\Library\Token;
use App\Models\Marketer;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component {
    use WithToast, WithReload;

    public $modal;

    public $email;

    public $user = null;

    function rules(){
        return [
            'email' => ['required', 'string']
        ];
    }

    function search(){
        $this->validate();
        
        if(!$this->user = Referral::whereEmail($this->email)->orWhere('referral_code', $this->email)->first()) {
            return $this->addError('email', "User with email or referral code {$this->email} does not exist");
        }

        }
        
    function save(){
        if($marketer = Marketer::where('user_id', $this->user->id)->first()) {
            return $this->addError('email', 'The user is already a marketer');
        }
                
        Marketer::create([
           'user_id' => $this->user->id
        ]);
        
        $this->toast('Marketer Added Successfully', 'Success')->success();
        $this->reload();
    }

    public function render(){
        return view('livewire.user.edit');
    }
}
