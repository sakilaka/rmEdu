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

<?php echo $__env->make('User-Backend.components.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<script>
    $('.delete-item').click(function() {
        var item_id = $(this).prev('input[type="hidden"]').val();
        $('#modal_item_id').val(item_id);
    });
</script>

<?php if(Auth::user()->type == 7): ?>
    <script>
        document.getElementById('copy-link').addEventListener('click', function(event) {
            event.preventDefault();

            var urlToCopy = this.getAttribute('data-ref_url');
            var tempInput = document.createElement('input');

            tempInput.value = urlToCopy;
            document.body.appendChild(tempInput);
            tempInput.select();
            tempInput.setSelectionRange(0, 99999);

            document.execCommand('copy');
            document.body.removeChild(tempInput);

            alert('URL copied to clipboard: ' + urlToCopy);
        });
    </script>
<?php endif; ?>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/User-Backend/components/script.blade.php ENDPATH**/ ?>