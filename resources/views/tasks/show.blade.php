@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/../assets/css/app.css" />

    <link rel="stylesheet" href="/../assets/extensions/flatpickr/flatpickr.min.css" />

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
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="readonlyInput">Task Name</label>
                                                <input type="text" class="form-control" id="readonlyInput"
                                                       readonly="readonly" value="{{ $task->task_name }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="readonlyInput">Status</label>
                                                <input type="text" class="form-control" id="readonlyInput"
                                                       readonly="readonly" value="{{ $task->status }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="readonlyInput">Started</label>
                                                <input type="text" class="form-control" id="readonlyInput"
                                                       readonly="readonly" value="{{ $task->started }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="readonlyInput">Deadline</label>
                                                <input type="text" class="form-control" id="readonlyInput"
                                                       readonly="readonly" value="{{ $task->deadline }}" />
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" placeholder="Description" name="description" rows="3" readonly="readonly">{{ $task->description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
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
    <script src="/../assets/js/date-picker.js"></script>
    <script src="/../assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js"></script>

    <script src="/../assets/js/app.js"></script>
@endsection
