<?php if(!empty($footer_image)): ?>
    <div class="text-center mb-3">
        <div class="" style="color: var(--text_color)">
            <h3 class="font-dm-sans-title"><b>Activity Gallery</b></h3>
        </div>
    </div>

    <section class="footer_showcase d-flex mb-2">
        <div class="d-flex flex-wrap" style="width: 100%;">
            <div class="swiper mySwiper" style="height: 235px !important; border-radius:8px !important">
                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $footer_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="swiper-slide">
                            <img src="<?php echo e(asset('upload/footer_image/' . $image)); ?>" alt=""
                                class="img-fluid w-100" style="object-fit: cover !important; border-radius:8px; height: 235px !important">
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>


            <script>
                var swiper = ew Swiper(".mySwiper", {
                    slidesPerView: 6,
                    spaceBetween: 8,
                    freeMode: true,
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        300: {
                            slidesPerView: 2,
                        },
                        600: {
                            slidesPerView: 3,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                        1000: {
                            slidesPerView: 6,
                        },
                    },
                });
            </script>
        </div>
    </section>
<?php endif; ?>

<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/layouts/parts/footer_showcase.blade.php ENDPATH**/ ?>