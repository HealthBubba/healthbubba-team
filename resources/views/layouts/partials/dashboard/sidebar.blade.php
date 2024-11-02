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
                
                @if ($authenticated->is_admin)
                    <div class="menu-item {{request()->routeIs('team*') ? 'here' : ''}}">
                        <a href="{{route('team')}}" class="menu-link ">
                            <span class="menu-icon">
                                <i class="ki-outline ki-profile-user fs-2"></i>
                            </span>
                            <span class="menu-title">Team Members</span>
                        </a>
                    </div>
                @endif
                
                <div class="menu-item {{request()->routeIs('referrals*') ? 'here' : ''}}">
                    <a href="{{route('referrals')}}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-profile-user fs-2"></i>
                        </span>
                        <span class="menu-title">Referrals</span>
                    </a>
                </div>

                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-7 fw-bold">Account</span>
                    </div>
                </div>

                @if ($authenticated->is_admin)
                    <div class="menu-item {{request()->routeIs('users') ? 'here' : ''}}">
                        <a href="{{route('users')}}" class="menu-link ">
                            <span class="menu-icon">
                                <i class="ki-outline ki-user-square fs-2"></i>
                            </span>
                            <span class="menu-title">Admins</span>
                        </a>
                    </div>
                @endif

                <div class="menu-item {{request()->routeIs('profile') ? 'here' : ''}}">
                    <a href="{{route('profile')}}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-user fs-2"></i>
                        </span>
                        <span class="menu-title">Profile</span>
                    </a>
                </div>
                
                @if ($authenticated->is_admin)
                    <div class="menu-item {{request()->routeIs('settings') ? 'here' : ''}}">
                        <a href="{{route('settings')}}" class="menu-link ">
                            <span class="menu-icon">
                                <i class="ki-outline ki-setting fs-2"></i>
                            </span>
                            <span class="menu-title">Settings</span>
                        </a>
                    </div>
                @endif
                
                <div class="menu-item ">
                    <a href="{{route('logout')}}" class="menu-link ">
                        <span class="menu-icon">
                            <i class="ki-outline ki-entrance-left fs-2"></i>
                        </span>
                        <span class="menu-title">Log Out</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>