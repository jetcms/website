@if (isset($menu))
<ul class="nav nav-pills">
  	@foreach ($menu as $val)
  		<li @if ($val['is_active'] ) class="active" @endif><a href="{{$val['url'] or ''}}">{{$val['lable'] or ''}}</a></li>
	@endforeach
</ul>
@endif