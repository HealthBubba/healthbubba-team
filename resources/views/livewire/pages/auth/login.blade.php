<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.auth', ['title' => 'Login'])] class extends Component {
    public LoginForm $form;

    public function login(): void {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<form class="form w-100" wire:submit="login">
    <div class="text-center mb-11">
        <div class="text-gray-500 fw-semibold fs-6">Login to your account</div>
    </div>

    <div class="fv-row mb-8">
        <x-input.label>Email Address</x-input.label>
        <x-input type="email" wire:model="form.email" placeholder="Email Address" />
        <x-input.error key="form.email"  />
        <x-input.error key="email"  />
    </div>
    
    <div class="fv-row mb-3">
        <x-input.label>Password</x-input.label>
        <x-input.password wire:model="form.password" placeholder="Password" />
        <x-input.error key="form.password"  />
    </div>

    <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
        <div></div>
        <a href="{{route('password.request')}}" class="link-primary">Forgot Password ?</a>
    </div>

    <div class="d-grid mb-10">
        <x-button class="btn-primary" wire:loading wire:target="login" >Login</x-button>
    </div>
</form>
