const topcastId = '#top-cast';
const topcastNav = '.link-more';

$(document).ready(function () {
    lazyload();
    getMovieCastRecords(topcastId, topcastNav, 0);
});

function getMovieCastRecords(contentId, contentNav, fadeIn) {
    const pageUrl = $(contentNav).attr('data-url');
    const limit = $(contentNav).attr('data-limit');

    $.ajax({
        type: 'GET',
        url: pageUrl,
        data: {
            l: limit,
        },
        async: true,
        contentType: 'application/json',
        beforeSend: function (xhr) {
            xhr.setRequestHeader("Authorization", "Bearer abcd1234Dna");
        },
        success: (response) => {
            $(contentId + ' .card-placeholder').remove();
            $.each(response.data.records, function (_, rec) {
                $(getMovieCastCard(rec)).hide()
                    .appendTo(contentId + ' .container>.row.p-2')
                    .fadeIn(fadeIn);
            });

            $(contentNav).prop('disabled', false)
                .attr('data-current-page', response.data.page)
                .attr('data-next-page', response.data.next)
                .html('more');
        },
        error: function (response) {
            $(contentNav).prop('disabled', false);
            console.log(response);
        }
    });
}

function getMovieCastCard(rec) {
    const profileName = rec.name;
    const profileImg = rec.profile_path;
    const profileUrl = rec.profile_url;
    let rslt = '<div class="card d-flex flex-wrap align-items-left">';
    rslt += '<div class="card-img">';
    rslt += '<a href="' + profileUrl + '">';
    rslt += '<img data-original="' + profileImg + '" class="card-img-top lazyload" src="' + profileImg + '">';
    rslt += '</a></div> <div class="card-body"><h5 class="card-title">';
    rslt += '<a href="' + profileUrl + '">' + profileName + '</a>';
    rslt += '</h5><p class="card-text">' + rec.character + '</p></div></div>';

    return rslt;
}