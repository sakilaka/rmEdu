<script src="<?php echo e(asset('backend/assets/vendors/js/vendor.bundle.base.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/vendors/js/vendor.bundle.addons.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/off-canvas.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/hoverable-collapse.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/misc.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/settings.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/todolist.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/dashboard.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/toastDemo.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/tooltips.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/popover.js')); ?>"></script>

<script src="<?php echo e(asset('backend/assets/js/data-table.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/dataTable-buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/dataTable-jsZip.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/dataTable-pdfMake.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/dataTable-vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/dataTable-button_html5.js')); ?>"></script>
<script src="<?php echo e(asset('backend/assets/js/dataTable-button_print.js')); ?>"></script>

<?php echo $__env->make('Backend.components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('.delete-item').click(function() {
        var item_id = $(this).prev('input[type="hidden"]').val();
        $('#modal_item_id').val(item_id);
    });
</script>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/components/script.blade.php ENDPATH**/ ?>