<!DOCTYPE html>
<html lang="en">
<head>




  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--не выводить описание из яндекс каталога-->
  <meta name="robots" content="noyaca"/>
  <!--не выводить описание из DMOZ-->
  <meta name="robots" content="noodp"/>
  <meta name="descri" content="noodp"/>

  @section('head_title')
    <title>{{$page->title or 'Установка замков в СПБ'}}</title>
  @show

  @section('head_description')
    <meta name="description" content="{{$page->description or 'Установка замков в СПБ'}}">
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


@include('jetweb::widgets.topmenu')

@section('body')
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        @section('body_left')
          @include('jetweb::chunk.menu')
        @show
      </div>
      <div class="col-md-10">
        @section('body_center')

          @if (isset($page))
            <p>{!!$page->content!!}</p>
            @include('jetweb::chunk.list')
            @include('jetweb::chunk.comment')
          @endif

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

  <script type="text/javascript">
    $(document).ready(function(){
      var sh =document.location.host;
      $('a').on('click', function(){
        if ($(this).attr('data-away') == undefined) {
          if (this.host != sh) {
            this.href = 'http://' + sh + '/away?url=' + this.href;
          }
        }
        return true;
      });
    });
  </script>

</body>
</html>