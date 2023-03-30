$(document).ready(function () {
    $.ajaxSetup({cache: false});

    $(document).ajaxStart(function(){
        $('#ajax-loader').fadeIn();
    }).ajaxStop(function(){
        $('#ajax-loader').fadeOut();
    });

    $('#overlay').click(function(){
        var classNames = $('html').attr('class').split(" ");
        if (classNames.length > 0) {
            var className;
            for (var x in classNames) {
                className = classNames[x];
                if (className.substr(0, 8) == "js-open-") {
                    $("html").removeClass(className);
                }
            }
        }
    });
});




function reload() {
    window.location.reload();
}
