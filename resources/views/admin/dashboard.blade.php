@extends('layouts.content')

@section('content')
    <br>
    <div class="app-content">
        <!--begin::Container-->
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-file-earmark-text-fill"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Document Encoded</span>
                            <h4 class="info-box-number">
                                {{ App\Documents::where('office', Auth::user()->office_id)->count() }}
                                <a href="{{ URL::to('user-document') }}" class="stretched-link"
                                    aria-label="View Documents"></a>
                            </h4>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-arrow-left"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Incoming</span>
                            <h4 class="info-box-number">
                                {{ App\DocTrack::where('to', Auth::user()->office_id)->where('forward_status', 'Forwarded')->count() }}
                            </h4>

                            <a href="{{ URL::to('incoming-documents') }}" class="stretched-link"
                                aria-label="View Incoming"></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <!-- <div class="clearfix hidden-md-up"></div> -->

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-primary shadow-sm">
                            <i class="bi bi-arrow-right"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Outgoing</span>
                            <h4 class="info-box-number">
                                {{ App\DocTrack::where('from', Auth::user()->office_id)->where('forward_status', 'Forwarded')->where('active_button', 'Enabled')->count() }}
                            </h4>
                            <a href="{{ URL::to('outgoing-documents') }}" class="stretched-link"
                                aria-label="View Outgoing"></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon text-bg-success shadow-sm">
                            <i class="bi bi-check-square-fill"></i>
                        </span>

                        <div class="info-box-content">
                            <span class="info-box-text">Completed</span>
                            <h4 class="info-box-number">
                                {{ App\DocTrack::where('from', Auth::user()->office_id)->where('forward_status', 'Completed')->where('active_button', 'Disabled')->count() }}
                            </h4>
                            <a href="{{ URL::to('completed-documents') }}" class="stretched-link"
                                aria-label="View Completed"></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content-->
@endsection
