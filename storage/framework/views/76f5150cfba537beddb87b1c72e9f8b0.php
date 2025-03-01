<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('upload/site_setting/' . $theme_logo->header_image) ?? asset('backend/assets/images/logo.svg')); ?>"
                alt="logo">
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?php echo e(route('home')); ?>">
            <img src="<?php echo e(asset('upload/site_setting/' . $theme_logo->favicon) ?? asset('backend/assets/images/logo-mini.svg')); ?>"
                alt="logo">
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex justify-content-between align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fas fa-bars text-primary"></span>
        </button>
        <ul class="navbar-nav">
            <li class="nav-item nav-search d-none d-md-flex">
                <div class="nav-link">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search" aria-label="Search">
                    </div>
                </div>
            </li>
        </ul>

        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
                <?php
                    if (Auth::user()->type == 1) {
                        $notifications = \App\Models\Notification::where('user_id', auth()->user()->id)
                            ->orderBy('id', 'desc')
                            ->paginate(4);
                    } elseif (Auth::user()->type == 7) {
                        $notifications = \App\Models\Notification::where('partner_id', auth()->user()->id)
                            ->orderBy('id', 'desc')
                            ->paginate(4);
                    }
                ?>

                <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#"
                    data-toggle="dropdown">
                    <i class="fas fa-bell mx-0"></i>
                    <span class="count"><?php echo e(count($notifications)); ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list"
                    aria-labelledby="notificationDropdown">
                    <div class="dropdown-item">
                        <p class="mb-0 font-weight-normal float-left">You have <?php echo e(count($notifications)); ?> new
                            notifications
                        </p>
                        <a href="<?php echo e(route('user.notifications')); ?>"
                            class="badge badge-pill text-white badge-warning float-right">View all</a>
                    </div>
                    <div class="dropdown-divider"></div>
                    <?php $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($notification->type == 'university'): ?>
                            <a href="<?php echo e(!empty($notification->application) ? route('frontend.application-details', ['id' => $notification->application->id]) : '#'); ?>"
                                class="preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <img src="<?php echo e($notification->application->student->image_show ?? ''); ?>"
                                            alt="<?php echo e($notification->application->student->name ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium"><?php echo e($notification->text); ?></h6>
                                    <p class="font-weight-light small-text">
                                        <?php echo e($notification->created_at->diffForHumans()); ?>

                                    </p>
                                </div>
                            </a>
                        <?php elseif($notification->type == 'event'): ?>
                            <a class="preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <img src="<?php echo e($notification->event_cart->event->host->image_show); ?>"
                                            alt="<?php echo e($notification->event_cart->event->name); ?>">
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">
                                        <?php echo e($notification->event_cart->event->name); ?></h6>
                                    <p><?php echo e($notification->text); ?></p>
                                    <p class="font-weight-light small-text">
                                        <?php echo e($notification->created_at->diffForHumans()); ?>

                                    </p>
                                </div>
                            </a>
                        <?php elseif($notification->type == 'package'): ?>
                            <a class="preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <img src="<?php echo e($notification->image_show); ?>"
                                            alt="<?php echo e($notification->cart->package->name); ?>">
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">
                                        <?php echo e($notification->cart->package->name); ?></h6>
                                    <p><?php echo e($notification->text); ?></p>
                                    <p class="font-weight-light small-text">
                                        <?php echo e($notification->created_at->diffForHumans()); ?>

                                    </p>
                                </div>
                            </a>
                        <?php elseif($notification->type == 'ebook'): ?>
                            <a class="preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <img src="<?php echo e(@$notification?->cart?->ebook?->user?->image_show); ?>"
                                            alt="<?php echo e($notification->cart->ebook->title); ?>">
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">
                                        <?php echo e($notification->cart->ebook->title); ?></h6>
                                    <p><?php echo e($notification->text); ?></p>
                                    <p class="font-weight-light small-text">
                                        <?php echo e($notification->created_at->diffForHumans()); ?>

                                    </p>
                                </div>
                            </a>
                        <?php else: ?>
                            <a class="preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-danger">
                                        <img src="<?php echo e(@$notification?->user->image_show); ?>"
                                            alt="<?php echo e($notification->user->name); ?>">
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-medium">
                                        Notification
                                    </h6>
                                    <p><?php echo e($notification->text); ?></p>
                                    <p class="font-weight-light small-text">
                                        <?php echo e($notification->created_at->diffForHumans()); ?>

                                    </p>
                                </div>
                            </a>
                        <?php endif; ?>

                        <?php if(!$loop->last): ?>
                            <div class="dropdown-divider"></div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </li>

            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown"
                    aria-expanded="false">
                    <span class="mr-2 d-none d-md-inline"><?php echo e(Auth::user()->name ?? ''); ?></span>
                    <img src="<?php echo e(Auth::user()->image_show ?? asset('backend/assets/images/faces/face4.jpg')); ?>"
                        alt="<?php echo e(Auth::user()->name ?? ''); ?>">
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="<?php echo e(route('user.edit_profile', ['id' => Auth::user()->id])); ?>">
                        <i class="fa fa-user text-primary"></i>
                        Edit Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>">
                        <i class="fas fa-power-off text-primary"></i>
                        Logout
                    </a>
                </div>
            </li>
        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="fas fa-bars"></span>
        </button>
    </div>
</nav>
<?php /**PATH /home/rmintern/public_html/resources/views/User-Backend/components/navbar.blade.php ENDPATH**/ ?>