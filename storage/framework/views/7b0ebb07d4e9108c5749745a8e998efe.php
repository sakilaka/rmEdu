
<?php if(session('success')): ?>
    <script>
        setTimeout(function() {
            showSuccessToast('<?php echo e(session('success')); ?>');
        }, 500);
    </script>
<?php endif; ?>

<?php if(session('error')): ?>
    <script>
        setTimeout(function() {
            showDangerToast('<?php echo e(session('error')); ?>');
        }, 500);
    </script>
<?php endif; ?>

<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Backend/components/message.blade.php ENDPATH**/ ?>