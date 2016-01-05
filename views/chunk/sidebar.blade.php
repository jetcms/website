<ul class="nav nav-list hidden-xs hidden-sm sidebar-menu">
    @if (isset($menu_level_0))
        @if (isset($menu_level_1))
            @include('jetweb::helpers.li_lvl_2',['lvl_0'=>$menu_level_0,'lvl_1'=>$menu_level_1])
        @else
            @include('jetweb::helpers.li_lvl_2',['lvl_0'=>$menu_level_0])
        @endif
    @endif
</ul>
@if (isset($menu_level_0))
    <select data-select-link="" class="form-control visible-xs visible-sm">
        <option value="/">&#9660; Выберете услугу</option>
        @foreach($menu_level_0 as $val)
            <option value="{{$val->url}}" @if($val->is_active) selected @endif>&nbsp; {{$val->lable}}</option>
        @endforeach
    </select>
    <hr class="visible-xs visible-sm">
@endif



