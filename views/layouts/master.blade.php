<!DOCTYPE html>
<html lang="ru">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--не выводить описание из яндекс каталога-->
  <meta name="robots" content="noyaca"/>
  <!--не выводить описание из DMOZ-->
  <meta name="robots" content="noodp"/>
  <meta name="descri" content="noodp"/>

  {!! SEO::generate() !!}

  <link href="{{elixir('css/app.css')}}" rel="stylesheet">

  @section('head')
  @show
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->


</head>
<body>
@include('jetweb::widgets.topmenu')

  @section('body')
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        @section('body_left')
            @include('jetweb::chunk.sidebar')
        @show
      </div>
      <div class="col-md-9">
        @section('body_center')

          @if (isset($page))
            <p>{!!$page->content!!}</p>
            @include('jetweb::chunk.list')
            @if($view_comments)
              <p class="h3">Коментарии:</p>
              <hr/>
              @include('jetweb::chunk.comment')
            @endif
          @endif

        @show
      </div>
      <div class="col-md-1">
        @section('body_right')
          @include('jetweb::chunk.share')
        @show
      </div>
    </div>
  </div>
  @show

  @include('jetweb::widgets.footer')

  <script src="{{elixir('js/all.js')}}"></script>


  @section('footer_script')
  @show

  @include('jetweb::script.main')

</body>
</html>