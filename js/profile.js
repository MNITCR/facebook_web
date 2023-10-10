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



    // logout
    $('#logout-nav-right').click(() => {
        if (confirm('Are you sure you want to log out?')) {
            window.location.href = '../../index.php';
        }
    });


    // VideoORImage
    $('#VideoORImage').click(() => {
        $('#Video_OR_Image_1').modal('show');
    });


    // Store the original content before appending an image or video
    var originalContent = $('.Select_image_1').html();

    // Event handler for selecting image or video
    $('#Main_Select_image').click(() => {
        document.getElementById('fileInput').click();
    });

    // Event handler for clearing the image or video
    $('.clear_video_image').click(() => {
        // Reset styles for the container
        $('.Select_image').css({
            paddingBottom: '2.5rem',
            paddingTop: '2.5rem',
        });

        // Remove the image or video
        $('.Select_image_1').empty();
        // Show the original content before the image or video was appended
        $('.Select_image_1').html(originalContent);

        // Reset the file input
        $('#fileInput').val('');

        // Hide the clear_image icon
        $('.clear_video_image').addClass('d-none');

        // Disable the button
        $('#Video_OR_Image_POST').prop('disabled', true);

        // Event handler for file input change
    $('#fileInput').change(function () {
        displaySelectedFile(this);
    });
    });

    // Event handler for file input change
    $('#fileInput').change(function () {
        displaySelectedFile(this);
    });

    // Event handlers for drag and drop
    $('.Select_image').on({
        dragenter: function (e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css('border', '2px solid #0B85A1');
        },
        dragover: function (e) {
            e.stopPropagation();
            e.preventDefault();
        },
        dragleave: function (e) {
            e.stopPropagation();
            e.preventDefault();
            $(this).css('border', '2px dashed #ccc');
        },
        drop: function (e) {
            e.preventDefault();
            $(this).css('border', '2px dashed #ccc');

            var files = e.originalEvent.dataTransfer.files;
            $('#fileInput')[0].files = files;

            displaySelectedFile($('#fileInput')[0]);
        }
    });

    // Function to display the selected image or video
    function displaySelectedFile(input) {
        const file = input.files[0];

        if (file) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const fileType = file.type.split('/')[0]; // 'image' or 'video'

                if (fileType === 'image') {
                    const imgElement = $('<img>').attr('src', e.target.result).css({
                        width: '100%',
                        height: '250px',
                        padding: '0',
                        margin: '0',
                        borderRadius: '5px',
                        display: 'block',
                        objectFit: 'cover',
                        zIndex: '1',
                    });

                    // Clear existing images or videos
                    $('.Select_image_1').empty();

                    // Append the new image to the container
                    $('.Select_image_1').append(imgElement);
                } else if (fileType === 'video') {
                    const videoElement = $('<video controls>').attr('src', e.target.result).css({
                        width: '100%',
                        height: '250px',
                        padding: '0',
                        margin: '0',
                        borderRadius: '5px',
                        display: 'block',
                        objectFit: 'cover',
                        zIndex: '1',
                    });

                    // Clear existing images or videos
                    $('.Select_image_1').empty();

                    // Append the new video to the container
                    $('.Select_image_1').append(videoElement);
                }

                // Reset styles for the container
                $('.Select_image').css({
                    paddingBottom: '0',
                    paddingTop: '0',
                });

                // Show the clear_image icon with a higher zIndex
                $('.clear_video_image').removeClass('d-none');

                // Enable the button
                $('#Video_OR_Image_POST').prop('disabled', false);
            };

            reader.readAsDataURL(file);
        } else {
            // No file selected, disable the button and hide the clear_image icon
            $('#Video_OR_Image_POST').prop('disabled', true);
            $('.clear_video_image').addClass('d-none');
        }
    }


    $('#textarea_caption_input').emojioneArea({
        pickerPosition: 'bottom'
    });
    // textarea_caption_input
    // $('#textarea_caption_input').on('input', function() {
    //     $(this).css('height', 'auto');
    //     $(this).css('height', (this.scrollHeight) + 'px');
    // });


    $('[role="application"]').click(function() {
        var minHeight = 3; // Set the minimum height in rem
        var contentHeight = this.scrollHeight;

        // Set the height to the greater of the content height or the minimum height
        $(this).css('height', Math.max(minHeight, contentHeight) + 'rem');
    });

    $('[data-bs-toggle="tooltip"]').tooltip();


    // Add click event listener to each icon
    document.querySelectorAll('.icon').forEach(function (icon) {
        icon.addEventListener('click', function () {
            // Hide the tooltip
            $('.Top_reach_select').addClass('visible');
            $('.Top_reach_select').removeClass('invisible');
            $('[data-bs-toggle="tooltip"]').tooltip('hide');
            // Remove existing <i> element
            var existingIcon = document.querySelector('.hover_show_reach_select i');
            if (existingIcon) {
                existingIcon.remove();
            }
            var existingIconTop = document.querySelector('.hover_show_reach_select_top i');
            if (existingIconTop) {
                existingIconTop.remove();
            }
            // Create a new <i> element with a background image
            var newIcon = document.createElement('i');
            newIcon.style.backgroundImage = 'url(' + icon.src + ')';
            newIcon.style.width = '20px';
            newIcon.style.height = '20px';
            newIcon.style.backgroundSize = 'contain';

            // Icon top
            var newIconTop = document.createElement('i');
            newIconTop.style.backgroundImage = 'url(' + icon.src + ')';
            newIconTop.style.width = '20px';
            newIconTop.style.height = '20px';
            newIconTop.style.backgroundSize = 'contain';

            document.querySelector('.hover_show_reach_select').appendChild(newIcon);
            document.querySelector('.hover_show_reach_select_top').appendChild(newIconTop);

            // Update selected text
            document.getElementById('selectedText').innerText = icon.alt;
        });
    });

    // function update when clicked on button like again
    function updateWhenClickedAgain() {
        // Remove the selected icon
        var selectedIcon = document.querySelector('.hover_show_reach_select i');
        if (selectedIcon) {
            selectedIcon.remove();
            // Reset selected text
            document.getElementById('selectedText').innerText = 'Like';

             // Add default <i> element back
            var defaultIcon = document.createElement('i');
            defaultIcon.style.backgroundImage = "url('https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/BBpOFqlaCQ6.png?_nc_eui2=AeEWzJMqwvFWV9CzCsMajqC6b1QDXe9Wg-BvVANd71aD4AdlPG4d6qP3DBdrU0wmxsEcofGCcHmT3ufI5mzXsK1_')";
            defaultIcon.style.backgroundPosition = '0px -352px';
            defaultIcon.style.backgroundSize = '22px 620px';
            defaultIcon.style.width = '20px';
            defaultIcon.style.height = '20px';
            defaultIcon.style.backgroundRepeat = 'no-repeat';
            defaultIcon.style.display = 'inline-block';

            document.querySelector('.hover_show_reach_select').appendChild(defaultIcon);
        }
    }
    // Add click event listener to the hover_show_reach element
    document.querySelector('.hover_show_reach_select').addEventListener('click', function () {
        updateWhenClickedAgain();
        $('.Top_reach_select').addClass('invisible');
        $('.Top_reach_select').removeClass('visible');
    });

    document.querySelector('.Main_selectedText').addEventListener('click', function () {
        updateWhenClickedAgain();
        $('.Top_reach_select').addClass('invisible');
        $('.Top_reach_select').removeClass('visible');
    });

});
// =====================end nav right=====================
