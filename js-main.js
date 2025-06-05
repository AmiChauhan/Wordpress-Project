jQuery(document).ready(function($) {
    $('.togglebutton').on('click', function() {
        const $menu = $('.main-navigation ul');
        const crossBtn = '<li class="cross-button">×</li>';

        // Remove existing cross button if already present
        $menu.find('.cross-button').remove();

        // Append cross button
        $menu.append(crossBtn);

        // Optional: Add class to show menu (if you use CSS for toggle)
        $('.main-navigation').toggleClass('menu-open');
    });

    // Handle click on the cross button to close/hide menu
    $(document).on('click', '.cross-button', function() {
        $('.main-navigation').removeClass('menu-open');
        $(this).remove(); // remove the cross button itself
    });
});
