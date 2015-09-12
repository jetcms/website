@if ($page_list)

	@foreach ($page_list as $val)
		<p><a href="/{{$val->alias}}">{{$val->title}}</a></p>
	@endforeach

	@include('jetweb::widgets.pagination',['pagination'=>$page_list,'pagin'=>config('jetcms.web.paginate',10)])

@endif

