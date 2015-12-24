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

  @section('head_og')
    <meta property="og:title" content="{{$page->title or 'Главная страница'}}" />
    <meta property="og:description" content="{{$page->description or 'Главная страница'}}" />
    <meta property="og:url" content="{{$page->description or '/'}}у" />
    <meta property="og:image" content="{{$page->url or ''}}{{$page->image or ''}}" />
  @show

  @section('head_title')
    <title>{{$page->title or 'Главная страница'}}</title>
  @show

  @section('head_description')
    <meta name="description" content="{{$page->description or 'Главная страница'}}">
  @show

  @section('head_image_src')
    <link rel="image_src" href="{{$page->url or ''}}{{$page->image or ''}}" />
  @show

  <link href="/css/app.css" rel="stylesheet">

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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

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

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="/bower_components/jquery/dist/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/js/all.js"></script>

  @section('footer_script')
  @show

  @include('jetweb::script.main')

</ibody>
</html>