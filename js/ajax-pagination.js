(function ($) {

    function find_page_number(element) {
        return parseInt(element.find('[aria-label="This"]').text());
    }
    function find_category(element) {
        ret = element.closest('.container').find('main').attr('id')
        return ret == 'main' ? '' : ret;
    }
    function checkButtons(element) {
        THIS = parseInt(element.find('[aria-label="This"]').text());
        TOTAL = parseInt(element.find('[aria-label="Total"]').text());
        PREV = element.find('[aria-label="Previous"]').closest('li.page-item');
        NEXT = element.find('[aria-label="Next"]').closest('li.page-item');
        if (THIS <= 1) PREV.addClass("disabled")
        else PREV.removeClass("disabled")
        if (THIS >= TOTAL) NEXT.addClass("disabled")
        else NEXT.removeClass("disabled")
    }
    $('.pagination').each( (i, elem) => checkButtons($(elem)) );
    $(document).on('click', '[aria-label="Previous"], [aria-label="Next"]', function (event) {
        event.preventDefault();
        elem = event.target
        main = $(elem).closest('.container').find('main')
        category = find_category($(elem));
        posts = parseInt(main.attr('data-display'));
        page = find_page_number($(this).closest('.pagination').clone());
        label = $(elem).closest('.page-link').attr('aria-label')
        if (label == 'Next') page++
        if (label == 'Previous') page--
        $.ajax({
            url: ajaxpagination.ajaxurl,
            type: 'post',
            data: {
                action: 'ajax_pagination',
                query_vars: ajaxpagination.query_vars,
                category: category,
                posts: posts,
                page: page
            },
            success: html => {
                if (label == 'Next') {
                    main.removeClass('animated zoomInLeft zoomOutLeft zoomInRight zoomOutRight')
                        .addClass('animated zoomOutLeft')
                        .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        $(this).removeClass('animated zoomOutLeft')
                            .find('.article-wrapper')
                            .remove()
                        $(this).append(html)
                        $(this).addClass('animated zoomInRight')
                    })
                }
                if (label == 'Previous') {
                    main.removeClass('animated zoomInLeft zoomOutLeft zoomInRight zoomOutRight')
                        .addClass('animated zoomOutRight')
                        .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                        $(this).removeClass('animated zoomOutRight')
                            .find('.article-wrapper')
                            .remove()
                        $(this).append(html)
                        $(this).addClass('animated zoomInLeft')
                    })
                }
                
                $(elem).closest('.pagination').find('[aria-label="This"]').text(page)
                checkButtons($(this).closest('.pagination'));
            }
        })
    })
})(jQuery);