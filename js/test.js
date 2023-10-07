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
    // $('.flex-right-nav li').click(function() {
    //     $('.flex-medium-nav svg path').attr('fill', '#606266');
    //     // Reset styles for all list items
    //     $('.flex-right-nav li').removeClass('selected');
    //     $('.flex-right-nav li div').css('color', '#050505');
    //     $('.flex-right-nav li svg path').attr('fill', '#050505');

    //     // Update styles for the clicked list item
    //     $(this).addClass('selected');
    //     $(this).find('div').css('color', '#bad8f2');
    //     $(this).find('svg path').attr('fill', '#0866FF');
    // });

    // // =====================Main-Dropdown-Menu-Nav-Right==================
    // var showAndHideDropdownMenu = false;
    // $('.Menu-Main').click(() => {
    //     $('.Dropdown-Message-Nav-Right').css('display', 'none');

    //     if (!showAndHideDropdownMenu) {
    //         $('.Main-Dropdown-Menu-Nav-Right').css('display', 'block');
    //         showAndHideDropdownMenu = true;

    //         // Update styles for the clicked list item
    //         $('.Menu-Messenger svg path').attr('fill', '');
    //         $('.Menu-Main').addClass('selected');
    //         $('.Menu-Main').find('div').css('color', '#bad8f2');
    //         $('.Menu-Main').find('svg path').attr('fill', '#0866FF');
    //         alert('hi');
    //     } else {
    //         $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
    //         showAndHideDropdownMenu = false;

    //         $('.Menu-Main svg path').attr('fill', '');
    //         $('.Menu-Messenger svg path').attr('fill', '');
    //         $('.Menu-Main').removeClass('selected');
    //         $('.Menu-Main div').css('color', '#050505');
    //         $('.Menu-Main svg path').attr('fill', '#050505');
    //     }
    // });
    // // =====================End Main-Dropdown-Menu-Nav-Right==================

    // // =====================Main-Dropdown-Message-Nav-Right==================
    // var showAndHideDropdownMessage = false;
    // $('.Menu-Messenger').click(() => {
    //     $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
    //     if(!showAndHideDropdownMessage){
    //         $('.Dropdown-Message-Nav-Right').css('display', 'block');
    //         showAndHideDropdownMessage = true;

    //         $('.Menu-Main svg path').attr('fill', '');
    //         $('.Menu-Messenger').addClass('selected');
    //         $('.Menu-Messenger').find('div').css('color', '#bad8f2');
    //         $('.Menu-Messenger').find('svg path').attr('fill', '#0866FF');
    //     }else{
    //         $('.Dropdown-Message-Nav-Right').css('display', 'none');
    //         showAndHideDropdownMessage = false;

    //         $('.Menu-Main svg path').attr('fill', '');
    //         $('.Menu-Messenger svg path').attr('fill', '');
    //         $('.Menu-Messenger').removeClass('selected');
    //         $('.Menu-Messenger div').css('color', '#050505');
    //         $('.Menu-Messenger svg path').attr('fill', '#050505');
    //     }
    // });

    // =====================End Main-Dropdown-Message-Nav-Right==================















































    // $(document).ready(() =>{

    //     function toggleListItem($element, $otherElement, $dropdown) {
    //         $element.toggleClass('selected');
    //         $element.find('div').css('color', $element.hasClass('selected') ? '#bad8f2' : '#050505');
    //         $element.find('svg path').attr('fill', $element.hasClass('selected') ? '#0866FF' : '#050505');

    //         // Hide the other menu
    //         $otherElement.removeClass('selected');
    //         $otherElement.find('div').css('color', '#050505');
    //         $otherElement.find('svg path').attr('fill', '#050505');

    //         // Toggle visibility of dropdown
    //         $dropdown.toggle();
    //     }

    //     $('.Main-Create').click(() => {
    //         toggleListItem($('.Main-Create'), $('.Menu-Messenger', '.Menu-Main', '.Main-notifications', '.Main-Your-profile'), $('.Dropdown-ADD-Nav-Right'));
    //         $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
    //         $('.Dropdown-Message-Nav-Right').css('display', 'none');
    //         $('.Dropdown-notifications-Nav-Right').css('display', 'none');
    //         $('.Dropdown-Profile-Nav-Right').css('display', 'none');
    //     });

    //     $('.Menu-Main').click(() => {
    //         toggleListItem($('.Menu-Main'), $('.Menu-Messenger','.Menu-Create', '.Main-notifications', '.Main-Your-profile'), $('.Main-Dropdown-Menu-Nav-Right'));
    //         $('.Dropdown-Message-Nav-Right').css('display', 'none');
    //         $('.Dropdown-ADD-Nav-Right').css('display', 'none');
    //         $('.Dropdown-notifications-Nav-Right').css('display', 'none');
    //         $('.Dropdown-Profile-Nav-Right').css('display', 'none');
    //     });

    //     $('.Menu-Messenger').click(() => {
    //         toggleListItem($('.Menu-Messenger'), $('.Menu-Main', '.Main-Create', '.Main-notifications', '.Main-Your-profile'), $('.Dropdown-Message-Nav-Right'));
    //         $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
    //         $('.Dropdown-ADD-Nav-Right').css('display', 'none');
    //         $('.Dropdown-notifications-Nav-Right').css('display', 'none');
    //         $('.Dropdown-Profile-Nav-Right').css('display', 'none');
    //     });

    //     $('.Main-notifications').click(() => {
    //         toggleListItem($('.Main-notifications'), $('.Menu-Main', '.Main-Create', '.Menu-Messenger', '.Main-Your-profile'), $('.Dropdown-notifications-Nav-Right'));
    //         $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
    //         $('.Dropdown-Profile-Nav-Right').css('display', 'none');
    //         $('.Dropdown-ADD-Nav-Right').css('display', 'none');
    //         $('.Dropdown-Message-Nav-Right').css('display', 'none');
    //     });


    //     $('.Main-Your-profile').click(() => {
    //         toggleListItem($('.Main-Your-profile'), $('.Menu-Main', '.Main-Create', '.Menu-Messenger', '.Main-notifications'), $('.Dropdown-Profile-Nav-Right'));
    //         $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
    //         $('.Dropdown-ADD-Nav-Right').css('display', 'none');
    //         $('.Dropdown-Message-Nav-Right').css('display', 'none');
    //         $('.Dropdown-notifications-Nav-Right').css('display', 'none');
    //     });
    // });


    $(document).ready(() =>{

        function toggleListItem($element, $otherElement, $dropdown) {
            $element.toggleClass('selected');
            $element.find('div').css('color', $element.hasClass('selected') ? '#bad8f2' : '#050505');
            $element.find('svg path').attr('fill', $element.hasClass('selected') ? '#0866FF' : '#050505');

            // Handle color change for other elements
            $otherElement.removeClass('selected');
            $otherElement.find('div').css('color', '#050505');
            $otherElement.find('svg path').attr('fill', '#050505');

            // Toggle visibility of dropdown
            $dropdown.toggle();
        }

        $('.Main-Create').click(() => {
            toggleListItem($('.Main-Create'), $('.Menu-Messenger, .Menu-Main, .Main-notifications, .Main-Your-profile'), $('.Dropdown-ADD-Nav-Right'));
            $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
            $('.Dropdown-Message-Nav-Right').css('display', 'none');
            $('.Dropdown-notifications-Nav-Right').css('display', 'none');
            $('.Dropdown-Profile-Nav-Right').css('display', 'none');
        });

        $('.Menu-Main').click(() => {
            toggleListItem($('.Menu-Main'), $('.Menu-Messenger, .Main-Create, .Main-notifications, .Main-Your-profile'), $('.Main-Dropdown-Menu-Nav-Right'));
            $('.Dropdown-Message-Nav-Right').css('display', 'none');
            $('.Dropdown-ADD-Nav-Right').css('display', 'none');
            $('.Dropdown-notifications-Nav-Right').css('display', 'none');
            $('.Dropdown-Profile-Nav-Right').css('display', 'none');
        });

        $('.Menu-Messenger').click(() => {
            toggleListItem($('.Menu-Messenger'), $('.Menu-Main, .Main-Create, .Main-notifications, .Main-Your-profile'), $('.Dropdown-Message-Nav-Right'));
            $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
            $('.Dropdown-ADD-Nav-Right').css('display', 'none');
            $('.Dropdown-notifications-Nav-Right').css('display', 'none');
            $('.Dropdown-Profile-Nav-Right').css('display', 'none');
        });

        $('.Main-notifications').click(() => {
            toggleListItem($('.Main-notifications'), $('.Menu-Main, .Main-Create, .Menu-Messenger, .Main-Your-profile'), $('.Dropdown-notifications-Nav-Right'));
            $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
            $('.Dropdown-Profile-Nav-Right').css('display', 'none');
            $('.Dropdown-ADD-Nav-Right').css('display', 'none');
            $('.Dropdown-Message-Nav-Right').css('display', 'none');
        });

        $('.Main-Your-profile').click(() => {
            toggleListItem($('.Main-Your-profile'), $('.Menu-Main, .Main-Create, .Menu-Messenger, .Main-notifications'), $('.Dropdown-Profile-Nav-Right'));
            $('.Main-Dropdown-Menu-Nav-Right').css('display', 'none');
            $('.Dropdown-ADD-Nav-Right').css('display', 'none');
            $('.Dropdown-Message-Nav-Right').css('display', 'none');
            $('.Dropdown-notifications-Nav-Right').css('display', 'none');
        });
    });




});
// =====================end nav right=====================
