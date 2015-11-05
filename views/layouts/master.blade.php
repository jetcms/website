<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  @section('title')
    <title>Bootstrap 101 Template</title>
  @show

  @section('head')
  <!-- Bootstrap -->

  <link href="/css/app.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  @show

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
          @endif

          @include('jetweb::chunk.list')

          @include('jetweb::chunk.comment')

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
</body>
</html>