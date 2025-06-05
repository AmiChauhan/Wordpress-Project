jQuery(document).ready(function ($) {
    let page = 1;
    let currentFilter = $('.property-filter-btn.active').data('slug') || 'all';

    function loadProperties(reset = false) {
        $('.loader-overlay').show(); // Show overlay + spinner

        $.ajax({
            url: property_ajax_obj.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_properties',
                property_type: currentFilter,
                page: page,
            },
            success: function (response) {
                $('.loader-overlay').hide(); // Hide overlay + spinner

                if (reset) {
                    $('.property-list').html(response);
                } else {
                    $('.property-list').append(response);
                }

                if ($.trim(response) === '' || response.includes('No properties found')) {
                    $('.load-more').hide();
                } else {
                    $('.load-more').show();
                }
            }
        });
    }

    // Initial load
    loadProperties(true);

    // Filter click
    $('#property-filter-buttons').on('click', '.property-filter-btn', function () {
        $('.property-filter-btn').removeClass('active');
        $(this).addClass('active');

        currentFilter = $(this).data('slug');
        page = 1;
        loadProperties(true);
    });

    // Load More click
    $('.load-more').on('click', function () {
        page++;
        loadProperties();
    });
});
