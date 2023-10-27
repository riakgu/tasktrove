@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="assets/extensions/flatpickr/flatpickr.min.css" />

@endsection

@section('content')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                    </div>

                </div>
            </div>

            <!-- // Basic multiple Column Form section start -->
            <section id="multiple-column-form">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form action="add-task.html" method="post" class="form">

                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="task_name">Task Name</label>
                                                    <input type="text"
                                                           class="form-control "
                                                           placeholder="Task Name" name="task_name"
                                                           value="" />
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="last-name-column">Status</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="status">Options</label>
                                                    <select class="form-select "
                                                            name="status">
                                                        <option selected value="">Choose...</option>
                                                        <option value="1">To Do</option>
                                                        <option value="2">In Progress</option>
                                                        <option value="3">Done</option>
                                                    </select>
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="started">Started</label>
                                                    <input type="date"
                                                           class="form-control flatpickr-no-config "
                                                           placeholder="Select date.." name="started"
                                                           value="" />
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="deadline">Deadline</label>
                                                    <input type="date"
                                                           class="form-control flatpickr-no-config "
                                                           placeholder="Select date.." name="deadline"
                                                           value="" />
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control " placeholder="Description" name="description"
                                                              rows="3"></textarea>
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mt-3 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-light-secondary me-1 mb-1">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- // Basic multiple Column Form section end -->
        </div>

    </div>

@endsection

@section('script')
    <script src="assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="assets/js/app.js"></script>

    <script src="assets/extensions/flatpickr/flatpickr.min.js"></script>
    <script src="assets/js/date-picker.js"></script>
@endsection
