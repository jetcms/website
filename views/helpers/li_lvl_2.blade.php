@foreach ($lvl_0 as $val)
    @if (isset($lvl_1))
        <li @if ($val->is_active ) class="active" @endif">
            <label class="tree-toggle nav-header">
                <a href="{{$val->url}}">{{$val->lable}}</a>
            </label>
        @if ($val->is_active)
        <ul class="nav nav-list tree">
            @foreach ($lvl_1 as $val)
                <li @if ($val->is_active ) class="active" @endif>
                    <a href="{{$val->url}}">{{$val->lable}}</a>
                </li>
            @endforeach
        </ul>
        @endif
    </li>
    <li>
        <hr class="h6"/>
    </li>
    @else
        <li @if ($val->is_active ) class="active" @endif>
            <label class="tree-toggle nav-header">
                <a href="{{$val->url}}">{{$val->lable}}</a>
            </label>
        </li>
        <li>
            <hr class="h6"/>
        </li>
    @endif
@endforeach