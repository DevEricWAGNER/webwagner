<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $siteinfo->title }}</title>

        <meta content="{{$siteinfo->description}}" name="description">
        <meta content="@foreach ($siteinfo->keywords as $keyword) @if ($siteinfo->keywords->count() == 1){{$keyword->name}}@elseif ($loop->last){{$keyword->name}}@else{{$keyword->name}},@endif @endforeach" name="keywords">

        <link href="{{asset($siteinfo->logo)}}" rel="icon">
        <link href="{{asset($siteinfo->logo)}}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        <!-- Vendor CSS Files -->
        <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/aos/aos.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
        <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
        @vite(['resources/css/app.css', 'resources/js/app.js'])

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-ZPY0F2C12K"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-ZPY0F2C12K');
</script>

    </head>
    <body>
        <section id="topbar" class="topbar d-flex align-items-center">
            <div class="container d-flex justify-content-center justify-content-md-between">
                <div class="contact-info d-flex align-items-center">
                    @if ($siteinfo->email != "" && $siteinfo->use_email == 1)
                        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ $siteinfo->email }}">{{ $siteinfo->email }}</a></i>
                    @endif
                    @if ($siteinfo->phone != "" && $siteinfo->use_phone == 1)
                        <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $siteinfo->phone }}</span></i>
                    @endif
                </div>
                @if ($siteinfo->twitter != "" || $siteinfo->facebook != "" || $siteinfo->instagram != "" || $siteinfo->linkedin != "" || $siteinfo->youtube != "")
                    <div class="social-links d-none d-md-flex align-items-center">
                        @if ($siteinfo->twitter != "")
                            <a href="{{$siteinfo->twitter}}" target="_blank" class="twitter"><i class="bi bi-twitter"></i></a>
                        @endif
                        @if ($siteinfo->facebook != "")
                            <a href="{{$siteinfo->facebook}}" target="_blank" class="facebook"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if ($siteinfo->instagram != "")
                            <a href="{{$siteinfo->instagram}}" target="_blank" class="instagram"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if ($siteinfo->linkedin != "")
                            <a href="{{$siteinfo->linkedin}}" target="_blank" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
                        @endif
                        @if ($siteinfo->youtube != "")
                            <a href="{{$siteinfo->youtube}}" target="_blank" class="youtube"><i class="bi bi-youtube"></i></i></a>
                        @endif
                    </div>
                @endif
            </div>
        </section>

        @include('layouts.navbar')
        @if (isset($homepage))
            <section id="hero" class="hero">
                {{ $homepage }}
            </section>
        @endif
        <main id="main">
            {{ $slot }}
        </main>
        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        @include("layouts.footer")

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/aos/aos.js') }}"></script>
        <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
        <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </body>
</html>
