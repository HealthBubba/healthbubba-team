<x-dashboard-layout title="Overview" heading="Overview">
    <div class="row row-cols-md-4 g-5 mb-10 row-cols-2">
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
        @if ($authenticated->is_marketer)
            <div>
                <div class="card card-bordered">
                    <div class="card-body  p-4">
                        <h1 ><x-currency/>{{number_format($authenticated->commission)}}</h1>
                        <p class="text-muted mb-0">Earned Commission</p>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($authenticated->is_admin)
        <div class="card mb-10">
            <div class="card-header">
                <div class="card-title">Top Marketers</div>
            </div>
            <div class="card-body">
                @include('partials.tables.users', ['id' => '#top-users'])
            </div>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="card-title">Latest Referrals</div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @include('partials.tables.referrals')
            </div>
        </div>
    </div>
</x-dashboard-layout>