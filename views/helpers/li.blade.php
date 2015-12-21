@foreach ($li as $val)
    @if (isset($li_map[$val->id]))
        <li @if ($val->is_active ) active @endif">
            <a href="{{$val->url}}">{{$val->lable}}</a>
            <ul class="{{$class or ''}}">
                @include('jetweb::helpers.li',['li'=>$li_map[$val->id],'li_map'=>$li_map])
            </ul>
        </li>
    @else
        <li @if ($val->is_active ) class="active" @endif>
            <a href="{{$val->url}}">{{$val->lable}}</a>
        </li>
    @endif
@endforeach