<?php
    $header_logo = \App\Models\Tp_option::where('option_name', 'theme_logo')->first();
    $name = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
?>
<style>
    .fixed-top-header {
        position: fixed;
        top: 0;
        z-index: 1030
    }
</style>

<header class="fixed-top-header">
    <div class="position-absolute top-0 start-0 end-0 text-center py-3 d-none" id="search_input_area">
        <style>
            #search_input_area {
                width: 70% !important;
                margin: 0 auto;
                border-radius: 15px;
                box-shadow: 0px 7px 14px rgba(81, 147, 213, 0.2);
                background-color: #f7fff6;
                z-index: 999;
                transition: 0.5s display;
            }

            .custom-input {
                border: none;
                border-radius: 8px;
                border-bottom: 1px solid #ced4da;
                transition: border-color 0.15s ease-in-out;
            }

            .custom-input:focus {
                border-color: var(--button2_border_color);
                outline: none;
                box-shadow: none;
            }
        </style>
        <div class="container py-1">
            <form action="<?php echo e(route('home.head_search')); ?>" class="row justify-content-center align-items-center">
                <div class="col-sm-8 col-md-5">
                    <div class="form-group mb-0">
                        <input type="text" name="search" class="form-control custom-input p-3"
                            placeholder="What do you want to learn?" required>
                    </div>
                </div>
                <div class="col-auto">
                    <button type="submit" style="background: transparent; border:0;">
                        <svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg"
                            width="22.734" height="22.734" viewBox="0 0 22.734 22.734">
                            <g id="Group_16" data-name="Group 16" transform="translate(3.418 4.928)">
                                <g id="Group_15" data-name="Group 15">
                                    <path id="Path_5" data-name="Path 5"
                                        d="M79.837,111.222a.84.84,0,0,0-1.188,0,5.74,5.74,0,0,0-1.642,4.653.84.84,0,0,0,.835.756c.028,0,.056,0,.084,0a.84.84,0,0,0,.752-.919,4.067,4.067,0,0,1,1.158-3.3A.839.839,0,0,0,79.837,111.222Z"
                                        transform="translate(-76.978 -110.975)" fill="#808080" />
                                </g>
                            </g>
                            <g id="Group_18" data-name="Group 18">
                                <g id="Group_17" data-name="Group 17">
                                    <path id="Path_6" data-name="Path 6"
                                        d="M9.6,0a9.6,9.6,0,1,0,9.6,9.6A9.614,9.614,0,0,0,9.6,0Zm0,17.526A7.923,7.923,0,1,1,17.526,9.6,7.932,7.932,0,0,1,9.6,17.526Z"
                                        fill="#808080" />
                                </g>
                            </g>
                            <g id="Group_20" data-name="Group 20" transform="translate(14.951 14.951)">
                                <g id="Group_19" data-name="Group 19">
                                    <path id="Path_7" data-name="Path 7"
                                        d="M344.246,343.059l-6.1-6.1a.84.84,0,1,0-1.188,1.188l6.1,6.1a.84.84,0,0,0,1.188-1.188Z"
                                        transform="translate(-336.708 -336.71)" fill="#808080" />
                                </g>
                            </g>
                        </svg>
                    </button>
                </div>

                <div class="col-auto">
                    <a href="#" id="close_btn" style="background: transparent; border:0;">
                        <svg id="close_icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="#808080">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path
                                d="M18.37 5.63l-1.26-1.26L12 10.74 6.89 5.63 5.63 6.89 10.74 12l-5.11 5.11 1.26 1.26L12 13.26l5.11 5.11 1.26-1.26L13.26 12z" />
                        </svg>
                    </a>
                </div>
            </form>

        </div>
    </div>

    <div class="text-center" style="background-color: var(--primary_background); width:100vw !important;">
        
    </div>

    <nav class="frontend-page navbar navbar-expand-lg bg-body-tertiary  navbar-custom sticky sticky-light"
        id="navbar" style="padding: 0 20px !important; height: 90px;">
        <div class="container">
            <a class="navbar-brand logo" href="<?php echo e(route('home')); ?>">
                <img src="<?php echo e(@$header_logo->header_image == '' ? @$header_logo->no_image : @$header_logo->header_image_show); ?>"
                    style="width: 100px" alt="Logo-<?php echo e(@$name->company_name); ?>">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.university_course_list') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.university_course_list')); ?>">Programs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.find_university') || Route::is('frontend.all_universities_list') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.find_university')); ?>">Choose Country</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.learner') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.learner')); ?>">Applicants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.instructor') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.instructor')); ?>">Partner</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.blog') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.blog')); ?>">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.event_list') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.event_list')); ?>">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.faq') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.faq')); ?>">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(Route::is('frontend.about') ? 'active' : ''); ?>"
                            href="<?php echo e(route('frontend.about')); ?>">About</a>
                    </li>

                </ul>
                <div class="nav-btn d-flex justify-content-between align-items-center">
                    <div>
                        <a class="btn btn-header-search" id="search_btn">
                            <svg id="Component_1_1" data-name="Component 1 – 1" xmlns="http://www.w3.org/2000/svg"
                                width="22.734" height="22.734" viewBox="0 0 22.734 22.734">
                                <g id="Group_16" data-name="Group 16" transform="translate(3.418 4.928)">
                                    <g id="Group_15" data-name="Group 15">
                                        <path id="Path_5" data-name="Path 5"
                                            d="M79.837,111.222a.84.84,0,0,0-1.188,0,5.74,5.74,0,0,0-1.642,4.653.84.84,0,0,0,.835.756c.028,0,.056,0,.084,0a.84.84,0,0,0,.752-.919,4.067,4.067,0,0,1,1.158-3.3A.839.839,0,0,0,79.837,111.222Z"
                                            transform="translate(-76.978 -110.975)" fill="#808080" />
                                    </g>
                                </g>
                                <g id="Group_18" data-name="Group 18">
                                    <g id="Group_17" data-name="Group 17">
                                        <path id="Path_6" data-name="Path 6"
                                            d="M9.6,0a9.6,9.6,0,1,0,9.6,9.6A9.614,9.614,0,0,0,9.6,0Zm0,17.526A7.923,7.923,0,1,1,17.526,9.6,7.932,7.932,0,0,1,9.6,17.526Z"
                                            fill="#808080" />
                                    </g>
                                </g>
                                <g id="Group_20" data-name="Group 20" transform="translate(14.951 14.951)">
                                    <g id="Group_19" data-name="Group 19">
                                        <path id="Path_7" data-name="Path 7"
                                            d="M344.246,343.059l-6.1-6.1a.84.84,0,1,0-1.188,1.188l6.1,6.1a.84.84,0,0,0,1.188-1.188Z"
                                            transform="translate(-336.708 -336.71)" fill="#808080" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>

                    <div>
                        
                        <div id="gt-mordadam-43217984"></div>
                    </div>
                    <div>
                        <?php if(Auth::check()): ?>
                            <style>
                                .profile-card-container {
                                    position: fixed;
                                    top: -300px;
                                    right: 12%;
                                    z-index: 10000;
                                }

                                .profile-card {
                                    background-color: #fff;
                                    border: 1px solid #ccc;
                                    border-radius: 8px;
                                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                                    padding: 20px;
                                    width: 300px;
                                    transition: top 0.5s ease;
                                }

                                .user-info {
                                    display: flex;
                                    align-items: center;
                                    margin-bottom: 20px;
                                }

                                .user-info img {
                                    width: 60px;
                                    height: 60px;
                                    border-radius: 50%;
                                    margin-right: 15px;
                                }

                                .user-details h4 {
                                    margin: 0;
                                }

                                .user-details p {
                                    margin: 5px 0;
                                }

                                .user-actions {
                                    text-align: center;
                                }

                                .user-actions button {
                                    margin: 5px;
                                    padding: 8px 16px;
                                    border: none;
                                    border-radius: 4px;
                                    cursor: pointer;
                                }
                            </style>
                            <div class="profile-card-container" id="profileCardContainer">
                                <div class="profile-card" id="profileCard">
                                    <div class="user-info">
                                        <img src="<?php echo e(auth()->user()->image_show); ?>" alt="User Image">
                                        <div class="user-details">
                                            <h4><?php echo e(auth()->user()->name); ?></h4>
                                            <p><?php echo e(auth()->user()->email); ?></p>
                                        </div>
                                    </div>
                                    <div class="user-actions">
                                        <button class="btn-primary-bg"
                                            onclick="location.href='<?php echo e(route('user.profile')); ?>'">View
                                            Profile</button>
                                        <button class="btn-tertiary-bg"
                                            onclick="location.href='<?php echo e(route('user.logout')); ?>'">Logout</button>
                                    </div>
                                </div>
                            </div>


                            <a onclick="location.href='<?php echo e(route('user.profile')); ?>'" href="#" id="userImage">
                                <img style="height:40px;width:40px;border-radius: 50%;border: 1px solid #000;"
                                    src="<?php echo e(auth()->user()->image_show); ?>" alt="image" />
                            </a>

                            <a onclick="location.href='<?php echo e(route('user.logout')); ?>'" class="d-md-none"
                                style="margin-left: 12px;">
                                <img src="<?php echo e(asset('frontend/images/logout_icon.svg')); ?>" alt="">
                            </a>

                            <script>
                                function toggleProfileCard() {
                                    var profileCardContainer = document.getElementById('profileCardContainer');
                                    if (profileCardContainer.style.top === '0px') {
                                        profileCardContainer.style.top = '-300px';
                                    } else {
                                        profileCardContainer.style.top = '0px';
                                    }
                                }

                                function hideProfileCard() {
                                    var profileCardContainer = document.getElementById('profileCardContainer');
                                    if (profileCardContainer.style.top === '0px') {
                                        profileCardContainer.style.top = '-300px';
                                    }
                                }

                                document.getElementById('userImage').addEventListener('click', function() {
                                    toggleProfileCard();
                                });

                                document.getElementById('userImage').addEventListener('mouseover', function() {
                                    var profileCardContainer = document.getElementById('profileCardContainer');
                                    profileCardContainer.style.top = '0px';
                                });

                                document.body.addEventListener('click', function(event) {
                                    var profileCardContainer = document.getElementById('profileCardContainer');
                                    if (!profileCardContainer.contains(event.target) && event.target !== document.getElementById(
                                            'userImage')) {
                                        hideProfileCard();
                                    }
                                });
                            </script>
                        <?php else: ?>
                            <a href="<?php echo e(route('frontend.signin')); ?>" class="btn btn-primary-bg"
                                style="font-weight: 500;">Log In</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<?php /**PATH C:\laragon\www\rminternational-20241015\resources\views/Frontend/layouts/parts/header.blade.php ENDPATH**/ ?>