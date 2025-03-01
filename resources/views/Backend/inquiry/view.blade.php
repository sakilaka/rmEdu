<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.components.head')
    <title>{{ env('APP_NAME') }} | View Inquiry - {{ strtoupper($inquiry['unique_inquiry_code']) }}</title>

    <style>
        .card label {
            font-weight: bold;
        }

        .card p,
        .card label {
            font-size: 1rem !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('Backend.components.navbar')

        <div class="container-fluid page-body-wrapper">
            @include('Backend.components.sidebar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            View Inquiry - {{ strtoupper($inquiry['unique_inquiry_code']) }}
                        </h3>

                        <nav aria-label="breadcrumb">
                            <a href="{{ route('admin.inquiry.index') }}" target="_blank" class="btn btn-primary btn-fw">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                View All Inquiry</a>
                        </nav>
                    </div>

                    <div class="card">
                        <div class="row p-4">

                            <!-- Full Name Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <p class="form-control-static">{{ $inquiry['name'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Date of Birth Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <p class="form-control-static">{{ $inquiry['date_of_birth'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Email Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <p class="form-control-static">{{ $inquiry['email'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Phone Number Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <p class="form-control-static">{{ $inquiry['mobile'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Country Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Country</label>
                                    <p class="form-control-static">
                                        @if (isset($inquiry['country']) && is_array(json_decode($inquiry['country'], true)))
                                            @foreach (json_decode($inquiry['country'], true) as $countryId)
                                                {{ $inquiry->getCountry($countryId) ?? 'N/A' }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        @else
                                            N/A
                                        @endif
                                    </p>
                                </div>
                            </div>

                            <!-- Applying Degree Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Applying Degree</label>
                                    <p class="form-control-static">{{ $inquiry['applying_degree'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- Subject Display -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>Subject</label>
                                    <p class="form-control-static">{{ $inquiry['subject'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <!-- University Field -->
                            <div class="col-12 col-md-6 mt-2">
                                <div class="form-group">
                                    <label>University</label>
                                    <p class="form-control-static">{{ $inquiry['university'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="col-12 mt-4 d-flex justify-content-between">
                                <div>
                                    <h5 class="fw-bold">Educational Informations</h5>
                                </div>
                            </div>

                            <!-- Education Details Table -->
                            <div class="col-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Degree</th>
                                            <th>GPA/CGPA</th>
                                            <th>Year/Session</th>
                                            <th>Institution</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse (old('education_details', json_decode($inquiry['education_details'], true) ?? []) as $index => $education)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $education['name'] ?? 'N/A' }}</td>
                                                <td>{{ $education['gpa'] ?? 'N/A' }}</td>
                                                <td>{{ $education['year'] ?? 'N/A' }}</td>
                                                <td>{{ $education['institution'] ?? 'N/A' }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">No education details available.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-12 col-md-3 mt-4">
                                <label>Available Documents</label>
                                @php
                                    $available_docs = json_decode($inquiry['documents'], true);
                                    $doc_names = [];

                                    if (!empty($available_docs)) {
                                        foreach ($available_docs as $key => $doc) {
                                            if ($doc) {
                                                $doc_names[] = ucfirst(str_replace('-', ' ', $key));
                                            }
                                        }
                                    }
                                @endphp

                                @if (!empty($doc_names))
                                    <p>{!! implode(',<br>', $doc_names) !!}</p>
                                @else
                                    <p>No documents available.</p>
                                @endif
                            </div>
                            <div class="col-12 col-md-3 mt-4">
                                @php
                                    $available_docs_input = json_decode($inquiry['documents_input'], true);
                                @endphp

                                @if (!empty($available_docs_input))
                                <label>Available Documents Score</label>
                                    @foreach ($available_docs_input as $key => $input)
                                        <p class="mb-0">
                                            <span>{{ strtoupper(str_replace('-', ' ', $key)) }}</span>
                                            :
                                            <span>{{ $input }}</span>
                                        </p>
                                    @endforeach
                                @endif
                            </div>

                            <div class="col-12 col-md-6">
                                <!-- Program -->
                                <div class="mt-4">
                                    <div class="form-group">
                                        <label for="program">Program</label>
                                        <p>{{ $inquiry['program'] ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Budget -->
                                <div class="mt-2">
                                    <div class="form-group">
                                        <label for="budget">Budget</label>
                                        <p>{{ $inquiry['budget'] ?? 'N/A' }}</p>
                                    </div>
                                </div>

                                <!-- Interest -->
                                <div class="mt-2">
                                    <div class="form-group">
                                        <label for="interest">Interest</label>
                                        <p>{{ $inquiry['interest'] ?? 'N/A' }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-2">
                                <!-- Counselor Name -->
                                <div class="form-group">
                                    <label for="counselor-name">Counselor Name</label>
                                    <p>{{ $inquiry['counselor_name'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-2">
                                <!-- Reference -->
                                <div class="form-group">
                                    <label for="reference">Reference</label>
                                    <p>{{ $inquiry['reference'] ?? 'N/A' }}</p>
                                </div>
                            </div>

                            <div class="col-12 col-md-4 mt-2">
                                <!-- Note -->
                                <div class="form-group">
                                    <label for="note">Note</label>
                                    <p>{{ $inquiry['note'] ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include('Backend.components.footer')
            </div>
        </div>
    </div>

    @include('Backend.components.script')
</body>

</html>
