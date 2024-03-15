@extends('layouts.master')

@section('styles')
<style>

.btn-primary {
    color: #fff !important;
    background: green !important;
    border-color: green !important;
}

.btn-primary:hover {
    color: #fff !important;
    background: green !important;
    border-color: green !important;
}

p.text-sm.text-gray-700.leading-5 {
    margin-top: 10px;
}
</style>
@endsection

@section('content')
<!-- PAGE-HEADER -->
<!-- Button trigger modal -->
<div class="page-header d-flex align-items-center justify-content-between border-bottom mb-4">
    <h1 class="page-title">Dashboard</h1>
    <div>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->
<!-- CONTAINER -->
<div class="main-container container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div>
                    <button style="padding: 10px 20px; margin: 10px;" data-bs-toggle="modal" data-bs-target="#nodepopup"
                        class="btn btn-primary" id="nodebtn">
                        <i class="fa fa-plus fa-lg" aria-hidden="true"></i> Add Certificate
                    </button>
                </div>
                <div class="card-body pt-4">
                    <div class="grid-margin">
                        <div class="mb-3">
                            <input type="text" id="searchInput" class="form-control" placeholder="Search...">
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered text-nowrap mb-0">
                                <thead class="border-top">
                                    <tr>
                                        <!-- <th class="border-bottom-0">Sr. No.</th> -->
                                        <th class="border-bottom-0">Template</th>
                                        <th class="border-bottom-0">Student ID</th>
                                        <th class="border-bottom-0">Full Name</th>
                                        <th class="border-bottom-0">Issue Date</th>
                                        <!-- <th class="border-bottom-0">Picture</th> -->
                                        <th class="border-bottom-0">Instructor Name</th>
                                        <th class="border-bottom-0">Back Text</th>
                                        <th class="border-bottom-0">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="certificatesBody">
                                    @if ($certificates && count($certificates ?? []) > 0)
                                    @foreach ($certificates as $certificate)
                                    <tr>
                                        <!-- <td>{{ $loop->iteration }}</td> -->
                                        <td>{{ $certificate->template }}</td>
                                        <td>{{ $certificate->student_id }}</td>
                                        <td>{{ $certificate->full_name }}</td>
                                        <td>{{ $certificate->issue_date }}</td>
                                        <td>{{ $certificate->instructor_name }}</td>
                                        <td style="white-space: wrap; text-overflow:ellipsis;">
                                            {{ $certificate->back_text }}</td>
                                        <td>
                                            <button type="button" onclick="downloadr(<?= $certificate->id; ?>)"
                                                class="btn btn-primary download-pdf ">Print
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <p id="noDataMessage" class="text-muted text-center mt-3" style="display: none;">No data
                                found</p>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-end mt-3">
                            {{ $certificates->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CONTAINER END -->
    @endsection

    <!-- node popup -->

    @section('modals')


    <div class="modal fade" id="nodepopup" tabindex="-1" aria-labelledby="nodePopupLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="nodePopupLabel">Add Certificate</h6>
                    <div>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body px-4">
                    <form id="nodeForm" action="{{ route('postCertificate') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="number" class="form-label">Template<span class="text-danger">*</span></label>
                            <select required class="form-select" id="template" name="template">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="student_id" class="form-label">Student ID<span
                                    class="text-danger">*</span></label>
                            <input required type="text" class="form-control" id="studentID" name="student_id"
                                placeholder="Enter Student ID">
                        </div>
                        <div class="mb-3">
                            <label for="nodePort" class="form-label">Full Name<span class="text-danger">*</span></label>
                            <input required type="text" class="form-control" id="nodePort" name="full_name"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Start Date<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input required type="text" class="form-control" id="startDate" name="start_date"
                                    placeholder="Enter Start Date">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">End Date<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input required type="text" class="form-control" id="endDate" name="end_date"
                                    placeholder="Enter End Date">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="course_code" class="form-label">Course Code<span
                                    class="text-danger">*</span></label>
                            <input required type="text" class="form-control" id="courseCode" name="course_code"
                                placeholder="Enter Course Code">
                        </div>
                        <div class="mb-3">
                            <label for="issue_date" class="form-label">Issue Date<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input required type="text" class="form-control" id="issueDate" name="issue_date"
                                    placeholder="Enter Issue Date">
                                <span class="input-group-text">
                                    <i class="bi bi-calendar"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="instructor_name" class="form-label">Instructor Name<span
                                    class="text-danger">*</span></label>
                            <input required type="text" class="form-control" id="nodePort" name="instructor_name"
                                placeholder="Enter Instructor Name">
                        </div>
                        <div class="mb-3">
                            <label for="pictureUpload" class="form-label">Upload Picture<span
                                    class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="file" class="form-control" id="pictureUpload" name="picture"
                                    accept=".png, .jpg, .jpeg">
                                <span class="input-group-text">
                                    <i class="bi bi-upload"></i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="back_text" class="form-label">Back Text<span
                                    class="text-danger">*</span></label>
                            <textarea required type="text" class="form-control" id="nodePort" name="back_text"
                                placeholder="Enter Instructor Name"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light closeModalBtns" id=""
                                data-bs-dismiss="modal">Cancel
                            </button>
                            <button type="submit" class="btn btn-primary" id="sbn">Save & Generate PDF</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    @endsection
    <!-- end node popup -->
    @section('scripts')
    <script src="{{ asset('build/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@10" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>


    <script>
    $(document).ready(function() {
        $('#issueDate, #startDate, #endDate').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    });
    $(document).on('click', '#sbn', function() {
        var formValid = true;
        $('#nodeForm input[required], #nodeForm textarea[required], #nodeForm input[type="file"][required]')
            .each(function() {
                var inputValue = $(this).val();
                if ($(this).attr('type') === 'file') {
                    if (!$(this).prop('files') || $(this).prop('files').length === 0) {
                        formValid = false;
                        Swal.fire({
                            title: 'Please select a file for the image upload',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        return false;
                    }
                } else {
                    if (inputValue === "") {
                        formValid = false;
                        Swal.fire({
                            title: 'Please fill out all the required fields',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                        return false;
                    }
                }
            });
        if (formValid) {
            $('#nodepopup').modal('hide');
            $('#nodepopup').on('hidden.bs.modal', function() {
                Swal.fire({
                    title: 'Certificate created successfully',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 10000,
                    timerProgressBar: true,
                }).then((result) => {
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                });
            });
        }
    });

    function downloadr(id) {
        $.ajax({
            type: 'GET',
            url: "/generate-pdf/" + id,
            xhrFields: {
                responseType: 'blob'
            },
            success: function(response) {
                var blob = new Blob([response], {
                    type: 'application/pdf'
                });
                saveAs(blob, "certificate.pdf");
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    }
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#certificatesBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    $(document).ready(function() {
        $('#searchInput').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('#certificatesBody tr').filter(function() {
                var isVisible = $(this).text().toLowerCase().indexOf(value) > -1;
                $(this).toggle(isVisible);
            });
            var anyVisibleRows = $('#certificatesBody tr:visible').length > 0;
            $('#noDataMessage').toggle(!anyVisibleRows);
        });
    });
    </script>
    @endsection