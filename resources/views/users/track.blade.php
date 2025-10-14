@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">

        <div class="container-fluid">
            <br>
            <main class="app-main">
                <!--begin::App Content Header-->
                <div class="app-content-header">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="mb-0">Tracking History</h3>
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::App Content Header-->
                <!--begin::App Content-->
                <div class="app-content">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!-- Timelime example  -->
                        <div class="row">
                            <div class="col-md-12">
                                <!-- The time line -->
                                <div class="card card-info card-outline mb-4">
                                    <div class="card-body">
                                        <div class="col-md-12">

                                            <form method="GET" action="{{ URL::to('track-document') }}" class="mb-3">
                                                <div class="input-group">
                                                    <input type="text" name="docTrack" value="{{ $docTrack }}"
                                                        class="form-control" placeholder="Search DMS No." autofocus>
                                                </div>
                                                <br>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="submit">Search</button>
                                                    <a href="{{ URL::to('track-document') }}"
                                                        class="btn btn-outline-secondary">Reset</a>
                                                </div>
                                            </form>
                                            <div class="card mb-4">
                                                <!-- /.card-header -->
                                                <div class="card-body p-0">

                                                    @if ($track->count())
                                                        <table class="table table-striped table-responsive">
                                                            <thead>
                                                                <tr>
                                                                    {{-- <th>#</th> --}}
                                                                    <th>Name</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($track as $i => $search)
                                                                    <tr>
                                                                        {{-- <td>{{ ($track->currentPage() - 1) * $track->perPage() + $i + 1 }}
                                                                            </td> --}}
                                                                        <td>{{ $search->dms_no }}</td>
                                                                        </td>
                                                                        <td>
                                                                            <button class="btn btn-primary">Track</button>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>

                                                        {{ $track->links() }}
                                                    @else
                                                        <div class="alert alert-info mb-0">
                                                            No results @if ($docTrack)
                                                                for "<strong>{{ $docTrack }}</strong>"
                                                            @endif.
                                                        </div>
                                                    @endif
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
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::App Content-->
            </main>
            <!-- /.row (main row) -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
