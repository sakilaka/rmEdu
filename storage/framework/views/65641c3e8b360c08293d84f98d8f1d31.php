<?php $__env->startSection('title', '- Find University'); ?>
<?php $__env->startSection('head'); ?>
    <style>
        .content_search {
            margin-top: 10rem;
            margin-bottom: 2rem;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
    <div class="content_search">
        <div class="container">
            <div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <h2 style="color: var(--primary_background); font-family:'DM Sans', sans-serif; font-weight:700"
                            class="text-center mb-3">
                            Find Universities by Country
                        </h2>
                    </div>

                    <div class="col-9 col-md-5 mb-4">
                        <input type="text" placeholder="Filter Country" id="country-list-filter" class="form-control form-control-lg">
                    </div>
                </div>

            </div>

            <div class="country-container row mx-1">
                <?php $__currentLoopData = $countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-6 col-md-3 col-lg-2 px-1">
                        <a href="<?php echo e(route('frontend.all_universities_list', ['continent' => $country->continent->id, 'country' => $country->id])); ?>"
                            style="color: var(--primary_background)">
                            <div class="card my-1">
                                <div class="card-body">
                                    <span><?php echo e($country->name); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php echo $__env->make('Frontend.layouts.parts.news-letter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterInput = document.querySelector('input#country-list-filter');
            const countryCards = document.querySelectorAll('.country-container .col-6');
            const noResultMessage = document.createElement('div');

            noResultMessage.className = 'no-results text-center';
            noResultMessage.textContent = 'No Country Found';
            document.querySelector('.country-container').appendChild(noResultMessage);

            filterInput.addEventListener('keyup', function() {
                const filterValue = filterInput.value.toLowerCase();
                let visibleCardFound = false;

                countryCards.forEach(card => {
                    const countryName = card.querySelector('.card-body span').textContent
                        .toLowerCase();
                    if (countryName.includes(filterValue)) {
                        card.style.display = '';
                        visibleCardFound = true;
                    } else {
                        card.style.display = 'none';
                    }
                });

                noResultMessage.style.display = visibleCardFound ? 'none' : 'block';
            });

            filterInput.dispatchEvent(new Event('keyup'));
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('Frontend.layouts.master-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/rmintern/public_html/resources/views/Frontend/university/find-university.blade.php ENDPATH**/ ?>