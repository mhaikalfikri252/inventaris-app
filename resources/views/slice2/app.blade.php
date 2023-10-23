<!DOCTYPE html>
<html lang="en">

<head>
    <title>SIANAS | @yield('title')</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords"
        content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('guruable/default/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/default/assets/icon/themify-icons/themify-icons.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/default/assets/icon/font-awesome/css/font-awesome.min.css') }}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guruable/default/assets/icon/icofont/css/icofont.css') }}">
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/default/assets/pages/flag-icon/flag-icon.min.css') }}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/default/assets/pages/menu-search/css/component.css') }}">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/default/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guruable/default/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('guruable/default/assets/css/jquery.mCustomScrollbar.css') }}">
    <!-- animation nifty modal window effects css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('guruable/default/assets/css/component.css') }}">
</head>


<body>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            @include('sweetalert::alert')

            @include('slice2.header-navbar')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @include('slice2.navbar')

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            @yield('content')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Warning Section Ends -->
    <!-- Required Jquery -->
    <script type="text/javascript" src="{{ asset('guruable/bower_components/jquery/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/bower_components/jquery-ui/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/bower_components/popper.js/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/bower_components/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript"
        src="{{ asset('guruable/bower_components/jquery-slimscroll/js/jquery.slimscroll.js') }}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{ asset('guruable/bower_components/modernizr/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/bower_components/modernizr/js/css-scrollbars.js') }}"></script>
    <!-- data-table js -->
    <script src="{{ asset('guruable/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('guruable/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('guruable/default/assets/pages/data-table/js/jszip.min.js') }}"></script>
    <script src="{{ asset('guruable/default/assets/pages/data-table/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('guruable/default/assets/pages/data-table/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('guruable/bower_components/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('guruable/bower_components/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('guruable/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('guruable/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('guruable/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}">
    </script>
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{ asset('guruable/bower_components/i18next/js/i18next.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('guruable/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js') }}"></script>
    <script type="text/javascript"
        src="{{ asset('guruable/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('guruable/bower_components/jquery-i18next/js/jquery-i18next.min.js') }}">
    </script>
    <!-- Custom js -->
    {{-- <script src="{{ asset('guruable/default/assets/pages/data-table/js/data-table-custom.js') }}"></script> --}}
    <script type="text/javascript" src="{{ asset('guruable/default/assets/pages/dashboard/custom-dashboard.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('guruable/default/assets/js/SmoothScroll.js') }}"></script>
    <script src="{{ asset('guruable/default/assets/js/pcoded.min.js') }}"></script>
    <script src="{{ asset('guruable/default/assets/js/demo-12.js') }}"></script>
    <script src="{{ asset('guruable/default/assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/default/assets/js/script.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/default/assets/js/script.js') }}"></script>
    <!-- sweet alert js -->
    <script type="text/javascript" src="{{ asset('guruable/bower_components/sweetalert/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/default/assets/js/modal.js') }}"></script>
    <!-- sweet alert modal.js intialize js -->
    <!-- modalEffects js nifty modal window effects -->
    <script type="text/javascript" src="{{ asset('guruable/default/assets/js/modalEffects.js') }}"></script>
    <script type="text/javascript" src="{{ asset('guruable/default/assets/js/classie.js') }}"></script>




    <!-- Page specific script -->
    <script>
        // Data Table
        $("#simpletable").DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "autoWidth": true,
            "lengthChange": true,
        });

        // Multiple Data Table
        // $(function() {
        //     $("#example1").DataTable({
        //         "responsive": true,
        //         "lengthChange": false,
        //         "autoWidth": false,
        //         "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        // }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        //     });
        //     $('#example2').DataTable({
        //         "paging": true,
        //         "lengthChange": false,
        //         "searching": false,
        //         "ordering": true,
        //         "info": true,
        //         "autoWidth": false,
        //         "responsive": true,
        //     });
        // });

        // Setup - add a text input to each footer cell
        $('#asset-search tfoot th').each(function() {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control" placeholder="Search ' + title + '" />');
        });

        // DataTable Asset
        var table = $('#asset-search').DataTable({
            "paging": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "responsive": true,
            "autoWidth": true,
            "lengthChange": true,
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 9, 10]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 9, 10]
                    }
                },
            ]
        });

        // Apply the search footer
        table.columns().every(function() {
            var that = this;

            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

        // Show Password
        $(document).ready(function() {
            $('#checkbox').on('change', function() {
                $('#password').attr('type', $('#checkbox').prop('checked') == true ? "text" : "password");
            });
        });

        // Logout
        function logout(event) {
            event.preventDefault();
            var check = confirm("Apakah anda yakin ingin keluar?");
            if (check) {
                document.getElementById('logout').submit();
            }
        }

        // Preview Image
        function previewImage() {
            const photo = document.querySelector('#photo');
            const photoPreview = document.querySelector('.photo-preview');

            photoPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(photo.files[0]);

            oFReader.onload = function(oFREvent) {
                photoPreview.src = oFREvent.target.result;
            }
        }

        // Upload Surat
        document.getElementById('status_borrow_id').addEventListener("change", function(e) {
            if (e.target.value == 2) {
                document.getElementById('uploadletter').style.display = 'flex';
            } else {
                document.getElementById('uploadletter').style.display = 'none';
            }
        });
    </script>
</body>

</html>
