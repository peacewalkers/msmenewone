<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- google analytics --}}

    {!! SEO::generate() !!}

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- favicon -->
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/fonts/Linearicons/Linearicons/Font/demo-files/demo.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('msmelist')}}/fonts/flaticon.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/plugins/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/css/style.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/css/market-place-2.css">
    <link rel="stylesheet" href="{{asset('msmelist')}}/css/custom.css">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('backend/css/msmebackend.css') }}" rel="stylesheet">

    <!-- Custom Style File -->
    <link rel="stylesheet" href="{{ asset('backend/css/my-style-user.css') }}">

    @yield('styles')
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

{{-- sidebar bar --}}


<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

        {{-- nav bar --}}
        {{--            @include('backend.user.partials.nav')--}}
        @include('backend.user.partials.nav')

        <!-- Begin Page Content -->
            <div class="col-md-10 container-fluid backend bg-white" style="border-top: 1px solid grey">

                @include('backend.user.partials.alert')

                {{-- main content --}}
                @yield('content')
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    {{-- nav bar --}}
    @include('backend.user.partials.footer')

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>



<!-- custom scripts-->

<script src="{{asset('msmelist')}}/plugins/jquery.min.js"></script>

<script src="{{asset('msmelist')}}/plugins/bootstrap/js/bootstrap.min.js"></script>

<script src="{{asset('msmelist')}}/plugins/imagesloaded.pkgd.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/masonry.pkgd.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/isotope.pkgd.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/jquery.matchHeight-min.js"></script>
<script src="{{asset('msmelist')}}/plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/sticky-sidebar/dist/sticky-sidebar.min.js"></script>
<script src="{{asset('msmelist')}}/plugins/select2/dist/js/select2.full.min.js"></script>
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
--}}
<script src="{{asset('msmelist')}}/js/main.js"></script>
<script src="{{ asset('frontend/vendor/pace/pace.min.js') }}"></script>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('backend/js/sb-admin-2.min.js') }}"></script>

<script>
    $(document).ready(function(){

        /**
         * The front-end form disable submit button UI
         */
        $("form").on("submit", function () {
            $("form :submit").attr("disabled", true);
            //$("form :submit").html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>');
            return true;
        });

    });

</script>

@yield('scripts')

</body>

</html>


