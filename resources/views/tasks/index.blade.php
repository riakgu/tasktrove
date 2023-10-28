@extends('layouts.main')

@section('style')
    <link rel="stylesheet" href="/../assets/extensions/simple-datatables/style.css" />

    <link rel="stylesheet" href="/../assets/css/table-datatable.css" />
@endsection

@section('content')
    <div id="main-content">

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 mb-4 order-md-1 order-last">
                        <h3>Tasks</h3>
                    </div>
                </div>

{{--                <div class="col-12 col-md-6 mb-4 order-md-1 order-last">--}}
{{--                    <a href="#" class="btn icon icon-left btn-secondary"><i data-feather="edit"></i> Add Task</a>--}}
{{--                </div>--}}

            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Task List</h4>
                        <button type="button" class="btn btn-secondary me-1 mb-1">
                            <i data-feather="edit"></i> Create Task
                        </button>
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
                                        <a href="/tasks/{{ $task->task_id }}" class="btn icon btn-success"
                                        ><i class="bi bi-eye"></i
                                            ></a>
                                        <a href="/tasks/{{ $task->task_id }}/edit" class="btn icon btn-primary"
                                        ><i class="bi bi-pencil"></i
                                            ></a>
                                        <form action="/tasks/{{ $task->task_id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn icon btn-danger">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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
    <script src="/../assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/../assets/js/simple-datatables.js"></script>
@endsection