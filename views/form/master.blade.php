@extends('jetweb::form.layouts.master')

@section('body_content')
<h3 class="text-center text-success">ОТПРАВИТЬ СООБЩЕНИЕ</h3>

<?php
$user_id = null;
if (Input::has('user')){
    $user = App\User::find(Input::get('user'));
    if ($user){
        $user_id = $user->id;
    }
}
?>

@if (isset($user))
    <p class="text-center">Вы отправляете сообщение: <strong>{{$user->name}}</strong></p>
@endif

<hr />
<form class="form-horizontal col-sm-offset-2 col-sm-8" role="form" method="POST">

    <p class="text center">* - Обязательное заполнение полей отмеченных звездочкой</p>

    <br />

    <div class="form-group">
        <label class="col-sm-3" for="inputName">Ваше имя*</label>
        <div class="col-sm-9">
            <?php
            $name = (isset(Auth::user()->name)) ? Auth::user()->name : null;
            ?>
            <input name="name" type="name" class="form-control" id="inputName" placeholder="Введите имя" value="{{ old('name',$name) }}">
            @if ($errors->has('name'))
                @foreach ($errors->get('name') as $message)
                    <p class="text-danger">
                        {!! $message !!}
                    </p>
                @endforeach
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="inputTelefon" class="col-sm-3">Ваша почта*</label>
        <div class="col-sm-9">
            <?php
                $email = (isset(Auth::user()->email)) ? Auth::user()->email : null;
            ?>
            <input name="email" type="text" class="form-control" id="inputTelefon" placeholder="Введите почту" value="{{ old('email',$email) }}">
            @if ($errors->has('email'))
                @foreach ($errors->get('email') as $message)
                    <p class="text-danger">
                        {!! $message !!}
                    </p>
                @endforeach
            @endif
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-3" for="inputUrl">Сообщение</label>
        <div class="col-sm-9">
            <textarea name="messages" type="text" class="form-control" id="inputUrl">{{ old('messages') }}</textarea>
            @if ($errors->has('messages'))
                @foreach ($errors->get('messages') as $message)
                    <p class="text-danger">
                        {!! $message !!}
                    </p>
                @endforeach
            @endif
        </div>
    </div>

    <br />
    <div class="form-group text-center">
        <input name="user" type="hidden" value="{{Input::get('user',null)}}">
        <input name="_token" type="hidden" value="{{csrf_token()}}">
        <button type="submit" class="btn btn-lg btn-primary col-sm-offset-2 col-sm-8"><i class="fa fa-paper-plane"></i> Отправить</button>
    </div>
</form>
@stop
