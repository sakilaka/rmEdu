
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

<?php /**PATH /home/rmintern/public_html/resources/views/Backend/components/message.blade.php ENDPATH**/ ?>