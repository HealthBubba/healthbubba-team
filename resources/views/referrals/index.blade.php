<x-dashboard-layout title="Referrals" heading="Referrals" >
    <div class="mb-10">
        <div class="row row-cols-md-4 g-5 row-cols-2">
            <div>
                <div class="card card-bordered">
                    <div class="card-body p-4">
                        <h1 >{{$referrals->count()}}</h1>
                        <p class="text-muted mb-0">Total Referrals</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card card-bordered">
                    <div class="card-body  p-4">
                        <h1 >{{$doctors}}</h1>
                        <p class="text-muted mb-0">Doctors</p>
                    </div>
                </div>
            </div>
            <div>
                <div class="card card-bordered">
                    <div class="card-body  p-4">
                        <h1 >{{$patients}}</h1>
                        <p class="text-muted mb-0">Patients</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div>
                <div class="table-responsive">
                    @include('partials.tables.referrals')
                </div>

                {{$referrals->links()}}
            </div>

            <livewire:user.edit modal="user-edit" />
        </div>
    </div>
</x-dashboard-layout>