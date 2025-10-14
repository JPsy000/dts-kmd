@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Positions</div>
                        </div>
                        <div class="card-body">
                            <div class="btn-group mb-2" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal"
                                    data-bs-target="#addPosition">Add Position</button>
                            </div>
                            <hr />
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Office</th>
                                                    <th>Position</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($positionQuery as $position)
                                                    <tr>
                                                        <td>{{ $position->id }}</td>
                                                        <td>{{ $position->officeRel->office_name ?? 'N/A' }}</td>
                                                        <td>{{ $position->position_name }}</td>
                                                        <td>{{ $position->status }}</td>
                                                        <td>
                                                            <button type="button" onclick="btnPositionUpdate({{ $position->id }})"
                                                                class="btn btn-primary btn-sm">Edit</button>
                                                            <button type="button" onclick="btnPositionDelete({{ $position->id }})"
                                                                class="btn btn-danger btn-sm">Delete</button>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer clearfix">
                                        <ul class="pagination pagination-sm m-0 float-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#">&laquo;</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">&raquo;</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('modals.position')
@endsection
