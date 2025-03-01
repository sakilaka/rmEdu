<div class="bg-prussian-blue sticky-nav nav_second  end-0 position-fixed start-0 shadow bg-white"
    style="top:70px; z-index:10; background: var(--menu_color)">
    <div class="container-lg">
        <ul class=" nav text-uppercase fw-semi-bold headerMenu" id="navbarResponsive">
            <?php
                $menus = \App\Models\Menu::where('type', 'header_menu')->where('status', 1)->orderBy('position')->get();
            ?>
            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="nav-item">
                    <a class="nav-link nav-link-menu" href="<?php echo e(url($menu->url)); ?>"><?php echo e($menu->name); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div>
<?php /**PATH /home/rmintern/public_html/resources/views/Frontend/layouts/parts/header-menu.blade.php ENDPATH**/ ?>