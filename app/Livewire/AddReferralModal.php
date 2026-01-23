<?php

namespace App\Livewire;

use App\Concerns\Livewire\WithReload;
use App\Concerns\Livewire\WithToast;
use App\Models\Referral;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddReferralModal extends Component {
    use WithToast, WithReload;

    public $modal = '';

    #[Validate('required|email')]
    public $email = '';

    public Referral $user;

    function add(){
        $this->resetErrorBag();
        if(!$referral = Referral::where('email', trim($this->email))->first()) {
            return $this->addError('email', "No user found with email {$this->email}");
        }

        if($user = User::whereNotNull('code')->whereCode($referral->referral_code)->first()) {
            // if($user->id == $this->user->id) {
            //     return $this->addError('email', "This referral already belongs to you.");
            // }

            return $this->addError('email', "This referral already belongs to {$user->name} - {$user->code}");
        }

        $referral->referral_code = $this->user->code;
        $referral->save();

        $this->reset('email');
        
        $this->toast("You have added the user to your referral list", "Referral List Updated")->success();
        $this->reload();
    }
    
    public function render() {

        return view('livewire.add-referral-modal', ['email' => 'required']);
    }
}
