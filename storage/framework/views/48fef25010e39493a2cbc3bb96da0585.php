<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="_token" content="<?php echo e(csrf_token()); ?>">
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('backend/assets/images/favicon.png')); ?>" />

<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/iconfonts/font-awesome/css/all.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/css/vendor.bundle.base.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/vendors/css/vendor.bundle.addons.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/style.css')); ?>">
<link rel="stylesheet"
    href="<?php echo e(asset('backend/assets/vendors/iconfonts/simple-line-icon/css/simple-line-icons.css')); ?>">

<?php
    $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
    $dataObj = json_decode($results->option_value);
?>
<?php if($dataObj): ?>
    <style>
        :root {
            --primary_background: <?php echo e($dataObj->primary_background ?? '#25497E'); ?>;
            --secondary_background: <?php echo e($dataObj->secondary_background ?? '#00a5df'); ?>;
            --tertiary_background: <?php echo e($dataObj->tertiary_background ?? '#e40046'); ?>;

            --button_primary_bg: <?php echo e($dataObj->button_primary_bg ?? '#25497E'); ?>;
            --button_primary_hover_bg: <?php echo e($dataObj->button_primary_hover_bg ?? '#122643'); ?>;
            --button_secondary_bg: <?php echo e($dataObj->button_secondary_bg ?? '#00a5df'); ?>;
            --button_secondary_hover_bg: <?php echo e($dataObj->button_secondary_hover_bg ?? '#0077a1'); ?>;
            --button_tertiary_bg: <?php echo e($dataObj->button_tertiary_bg ?? '#e40046'); ?>;
            --button_tertiary_hover_bg: <?php echo e($dataObj->button_tertiary_hover_bg ?? '#c2003b'); ?>;
        }

        /* assign btn theme for this site */
        .btn-primary-bg {
            background-color: var(--button_primary_bg) !important;
            color: white !important;
        }

        .btn-primary-bg:hover {
            background-color: var(--button_primary_hover_bg) !important;
        }

        .btn-secondary-bg {
            background-color: var(--button_secondary_bg) !important;
            color: white !important;
        }

        .btn-secondary-bg:hover {
            background-color: var(--button_secondary_hover_bg) !important;
        }

        .btn-tertiary-bg {
            background-color: var(--button_tertiary_bg) !important;
            color: white !important;
        }

        .btn-tertiary-bg:hover {
            background-color: var(--button_tertiary_hover_bg) !important;
        }
    </style>
<?php endif; ?>

<link rel="stylesheet" href="<?php echo e(asset('backend/assets/css/dataTable-buttons.min.css')); ?>">
<style>
    @media screen and (max-width:640px) {
        .dt-buttons {
            margin-bottom: 1rem;
        }
    }
</style><?php /**PATH /home/rmintern/public_html/resources/views/Backend/components/head.blade.php ENDPATH**/ ?>