<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ------ bootstrap css link-------------- -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('user.layouts.parts.header-link')
    @php
        // $site_setting = \App\Models\SiteSetting::first();
        $title = \App\Models\Tp_option::where('option_name', 'theme_option_header')->first();
    @endphp
    <title> {{ $title->company_name }} @yield('title')</title>

    @php
        $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
        $dataObj = json_decode($results->option_value);
    @endphp

    @if ($dataObj)
        <style>
            :root {
                --seller_background_color: {{ $dataObj->seller_background_color }};
                --seller_frontend_color: {{ $dataObj->seller_frontend_color }};
                --seller_text_color: {{ $dataObj->seller_text_color }};

                --button2_color: {{ $dataObj->button2_color }};
                --button2_hover_color: {{ $dataObj->button2_hover_color }};
                --button2_text_color: {{ $dataObj->button2_text_color }};
            }
        </style>
    @endif

    @yield('head')
    <style>
        .contentElement {
            width: 100%;
        }

        .contentElementItem {
            text-decoration: none;
            width: 100%;
            float: left;
            background: var(--button2_color);
            margin: 5px 0;
            padding: 10px;
            color: #fff;
            border-radius: 5px;
        }

        .contentElementItem:hover {
            background: var(--button2_hover_color);
            color: #fff;
        }

        .contentElementItem i {
            width: 30px;
            text-align: center;
        }
    </style>

    <style>
        .right_section {
            display: flex;
            justify-content: space-between;
        }

        .right_section h3 {
            font-family: "Nunito", sans-serif;
            color: var(--seller_text_color) !important;
            font-size: 28px;
            line-height: 33px;
            font-weight: 700;
        }

        .right_section p {
            color: #111 !important;
            font-family: "Nunito", sans-serif;
            font-weight: 400;
            font-size: 16px;
            line-height: 27px;
        }

        table tr {
            border-bottom: 1px solid #ccc;
            height: 50px;
            line-height: 2.5;
        }

        .edit_btn_view button {
            background: none;
            border: none;
            margin-right: -30px;
            margin-left: 20px;
        }

        .right_section img {
            height: 80px;
            width: 80px;
            border-radius: 50%;
            margin-right: 45px;
            border: 1px solid;
        }

        .imgBox {
            position: relative;
            height: 80px;
            width: 80px;
        }

        #ppBox {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            height: 100%;
            width: 100%;
            background: #ffffffcf;
            border-radius: 50%;
            opacity: .7;
            transition: .3s linear;
        }

        .imgBox:hover #ppBox {
            opacity: 1;
            transition: .3s linear;
        }

        #ppBox i {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font-size: 25px;
        }


        @media only screen and (max-width: 500px) {
            tr {
                display: flex;
                flex-wrap: wrap;
                height: auto !important;
                position: relative;
            }

            td:first-child {
                width: 100%;
                margin-bottom: -25px;
                font-weight: bold;
            }

            td:last-child {
                position: absolute;
                right: 0;
                bottom: 0;
            }

            .edit_btn_view {
                width: 120px;
                margin-top: -40px;
            }

            .cancel__btn {
                width: 40px;
            }

            .edit_view input {
                width: calc(100% - 20px);
            }

        }

        .edit_btn_view {
            float: left;
            margin-top: 10px;
        }

        .edit_btn_view a {
            text-decoration: none;
            background: #b9474c;
            width: 60px;
            padding: 5px;
            color: #fff !important;
            height: 30px;
            line-height: 1.3;
            margin-top: 0;
            float: left;
            border-radius: 50px;
            margin-right: -10px;
        }

        .edit_btn_view button {
            background: #1a6c60;
            width: 60px;
            padding: 5px;
            color: #fff !important;
            height: 30px;
            line-height: 1.3;
            margin-top: 0;
            float: left;
            border-radius: 50px;
            margin-right: -10px;
        }
    </style>
    <style>
        .passwodBox {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-top: 30px;
        }

        .passwodBox label {
            width: 40%;
            font-weight: bold;
        }

        .passwodBox input {
            width: calc(60% - 10px);
            border: 1px solid #1a6c60;
            padding: 5px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .passwodBox button {
            margin: 0 auto;
            display: block;
            padding: 5px 30px;
            border: none;
            background: #1a6c60;
            color: #fff;
            border-radius: 5px;
        }

        @media screen and (max-width: 700px) {
            .col-md-9 {
                width: calc(125% - 22px);
                padding: 10px;
            }
        }


        @media screen and (max-width: 450px) {
            .passwodBox label {
                width: 100%;
            }

            .passwodBox input {
                width: calc(100% - 10px);
                border: 1px solid #1a6c60;
                padding: 5px;
                margin-top: 10px;
            }
        }









        /* ############### 4.3 DataTables ############### */
        /* ---------------------------------------------- */
        table.dataTable {
            border: 1px solid #dee2e6;
            /* margin-bottom: 15px; */
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 0.75rem;
            border-bottom: 1px solid #dee2e6;
            position: relative;
        }

        table.dataTable thead th.sorting::after,
        table.dataTable thead th.sorting_asc::after,
        table.dataTable thead th.sorting_desc::after,
        table.dataTable thead td.sorting::after,
        table.dataTable thead td.sorting_asc::after,
        table.dataTable thead td.sorting_desc::after {
            /* content: "";
    border: 4px solid transparent;
    border-top-color: #ced4da;
    position: absolute;
    z-index: 10;
    top: 22px;
    right: 8px; */
        }

        table.dataTable thead th.sorting::before,
        table.dataTable thead th.sorting_asc::before,
        table.dataTable thead th.sorting_desc::before,
        table.dataTable thead td.sorting::before,
        table.dataTable thead td.sorting_asc::before,
        table.dataTable thead td.sorting_desc::before {
            /* content: "";
    border: 4px solid transparent;
    border-bottom-color: #ced4da;
    position: absolute;
    z-index: 10;
    top: 12px;
    right: 8px; */
        }

        table.dataTable thead th.sorting_asc::before,
        table.dataTable thead td.sorting_asc::before {
            border-bottom-color: #17a2b8;
        }

        table.dataTable thead th.sorting_desc::after,
        table.dataTable thead td.sorting_desc::after {
            border-top-color: #17a2b8;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 0.75rem;
        }

        table.dataTable.row-border tbody th,
        table.dataTable.row-border tbody td,
        table.dataTable.display tbody th,
        table.dataTable.display tbody td {
            border-top-color: #dee2e6;
        }

        table.dataTable.no-footer {
            border-bottom-color: #dee2e6;
        }

        .dataTables_length {
            padding-bottom: 10px;
        }

        .dataTables_length .select2-container {
            width: 60px;
            margin-left: 0;
            margin-right: 10px;
        }

        .dataTables_filter {
            padding-bottom: 10px;
            padding-right: 5px;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding-top: 0.54rem;
            padding-bottom: 0.54rem;
            background-color: #e9ecef;
            border-color: transparent;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button:focus {
            background-color: #ced4da;
            background-image: none;
            border-color: transparent;
            color: #343a40 !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:active {
            box-shadow: none;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.current:focus {
            background-color: #17a2b8 !important;
            background-image: none !important;
            border-color: transparent !important;
            color: #fff !important;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover,
        .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:focus {
            background-color: #e9ecef;
            color: #adb5bd !important;
        }

        /* ############### RTL SUPPORT ############### */
        .rtl table.dataTable thead th.sorting::after,
        .rtl table.dataTable thead th.sorting_asc::after,
        .rtl table.dataTable thead th.sorting_desc::after,
        .rtl table.dataTable thead td.sorting::after,
        .rtl table.dataTable thead td.sorting_asc::after,
        .rtl table.dataTable thead td.sorting_desc::after {
            right: auto;
            left: 8px;
        }

        .rtl table.dataTable thead th.sorting::before,
        .rtl table.dataTable thead th.sorting_asc::before,
        .rtl table.dataTable thead th.sorting_desc::before,
        .rtl table.dataTable thead td.sorting::before,
        .rtl table.dataTable thead td.sorting_asc::before,
        .rtl table.dataTable thead td.sorting_desc::before {
            right: auto;
            left: 8px;
        }

        .rtl .dataTables_length .select2-container {
            margin-right: 0;
            margin-left: 10px;
        }

        .rtl .dataTables_filter {
            padding-right: 0;
            padding-left: 5px;
        }

        /* ---------------------------------------- */
    </style>
</head>

<body>
    <div class="dataDiv">
        <br>
        <br>
        <br>

        <section class="" id="secondSection" style="margin-top: 4rem">
            <div class="container">
                <div class="row" style="width: 105%;margin: 0;">
                    @include('user.layouts.parts.user_sidebar')

                    <div class="col-md-9">
                        @yield('main_content')
                    </div>
                </div>
            </div>

        </section>

    </div>


    @include('Frontend.layouts.master-layout');

    <!-- --------------- script link ---------------->

    @include('user.layouts.parts.scripts')
    <script>
        $('.edit_el').on('click', function(e) {
            event.preventDefault();
            $(this).parent().parent().find('.normal_btn_view').addClass('d-none');
            $(this).parent().parent().find('.edit_btn_view').removeClass('d-none');
            $(this).parent().parent().parent().find('.normal_view').addClass('d-none');
            $(this).parent().parent().parent().find('.edit_view').removeClass('d-none');
        });
    </script>



    {{-- @yield('script') --}}
</body>

</html>
