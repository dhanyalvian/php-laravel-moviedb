$('#more-page-btn').click(function (e) {
    if ($(this).prop('disabled')) {
        e.preventDefault();
        return;
    }
    
    $(this).prop('disabled', true);
    
    const pageNext = $(this).attr('data-next-page');

    $(this).html(getMorePageLoader());

    getPeopleRecords(pageNext, defaultFadeIn);
    
    e.preventDefault();
});

function getPeopleRecords(pageNext, fadeIn) {
    const id = '#peoples-list';
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
                $(getPeopleCard(rec)).hide()
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