<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="_token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('backend/assets/images/favicon.png') }}" />

    <title>{{ env('APP_NAME') }} | {{ $page->title }}</title>

    <link
        href="{{ asset('frontend') }}/application/modules/frontend/views/themes/default/assets/plugins/bootstrap/css/bootstrap.min.css"
        rel="stylesheet">

    @php
        $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
        $dataObj = json_decode($results->option_value);
    @endphp
    @if ($dataObj)
        <style>
            :root {
                --primary_background: {{ $dataObj->primary_background ?? '#25497E' }};
                --secondary_background: {{ $dataObj->secondary_background ?? '#00a5df' }};
                --tertiary_background: {{ $dataObj->tertiary_background ?? '#e40046' }};

                --button_primary_bg: {{ $dataObj->button_primary_bg ?? '#25497E' }};
                --button_primary_hover_bg: {{ $dataObj->button_primary_hover_bg ?? '#122643' }};
                --button_secondary_bg: {{ $dataObj->button_secondary_bg ?? '#00a5df' }};
                --button_secondary_hover_bg: {{ $dataObj->button_secondary_hover_bg ?? '#0077a1' }};
                --button_tertiary_bg: {{ $dataObj->button_tertiary_bg ?? '#e40046' }};
                --button_tertiary_hover_bg: {{ $dataObj->button_tertiary_hover_bg ?? '#c2003b' }};
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
    @endif

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap');

        body,
        p,
        a,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        span,
        div,
        ul,
        li,
        table,
        th,
        td,
        input,
        button,
        select,
        textarea,
        label {
            font-family: 'DM Sans', sans-serif;
        }

        img {
            border-radius: 6px;
        }

        .font-weight-bold {
            font-weight: bold;
        }

        /* Toast */
        .jq-toast-wrap .jq-icon-success {
            background-color: #04b76b;
        }

        .jq-toast-wrap .jq-icon-info {
            background-color: #0b94f7;
        }

        .jq-toast-wrap .jq-icon-warning {
            background-color: #f5a623;
        }

        .jq-toast-wrap .jq-icon-error {
            background-color: #ff5e6d;
        }

        .jq-toast-wrap,
        .jq-toast-wrap * {
            margin: 0;
            padding: 0;
        }

        .jq-toast-wrap {
            display: block;
            position: fixed;
            width: 250px;
            pointer-events: none !important;
            letter-spacing: normal;
            z-index: 9000 !important;
        }

        .jq-toast-wrap.bottom-left {
            bottom: 20px;
            left: 20px;
        }

        .jq-toast-wrap.bottom-right {
            bottom: 20px;
            right: 40px;
        }

        .jq-toast-wrap.top-left {
            top: 20px;
            left: 20px;
        }

        .jq-toast-wrap.top-right {
            top: 20px;
            right: 40px;
        }

        .jq-toast-single {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 0 0 5px;
            border-radius: 4px;
            font-size: 12px;
            font-family: arial, sans-serif;
            line-height: 17px;
            position: relative;
            pointer-events: all !important;
            background-color: #444;
            color: #fff;
        }

        .jq-toast-single h2 {
            font-family: arial, sans-serif;
            font-size: 14px;
            margin: 0 0 7px;
            background: 0 0;
            color: inherit;
            line-height: inherit;
            letter-spacing: normal;
        }

        .jq-toast-single a {
            color: #eee;
            text-decoration: none;
            font-weight: 700;
            border-bottom: 1px solid #fff;
            padding-bottom: 3px;
            font-size: 12px;
        }

        .jq-toast-single ul {
            margin: 0 0 0 15px;
            background: 0 0;
            padding: 0;
        }

        .jq-toast-single ul li {
            list-style-type: disc !important;
            line-height: 17px;
            background: 0 0;
            margin: 0;
            padding: 0;
            letter-spacing: normal;
        }

        .close-jq-toast-single {
            position: absolute;
            top: 3px;
            right: 7px;
            font-size: 14px;
            cursor: pointer;
        }

        .jq-toast-loader {
            display: block;
            position: absolute;
            top: -2px;
            height: 5px;
            width: 0;
            left: 0;
            border-radius: 5px;
            background: red;
        }

        .jq-toast-loaded {
            width: 100%;
        }

        .jq-has-icon {
            padding: 10px 10px 10px 50px;
            background-repeat: no-repeat;
            background-position: 10px;
        }

        .jq-icon-info {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGwSURBVEhLtZa9SgNBEMc9sUxxRcoUKSzSWIhXpFMhhYWFhaBg4yPYiWCXZxBLERsLRS3EQkEfwCKdjWJAwSKCgoKCcudv4O5YLrt7EzgXhiU3/4+b2ckmwVjJSpKkQ6wAi4gwhT+z3wRBcEz0yjSseUTrcRyfsHsXmD0AmbHOC9Ii8VImnuXBPglHpQ5wwSVM7sNnTG7Za4JwDdCjxyAiH3nyA2mtaTJufiDZ5dCaqlItILh1NHatfN5skvjx9Z38m69CgzuXmZgVrPIGE763Jx9qKsRozWYw6xOHdER+nn2KkO+Bb+UV5CBN6WC6QtBgbRVozrahAbmm6HtUsgtPC19tFdxXZYBOfkbmFJ1VaHA1VAHjd0pp70oTZzvR+EVrx2Ygfdsq6eu55BHYR8hlcki+n+kERUFG8BrA0BwjeAv2M8WLQBtcy+SD6fNsmnB3AlBLrgTtVW1c2QN4bVWLATaIS60J2Du5y1TiJgjSBvFVZgTmwCU+dAZFoPxGEEs8nyHC9Bwe2GvEJv2WXZb0vjdyFT4Cxk3e/kIqlOGoVLwwPevpYHT+00T+hWwXDf4AJAOUqWcDhbwAAAAASUVORK5CYII=);
            background-color: #31708f;
            color: #d9edf7;
            border-color: #bce8f1;
        }

        .jq-icon-warning {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAGYSURBVEhL5ZSvTsNQFMbXZGICMYGYmJhAQIJAICYQPAACiSDB8AiICQQJT4CqQEwgJvYASAQCiZiYmJhAIBATCARJy+9rTsldd8sKu1M0+dLb057v6/lbq/2rK0mS/TRNj9cWNAKPYIJII7gIxCcQ51cvqID+GIEX8ASG4B1bK5gIZFeQfoJdEXOfgX4QAQg7kH2A65yQ87lyxb27sggkAzAuFhbbg1K2kgCkB1bVwyIR9m2L7PRPIhDUIXgGtyKw575yz3lTNs6X4JXnjV+LKM/m3MydnTbtOKIjtz6VhCBq4vSm3ncdrD2lk0VgUXSVKjVDJXJzijW1RQdsU7F77He8u68koNZTz8Oz5yGa6J3H3lZ0xYgXBK2QymlWWA+RWnYhskLBv2vmE+hBMCtbA7KX5drWyRT/2JsqZ2IvfB9Y4bWDNMFbJRFmC9E74SoS0CqulwjkC0+5bpcV1CZ8NMej4pjy0U+doDQsGyo1hzVJttIjhQ7GnBtRFN1UarUlH8F3xict+HY07rEzoUGPlWcjRFRr4/gChZgc3ZL2d8oAAAAASUVORK5CYII=);
            background-color: #8a6d3b;
            color: #fcf8e3;
            border-color: #faebcc;
        }

        .jq-icon-error {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAHOSURBVEhLrZa/SgNBEMZzh0WKCClSCKaIYOED+AAKeQQLG8HWztLCImBrYadgIdY+gIKNYkBFSwu7CAoqCgkkoGBI/E28PdbLZmeDLgzZzcx83/zZ2SSXC1j9fr+I1Hq93g2yxH4iwM1vkoBWAdxCmpzTxfkN2RcyZNaHFIkSo10+8kgxkXIURV5HGxTmFuc75B2RfQkpxHG8aAgaAFa0tAHqYFfQ7Iwe2yhODk8+J4C7yAoRTWI3w/4klGRgR4lO7Rpn9+gvMyWp+uxFh8+H+ARlgN1nJuJuQAYvNkEnwGFck18Er4q3egEc/oO+mhLdKgRyhdNFiacC0rlOCbhNVz4H9FnAYgDBvU3QIioZlJFLJtsoHYRDfiZoUyIxqCtRpVlANq0EU4dApjrtgezPFad5S19Wgjkc0hNVnuF4HjVA6C7QrSIbylB+oZe3aHgBsqlNqKYH48jXyJKMuAbiyVJ8KzaB3eRc0pg9VwQ4niFryI68qiOi3AbjwdsfnAtk0bCjTLJKr6mrD9g8iq/S/B81hguOMlQTnVyG40wAcjnmgsCNESDrjme7wfftP4P7SP4N3CJZdvzoNyGq2c/HWOXJGsvVg+RA/k2MC/wN6I2YA2Pt8GkAAAAASUVORK5CYII=);
            background-color: #a94442;
            color: #f2dede;
            border-color: #ebccd1;
        }

        .jq-icon-success {
            background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAADsSURBVEhLY2AYBfQMgf///3P8+/evAIgvA/FsIF+BavYDDWMBGroaSMMBiE8VC7AZDrIFaMFnii3AZTjUgsUUWUDA8OdAH6iQbQEhw4HyGsPEcKBXBIC4ARhex4G4BsjmweU1soIFaGg/WtoFZRIZdEvIMhxkCCjXIVsATV6gFGACs4Rsw0EGgIIH3QJYJgHSARQZDrWAB+jawzgs+Q2UO49D7jnRSRGoEFRILcdmEMWGI0cm0JJ2QpYA1RDvcmzJEWhABhD/pqrL0S0CWuABKgnRki9lLseS7g2AlqwHWQSKH4oKLrILpRGhEQCw2LiRUIa4lwAAAABJRU5ErkJggg==);
            color: #dff0d8;
            background-color: #3c763d;
            border-color: #d6e9c6;
        }
    </style>
</head>

<body>
    <div class="container p-5">
        <div>
            {!! $page->content !!}
        </div>

        @if ($page->form_show == 'on')
            <div class="row mt-5">
                <div class="col-md-8 m-auto grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div id="form-container">
                                <div class="p-3 rounded">
                                    <h5 style="font-size: 1.25rem; font-weight:600;" class="text-center mb-4">
                                        Submit a request
                                    </h5>

                                    <form action="{{ route('landing_page.form.submti') }}" method="POST">
                                        @csrf

                                        <div class="row">
                                            <div class="form-group col-md-6 mt-3">
                                                <label for="name">
                                                    Name
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Enter Name" required>
                                            </div>
                                            <div class="form-group col-md-6 mt-3">
                                                <label for="contact">
                                                    Contact No.
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <input type="text" class="form-control" id="contact" name="contact"
                                                    placeholder="Enter Phone or Email" required>
                                            </div>
                                            <div class="form-group col-md-12">
                                                <label for="education">
                                                    Academic details (SSC/HSC GPA, Passing Year, IELTS Score etc.)
                                                    <span class="text-danger">*</span>
                                                </label>
                                                <textarea type="text" class="form-control" id="education" name="education" rows="3"
                                                    placeholder="Enter details like SSC GPA: 3.5, SSC Year: 2014, HSC GPA: 4.5, HSC Year: 2016, IELTS Score: 8.0"
                                                    required></textarea>
                                            </div>
                                            <div class="form-group col-md-12 mt-3">
                                                <label for="message">Message</label>
                                                <textarea type="text" class="form-control" id="message" name="message" rows="5"
                                                    placeholder="Write your message..."></textarea>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-12 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary-bg">Submit</button>
                                            </div>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('Backend.components.script')
        @endif
    </div>
</body>

</html>
