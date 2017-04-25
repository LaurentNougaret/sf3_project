$(function() {
    $("#rating, #ratingwelcome, #ratinginformation, #ratingadvice, #ratingdelay, #ratingclean, #rating2, #rating3").rating({
        stars: 1,
        emptyStar: '<img src="../img/rating/ratingcarempty.png" />',
        filledStar: '<img src="../img/rating/ratingcarcolor3.png" />',
        showClear: false,
        starCaptions: {
            0.5		: 'Horrible',
            1		: 'Horrible',
            1.5		: 'Médiocre',
            2		: 'Médiocre',
            2.5		: 'Moyen',
            3		: 'Moyen',
            3.5		: 'Très bien',
            4		: 'Très bien',
            4.5		: 'Excellent',
            5		: 'Excellent'
        }
    });
    $("#rating4").rating({
        stars: 1,
        emptyStar: '<img src="../img/rating/ratingcarempty.png" />',
        filledStar: '<img src="../img/rating/ratingcarcolor3.png" />',
        showClear: false,
        starCaptions: {
            0.5		: 'Très sale',
            1		: 'Très sale',
            1.5		: 'Sale',
            2		: 'Sale',
            2.5		: 'État identique',
            3		: 'État identique',
            3.5		: 'Propre',
            4		: 'Propre',
            4.5		: 'Très Propre',
            5		: 'Très Propre'
        }
    });
    $("#rating5").rating({
        stars: 1,
        emptyStar: '<img src="../img/rating/ratingcarempty.png" />',
        filledStar: '<img src="../img/rating/ratingcarcolor3.png" />',
        showClear: false,
        starCaptions: {
            0.5		: 'Pas du tout',
            1		: 'Pas du tout',
            1.5		: 'Un peu',
            2		: 'Un peu',
            2.5		: 'Moyennement',
            3		: 'Moyennement',
            3.5		: 'Très bien',
            4		: 'Très bien',
            4.5		: 'Énormément',
            5		: 'Énormément'
        }
    });
});
