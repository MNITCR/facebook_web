// =================nav left===============
$(document).ready(function () {
    let isSearchInputVisible = false;

    function handleWindowSize() {
        if ($(window).width() < 450) {
            $('.flex-right-nav').css('display', 'flex');
            $('.icon-profile').css('display', 'none');

        // Click event for search icon
        $('.nav-main-search-icon').off('click').on('click', function (e) {
            e.stopPropagation();

            if (isSearchInputVisible) {
                $('#img-navBar').css('display', 'block');
                $('#nav-main-search-input').hide();
                $('.flex-right-nav').css('display', 'flex');
                $('.nav-main-search-icon').css('background', '#D8DADF');
                $('.icon-profile').css('display', 'none');
                alert('Search');
            } else {
                $('#nav-main-search-input').show();
                $('.flex-right-nav').css('display', 'none');
                $('.nav-main-search-icon').css('background', '#F2F2F2');
                $('#img-navBar').css('display', 'none');
                $('.icon-profile').css('display', 'block');
                alert('No');
            }
            isSearchInputVisible = !isSearchInputVisible;
        });
      } else {
        $('#nav-main-search-input').show();
            $('.icon-profile').css('display', 'none');
            $('#img-navBar').css('display', 'block');
            $('#nav-main-search-icon').css('display', 'block');
            $('.flex-right-nav').css('display', 'flex');
            $('.nav-main-search-icon').css('background', '#F2F2F2');
            isSearchInputVisible = false; // Reset the flag
        }
    }

    // Initial handling on document load
    handleWindowSize();

    // Handle window resize
    $(window).resize(function () {
        handleWindowSize();
    });

    $('.icon-profile').click(() => {
        $('#nav-main-search-input').hide();
        $('.icon-profile').css('display', 'none');
        $('#img-navBar').css('display', 'block');
        $('#nav-main-search-icon').css('display', 'block');
        $('.flex-right-nav').css('display', 'flex');
        $('.nav-main-search-icon').css('background', '#F2F2F2');
        isSearchInputVisible = false; // Reset the flag
    });
});
// =================end nav left===============


// =====================nav medium===================
$(document).ready(function() {
    $('.flex-medium-nav li').click(function() {
      // Reset fill color for all SVGs
      $('.flex-medium-nav li svg path').attr('fill', '#606266');
      // Change fill color to #0866FF for the clicked SVG
      $(this).find('svg path').attr('fill', '#0866FF');
      $('.flex-right-nav li div').css('color', '#050505');
      $('.flex-right-nav li svg path').attr('fill', '#050505');
    });
});
// =====================end medium===================


// ======================nav right=====================
$(document).ready(function() {
    // Click event to icon
    $('.flex-right-nav li').click(function() {
        $('.flex-medium-nav svg path').attr('fill', '#606266');
        // Reset styles for all list items
        $('.flex-right-nav li').removeClass('selected');
        $('.flex-right-nav li div').css('color', '#050505');
        $('.flex-right-nav li svg path').attr('fill', '#050505');

        // Update styles for the clicked list item
        $(this).addClass('selected');
        $(this).find('div').css('color', '#bad8f2');
        $(this).find('svg path').attr('fill', '#0866FF');
    });

    // 
});
// =====================end nav right=====================
