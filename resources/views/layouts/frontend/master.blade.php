<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
 ================================================== -->
    <meta charset="utf-8">

    <!-- Mobile Specific Metas
 ================================================== -->

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Title -->
    <title>{{ $title ?? 'Sports247bd' }} {{ '-' . config('app.name') }}</title>
    <meta name="description" content="{{ $description ?? 'Sports247bd' }}">

    <!-- HTML Meta Tags -->

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ $title ?? 'Sports247bd' }}">
    <meta itemprop="description" content="{{ $description ?? 'Sports247bd' }}">
    <meta itemprop="image" content="{{ $metaData->m_photo ?? 'Sports247bd' }}" alt="meta photo">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ $title ?? 'Sports247bd' }}">
    <meta property="og:description" content="{{ $description ?? 'Sports247bd' }}">
    <meta property="og:image" itemprop="image" content="{{ $metaData->m_photo ?? 'Sports247bd' }}" alt="meta photo">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content=" {{ $title ?? 'Sports247bd' }}">
    <meta name="twitter:description" content="{{ $description ?? 'Sports247bd' }}">
    <meta name="twitter:image" content="{{ $metaData->m_photo ?? 'Sports247bd' }}" alt="meta photo">

    <!-- CSS
 ================================================== -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Template styles-->
    
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
    <!-- Colorbox -->
    <link rel="stylesheet" href="{{ asset('frontend/css/colorbox.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/simple-lightbox.min.css') }}">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <!-- Responsive styles-->
    <link rel="stylesheet" href="{{ asset('frontend/css/styleim.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsiveim.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/toastr.min.css') }}">
    @stack('style')



</head>

<body>

    <div class="body-inner">

        @include('layouts.frontend.header')

        @yield('content')


        @include('layouts.frontend.footer')

        


        <!-- Javascript Files
 ================================================== -->

        <!-- initialize jQuery Library -->
       {{--  <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> --}}
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.js') }}"></script>
        <!-- Popper Jquery -->
        <script type="text/javascript" src="{{ asset('frontend/js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
        <!-- Bootstrap jQuery -->
        <script type="text/javascript" src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
        <!-- Owl Carousel -->
        <script type="text/javascript" src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
        <!-- Color box -->
        <script type="text/javascript" src="{{ asset('frontend/js/jquery.colorbox.js') }}"></script>
        <!-- Smoothscroll -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
        {{-- <script type="text/javascript" src="{{ asset('frontend/js/smoothscroll.js') }}"></script> --}}
        <script type="text/javascript" src="{{ asset('frontend/js/simple-lightbox.jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/simple-lightbox.legacy.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/simple-lightbox.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/plugins.js') }}"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.0.0/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js"></script>



        <!-- Template custom -->
        <script type="text/javascript" src="{{ asset('backend/js/toastr.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('frontend/js/custom.js') }}"></script>

        <script>
            var gallery = $('.gallery a').simpleLightbox({
                sourceAttr: 'href',
    
                nav: true,
                overlay: true,
                close: true,
                closeText: 'X',
                swipeClose: true,
                showCounter: true,
                fileExt: 'png|jpg|jpeg|gif',
    
    
            })
        </script>
        @stack('script')

    </div><!-- Body inner end -->
     {!! Toastr::message() !!}
</body>

</html>
