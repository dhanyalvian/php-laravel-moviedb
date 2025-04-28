const topcastId = '#top-cast';
const topcastNav = '.link-more';

const recommendId = '#recommendations';
const recommendNav = '#more-page-btn';

$(document).ready(function() {
    lazyload();
    getPeopleRecords(topcastId, topcastNav, 0);
    getMovieRecords(recommendId, recommendNav, 1, 0);
    
    function getPeopleRecords(contentId, contentNav, fadeIn) {
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
            success: (response) => {
                $(contentId + ' .card-placeholder').remove();
                $.each(response.data.records, function (_, rec) {
                    $(getPeopleCard(rec)).hide()
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

    function getPeopleCard(rec) {
        const profileName = rec.name;
        const profileImg = rec.profile_path;
        const profileUrl = rec.profile_url;
        let rslt = '<div class="card d-flex flex-wrap align-items-left">';
        rslt += '<div class="card-img">';
        rslt += '<a href="' + profileUrl + '">';
        rslt += '<img data-original="' + profileImg + '" class="card-img-top lazyload" alt="' + profileName + '" src="' + profileImg + '">';
        rslt += '</a></div> <div class="card-body"><h5 class="card-title">';
        rslt += '<a href="' + profileUrl + '">' + profileName + '</a>';
        rslt += '</h5><p class="card-text">' + rec.profile_known_for + '</p></div></div>';

        return rslt;
    }
    
    function getMovieRecords(contentId, contentNav, pageNext, fadeIn) {
        const pageUrl = $(contentNav).attr('data-url');
        const limit = $(contentNav).attr('data-limit');
        
        $.ajax({
            type: 'GET',
            url: pageUrl,
            data: {
                p: pageNext,
                l: limit,
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