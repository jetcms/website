@extends('jetweb::layouts.master')

@section('title')
    <title>503</title>
@stop

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-.md-12 text-center">
                <h1 class="text-danger">503</h1>
                <div>
                    <a href="/">Вернутся на главную</a>
                </div>
                <div>
                    <a href="{{ URL::previous() }}">Вернутся назад</a>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br /><br /><br />
@stop

