@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-4">
                <h1 class="page-title">Students List</h1>
            </div>
            <form action="{{ route('todo.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <input class="form-control" type="text" name="name" placeholder="Enter Student Name" aria-label="Student Name">
                </div>
                <div class="form-group mb-3">
                    <input class="form-control" type="file" name="image" accept="image/*" aria-label="Upload Image">
                </div>
                <div class="form-group mb-3">
                    <input class="form-control" type="number" name="age" placeholder="Enter Age" aria-label="Age">
                </div>
                <div class="form-group mb-3">
                    <select class="form-control" name="status" aria-label="Status">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <hr>
            <div>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Age</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $key => $task)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $task->name }}</td>
                            <td>{{ $task->image }}</td>
                            <td>{{ $task->age }}</td>
                            <td>{{ $task->status }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('todo.delete', $task->id) }}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Delete</a>
                                    <a href="javascript:void(0)" class="btn btn-info btn-edit" data-bs-toggle="modal" data-bs-target="#editModal"
                                        data-task-id="{{ $task->id }}"
                                        data-task-name="{{ $task->name }}"
                                        data-task-age="{{ $task->age }}"
                                        data-task-status="{{ $task->status }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" action="" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="editName" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="editAge" class="form-label">Age</label>
                        <input type="number" class="form-control" id="editAge" name="age">
                    </div>
                    <div class="mb-3">
                        <label for="editStatus" class="form-label">Status</label>
                        <select class="form-select" id="editStatus" name="status">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .page-title {
        font-size: 2rem;
        color: rgb(57, 23, 138);
    }

    .form-group {
        margin-bottom: 1.5rem;
    }
</style>
@endpush
