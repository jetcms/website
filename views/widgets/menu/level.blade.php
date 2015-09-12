@if (isset($menu_level[$id] ))
<ul class="nav nav-pills">
  	@foreach ($menu_level[$id] as $val)
  		<li @if ($val['is_active'] ) class="active" @endif><a href="{{$val['url'] or ''}}">{{$val['lable'] or ''}}</a></li>
	@endforeach
</ul>
@endif