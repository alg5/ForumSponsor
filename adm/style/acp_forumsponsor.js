(function ($) {    // Avoid conflicts with other libraries
    $().ready(function () {
        //alert('1')
        var b = parseInt( $("#h_fs_allow_html").val()) == 1? true : false;
       // init(b);
        //$("#forum_post_options").on("change", "#forum_sponsor_allow_html", function () {
        $("#forum_sponsor_allow_html").on("change", function () {
            //alert('2')
            if ($(this).prop('checked')) {
                //$(this).attr('checked', 'checked');
                //alert('3');
                $(".forum-sponsor-options").prop('checked', false).css('opacity', '0.3');
            }
            else {//alert('4');
                //$(this).removeAttr('checked');
                $(".forum-sponsor-options").prop('checked', true).css('opacity', '1');
            }
        });



    });
//    function init(b) {

//        if (b) {
//            alert('2')
//            $("#forum_sponsor_allow_html").prop('checked', true);
//            console.log($("#forum_sponsor_allow_html"));
//            //$(".forum-sponsor-options").prop('checked', false).removeClass("forum-sponsor-options-on").addClass("forum-sponsor-options-off");
//        }
//        else {
//            alert('3')
//            $("#forum_sponsor_allow_html").prop('checked', false);
//            //$(".forum-sponsor-options").prop('checked', true).removeClass("forum-sponsor-options-off").addClass("forum-sponsor-options-on");
//        }
//    }

})(jQuery);                                                        // Avoid conflicts with other libraries
