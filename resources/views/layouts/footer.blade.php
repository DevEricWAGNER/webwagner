<footer id="footer" class="footer">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-5 col-md-12 footer-info">
                <a href="{{route('home')}}" class="logo d-flex align-items-center">
                    <span>{{$siteinfo->title}}<span>.</span></span>
                </a>
                <p></p>
                @if ($siteinfo->twitter != "" || $siteinfo->facebook != "" || $siteinfo->instagram != "" || $siteinfo->linkedin != "" || $siteinfo->youtube != "")
                    <div class="social-links d-flex mt-4">
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
            @if (!$services->isEmpty())
                <div class="col-lg-3 col-6 footer-links">
                    <h4>Mes Services</h4>
                    <ul>
                        @foreach ($services as $service)
                            <li><a href="">{{$service->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            @else
                <div class="col-lg-3 col-6">
                </div>
            @endif
            @if (($siteinfo->adresse != "" && $siteinfo->codePostal != "" && $siteinfo->ville != "" && $siteinfo->pays != "" && $siteinfo->use_address == 1) || ($siteinfo->phone != "" && $siteinfo->use_phone == 1) || ($siteinfo->email != "" && $siteinfo->use_email == 1))
                <div class="col-lg-4 col-md-12 footer-contact text-center text-md-start">
                    <h4>Nous contacter</h4>
                    <p>
                        @if ($siteinfo->adresse != "" && $siteinfo->use_address == 1 && $siteinfo->codePostal != "" && $siteinfo->ville != "" && $siteinfo->pays != "")
                            {{$siteinfo->adresse}}<br>{{$siteinfo->codePostal}} {{$siteinfo->ville}}<br>{{$siteinfo->pays}}<br>
                        @endif
                        @if ($siteinfo->phone != "" && $siteinfo->use_phone == 1)
                            <strong>Mobile:</strong> {{ $siteinfo->phone }}<br>
                        @endif
                        @if ($siteinfo->email != "" && $siteinfo->use_email == 1)
                            <strong>Email:</strong> {{ $siteinfo->email }}<br>
                        @endif
                    </p>
                </div>
            @endif
        </div>
    </div>
    <div class="container mt-4">
        <div class="copyright">
            &copy; Copyright <strong><span>{{$siteinfo->title}}</span></strong>. All Rights Reserved
        </div>
    </div>

</footer>
