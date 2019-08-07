(function($) {
    // Tabs
    $( "#tabs" ).tabs();
    $("<textarea>", {
        "html":   '<!DOCTYPE html>\n<html>\n<head>' +
                $("#head")
                    .html()
                    .replace(/[<>]/g, function(m) { return {'<':'&lt;','>':'&gt;'}[m]})
                    .replace(/((ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?)/gi,'<a href="$1">$1</a>') +
                '\n</html></textarea>',
        "class": "prettyprint"
    }).appendTo("#source-code");
    // Higlight source content
    $('#source-code .prettyprint').click(function() {
        $(this).focus();
        $(this).select();
        document.execCommand('copy');
      });

    // browser window scroll (in pixels) after which the "back to top" link is shown
    var offset = 300,
    //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
    offset_opacity = 1200,
    //duration of the top scrolling animation (in ms)
    scroll_top_duration = 700,
    //grab the "back to top" link
    $back_to_top = $('.backTop');
    //hide or show the "back to top" link
    $(window).scroll(function(){
        ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('backTopIsVisible') : $back_to_top.removeClass('backTopIsVisible backTopFadeOut');
        if( $(this).scrollTop() > offset_opacity ) { 
            $back_to_top.addClass('backTopFadeOut');
        }
    });
    //smooth scroll to top
    $back_to_top.on('click', function(event){
        event.preventDefault();
        $('body,html').animate({
            scrollTop: 0 ,
            }, scroll_top_duration
        );
    });
}(jQuery));
