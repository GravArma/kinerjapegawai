<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>Login</title>

    <link rel="icon" type="image/x-icon" href="foto/logo.jpg">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/assets_admin/assets/vendors/styles/core.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/assets_admin/assets/vendors/styles/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/assets_admin/assets/vendors/styles/style.css">

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

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="home.php">
                    <img src="foto/logopolsri.png" alt="" width="50px">
                    <img src="foto/logo.jpg" alt="" width="50px">
                    <h2>&nbsp;Kinerja Pegawai</h2>
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="{{ asset('assets') }}/assets_admin/assets/vendors/images/login-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center text-primary">Silahkan Login</h2>
                        </div>
                        <form method="post" action="{{ url('logincek') }}">
                            @csrf
                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" name="login" value="login">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/core.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/script.min.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/process.js"></script>
    <script src="{{ asset('assets') }}/assets_admin/assets/vendors/scripts/layout-settings.js"></script>
</body>

</html>