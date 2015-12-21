<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Блог веб-разработчика</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Блог веб-разработчика</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                @foreach ($menu as $val)
                    @if (isset($menu_map[$val->id]))

                        {{--
                        <li class="dropdown @if ($val->is_active ) active @endif">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">{{$val->lable}} <span class="caret"></span></a>
                            <ul class="dropdown-menu" aria-labelledby="themes">
                                @foreach ($menu_map[$val->id] as $val)
                                    <li @if ($val->is_active ) class="active" @endif><a href="{{$val->url}}">{{$val->lable}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        --}}

                        <li @if ($val->is_active ) class="active" @endif>
                            <a href="{{$val->url}}">{{$val->lable}}</a>
                        </li>
                    @else
                        <li @if ($val->is_active ) class="active" @endif>
                            <a href="{{$val->url}}">{{$val->lable}}</a>
                        </li>
                    @endif
                @endforeach
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li @if (Request::url() == url('lk')) class="active" @endif><a href="/lk">Личный кабинет</a></li>
                    <li><a href="/auth/logout">Выход</a></li>
                @else
                    <li @if (Request::url() == url('auth/register')) class="active" @endif><a
                                href="/auth/register">Регистрация</a></li>
                    <li @if (Request::url() == url('auth/login')) class="active" @endif><a href="/auth/login">Вход</a></li>
                @endif
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
