@extends('layouts.content')

@section('content')
    <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Tracking History</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tracking History</li>
                        </ol>
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
                        <div class="timeline">

                            <!-- timeline time label -->
                            @if ($trackHis->isNotEmpty())
                                <div class="time-label">
                                    <span class="text-bg-success">{{ $trackHis->first()->DocTracks->dms_no }}</span>
                                </div>
                            @endif

                            @foreach ($trackHis as $track)
                                <div>
                                    <span class="timeline-icon text-bg-info">
                                        {{ $trackHis->count() - $loop->index }}
                                    </span>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border" style="background-color: bisque;">
                                            <label
                                                style="font-weight: bolder; font-color: black;">{{ $track->IncomingOfficeTo->office_name }}</label>
                                        </h3>
                                        <h3 class="timeline-header no-border">
                                            <a href="#">Received By: </a>
                                            {{ $track->doc_track->first_name ?? 'Not Yet Received.' }}
                                            {{ $track->doc_track->last_name ?? '' }}
                                        </h3>
                                        <h3 class="timeline-header no-border">
                                            <a href="#">Date Received: </a>
                                            @if ($track->date_released == null)
                                                {{ $track->date_received ?? 'Not Yet Received.' }}
                                            @else
                                                Not Yet Received.
                                            @endif
                                        </h3>

                                        @if ($track->date_released == null)
                                        @else
                                            <h3 class="timeline-header no-border">
                                                <a href="#">Date Released by Previous Office: </a>
                                                {{ $track->date_released ?? 'Not Yet Released.' }}
                                            </h3>
                                        @endif
                                        <h3 class="timeline-header no-border">
                                            <a href="#">Remarks: </a>
                                            {{ $track->remarks ?? 'No Remarks' }}
                                        </h3>
                                        <h3 class="timeline-header no-border">
                                            <a href="#">Status: </a>
                                            {{ $track->status }}
                                        </h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="timeline">
                            <div class="time-label">
                                <span class="text-bg-success">Originator | DMS No.
                                    {{ $trackHis->first()->DocTracks->dms_no }} </span>
                            </div>
                            <div>
                                <span class="timeline-icon text-bg-info">
                                    <i class="bi bi-pin-angle"></i>
                                </span>
                                <div class="timeline-item">
                                    <h3 class="timeline-header no-border" style="background-color: bisque;">
                                        <label style="font-weight: bolder; font-color: black;">
                                            {{ $trackHis->last()->IncomingOffice->office_name ?? 'N/A' }}</label>
                                    </h3>
                                    <h3 class="timeline-header no-border">
                                        <a href="#">Encoded By:</a>
                                        {{ $trackHis->last()->doc_track1->first_name }}
                                        {{ $trackHis->last()->doc_track1->last_name }}
                                    </h3>
                                    <h3 class="timeline-header no-border">
                                        <a href="#">Date Encoded: </a>
                                        {{ $trackHis1->created_at ?? 'N/A' }}
                                    </h3>
                                    <h3 class="timeline-header no-border">
                                        <a href="#">Date Released:</a>
                                        {{ $trackHis->last()->date_released ?? 'N/A' }}
                                    </h3>
                                    <h3 class="timeline-header no-border">
                                        <a href="#">Released To:</a>
                                        {{ $trackHis->last()->IncomingOfficeTo->office_name ?? 'N/A' }}
                                    </h3>
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
@endsection
