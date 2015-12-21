@extends('jetweb::layouts.master')

@section('meta')
<title>{{$name or ''}}</title>
@show

@section('body')
<div class="container">

    <div class="row">

        <div class="col-md-2">

        </div>

        <div class="col-md-8 bg-page">
            @section('body_content')
                [пусто]
            @show
        </div>

        <div class="col-md-2">

        </div>

    </div>

</div>
@stop
