const contentId = '#movies-list';
const contentNav = '#more-page-btn';

$(document).ready(function() {
    lazyload();
    getMovieRecords(1, 0);
    
    $(contentNav).click(function (e) {
        if ($(this).prop('disabled')) {
            e.preventDefault();
            return;
        }
        
        $(this).prop('disabled', true);
        
        const pageNext = $(this).attr('data-next-page');

        $(this).html(getMorePageLoader());

        getMovieRecords(pageNext, defaultFadeIn);
        
        e.preventDefault();
    });
    
    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(contentId).height() + 5) {
            $(contentNav).click();
        }
    });

    function getMovieRecords(pageNext, fadeIn) {
        const pageNavId = '#page-nav';
        const pageUrl = $(contentNav).attr('data-url');
        
        $.ajax({
            type: 'GET',
            url: pageUrl,
            data: {
                p: pageNext,
            },
            async: true,
            contentType: 'application/json',
            success: (response) => {
                $(contentId + ' .card-placeholder').remove();
                $.each(response.data.records, function (_, rec) {
                    $(getMovieCard(rec)).hide()
                        .appendTo(contentId + ' .container>.row.p-2')
                        .fadeIn(fadeIn);
                });
                
                $(contentNav).prop('disabled', false)
                    .attr('data-current-page', response.data.page)
                    .attr('data-next-page', response.data.next)
                    .html('more');
                $(pageNavId).removeClass('d-none');
            },
            error: function (response) {
                $(contentNav).prop('disabled', false);
                console.log(response);
            }
        });
    }

    function getMovieCard(rec) {
        const title = rec.title;
        const img = rec.movie_path;
        const url = rec.movie_url;
        let rslt = '<div class="card d-flex flex-wrap align-items-left">';
        rslt += '<div class="card-img">';
        rslt += '<a href="' + url + '">';
        rslt += '<img data-original="' + img + '" class="card-img-top lazyload" alt="' + title + '" src="' + img + '">';
        rslt += '</a></div> <div class="card-body"><h5 class="card-title">';
        rslt += '<a href="' + url + '">' + title + '</a>';
        rslt += '</h5><p class="card-text">' + rec.movie_release_date + '</p></div></div>';

        return rslt;
    }
});