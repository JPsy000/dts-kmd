<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
<script src="./js/adminlte.js"></script>
<script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function() {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        const isMobile = window.innerWidth <= 992;

        if (
            sidebarWrapper &&
            OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
            !isMobile
        ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" crossorigin="anonymous"></script>

<script>
    new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
    });

    const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
    cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"
    integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous"></script>

<script>
    const sales_chart_options = {
        series: [{
                name: 'Digital Goods',
                data: [28, 48, 40, 19, 86, 27, 90],
            },
            {
                name: 'Electronics',
                data: [65, 59, 80, 81, 56, 55, 40],
            },
        ],
        chart: {
            height: 300,
            type: 'area',
            toolbar: {
                show: false,
            },
        },
        legend: {
            show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
            enabled: false,
        },
        stroke: {
            curve: 'smooth',
        },
        xaxis: {
            type: 'datetime',
            categories: [
                '2023-01-01',
                '2023-02-01',
                '2023-03-01',
                '2023-04-01',
                '2023-05-01',
                '2023-06-01',
                '2023-07-01',
            ],
        },
        tooltip: {
            x: {
                format: 'MMMM yyyy',
            },
        },
    };

    const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
    );
    sales_chart.render();
</script>

<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"
    integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"
    integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous"></script>

<script>
    new jsVectorMap({
        selector: '#world-map',
        map: 'world',
    });

    const option_sparkline1 = {
        series: [{
            data: [1000, 1200, 920, 927, 931, 1027, 819, 930, 1021],
        }, ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: 'straight',
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ['#DCE6EC'],
    };

    const sparkline1 = new ApexCharts(document.querySelector('#sparkline-1'), option_sparkline1);
    sparkline1.render();

    const option_sparkline2 = {
        series: [{
            data: [515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921],
        }, ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: 'straight',
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ['#DCE6EC'],
    };

    const sparkline2 = new ApexCharts(document.querySelector('#sparkline-2'), option_sparkline2);
    sparkline2.render();

    const option_sparkline3 = {
        series: [{
            data: [15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21],
        }, ],
        chart: {
            type: 'area',
            height: 50,
            sparkline: {
                enabled: true,
            },
        },
        stroke: {
            curve: 'straight',
        },
        fill: {
            opacity: 0.3,
        },
        yaxis: {
            min: 0,
        },
        colors: ['#DCE6EC'],
    };

    const sparkline3 = new ApexCharts(document.querySelector('#sparkline-3'), option_sparkline3);
    sparkline3.render();
</script>

{{-- To get the date received and received by if the status is filed --}}


{{-- To display the Attachment Name --}}
<script>
    document.querySelectorAll('input[type="file"][id^="file_upload_"]').forEach(input => {
        input.addEventListener('change', function() {
            const docId = this.id.replace('file_upload_', '');
            const nameEl = document.getElementById('fileNames_' + docId);
            const uploadBtn = document.getElementById('uploadBtn_' + docId);

            const names = Array.from(this.files).map(f => f.name).join(', ');
            nameEl.textContent = names || '';
            uploadBtn.disabled = this.files.length === 0;
        });
    });
</script>

{{-- To disable the Upload Button --}}
<script>
    document.getElementById('file_upload').addEventListener('change', function() {
        document.getElementById('uploadBtn').disabled = this.files.length === 0;
    });
</script>




{{-- SYSTEMS FUNCTIONS --}}


<!-- Sweet Alert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.5/dist/sweetalert2.all.min.js"></script>
@if (Session::has('message'))
    <script>
        Swal.fire({
            icon: "{{ Session::get('icon') }}",
            title: "{{ Session::get('message') }}",
            showConfirmButton: false,
            timer: 1500
        });
    </script>
@endif


{{-- FOR POSITION FUNCTION --}}


{{-- When adding the position to shows the specific position based on the Office --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#office_id').on('change', function() {
            var officeId = $(this).val();
            if (officeId && officeId !== 'Open this select menu') {
                $.ajax({
                    url: '/get-positions/' + officeId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var $position = $('#position_name');
                        $position.empty();
                        $position.append(
                            '<option selected disabled>Choose Position</option>');
                        $.each(data, function(key, value) {
                            $position.append('<option value="' + value
                                .position_name + '">' +
                                value.position_name + '</option>');
                        });
                    },
                    error: function() {
                        $('#position_name').empty().append(
                            '<option selected>No positions found</option>');
                    }
                });
            } else {
                $('#position_name').empty().append(
                    '<option selected disabled>Open this select menu</option>');
            }
        });
    });
</script>


<!-- to Update the Position -->
<script>
    function btnPositionUpdate(user_id) {
        $('#user_id').val(user_id);
        $.ajax({
            url: '{{ URL::to('getPosition') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                user_id: user_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status == "success") {
                    $('#addPosition').modal('show');
                    $('#office_id').val(response.data.office_id);
                    $('#position_name').val(response.data.position_name);
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "DB error".response.message,
                        showConfirmButton: false,
                        timer: 1250
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: 'ERROR DETECTED',
                    showConfirmButton: false,
                    timer: 1250
                });
            }
        });
    }
</script>

{{-- To delete the position --}}
<script>
    function btnPositionDelete(user_id) {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            confirmButtonText: 'Yes, remove it!',
            confirmButtonColor: "#3085d6",
            showCancelButton: true,
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/deletePosition/' + user_id,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        user_id: user_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Successfully Removed!",
                            text: "The position has been removed.",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1250);
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: "error",
                            title: 'ERROR DETECTED',
                            showConfirmButton: false,
                            timer: 1250
                        });
                    }
                });
            }
        })
    }
</script>

{{-- END --}}

{{-- FOR OFFICE FUNCTION --}}

<!-- to Update the Office -->
<script>
    function btnOfficeUpdate(user_id) {
        $('#user_id').val(user_id);
        $.ajax({
            url: '{{ URL::to('getOffice') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                user_id: user_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status == "success") {
                    $('#addOffice').modal('show');
                    $('#office').val(response.data.office_name);
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "DB error".response.message,
                        showConfirmButton: false,
                        timer: 1250
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: 'ERROR DETECTED',
                    showConfirmButton: false,
                    timer: 1250
                });
            }
        });
    }
</script>

{{-- To delete the office --}}
<script>
    function btnOfficeDelete(user_id) {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            confirmButtonText: 'Yes, remove it!',
            confirmButtonColor: "#3085d6",
            showCancelButton: true,
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/deleteOffice/' + user_id,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        user_id: user_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Successfully Removed!",
                            text: "The position has been removed.",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1250);
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: "error",
                            title: 'ERROR DETECTED',
                            showConfirmButton: false,
                            timer: 1250
                        });
                    }
                });
            }
        })
    }
</script>

{{-- END --}}

{{-- FOR USER SIDE --}}
<!-- to Update the Document -->
<script>
    function btnDocumentUpdate(user_id) {
        $('#user_id').val(user_id);
        $.ajax({
            url: '{{ URL::to('getDocument') }}',
            type: 'POST',
            dataType: 'json',
            data: {
                user_id: user_id,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.status == "success") {
                    $('#addDocument').modal('show');
                    $('#dms_no').val(response.data.dms_no);
                    $('#doc_type').val(response.data.doctype_id);
                    $('#case_no').val(response.data.case_no);
                    $('#location').val(response.data.location);
                    $('#investigator').val(response.data.investigator);
                    $('#approver').val(response.data.approver);
                    $('#subject').val(response.data.subject);
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "DB error".response.message,
                        showConfirmButton: false,
                        timer: 1250
                    });
                }
            },
            error: function(xhr, status, error) {
                Swal.fire({
                    icon: "error",
                    title: 'ERROR DETECTED',
                    showConfirmButton: false,
                    timer: 1250
                });
            }
        });
    }
</script>
{{-- To delete the office --}}
<script>
    function btnDocumentDelete(user_id) {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            confirmButtonText: 'Yes, cancel it!',
            confirmButtonColor: "#3085d6",
            showCancelButton: true,
            cancelButtonColor: "#d33",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/deleteDocument/' + user_id,
                    type: 'DELETE',
                    dataType: 'json',
                    data: {
                        user_id: user_id,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire({
                            title: "Successfully Cancelled!",
                            text: "The document has been cancelled.",
                            icon: "success",
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 1250);
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            icon: "error",
                            title: 'ERROR DETECTED',
                            showConfirmButton: false,
                            timer: 1250
                        });
                    }
                });
            }
        })
    }
</script>
