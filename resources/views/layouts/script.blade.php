<script src="{{ asset('js/jquery-3.7.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery-lazyload-1.9.1.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    const defaultFadeIn = 2000;

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

    function lazyload() {
            $('.lazyload').lazyload();
        }

    function getMorePageLoader() {
            return '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin-right: 5px;"></span><span class="sr-only">loading...</span>';
        }
</script>