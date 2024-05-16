<ul>
    @if(isset($subMenus))
        @foreach($subMenus as $subMenu)
            <li>
                <a href="{{ $subMenu->link }}">{{ $subMenu->name }}</a>
                @if($subMenu->subMenus)
                    @include('partials.sub_menu', ['subMenus' => $subMenu->subMenus])
                @endif
            </li>
        @endforeach
    @endif
</ul>
