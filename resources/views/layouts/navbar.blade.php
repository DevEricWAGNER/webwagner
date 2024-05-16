<header id="header" class="header d-flex align-items-center">

    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{route('home')}}" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>{{$siteinfo->title}}<span>.</span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                @foreach($menus as $menu)
                    @if ($menu->top_actif == 1)
                        @if($menu->is_group)
                            <li class="dropdown"><a href="#"><span>{{ $menu->name }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                <ul>
                                    @foreach($menu->subMenus as $subMenu)
                                        @if ($subMenu->top_actif == 1)
                                            @if ($subMenu->is_group)
                                            <li class="dropdown"><a href="#"><span>{{ $subMenu->name }}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                                <ul>
                                                    @foreach ($subMenu->subMenus as $sub)
                                                        @if ($sub->top_actif == 1)
                                                            <li><a href="{{ $sub->link }}">{{ $sub->name }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                                <li><a href="{{ $subMenu->link }}">{{ $subMenu->name }}</a></li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            <li><a href="{{ $menu->link }}">{{ $menu->name }}</a></li>
                        @endif
                    @endif
                @endforeach
            </ul>
        </nav><!-- .navbar -->
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
    </div>
</header>
