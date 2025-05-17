<script src="{{ asset('js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-lazyload-1.9.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#back2top>button').click(function () {
            $('html, body').animate({ scrollTop: 0 }, 'slow');
        });

        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) { // If scrolled down more than 200 pixels, for example
                $('#back2top').fadeIn();
            } else {
                $('#back2top').fadeOut();
            }
        });
    });
</script>