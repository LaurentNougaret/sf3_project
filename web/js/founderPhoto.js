$(document).ready(function () {
    var small={height: "6em"};
    var large={height: "17.7em"};
    var count=1;
    $("#founderPhoto").css(small).on('click',function () {
        $(this).animate((count==1)?large:small);
        count = 1-count;
    });
});