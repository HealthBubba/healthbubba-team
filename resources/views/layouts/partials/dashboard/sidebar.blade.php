<div id="kt_aside" class="aside pt-7 pb-4 pb-lg-7 pt-lg-17" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">  
    <div class="aside-logo flex-column-auto px-9 mb-9 mb-lg-17 mx-auto" id="kt_aside_logo">
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="{{asset('logo.svg')}}" class="h-30px rounded logo" />
        </a>
    </div>
    
    <div class="aside-menu flex-column-fluid ps-3 ps-lg-5 pe-1 mb-9" id="kt_aside_menu">
        <div class="w-100 hover-scroll-y pe-2 me-2" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_user, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="0">
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold" id="#kt_aside_menu" data-kt-menu="true">
                <div class="menu-item {{request()->routeIs('dashboard') ? 'here' : ''}}">
                    <a href="{{route('dashboard')}}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-home fs-2"></i>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>
                <div class="menu-item {{request()->routeIs('team*') ? 'here' : ''}}">
                    <a href="{{route('team')}}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-profile-user fs-2"></i>
                        </span>
                        <span class="menu-title">Team Members</span>
                    </a>
                </div>
                <div class="menu-item">
                    <a href="#" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-people fs-2"></i>
                        </span>
                        <span class="menu-title">Sign ups</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-7 fw-bold">Account</span>
                    </div>
                </div>

                <div class="menu-item {{request()->routeIs('profile') ? 'here' : ''}}">
                    <a href="{{route('profile')}}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-user-square fs-2"></i>
                        </span>
                        <span class="menu-title">Admins</span>
                    </a>
                </div>

                <div class="menu-item {{request()->routeIs('profile') ? 'here' : ''}}">
                    <a href="{{route('profile')}}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-user fs-2"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="aside-footer flex-column-auto px-6 px-lg-9" id="kt_aside_footer">
        <div class="d-flex flex-stack ms-7">
            <a href="{{route('logout')}}" class="btn btn-sm btn-icon btn-active-color-primary btn-icon-gray-600 btn-text-gray-600">
                <i class="ki-duotone ki-entrance-left fs-1 me-2">
                    <span class="path1"></span>
                    <span class="path2"></span>
                </i>
                <span class="d-flex flex-shrink-0 fw-bold">Log Out</span>
            </a>

            {{-- <div class="ms-1">
                <div class="btn btn-sm btn-icon btn-icon-gray-600 btn-active-color-primary position-relative me-n1" data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                    <i class="ki-duotone ki-setting-2 fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
            </div> --}}
        </div>
    </div>
</div>