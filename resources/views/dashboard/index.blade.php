@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css" />

    <link rel="stylesheet" href="assets/css/table-datatable.css" /
@endsection

@section('content')
    <div id="main-content">

        <div class="page-heading">
            <h3>{{ $title }}</h3>
        </div>
        <div class="page-heading">

            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Profile Views</h6>
                                            <h3 class="font-extrabold mb-0">112.000</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6 col-md-12">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Total Task</h6>
                                            <h3 class="font-extrabold mb-0">{{  $total_task  }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4>Deadline Today</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="table1">
                            <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Description</th>
                                <th>Started</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->task_name }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->started }}</td>
                                    <td>{{ $task->deadline }}</td>
                                    @if ($task->status == '1')
                                        <td>
                                            <span class="badge bg-secondary">To Do</span>
                                        </td>
                                    @elseif($task->status == '2')
                                        <td>
                                            <span class="badge bg-info">In Progress</span>
                                        </td>
                                    @elseif($task->status == '3')
                                        <td>
                                            <span class="badge bg-success">Done</span>
                                        </td>
                                    @endif
                                    <td>
                                        <a href="show-task.html" class="btn icon btn-success"
                                        ><i class="bi bi-eye"></i
                                            ></a>
                                        <a href="edit-task.html" class="btn icon btn-primary"
                                        ><i class="bi bi-pencil"></i
                                            ></a>
                                        <a href="#" class="btn icon btn-danger"
                                        ><i class="bi bi-trash"></i
                                            ></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </section>
        </div>

    </div>
@endsection

@section('script')
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/js/simple-datatables.js"></script>
@endsection
