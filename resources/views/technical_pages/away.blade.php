@extends('jetweb::layouts.master')

@section('title')
    <title>Away</title>
@stop

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-.md-12 text-center">
                <h1 class="text-danger">Away</h1>
                <p>Вы патаетесь перейти по внешней ссылке</p>
                <p class="text-info">{{ Input::get('url') }}</p>
                <div>
                    <a href="{{ Input::get('url') }}" data-away target="_blank" class="btn btn-info">Продолжить
                        переход</a>
                </div>
                <br>
                <div>
                    <a href="{{ URL::previous() }}"  class="btn btn-success">Вернутся назад</a>
                </div>
            </div>
        </div>
    </div>
    <br /><br /><br /><br /><br />
@stop