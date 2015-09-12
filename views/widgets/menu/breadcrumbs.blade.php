@if (isset($menu_breadcrumbs))
<ol class="breadcrumb">
  	@foreach ($menu_breadcrumbs as $val)
	  	@if(App\Menu::getActiveMenuId() == $val['id'])
	  		<li class="active">{{$val['lable'] or ''}}</li>
	  	@else
	  	 	<li><a href="{{$val['url'] or ''}}">{{$val['lable'] or ''}}</a></li>
	  	@endif
	@endforeach
</ol>
@endif
