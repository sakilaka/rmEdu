<style>
    .student-application-edit .nav-item .nav-link{
        font-size: 0.9rem;
    }
    .border-bottom-primary {
        border-left: 2px solid var(--primary_background) !important;
        border-right: 2px solid var(--primary_background) !important;
        color: var(--primary_background) !important;
        font-weight: bold;
    }
</style>

<ul class="nav nav-tabs nav-tabs-vertical student-application-edit">
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.student_appliction_program_edit') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.student_appliction_program_edit', $s_appliction->id)); ?>">
            Program Info
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.student_appliction_edit') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.student_appliction_edit', $s_appliction->id)); ?>">
            Personal Info
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.student_appliction_edit_family') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.student_appliction_edit_family', $s_appliction->id)); ?>">
            Family Info
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link <?php echo e(Route::is('admin.student_appliction_document') ? 'active border-bottom-primary' : ''); ?>"
            href="<?php echo e(route('admin.student_appliction_document', $s_appliction->id)); ?>">
            Documents
        </a>
    </li>
</ul>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/student_appliction/theme_options_tabs_nav.blade.php ENDPATH**/ ?>