<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- dashboard --}}
        <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <a class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fa fa-cogs menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        {{-- transactions --}}
        @php
            $is_active_transactions =
                Route::is('admin.transactions.index') ||
                Route::is('admin.transactions.index.filter') ||
                Route::is('admin.transactions.in_form') ||
                Route::is('admin.transactions.out_form') ||
                Route::is('admin.transactions.deposit_form');
        @endphp
        
        <li class="nav-item {{ $is_active_transactions ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.transactions.index') }}">
                <i class="fa fa-money-bill menu-icon"></i>
                <span class="menu-title">Accounts</span>
            </a>
        </li>

        {{-- home --}}
        @php
            $is_active_home =
                Route::is('admin.manage_menu') ||
                Route::is('admin.create_menu') ||
                Route::is('admin.edit_menu') ||
                Route::is('home-category.create') ||
                Route::is('home-category.index') ||
                Route::is('home-category.edit') ||
                Route::is('home-sub-category.create') ||
                Route::is('home-sub-category.index') ||
                Route::is('home-sub-category.edit');
        @endphp
        <li class="nav-item {{ $is_active_home ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#home-sidemenu" aria-expanded="false"
                aria-controls="home-sidemenu">
                <i class="fa fa-home menu-icon"></i>
                <span class="menu-title">Home</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_home ? 'show' : '' }}" id="home-sidemenu">
                <ul class="nav flex-column sub-menu">
                    {{-- Menu --}}
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.manage_menu') }}"
                            class="nav-link {{ Route::is('admin.manage_menu') || Route::is('admin.create_menu') || Route::is('admin.edit_menu') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Menu
                        </a>
                    </li>

                    {{-- Category --}}
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('home-category.index') }}"
                            class="nav-link {{ Route::is('home-category.index') || Route::is('home-category.create') || Route::is('home-category.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Category
                        </a>
                    </li>

                    {{-- Sub Category --}}
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('home-sub-category.index') }}"
                            class="nav-link {{ Route::is('home-sub-category.create') || Route::is('home-sub-category.index') || Route::is('home-sub-category.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Sub Category
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- programs --}}
        @php
            $is_active_program_module =
                Route::is('admin.u_course.create') ||
                Route::is('admin.u_course.edit') ||
                Route::is('admin.u_course.index') ||
                Route::is('admin.department.create') ||
                Route::is('admin.department.edit') ||
                Route::is('admin.department.index') ||
                Route::is('admin.degree.create') ||
                Route::is('admin.degree.edit') ||
                Route::is('admin.degree.index') ||
                Route::is('admin.section.create') ||
                Route::is('admin.section.edit') ||
                Route::is('admin.section.index') ||
                Route::is('admin.language.create') ||
                Route::is('admin.language.edit') ||
                Route::is('admin.language.index');
        @endphp
        <li class="nav-item {{ $is_active_program_module ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#program-sidemenu" aria-expanded="false"
                aria-controls="program-sidemenu">
                <i class="fa fa-cubes menu-icon"></i>
                <span class="menu-title">Programs</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_program_module ? 'show' : '' }}" id="program-sidemenu">
                <ul class="nav flex-column sub-menu">
                    {{-- programs --}}
                    @php
                        $is_active_program_sub_module =
                            Route::is('admin.u_course.index') ||
                            Route::is('admin.u_course.create') ||
                            Route::is('admin.u_course.edit');
                    @endphp
                    <li class="nav-item d-lg-block">
                        <a href="{{ route('admin.u_course.index') }}"
                            class="nav-link {{ $is_active_program_sub_module ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Programs
                        </a>
                    </li>

                    {{-- department --}}
                    @php
                        $is_active_department_sub_module =
                            Route::is('admin.department.index') ||
                            Route::is('admin.department.create') ||
                            Route::is('admin.department.edit');
                    @endphp
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.department.index') }}"
                            class="nav-link {{ $is_active_department_sub_module ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Department
                        </a>
                    </li>

                    {{-- degree --}}
                    @php
                        $is_active_degree_sub_module =
                            Route::is('admin.degree.index') ||
                            Route::is('admin.degree.create') ||
                            Route::is('admin.degree.edit');
                    @endphp
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.degree.index') }}"
                            class="nav-link {{ $is_active_degree_sub_module ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Degree
                        </a>
                    </li>

                    {{-- section --}}
                    @php
                        $is_active_section_sub_module =
                            Route::is('admin.section.index') ||
                            Route::is('admin.section.create') ||
                            Route::is('admin.section.edit');
                    @endphp
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.section.index') }}"
                            class="nav-link {{ $is_active_section_sub_module ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Section
                        </a>
                    </li>

                    {{-- language --}}
                    @php
                        $is_active_language_sub_module =
                            Route::is('admin.language.index') ||
                            Route::is('admin.language.create') ||
                            Route::is('admin.language.edit');
                    @endphp
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.language.index') }}"
                            class="nav-link {{ $is_active_language_sub_module ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Language
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- all applications --}}
        @php
            $is_active_all_applications =
                Route::is('admin.student_appliction_list') ||
                Route::is('admin.student_appliction_list_grouping') ||
                Route::is('admin.student_appliction_list.study_type_filter') ||
                Route::is('admin.student_appliction_list_partner_wise') ||
                Route::is('admin.appliction_list_partner_wise') ||
                Route::is('admin.student_list_partner_wise') ||
                Route::is('admin.student_appliction_details') ||
                Route::is('admin.student_appliction_invoice') ||
                Route::is('admin.student_appliction_program_edit') ||
                Route::is('admin.student_appliction_edit') ||
                Route::is('admin.student_appliction_edit_family') ||
                Route::is('admin.student_appliction_document');
        @endphp
        <li class="nav-item {{ $is_active_all_applications ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#all-application-sidemenu" aria-expanded="false"
                aria-controls="all-application-sidemenu">
                <i class="fa fa-edit menu-icon"></i>
                <span class="menu-title">Program Applications</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_all_applications ? 'show' : '' }}" id="all-application-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        @php
                            $program_application_routes =
                                Route::is('admin.student_appliction_list') ||
                                Route::is('admin.student_appliction_list.study_type_filter') ||
                                Route::is('admin.student_appliction_details') ||
                                Route::is('admin.student_appliction_invoice') ||
                                Route::is('admin.student_appliction_program_edit') ||
                                Route::is('admin.student_appliction_edit') ||
                                Route::is('admin.student_appliction_edit_family') ||
                                Route::is('admin.student_appliction_document');
                        @endphp
                        <a href="{{ route('admin.student_appliction_list') }}"
                            class="nav-link {{ $program_application_routes ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            All Applications
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        @php
                            $program_application_routes_grouping =
                                Route::is('admin.student_appliction_list_grouping');
                        @endphp
                        <a href="{{ route('admin.student_appliction_list_grouping') }}"
                            class="nav-link {{ $program_application_routes_grouping ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Application Grouping
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        @php
                            $partner_wise_student_application_routes =
                                Route::is('admin.student_appliction_list_partner_wise') ||
                                Route::is('admin.appliction_list_partner_wise') ||
                                Route::is('admin.student_list_partner_wise');
                        @endphp
                        <a href="{{ route('admin.student_appliction_list_partner_wise') }}"
                            class="nav-link {{ $partner_wise_student_application_routes ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Partner Wise Application
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- general-inquiry --}}
        @php
            $is_active_inquiry =
                Route::is('admin.inquiry.index') ||
                Route::is('admin.inquiry.index.filter') ||
                Route::is('admin.inquiry.edit') ||
                Route::is('admin.inquiry.view');
        @endphp
        <li class="nav-item {{ $is_active_inquiry ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.inquiry.index') }}">
                <i class="fa fa-paper-plane menu-icon"></i>
                <span class="menu-title">General Inquiries</span>
            </a>
        </li>

        {{-- university --}}
        @php
            $is_active_university =
                Route::is('admin.university.create') ||
                Route::is('admin.university.edit') ||
                Route::is('admin.university.index') ||
                Route::is('admin.university_faq_manage');
        @endphp
        <li class="nav-item {{ $is_active_university ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#university-sidemenu" aria-expanded="false"
                aria-controls="university-sidemenu">
                <i class="fa fa-university menu-icon"></i>
                <span class="menu-title">University</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_university ? 'show' : '' }}" id="university-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.university.index') }}"
                            class="nav-link {{ Route::is('admin.university.index') || Route::is('admin.university.create') || Route::is('admin.university.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Manage University
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.university_faq_manage') }}"
                            class="nav-link {{ Route::is('admin.university_faq_manage') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            University FAQ
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- location --}}
        @php
            $is_active_location =
                Route::is('continent.create') ||
                Route::is('continent.edit') ||
                Route::is('continent.index') ||
                Route::is('country.create') ||
                Route::is('country.edit') ||
                Route::is('country.index') ||
                Route::is('state.create') ||
                Route::is('state.edit') ||
                Route::is('state.index') ||
                Route::is('city.create') ||
                Route::is('city.edit') ||
                Route::is('city.index');
        @endphp
        <li class="nav-item {{ $is_active_location ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#location-sidemenu" aria-expanded="false"
                aria-controls="location-sidemenu">
                <i class="fa fa-location-arrow menu-icon"></i>
                <span class="menu-title">Location</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_location ? 'show' : '' }}" id="location-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('continent.index') }}"
                            class="nav-link {{ Route::is('continent.index') || Route::is('continent.create') || Route::is('continent.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Continents
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('country.index') }}"
                            class="nav-link {{ Route::is('country.index') || Route::is('country.create') || Route::is('country.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Countries
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('state.index') }}"
                            class="nav-link {{ Route::is('state.index') || Route::is('state.create') || Route::is('state.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            States
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('city.index') }}"
                            class="nav-link {{ Route::is('city.index') || Route::is('city.create') || Route::is('city.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Cities
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- all user --}}
        @php
            $is_active_users =
                Route::is('backend.create_admin') ||
                Route::is('backend.edit_admin') ||
                Route::is('backend.manage_admin') ||
                Route::is('admin.student.create') ||
                Route::is('admin.student.edit') ||
                Route::is('admin.student.index') ||
                Route::is('admin.student_details') ||
                Route::is('admin.consultant.create') ||
                Route::is('admin.consultant.edit') ||
                Route::is('admin.consultant.index');
        @endphp
        <li class="nav-item {{ $is_active_users ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#all-user-sidemenu" aria-expanded="false"
                aria-controls="all-user-sidemenu">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">All User</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_users ? 'show' : '' }}" id="all-user-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('backend.manage_admin') }}"
                            class="nav-link {{ Route::is('backend.manage_admin') || Route::is('backend.create_admin') || Route::is('backend.edit_admin') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Manage Admins
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.student.index') }}"
                            class="nav-link {{ Route::is('admin.student.index') || Route::is('admin.student.create') || Route::is('admin.student_details') || Route::is('admin.student.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Manage Student
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.consultant.index') }}"
                            class="nav-link {{ Route::is('admin.consultant.index') || Route::is('admin.consultant.create') || Route::is('admin.consultant.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-3" aria-hidden="true"></i>
                            Manage Partner
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- testimonials and reviews --}}
        @php
            $is_active_testimonial =
                Route::is('admin.add_new_testimonial') ||
                Route::is('admin.manage_testimonial') ||
                Route::is('admin.edit_testimonial') ||
                Route::is('admin.review.index') ||
                Route::is('admin.review.edit');
        @endphp
        <li class="nav-item {{ $is_active_testimonial ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#testimonials-sidemenu" aria-expanded="false"
                aria-controls="testimonials-sidemenu">
                <i class="fa fa-comments menu-icon"></i>
                <span class="menu-title">Tesimonials & Reviews</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_testimonial ? 'show' : '' }}" id="testimonials-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.manage_testimonial') }}"
                            class="nav-link {{ Route::is('admin.manage_testimonial') || Route::is('admin.add_new_testimonial') || Route::is('admin.edit_testimonial') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Testimonials
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.review.index') }}"
                            class="nav-link {{ Route::is('admin.review.index') || Route::is('admin.review.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Review
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- blogs and events --}}
        @php
            $is_active_blog =
                Route::is('admin.event.create') ||
                Route::is('admin.event.edit') ||
                Route::is('admin.event.index') ||
                Route::is('admin.event.order.manage') ||
                Route::is('admin.event.contact.index') ||
                Route::is('admin.event.contact.edit') ||
                Route::is('event.order.details') ||
                Route::is('blog.create_topic') ||
                Route::is('blog.manage_topic') ||
                Route::is('blog.edit_topic') ||
                Route::is('blog.create') ||
                Route::is('blog.edit') ||
                Route::is('blog.index') ||
                Route::is('blog.comments');
        @endphp
        <li class="nav-item {{ $is_active_blog ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#blogs-events-sidemenu" aria-expanded="false"
                aria-controls="blogs-events-sidemenu">
                <i class="fa fa-comments menu-icon"></i>
                <span class="menu-title">Blogs & Events</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_blog ? 'show' : '' }}" id="blogs-events-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.event.index') }}"
                            class="nav-link {{ Route::is('admin.event.index') || Route::is('admin.event.create') || Route::is('admin.event.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Event
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.event.order.manage') }}"
                            class="nav-link {{ Route::is('admin.event.order.manage') || Route::is('event.order.details') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Event Participant
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.event.contact.index') }}"
                            class="nav-link {{ Route::is('admin.event.contact.index') || Route::is('admin.event.contact.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Event Comment
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('blog.manage_topic') }}"
                            class="nav-link {{ Route::is('blog.manage_topic') || Route::is('blog.create_topic') || Route::is('blog.edit_topic') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Topic
                        </a>
                    </li>

                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('blog.index') }}"
                            class="nav-link {{ Route::is('blog.index') || Route::is('blog.create') || Route::is('blog.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Blog
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('blog.comments') }}"
                            class="nav-link {{ Route::is('blog.comments') || Route::is('blog.comment_edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Blog Comments
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- subscriber --}}
        @php
            $is_active_subscriber = Route::is('admin.subscriber.index');
        @endphp
        <li class="nav-item {{ $is_active_subscriber ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.subscriber.index') }}">
                <i class="fa fa-heart menu-icon"></i>
                <span class="menu-title">Subscriber</span>
            </a>
        </li>

        {{-- user contact message --}}
        @php
            $is_active_contact = Route::is('user.contact.index');
        @endphp
        <li class="nav-item {{ $is_active_contact ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.contact.index') }}">
                <i class="fa fa-envelope menu-icon"></i>
                <span class="menu-title">User Contact Message</span>
            </a>
        </li>

        {{-- all notification --}}
        @php
            $is_active_notification = Route::is('admin.all.notification.index');
        @endphp
        <li class="nav-item {{ $is_active_notification ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.all.notification.index') }}">
                <i class="fa fa-bell menu-icon"></i>
                <span class="menu-title">Notificatioins</span>
            </a>
        </li>

        {{-- appearance --}}
        @php
            $is_active_appearance =
                Route::is('backend.theme-options') ||
                Route::is('backend.theme-options-header') ||
                Route::is('backend.theme-options-footer') ||
                Route::is('backend.theme-options-color') ||
                Route::is('backend.social-media') ||
                Route::is('backend.theme-options-seo') ||
                Route::is('backend.theme-options-social-login') ||
                Route::is('backend.custom-css') ||
                Route::is('backend.custom-html') ||
                Route::is('backend.custom-js') ||
                Route::is('backend.theme-options-google-map') ||
                Route::is('backend.theme-options-payment-gateway') ||
                Route::is('backend.home_content') ||
                Route::is('home-banner.create') ||
                Route::is('home-banner.index') ||
                Route::is('home-banner.edit') ||
                Route::is('admin.about_page') ||
                Route::is('admin.learner') ||
                Route::is('admin.instructor') ||
                Route::is('admin.library') ||
                Route::is('admin.manage_faq') ||
                Route::is('all-pages.index') ||
                Route::is('all-pages.create') ||
                Route::is('all-pages.edit');
        @endphp
        <li class="nav-item {{ $is_active_appearance ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#appearance-sidemenu" aria-expanded="false"
                aria-controls="appearance-sidemenu">
                <i class="fa fa-magic menu-icon"></i>
                <span class="menu-title">Appearance</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_appearance ? 'show' : '' }}" id="appearance-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        @php
                            $is_active_appearance_theme_option =
                                Route::is('backend.theme-options') ||
                                Route::is('backend.theme-options-header') ||
                                Route::is('backend.theme-options-footer') ||
                                Route::is('backend.theme-options-color') ||
                                Route::is('backend.social-media') ||
                                Route::is('backend.theme-options-seo') ||
                                Route::is('backend.theme-options-social-login') ||
                                Route::is('backend.custom-css') ||
                                Route::is('backend.custom-html') ||
                                Route::is('backend.custom-js') ||
                                Route::is('backend.theme-options-google-map') ||
                                Route::is('backend.theme-options-payment-gateway');
                        @endphp
                        <a href="{{ route('backend.theme-options') }}"
                            class="nav-link {{ $is_active_appearance_theme_option ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Theme option
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('backend.home_content') }}"
                            class="nav-link {{ Route::is('backend.home_content') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Home Content Setup
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('home-banner.index') }}"
                            class="nav-link {{ Route::is('home-banner.index') || Route::is('home-banner.create') || Route::is('home-banner.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Banner
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('all-pages.index') }}"
                            class="nav-link {{ Route::is('all-pages.index') || Route::is('all-pages.create') || Route::is('all-pages.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Pages
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        @php
                            $is_active_other_pages =
                                Route::is('admin.about_page') ||
                                Route::is('admin.learner') ||
                                Route::is('admin.instructor') ||
                                Route::is('admin.library') ||
                                Route::is('admin.manage_faq');
                        @endphp
                        <a href="{{ route('admin.about_page') }}"
                            class="nav-link {{ $is_active_other_pages ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Other Pages
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- landing page --}}
        @php
            $is_active_landing_page =
                Route::is('admin.landing_page.index') ||
                Route::is('admin.landing_page.create') ||
                Route::is('admin.landing_page.edit') ||
                Route::is('admin.landing_page.submitted_form_data');
        @endphp
        <li class="nav-item {{ $is_active_landing_page ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#landing-page-sidemenu" aria-expanded="false"
                aria-controls="landing-page-sidemenu">
                <i class="fa fa-magic menu-icon"></i>
                <span class="menu-title">Landing Page</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ $is_active_landing_page ? 'show' : '' }}" id="landing-page-sidemenu">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.landing_page.index') }}"
                            class="nav-link {{ Route::is('admin.landing_page.index') || Route::is('admin.landing_page.create') || Route::is('admin.landing_page.edit') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Pages
                        </a>
                    </li>
                    <li class="nav-item d-none d-lg-block">
                        <a href="{{ route('admin.landing_page.submitted_form_data') }}"
                            class="nav-link {{ Route::is('admin.landing_page.submitted_form_data') ? 'active' : '' }}">
                            <i class="fa fa-caret-right mr-2" aria-hidden="true"></i>
                            Manage Form Data
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- founder --}}
        @php
            $is_active_founder =
                Route::is('admin.founder.create') ||
                Route::is('admin.founder.edit') ||
                Route::is('admin.founder.index');
        @endphp
        <li class="nav-item {{ $is_active_founder ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('admin.founder.index') }}">
                <i class="fa fa-users menu-icon"></i>
                <span class="menu-title">Founders & Co-Founders</span>
            </a>
        </li>
    </ul>
</nav>
