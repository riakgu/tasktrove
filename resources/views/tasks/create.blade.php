@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/../assets/css/app.css" />
    <link rel="stylesheet" href="/../assets/extensions/flatpickr/flatpickr.min.css" />
    <link rel="stylesheet" href="/../assets/extensions/sweetalert2/sweetalert2.min.css" />

@endsection

@section('content')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4 order-md-1 order-last">
                        <h3>{{ $title }}</h3>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/dashboard">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ $title }}
                                </li>
                            </ol>
                        </nav>
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
                                    <form action="/tasks" method="post" class="form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="task_name">Task Name</label>
                                                    <input type="text"
                                                           class="form-control @error('task_name') is-invalid @enderror"
                                                           placeholder="Task Name" name="task_name"
                                                           value="{{ old('task_name') }}" />
                                                    @error('task_name')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <label for="last-name-column">Status</label>
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="status">Options</label>
                                                    <select class="form-select @error('status') is-invalid @enderror"
                                                            name="status">
                                                        <option selected value="{{ old('status') }}">Choose...</option>
                                                        <option value="1">One</option>
                                                        <option value="2">Two</option>
                                                        <option value="3">Three</option>
                                                    </select>
                                                    @error('status')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="started">Started</label>
                                                    <input type="date"
                                                           class="form-control flatpickr-no-config @error('started') is-invalid @enderror"
                                                           placeholder="Select date.." name="started"
                                                           value="{{ old('started') }}" />
                                                    @error('started')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="deadline">Deadline</label>
                                                    <input type="date"
                                                           class="form-control flatpickr-no-config @error('deadline') is-invalid @enderror"
                                                           placeholder="Select date.." name="deadline"
                                                           value="{{ old('deadline') }}" />
                                                    @error('deadline')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description"
                                                              rows="3">{{ old('description') }}</textarea>
                                                    @error('description')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
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
    <script src="/../assets/extensions/flatpickr/flatpickr.min.js"></script>
    <script src="/../assets/js/date-picker.js"></script
    <script src="/../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/../assets/js/app.js"></script>
@endsection