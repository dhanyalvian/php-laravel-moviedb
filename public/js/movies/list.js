$('#more-page-btn').click(function (e) {
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

function getMovieRecords(pageNext, fadeIn) {
    const id = '#movies-list';
    const pageNavId = '#page-nav';
    const moreBtnId = '#more-page-btn';
    const pageUrl = $(moreBtnId).attr('data-url');
    
    $.ajax({
        type: 'GET',
        url: pageUrl,
        data: {
            p: pageNext,
        },
        async: true,
        contentType: 'application/json',
        success: (response) => {
            $(id + ' .card-placeholder').remove();
            $.each(response.data.records, function (index, rec) {
                console.log(index);
                $(getMovieCard(rec)).hide()
                    .appendTo(id + ' .container>.row.p-2')
                    .fadeIn(fadeIn);
            });
            
            $(moreBtnId).prop('disabled', false)
                .attr('data-current-page', response.data.page)
                .attr('data-next-page', response.data.next)
                .html('more');
            $(pageNavId).removeClass('d-none');
        },
        error: function (response) {
            $(moreBtnId).prop('disabled', false);
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