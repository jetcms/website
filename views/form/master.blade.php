@extends('jetweb::form.layouts.master')

@section('body_content')
<h3 class="text-center text-success">ОСТАВЬТЕ ЗАЯВКУ</h3>

<hr />
<form class="form-horizontal col-sm-offset-2 col-sm-8" role="form" method="POST">

    <p class="text center">* - Обязательное заполнение полей отмеченных звездочкой</p>

    <br />

    <div class="form-group">
        <label class="col-sm-3" for="inputName">Ваше имя*</label>
        <div class="col-sm-9">
            @include('jetweb::form.fields.input',[
                'field' => 'name',
                'type' => 'text',
                'valueDefault' => '',
                'placeholder' => 'Введите Ваше имя'
            ])
        </div>
    </div>

    <div class="form-group">
        <label for="inputTelefon" class="col-sm-3">Ваша телефон*</label>
        <div class="col-sm-9">
            @include('jetweb::form.fields.input',[
                'field' => 'telefon',
                'type' => 'text',
                'valueDefault' => '',
                'placeholder' => 'Введите ваш телефон'
            ])
        </div>
    </div>

    <br />
    <div class="form-group text-center">
        <input name="user" type="hidden" value="{{Input::get('user',null)}}">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
        <button type="submit" class="btn btn-lg btn-primary col-sm-offset-2 col-sm-8"><i class="fa
        fa-paper-plane"></i> ОСТАВИТЬ ЗАЯВКУ</button>
    </div>
</form>
@stop
