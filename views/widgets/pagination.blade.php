@if(sizeof(ceil($pagination->total()/$pagin))>1)
<ul class="pagination">
  @for ($i=1;$i<=ceil($pagination->total()/$pagin);$i++)
  	@if ($i == $pagination->currentPage())
  		<li class="active">
  	@else
  		<li>
  	@endif
  			<a href="/{{Request::path()}}?page={{$i}}">{{$i}}</a>
  		</li>
  @endfor
</ul>
@endif