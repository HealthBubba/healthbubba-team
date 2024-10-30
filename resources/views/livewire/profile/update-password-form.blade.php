<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;
use App\Concerns\Livewire\WithReload;
use App\Concerns\Livewire\WithToast;

new class extends Component {
    use WithToast, WithReload;

    public string $current_password = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Update the password for the currently authenticated user.
     */
    public function updatePassword(): void
    {
        try {
            $validated = $this->validate([
                'current_password' => ['required', 'string', 'current_password'],
                'password' => ['required', 'string', Password::defaults(), 'confirmed'],
            ]);
        } catch (ValidationException $e) {
            $this->reset('current_password', 'password', 'password_confirmation');

            throw $e;
        }

        Auth::user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        $this->reset('current_password', 'password', 'password_confirmation');
        $this->toast('Profile Updated', 'Success')->success();
        $this->reload();
    }
}; ?>

<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form wire:submit="updatePassword" class="mt-6 space-y-6">
        <div class="mb-5">
            <x-input.label >Current Password</x-input.label>
            <x-input.password wire:model="current_password" placeholder="Current Password" type="password" autocomplete="current-password" />
            <x-input.error key="current_password"  />
        </div>

        <div class="mb-5">
            <x-input.label >New Password</x-input.label>
            <x-input.password wire:model="password" type="password" placeholder="New Password" autocomplete="new-password" />
            <x-input.error key="password"  />
        </div>

        <div class="mb-5">
            <x-input.label >Confirm Password</x-input.label>
            <x-input.password wire:model="password_confirmation" type="password" placeholder="Confirm Password" autocomplete="new-password" />
            <x-input.error key="password_confirmation"  />
        </div>

        <div class="flex items-center gap-4">
            <x-button wire:loading wire:target="updatePassword" class="btn-primary">{{ __('Update') }}</x-button>
        </div>
    </form>
</section>
