@extends('jetweb::layouts.master')

@section('body')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			@include('jetweb::widgets.menu.top')
		</div>
	</div>

	<div class="row">
		
		<div class="col-md-2">
			@include('jetweb::widgets.menu.level',['id'=>0])

			@include('jetweb::widgets.menu.level',['id'=>1])
		</div>

		<div class="col-md-10">
			@include('jetweb::widgets.menu.breadcrumbs',['id'=>0])

			@include('jetweb::widgets.menu.tree',['id'=>App\Menu::getActiveMenuRootId()])
			{!!$page['content']!!}
			@include('jetweb::widgets.menu.tree',['id'=>0])

			@include('jetweb::widgets.page.list')

		</div>

	</div>
</div>

@stop