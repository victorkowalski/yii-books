;(function(){
    "use strict";

    $(".showInModal").click(function (e) {
        e.preventDefault();
        var url = $(this).attr('href'),
            title = $(this).attr('title');

        $("#modal").on("show.bs.modal", function(e) {
            $(this).find(".modal-title").text(title);
            $(this).find(".modal-body").load(url);
        }).modal("show");
    });

    $('.gallery').fancybox();
})();
