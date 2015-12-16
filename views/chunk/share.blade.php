<script type="text/javascript">
    (function() {
                if (window.pluso)if (typeof window.pluso.start == "function") return;
                if (window.ifpluso==undefined) {
                    window.ifpluso = 1;
                    var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                    s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
                    s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
                    var h=d[g]('body')[0];
                    h.appendChild(s);
                }}
    )();
</script>

<div class="pluso-affix">
    <div class="pluso hidden-xs" data-background="#ebebeb" data-options="medium,square,line,vertical,counter,
                    theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir"></div>
</div>

<div class="pluso visible-xs pluso-mobil"
      data-background="#ebebeb" style="text-align: center"
     data-options="medium,square,line,horizontal,counter,
                    theme=04" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir"></div>

@section('setting')
    <style>
        .affix {
            position: fixed;
            top: 36px;
        }
    </style>

    @section('footer_script')
        <script>
            $('.pluso-affix').affix({
                offset: 10
            })
        </script>
    @stop
@show