<style>
    .theme-option-appearance .nav-item .nav-link {
        font-size: 0.9rem;
    }

    .border-bottom-primary {
        /* border-left: 2px solid #677aff !important;
        border-right: 2px solid #677aff !important; */
        border-left: 2px solid #25497E !important;
        border-right: 2px solid #25497E !important;
        color: #25497E !important;
        font-weight: bold;
    }
</style>

<ul class="nav nav-tabs nav-tabs-vertical theme-option-appearance">
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.about_page') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.about_page')); ?>">
            About Page
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.learner') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.learner')); ?>">
            Learner Page
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.instructor') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.instructor')); ?>">
            Partner Page
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.library') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.library')); ?>">
            Library Page
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.manage_faq') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.manage_faq')); ?>">
            FAQ Page
        </a>
    </li>
</ul>
<?php /**PATH /home/rmintern/public_html/resources/views/Backend/setting/page/other_pages_nav_tabs.blade.php ENDPATH**/ ?>