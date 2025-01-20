<?php

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Locked;
use Livewire\Volt\Component;
use Livewire\Attributes\Layout;
use App\Concerns\Livewire\WithToast;

new #[Layout('layouts.auth', ['title' => 'Reset Password'])] class extends Component
{
    use WithToast;
    #[Locked]
    public string $token = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Mount the component.
     */
    public function mount(string $token): void
    {
        $this->token = $token;

        $this->email = request()->string('email');
    }

    /**
     * Reset the password for the given user.
     */
    public function resetPassword(): void
    {
        $this->validate([
            'token' => ['required'],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) {
                $user->forceFill([
                    'password' => Hash::make($this->password),
                    'remember_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.
        if ($status != Password::PASSWORD_RESET) {
            $this->addError('email', __($status));

            return;
        }

        Session::flash('status', __($status));
        $this->toast(__($status))->success();
        $this->redirectRoute('login');
    }
}; ?>

<form class="form w-100" wire:submit="resetPassword">
    <div class="text-center mb-11">
        <div class="text-gray-500 fw-semibold fs-6">Reset your Password</div>
    </div>

    <div class="fv-row mb-8">
        <x-input.label>Email Address</x-input.label>
        <x-input type="email" wire:model="email" placeholder="Email Address" />
        <x-input.error key="email"  />
        <x-input.error key="email"  />
    </div>
    
    <div class="fv-row mb-3">
        <x-input.label>Password</x-input.label>
        <x-input.password wire:model="password" placeholder="Password" />
        <x-input.error key="password"  />
    </div>
    
    <div class="fv-row mb-3">
        <x-input.label>Password</x-input.label>
        <x-input.password wire:model="password_confirmation" placeholder="Confirm Password" />
        <x-input.error key="password_confirmation"  />
    </div>

    <div class="d-grid mb-10">
        <x-button class="btn-primary" wire:loading wire:target="resetPassword" >Reset Password</x-button>
    </div>
</form>
