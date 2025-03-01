<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Success</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    @php
        $results = \App\Models\Tp_option::where('option_name', 'theme_color')->first();
        $dataObj = json_decode($results->option_value);
    @endphp
    <style>
        :root {
            --primary_background: {{ $dataObj->primary_background ?? '#25497E' }};
            --secondary_background: {{ $dataObj->secondary_background ?? '#ee8e1c' }};
            --tertiary_background: {{ $dataObj->tertiary_background ?? '#ee8e1c' }};

            --button_primary_bg: {{ $dataObj->button_primary_bg ?? '#25497E' }};
            --button_primary_hover_bg: {{ $dataObj->button_primary_hover_bg ?? '#122643' }};
            --button_secondary_bg: {{ $dataObj->button_secondary_bg ?? '#ee8e1c' }};
            --button_secondary_hover_bg: {{ $dataObj->button_secondary_hover_bg ?? '#c26d07' }};
            --button_tertiary_bg: {{ $dataObj->button_tertiary_bg ?? '#ee8e1c' }};
            --button_tertiary_hover_bg: {{ $dataObj->button_tertiary_hover_bg ?? '#c26d07' }};
        }

        .btn-primary-bg {
            background-color: var(--button_primary_bg) !important;
            color: white !important;
            font-family: 'DM Sans', sans-serif !important;
        }

        .btn-primary-bg:hover {
            background-color: var(--button_primary_hover_bg) !important;
        }

        .btn-secondary-bg {
            background-color: var(--button_secondary_bg) !important;
            color: white !important;
            font-family: 'DM Sans', sans-serif !important;
        }

        .btn-secondary-bg:hover {
            background-color: var(--button_secondary_hover_bg) !important;
        }

        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        Application Has Submitted
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('upload/icons/correct.png') }}" alt="" width="100">
                        </div>
                        <h2 class="text-center text-success mt-4 fw-bold">Congratulations!</h2>
                        <h5 class="text-center text-dark mt-2 fw-bold">Application ID: {{ $application->application_code }}</h5>
                        <br>
                        <h5 class="text-center text-dark mt-2 fw-bold">Account Details</h5>
                        <h6 class="text-center text-dark mt-2 fw-bold">Email: {{ $application->email }}</h6>
                        <h6 class="text-center text-dark mt-2 fw-bold">Password: {{ $application->application_code }}</h6>
                        <div class="alert alert-success text-center mt-3" role="alert">
                            Your application has been successfully submitted. Please wait, we will respond as soon as
                            possible. Thank you.
                        </div>
                    </div>
                    <div class="card-footer text-center d-md-flex justify-content-md-between">
                        <a href="{{ route('frontend.application-form-download', ['id' => $application->id]) }}"
                            class="btn btn-secondary-bg mt-2 mt-md-0">
                            Download Application
                        </a>
                        <a href="{{ route('frontend.apply_now', ['partner_ref_id' => session('partner_ref_id') ?? request()->query('partner_ref_id')]) }}"
                            class="btn btn-primary-bg mt-2 mt-md-0">
                            Apply For New
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
