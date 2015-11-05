<h3>{{$name or ''}}</h3>

@foreach ($input as $key => $val)
	<p><strong>{{$key}}</strong>: {{$val}}</p>
@endforeach