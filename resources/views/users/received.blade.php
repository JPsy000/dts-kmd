@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Received Documents</div>
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
                                                    <th>To</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($docTracks->where('afterForward', Auth::user()->office_id)->where('forward_status', 'Received') as $doc)
                                                    <tr>
                                                        <td>{{ $doc->docTrack->dms_no ?? 'N/A' }}</td>
                                                        <td>{{ $doc->docTrack->case_no ?? 'N/A' }}</td>
                                                        <td>{{ $doc->date_received }}</td>
                                                        <td>{{ $doc->IncomingOfficeafterReceive->office_name ?? 'N/A' }}</td>
                                                        <td>{{ $doc->IncomingOfficeafterForward->office_name ?? 'N/A' }}
                                                        </td>
                                                        <td>{{ $doc->status }}</td>
                                                        <td>
                                                                <a href="{{ URL::to('view-document/' . $doc->DocTrack->id) }}"
                                                                    class="btn btn-info btn-sm">View</a>
                                                                <a href="{{ URL::to('received-forward/' . $doc->DocTrack->id) }}"
                                                                    class="btn btn-primary btn-sm">Forward</a>
                                                        </td>
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
