<?php

use Illuminate\Support\Facades\Password;
use Livewire\Volt\Component;
use App\Concerns\Livewire\WithToast;

new #[Layout('layouts.auth', ['title' => 'Forgot Password'])] class extends Component {
    use WithToast;

    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        $this->toast($status)->success();
    }
}; ?>

<form class="form w-100" wire:submit="sendPasswordResetLink">
    <div class="text-center mb-11">
        <div class="text-gray-500 fw-semibold fs-6">Forgot your Password?</div>
        <p class="text-muted">No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
    </div>

    <div class="fv-row mb-8">
        <x-input.label>Email Address</x-input.label>
        <x-input type="email" wire:model="email" placeholder="Email Address" />
        <x-input.error key="email"  />
        <x-input.error key="email"  />
    </div>
    
    <div class="d-grid mb-10">
        <x-button class="btn-primary" wire:loading wire:target="sendPasswordResetLink" >Send Password Reset Link</x-button>
    </div>
</form>
