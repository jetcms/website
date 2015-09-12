<!DOCTYPE html>
<html>
    <head>
        <title>404</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                color: #B0BEC5;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 72px;
                margin-bottom: 40px;
            }
            a {
                color: #B0BEC5;
                font-size: 25px;
                text-decoration: none;
            }
            a:hover {
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">400</div>
                <h3>Bad Request</h3>
                <div>
                    <a href="{{  route('home') }}">{{ trans('jetcms::lang.errors.home') }}</a>
                </div>
                <div>
                    <a href="{{ URL::previous() }}">{{ trans('jetcms::lang.errors.beack') }}</a>
                </div>
            </div>
        </div>
    </body>
</html>
