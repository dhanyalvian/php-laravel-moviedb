const defaultFadeIn = 2000;

function showProgress() {
    $('#progress-bar > .progress-bar').css('width', '2%')
    $('#progress-bar').show();
}

function loadProgress() {
    xhr = new XMLHttpRequest();
    xhr.upload.addEventListener('progress', function (e) {
        if (e.lengthComputable) {
            percentComplete = Math.round((e.loaded / e.total) * 100);
            $('#progress-bar > .progress-bar').css('width', percentComplete + '%');
        }
    }, false);

    return xhr;
}

function hideProgress() {
    $('#progress-bar > .progress-bar').width('100%');
    $('#progress-bar').fadeOut(1000);
}

function lazyload() {
    $('.lazyload').lazyload();
}

function getMorePageLoader() {
    return '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="margin-right: 5px;"></span><span class="sr-only">loading...</span>';
}
