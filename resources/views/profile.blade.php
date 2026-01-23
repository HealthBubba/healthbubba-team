<x-dashboard-layout title="Profile" heading="Profile">
    <div class="card">
        <div class="card-body">
            <div class="w-50">
                <div class="mb-10">
                    <livewire:profile.update-profile-information-form />
                </div>

                @if (!$authenticated->is_marketer)

                    <div class="separator separator-dashed my-10"></div>
        
                    <div >
                        <livewire:profile.update-password-form />
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-dashboard-layout>
