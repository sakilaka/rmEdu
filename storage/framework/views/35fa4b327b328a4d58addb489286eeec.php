<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        
        <li class="nav-item <?php echo e(Route::is('user.dashboard') || Route::is('user.profile') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(Route::is('user.dashboard') || Route::is('user.profile') ? 'active' : ''); ?>"
                href="<?php echo e(route('user.dashboard')); ?>">
                <i class="fa fa-cogs menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        
        <li class="nav-item <?php echo e(Route::is('user.order_list') || Route::is('user.order_details') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(Route::is('user.order_list') || Route::is('user.order_details') ? 'active' : ''); ?>"
                href="<?php echo e(route('user.order_list')); ?>">
                <i class="fa fa-edit menu-icon"></i>
                <span class="menu-title">My Application</span>
            </a>
        </li>

        <?php if(Auth::user()->type == 1): ?>
            
            <li class="nav-item <?php echo e(Route::is('user.my_event') ? 'active' : ''); ?>">
                <a class="nav-link <?php echo e(Route::is('user.my_event') ? 'active' : ''); ?>"
                    href="<?php echo e(route('user.my_event')); ?>">
                    <i class="fa fa-podcast menu-icon"></i>
                    <span class="menu-title">My Events</span>
                </a>
            </li>

            
            <li class="nav-item <?php echo e(Route::is('user.edit_profile') ? 'active' : ''); ?>">
                <a class="nav-link <?php echo e(Route::is('user.edit_profile') ? 'active' : ''); ?>"
                    href="<?php echo e(route('user.edit_profile', ['id' => Auth::user()->id])); ?>">
                    <i class="fa fa-user menu-icon"></i>
                    <span class="menu-title">Edit Profile</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if(Auth::user()->type == 7): ?>
            
            <li class="nav-item <?php echo e(Route::is('frontend.manage_consultant_application') ? 'active' : ''); ?>">
                <a class="nav-link <?php echo e(Route::is('frontend.manage_consultant_application') ? 'active' : ''); ?>"
                    href="<?php echo e(route('frontend.manage_consultant_application', auth()->user()->id)); ?>">
                    <i class="fa fa-file-pdf menu-icon"></i>
                    <span class="menu-title">Assigned Application</span>
                </a>
            </li>

            
            <li class="nav-item <?php echo e(Route::is('frontend.manage_consultant_student') ? 'active' : ''); ?>">
                <a class="nav-link <?php echo e(Route::is('frontend.manage_consultant_student') ? 'active' : ''); ?>"
                    href="<?php echo e(route('frontend.manage_consultant_student')); ?>">
                    <i class="fa fa-users menu-icon"></i>
                    <span class="menu-title">Assigned Students</span>
                </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" target="_blank"
                    href="<?php echo e(route('frontend.apply_now', ['partner_ref_id' => session('partner_ref_id'), 'is_anonymous' => 'true', 'is_applied_partner' => true])); ?>">
                    <i class="fas fa-receipt menu-icon"></i>
                    <span class="menu-title">Apply For New</span>
                </a>
            </li>
        <?php endif; ?>

        
        <li class="nav-item <?php echo e(Route::is('user.notification') || Route::is('user.notifications') ? 'active' : ''); ?>">
            <a class="nav-link <?php echo e(Route::is('user.notification') || Route::is('user.notifications') ? 'active' : ''); ?>"
                href="<?php echo e(route('user.notification')); ?>">
                <i class="fa fa-bell menu-icon"></i>
                <span class="menu-title">Notification</span>
            </a>
        </li>

        <?php if(Auth::user()->type == 7): ?>
            
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('partner.manage_banner')); ?>">
                    <i class="fa fa-magic menu-icon"></i>
                    <span class="menu-title">Manage Banner</span>
                </a>
            </li>

            
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)"
                    data-ref_url="<?php echo e(route('frontend.apply_now', ['partner_ref_id' => session('partner_ref_id'), 'is_anonymous' => 'true'])); ?>"
                    id="copy-link">
                    <i class="fa fa-globe menu-icon"></i>
                    <span class="menu-title">Reference URL</span>
                </a>
            </li>
        <?php endif; ?>

    </ul>
</nav>
<?php /**PATH /home/rmintern/public_html/resources/views/User-Backend/components/sidebar.blade.php ENDPATH**/ ?>