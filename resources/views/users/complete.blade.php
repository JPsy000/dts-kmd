@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Completed Documents</div>
                        </div>
                        <div class="card-body">
                            <hr />
                            <div class="col-md-12">
                                <div class="card mb-4">
                                    <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped table-responsive">
                                            <thead>
                                                <tr>
                                                    <th>DMS No.</th>
                                                    <th>Case No.</th>
                                                    <th>Date Received</th>
                                                    <th>From</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($docTrack2->where('from', Auth::user()->office_id)->where('forward_status', 'Completed')->where('active_button', 'Disabled') as $doc)
                                                    <tr>
                                                        <td>{{ $doc->DocTrack->dms_no ?? 'N/A' }}</td>
                                                        <td>{{ $doc->DocTrack->case_no ?? 'N/A' }}</td>
                                                        <td>{{ $doc->date_received }}</td>
                                                        <td>{{ $doc->IncomingOffice->office_name ?? 'N/A' }}</td>
                                                        <td>{{ $doc->status }}</td>
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
@endsection
