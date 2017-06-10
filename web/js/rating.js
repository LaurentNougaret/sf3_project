$('.rating')
    .addClass('starRating')
    .on('mouseenter', 'label', function(){
            $(this).parent().is('div').
                DisplayRating($(this));
        }
    )
    .on('mouseleave', function() {
            var $this = $(this);  //this referes label
            $selectedRating = $this.find('input:checked');

            if ($selectedRating.length == 1) {
                if($selectedRating.parent().is('label'))
                    DisplayRating($selectedRating.parent());
            } else {
                console.log($this);
                $this.find('.on').removeClass('on');
            }
        }
    );

var DisplayRating = function($el){

    $el.addClass('on').prevAll().addClass('on');
    $el.nextAll().removeClass('on');
};
