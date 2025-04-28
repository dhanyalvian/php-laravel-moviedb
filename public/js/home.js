const popularId = '#popular-movies';
const popularNav = popularId + ' .link-more';

const nowplayingId = '#nowplaying-movies';
const nowplayingNav = nowplayingId + ' .link-more';

const topratedId = '#toprated-movies';
const topratedNav = topratedId + ' .link-more';

const upcomingId = '#upcoming-movies';
const upcomingNav = upcomingId + ' .link-more';

$(document).ready(function() {
    lazyload();

    //- popular
    getMovieRecords(popularId, popularNav, 0);
    
    //- now-playing
    getMovieRecords(nowplayingId, nowplayingNav, 0);
    
    //- top-rated
    getMovieRecords(topratedId, topratedNav, 0);
    
    //- upcoming
    getMovieRecords(upcomingId, upcomingNav, 0);
}); 