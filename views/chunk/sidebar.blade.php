<ul class="nav nav-list hidden-xs sidebar-menu">
    @if (isset($menu_level_0))
        @if (isset($menu_level_1))
            @include('jetweb::helpers.li_lvl_2',['lvl_0'=>$menu_level_0,'lvl_1'=>$menu_level_1])
        @else
            @include('jetweb::helpers.li_lvl_2',['lvl_0'=>$menu_level_0])
        @endif
    @endif
</ul>

