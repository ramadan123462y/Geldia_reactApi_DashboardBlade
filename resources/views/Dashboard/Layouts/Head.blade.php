<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicons -->
    <link href="{{ URL::asset('Backend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ URL::asset('Backend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ URL::asset('Backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Backend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Backend/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Backend/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Backend/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Backend/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('Backend/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ URL::asset('Backend/assets/css/style.css') }}" rel="stylesheet">
    <style>
        /* تنسيق الـ loader */
        .loader {
            position: fixed;
            left: 50%;
            top: 50%;
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #3437db;
            animation: spin 1s linear infinite;
            z-index: 9999;
        }

        /* body{

            display: flex;
            justify-content: center;
            align-items: flex-end;
        } */
        /* مركز الـ loader في الشاشة */
        .loader-container {
            position: fixed;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.804);
            z-index: 9998;
        }

        /* حركة الدوران */
        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .data_buttons {


            width: 100%;
            /* height: ; */

            display: flex;
            justify-content: space-between;
            align-items: center;


        }

        .data_buttons>a {


            width: 130px !important;
            height: 50px !important;
            padding-top: 10px !important;



        }
    </style>
    @stack('styles')

    @yield('css')


</head>
