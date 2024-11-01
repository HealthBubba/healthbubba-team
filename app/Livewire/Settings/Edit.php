<?php

namespace App\Livewire\Settings;

use App\Concerns\Livewire\WithReload;
use App\Concerns\Livewire\WithToast;
use App\Enums\Settings;
use Livewire\Component;

class Edit extends Component {
    use WithToast, WithReload;

    public $settings = Settings::class;

    public $commission = '';

    function mount(){
        $this->commission = $this->settings::COMMISSION_FEE->value();
    }

    function rules(){
        return [
            'commission' => 'required|numeric|min:0'
        ];
    }

    function update (){
        $this->validate();

        $this->settings::COMMISSION_FEE->update($this->commission);
        
        $this->toast('Settings Updated Successfully', 'Success')->success();
    }

    public function render()
    {
        return view('livewire.settings.edit');
    }
}
