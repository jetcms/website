<script type="text/javascript">
    $(document).ready(function(){
        var sh =document.location.host;
        $('a').on('click', function(){

            @if (config('app.debug'))
                if ($(this).closest('.phpdebugbar').hasClass('phpdebugbar') == true) {
                    return true;
                }
            @endif

            if ($(this).attr('data-away') == undefined) {
                if (this.host != sh) {
                    this.href = 'http://' + sh + '/away?url=' + this.href;
                }
            }

            return true;
        });
    });
</script>