<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- dashboard --}}
        <li class="nav-item {{ Route::is('user.dashboard') || Route::is('user.profile') ? 'active' : '' }}">
            <a class="nav-link {{ Route::is('user.dashboard') || Route::is('user.profile') ? 'active' : '' }}"
                href="{{ route('user.dashboard') }}">
                <i class="fa fa-cogs menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- my applications --}}
        <li class="nav-item {{ Route::is('user.order_list') || Route::is('user.order_details') ? 'active' : '' }}">
            <a class="nav-link {{ Route::is('user.order_list') || Route::is('user.order_details') ? 'active' : '' }}"
                href="{{ route('user.order_list') }}">
                <i class="fa fa-edit menu-icon"></i>
                <span class="menu-title">My Application</span>
            </a>
        </li>

        @if (Auth::user()->type == 1)
            {{-- my events --}}
            <li class="nav-item {{ Route::is('user.my_event') ? 'active' : '' }}">
                <a class="nav-link {{ Route::is('user.my_event') ? 'active' : '' }}"
                    href="{{ route('user.my_event') }}">
                    <i class="fa fa-podcast menu-icon"></i>
                    <span class="menu-title">My Events</span>
                </a>
            </li>

            {{-- my wishlist --}}
            <li class="nav-item {{ Route::is('user.edit_profile') ? 'active' : '' }}">
                <a class="nav-link {{ Route::is('user.edit_profile') ? 'active' : '' }}"
                    href="{{ route('user.edit_profile', ['id' => Auth::user()->id]) }}">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Edit Profile</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->type == 7)
            {{-- manage application --}}
            <li class="nav-item {{ Route::is('frontend.manage_consultant_application') ? 'active' : '' }}">
                <a class="nav-link {{ Route::is('frontend.manage_consultant_application') ? 'active' : '' }}"
                    href="{{ route('frontend.manage_consultant_application', auth()->user()->id) }}">
                    <i class="fa fa-file-pdf menu-icon"></i>
                    <span class="menu-title">Assigned Application</span>
                </a>
            </li>

            {{-- manage application --}}
            <li class="nav-item {{ Route::is('frontend.manage_consultant_student') ? 'active' : '' }}">
                <a class="nav-link {{ Route::is('frontend.manage_consultant_student') ? 'active' : '' }}"
                    href="{{ route('frontend.manage_consultant_student') }}">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">Assigned Students</span>
                </a>
            </li>

            {{-- apply for new application --}}
            <li class="nav-item">
                <a class="nav-link" target="_blank"
                    href="{{ route('frontend.apply_now', ['partner_ref_id' => session('partner_ref_id'), 'is_anonymous' => 'true', 'is_applied_partner' => true]) }}">
                    <i class="fas fa-receipt menu-icon"></i>
                    <span class="menu-title">Apply For New</span>
                </a>
            </li>
        @endif

        {{-- my notifications --}}
        <li class="nav-item {{ Route::is('user.notification') || Route::is('user.notifications') ? 'active' : '' }}">
            <a class="nav-link {{ Route::is('user.notification') || Route::is('user.notifications') ? 'active' : '' }}"
                href="{{ route('user.notification') }}">
                <i class="fa fa-bell menu-icon"></i>
                <span class="menu-title">Notification</span>
            </a>
        </li>

        @if (Auth::user()->type == 7)
            {{-- manage banner --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('partner.manage_banner') }}">
                    <i class="fa fa-magic menu-icon"></i>
                    <span class="menu-title">Manage Banner</span>
                </a>
            </li>

            {{-- my referance url --}}
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)"
                    data-ref_url="{{ route('frontend.apply_now', ['partner_ref_id' => session('partner_ref_id'), 'is_anonymous' => 'true']) }}"
                    id="copy-link">
                    <i class="fa fa-globe menu-icon"></i>
                    <span class="menu-title">Reference URL</span>
                </a>
            </li>
        @endif

    </ul>
</nav>
