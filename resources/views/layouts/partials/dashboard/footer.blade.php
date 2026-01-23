<div class="py-4 footer d-flex flex-lg-column" id="kt_footer">
    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
        <div class="order-2 text-gray-900 order-md-1">
            <span class="text-muted fw-semibold me-1">{{now()->format('Y')}} &copy;</span>
            <a href="{{route('dashboard')}}" target="_blank" class="text-gray-800 text-hover-primary">{{env('APP_NAME')}}</a>
        </div>

        {{-- <ul class="order-1 menu menu-gray-600 menu-hover-primary fw-semibold">
            <li class="menu-item">
                <a href="#" target="_blank" class="px-2 menu-link">About</a>
            </li>
            <li class="menu-item">
                <a href="#" target="_blank" class="px-2 menu-link">Support</a>
            </li>
        </ul> --}}
    </div>
</div>
