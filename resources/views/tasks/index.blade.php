@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css" />

    <link rel="stylesheet" href="assets/css/table-datatable.css" />
@endsection

@section('content')
    div id="main-content">

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 mb-4 order-md-1 order-last">
                    <h3>Tasks</h3>
                </div>
            </div>

            <div class="col-12 col-md-6 mb-4 order-md-1 order-last">
                <a href="#" class="btn icon icon-left btn-secondary"><i data-feather="edit"></i> Add Task</a>
            </div>

        </div>
        <section class="section">
            <div class="card">
                <!-- <div class="card-header">
                    <h4>Task List</h4>
                </div>
                 -->
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
                        <tr>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->description }}</td>
                            <td>{{ $task->started }}</td>
                            <td>{{ $task->deadline }}</td>
                            <td>
                                <span class="badge bg-danger">Danger</span>
                            </td>

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
