<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Admin</title>

    <link rel="icon" type="image/x-icon" href="foto/logo.jpg">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/assets_admin/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets') }}/assets_admin/assets/vendors/styles/icon-font.min.css">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/assets_admin/assets/vendors/styles/style.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-119386393-1');
    </script>
</head>

<body>

    <div class="header">
        <div class="header-left">
            <div class="menu-icon dw dw-menu"></div>
        </div>
        <div class="header-right">
            <div class="user-info-dropdown">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <span class="user-icon">
                            <img src="foto/adm.png" alt="">
                        </span>
                        <span class="user-name">Admin</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                        <a class="dropdown-item" href="{{ url('admin/logout') }}"
                            onclick="return confirm('Apakah Anda Yakin Ingin Keluar')"><i class="dw dw-logout"></i> Log
                            Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="left-side-bar">
        <div class="brand-logo">
            <a href="{{ url('admin') }}">
                <h2 class="text-white">Admin Panel</h2>
                <!-- masukkan gambar -->
                <img src="foto/" alt="" class="dark-logo">
                <img src="foto/" alt="" class="light-logo">
                <!-- // -->
            </a>
            <div class="close-sidebar" data-toggle="left-sidebar-close">
                <i class="ion-close-round"></i>
            </div>
        </div>
        <div class="menu-block customscroll">
            <div class="sidebar-menu">
                <ul id="accordion-menu">
                    <li>
                        <a href="{{ url('admin') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ url('admin/pegawaidaftar') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-invoice"></span><span class="mtext">Data Pegawai</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/penilaiandaftar') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-invoice"></span><span class="mtext">Data Penilaian</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('admin/prediksi') }}" class="dropdown-toggle no-arrow">
                            <span class="micon dw dw-invoice"></span><span class="mtext">Prediksi</span>
                        </a>
                    </li>
                

                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu-overlay"></div>

    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/core.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/process.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/layout-settings.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/src/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/dashboard.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


    @yield('content')

    <script>
        $(document).ready(function() {
            $(".selectcari").select2();
        });
        $(document).ready(function() {
            $('#table').DataTable();
            $('#table2').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#daftarproduk').DataTable({
                // dom: 'Bfrtip',
                // buttons: [{
                //         extend: 'pdfHtml5',
                //         title: 'Data Persediaan Obat',
                //         orientation: 'landscape',
                //         text: '<i class="fa fa-download"></i> CETAK',
                //         className: 'btn btn-success btn-sm',
                //         exportOptions: {
                //             columns: [0, 1, 2, 3, 4, 5]
                //         },
                //         customize: function(doc) {
                //             doc.content[1].table.widths =
                //                 Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                //             doc.defaultStyle.alignment = 'center';
                //             doc.styles.tableHeader.alignment = 'center';
                //         }

                //     },
                //     'colvis'
                // ],
            });
        
        });
    </script>



</body>

</html>
