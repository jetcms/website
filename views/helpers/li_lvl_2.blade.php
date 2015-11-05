@foreach ($lvl_0 as $val)
    @if (isset($lvl_1))
        <li @if ($val->is_active ) class="active" @endif">
        <a href="{{$val->url}}">{{$val->lable}}</a>
        @if ($val->is_active)
        <ul class="{{$class or ''}}">
            @foreach ($lvl_1 as $val)
                <li @if ($val->is_active ) class="active" @endif>
                    <a href="{{$val->url}}">{{$val->lable}}</a>
                </li>
            @endforeach
        </ul>
        @endif
    </li>
    @else
        <li @if ($val->is_active ) class="active" @endif>
            <a href="{{$val->url}}">{{$val->lable}}</a>
        </li>
    @endif
@endforeach