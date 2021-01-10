(function ($) {
    $.fn.hasAttr = function (name) {
        return this.attr(name) !== undefined;
    };

    $('.sponsor').each(function () {
        var forumtitle = $(this).next().find('div.list-inner');
        var div = '<div class="forumsponsor" style="float:' + S_CONTENT_FLOW_END + '; margin-' + S_CONTENT_FLOW_END + ': 5px;">' + L_FORUM_SPONSOR + ':<br /><p class="sponsoright">' + $(this).attr('data-sponsor') + '</p></div>';
        $(forumtitle).html(div + $(forumtitle).html());
    });

})(jQuery);