(function ($) {

    function find_page_number(element) {
        return parseInt(element.find('[aria-label="This"]').text());
    }

    $(document).on('click', '[aria-label="Next"]', function (event) {
        event.preventDefault();
        elem = event.target
        page = find_page_number($(this).closest('.pagination').clone());
        page++
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination',
                query_vars: ajaxpagination.query_vars,
                page: page
            },
            success: function (html) {
                console.log(html)
                $('#main').find('.article-wrapper').remove();
                $('#main').append(html);
                $(elem).closest('.pagination').find('[aria-label="This"]').text(page)
            }
        })
    })
})(jQuery);