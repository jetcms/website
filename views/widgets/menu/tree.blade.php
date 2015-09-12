@if (isset($menu_tree[$id]))
<ul>  	
  	@foreach ($menu_tree[$id] as $val)
  	<li @if ($val['is_active'] ) class="active" @endif><a href="{{$val['url'] or ''}}">{{$val['lable'] or ''}}</a>@if (isset($menu_tree[$val['id']])) @include('jetweb::widgets.menu.tree',['id'=>$val['id']]) @endif</li>
	@endforeach
</ul>
@endif