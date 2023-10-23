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
            } else {
                $('#nav-main-search-input').show();
                $('.flex-right-nav').css('display', 'none');
                $('.nav-main-search-icon').css('background', '#F2F2F2');
                $('#img-navBar').css('display', 'none');
                $('.icon-profile').css('display', 'block');
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


    // ====================POST IMAGE====================
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
    // ====================END POST IMAGE====================


    $('#textarea_caption_input').emojioneArea({
        pickerPosition: 'bottom'
    });

    $('[role="application"]').click(function() {
        var minHeight = 3; // Set the minimum height in rem
        var contentHeight = this.scrollHeight;

        // Set the height to the greater of the content height or the minimum height
        $(this).css('height', Math.max(minHeight, contentHeight) + 'rem');
    });

    $('[data-bs-toggle="tooltip"]').tooltip();


    // ==============Reach on POST =============
    $(document).ready(function () {
        // Handle icon click event
        $('[class^="icon_"]').on('click', function () {
            // Extract the post_id from the class attribute
            var post_id = $(this).attr('class').split('_')[1];

            console.log(post_id);
            // Hide the tooltip
            $(`.Top_reach_select${post_id}`).addClass('visible').removeClass('invisible');
            $('[data-bs-toggle="tooltip"]').tooltip('hide');

            // Remove existing <i> element
            $(`.hover_show_reach_select${post_id} i`).remove();
            $(`.hover_show_reach_select${post_id} img`).remove();
            $(`.hover_show_reach_select_top${post_id} img`).remove();


            // Create a new <i> element with a background image
            var newIcon = $('<i></i>').css({
                'background-image': `url(${this.src})`,
                'width': '20px',
                'height': '20px',
                'background-size': 'contain'
            });

            $(`.hover_show_reach_select${post_id}`).append(newIcon);

            // Create a new <img> element
            var newImageTop = $('<img>').attr({
                'src': this.src,
                'alt': $(this).attr('alt'),
                'width': '20px',
                'height': '20px'
            });

            $(`.hover_show_reach_select_top${post_id}`).append(newImageTop);

            // Update selected text
            $(`#selectedText${post_id}`).text($(this).attr('alt'));
            var selectedText = $(`#selectedText${post_id}`).text();
            $(`.hide_and_name_user_reach${post_id}`).addClass('d-block').removeClass('d-none');

            // Send the image to the server
            storeImage(post_id, this.src, selectedText);
        });
        // function insert icon reach to database
        function storeImage(post_id, img_url, text_icon) {
            $.ajax({
                url: '../../php/store_icon_reach.php', // Adjust the path to your server-side script
                type: 'POST',
                data: {
                    post_id: post_id ,
                    image_url: img_url,
                    text_icon: text_icon
                },
                success: function (response) {
                    console.log('Image stored successfully:', response);
                },
                error: function (error) {
                    console.error('Error storing image:', error);
                }
            });
        }



        // Handle click and remove text and image
        $('[data-id-reach]').on('click', function () {
            var post_id = $(this).data('id-reach');
            $(`.Top_reach_select${post_id}`).addClass('invisible').removeClass('visible');


            // Set default value for i (icon)
            var defaultIcon = $('<i></i>').css({
                'background-image': 'url(https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/BBpOFqlaCQ6.png?_nc_eui2=AeEWzJMqwvFWV9CzCsMajqC6b1QDXe9Wg-BvVANd71aD4AdlPG4d6qP3DBdrU0wmxsEcofGCcHmT3ufI5mzXsK1_)',
                'background-position': '0px -352px',
                'background-size': '22px 620px',
                'width': '20px',
                'height': '20px',
                'background-repeat': 'no-repeat',
                'display': 'inline-block'
            });

            // Add defaultIcon to the hover_show_reach_select
            $(`.hover_show_reach_select${post_id}`).html(defaultIcon);
            $(`.hide_and_name_user_reach${post_id}`).addClass('d-none').removeClass('d-block');

            // Set default value for selectedText
            $(`#selectedText${post_id}`).text('Like');
            var selectedText = $(`#selectedText${post_id}`).text();
            // Get the URL from the default icon
            var defaultIconURL = defaultIcon.css('background-image').replace(/url\(['"](.+)['"]\)/, '$1');
            console.log(selectedText,defaultIconURL);

            // Send a request to remove the image from the server
            removeImage(post_id,selectedText,defaultIconURL);
        });

        // function to remove image from the server
        function removeImage(post_id, selectedText, defaultIconURL) {
            // Make an AJAX request to remove the image associated with the post_id
            $.ajax({
                url: '../../php/remove_icon_reach.php', // adjust the path to your server-side script
                type: 'POST',
                data: {
                    post_id: post_id,
                    text_icon: selectedText,
                    icon_url: defaultIconURL
                },
                success: function (response) {
                    console.log('Image removed successfully:', response);
                },
                error: function (error) {
                    console.error('Error removing image:', error);
                }
            });
        }

    });
    // ==============End Reach on POST =============


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


    // ===============Delete Post===================
    $(document).ready(function () {
        // Handle delete post click
        $('[data_postId]').on('click', function (e) {
            e.preventDefault();
            var postId = $(this).data('postid');
            console.log(postId);
            // Show confirmation dialog
            var isConfirmed = confirm('Are you sure you want to delete this post?');

            // If user confirms, send Ajax request to delete post
            if (isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '../../php/deletePost_handler.php', // Replace with the actual path to your PHP file
                    data: { post_id: postId },
                    success: function (response) {
                        console.log(response);
                        window.location.href = '../../html/home/home.php';
                    },
                    error: function (xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    });
    // ===============End Delete post===================



    // ===============Edit Post===================
    $(document).ready(function () {

        $('[id^="editPost_"]').on('click', function () {
            const postId = $(this).data('postid');
            const captionElement = $(`#caption_${postId}`);
            const editContainer = $(`#sub_edit_postId_${postId}`);
            const editTextArea = $(`#editTextArea_${postId}`);
            editTextArea.emojioneArea({
                pickerPosition: 'bottom'
            });
            $('[data-bs-toggle="tooltip"]').tooltip();
            captionElement.hide();
            editContainer.show();
        });

        $('.save-edit-button').on('click', function () {
            const postId = $(this).data('postid');
            const captionElement = $(`#caption_${postId}`);
            const editContainer = $(`#sub_edit_postId_${postId}`);
            const editTextArea = $(`#editTextArea_${postId}`);
            const newCaption = editTextArea.val();

            $.ajax({
                url: '../../php/updatePost_handler.php',
                method: 'POST',
                data: { post_id: postId, new_caption: newCaption },
                dataType: 'json',
                success: function (data) {
                    if (data.success) {
                        captionElement.text(newCaption);
                        editContainer.hide();
                        captionElement.show();
                    } else {
                        console.error('Failed to update caption.');
                    }
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        });
    });
    // ===============End Edit Post===================



    // ===============Upload Profile Image===================
    $('#profile-text-upload').emojioneArea({
        pickerPosition: 'bottom'
    });
    //=========== get image on profile ===========
    $(document).ready(function () {
        $('.Profile-user-upload-1').on('click', function () {
          $('#UPLOAD_PROFILE_IMAGE').modal('show');
        });

        // click on profile image
        $('#profile-photo-upload').on('click', function (e) {
          $('#profile-file-upload').click();
        });

        // handle file input change
        $('#profile-file-upload').on('change', function () {
          $('#profile-photo-upload').css('display', 'none');
          $('#uploaded-image').css('display', 'block');
          $('.resize-controls').addClass('d-block').removeClass('d-none');
          var input = this;

          var url = URL.createObjectURL(input.files[0]);
          $('#uploaded-image').attr('src', url);
          $('#save-image-profile-upload').prop('disabled', false);
          $('.main-resize-controls-line').addClass('d-flex').removeClass('d-none');
        });

        // Remove all elements
        $('#clear-image-profile-upload').on('click', function () {
          // Clear the image source
          $('#uploaded-image').attr('src', '');

          // Hide relevant buttons and reset styles
          $('#profile-photo-upload').css('display', 'block');
          $('#uploaded-image').css('display', 'none');
          $('.resize-controls').addClass('d-none').removeClass('d-block');

          // Reset the file input value to allow re-uploading the same image
          $('#profile-file-upload').val('');
          $('#save-image-profile-upload').prop('disabled', true);
          $('.main-resize-controls-line').addClass('d-none').removeClass('d-flex');
        });
    });
    //=========== end get image on profile ===========



    $(document).ready(function () {
        //=========== hold change position image ===========
        var isDragging = false;
        var initialX = 0;
        var translateX = 0;
        var scale = 1;

        $('.show-image-upload img').on('mousedown', function (e) {
          isDragging = true;
          initialX = e.pageX;
          $(this).parent().addClass('grabbing');
        });

        $(document).on('mouseup mouseleave', function () {
          isDragging = false;
          $('.show-image-upload').removeClass('grabbing');
        });

        $(document).on('mousemove', function (e) {
          if (isDragging) {
            var deltaX = e.pageX - initialX;
            translateX += deltaX;

            var maxTranslation = 250;
            translateX = Math.max(-maxTranslation, Math.min(maxTranslation, translateX));

            updateTransform();
            initialX = e.pageX;

            console.log(translateX);
          }
        });
        //=========== end hold change position image ===========

        //=========== zoom in and zoom out ===========
        var scaleIncrement = 0.1;
        var maxImageSize = 2.5;
        var imageSize = 1;

        $('.zoom-down').on('click', function () {
          if (imageSize > 1) {
            imageSize -= scaleIncrement;
            updateTransform();
            updateMarginPosition();
          }
        });

        $('.zoom-up').on('click', function () {
          if (imageSize < maxImageSize) {
            imageSize += scaleIncrement;
            updateTransform();
            updateMarginPosition();
          }
        });

        function updateMarginPosition() {
          var marginValue = 10 * imageSize; // Adjust the multiplier as needed
          var resizeControlBefore = $('.resize-controls-line');
          if (imageSize > 1) {
            // Update margin position based on the calculated margin value
            resizeControlBefore.css('margin-left', (marginValue * 3.6) + '%');
          } else {
            // Set a default margin value when zoomed out
            resizeControlBefore.css('margin-left', '0px');
          }
          console.log('Resize control margin:', marginValue * 16.5);
        }
        //=========== end zoom in and zoom out ===========


        //=========== upload image into database ===========
        var user_id = $('[name="user_id"]').val();

        $('#profile-file-upload').on('change', function () {
            var input = this;
            if (input.files.length > 0) {
                var image_path = input.files[0];
                displayImage(image_path);
            } else {
                console.log('No file selected.');
            }
        });

        function displayImage(file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var imageDataURL = e.target.result;
                $('#uploaded-image').attr('src', imageDataURL);
            };

            reader.readAsDataURL(file);
        }

        $('#save-image-profile-upload').on('click', function () {
            var input = $('#profile-file-upload')[0];

            if (input.files.length > 0) {
                var image_path = input.files[0];
                console.log(image_path);
                saveImageState(image_path);
            } else {
                console.log('No file selected.');
            }
        });

        function updateTransform() {
            var transformValue = `translate3d(${translateX}px, 0, 0) scale(${imageSize})`;
            $('.show-image-upload img').css('transform', transformValue);
        }

        function saveImageState(image_path) {
            var pro_text_upload = $('#profile-text-upload').val();

            var formData = new FormData();
            formData.append('user_id', user_id);
            formData.append('image', image_path);
            formData.append('translateX', translateX);
            formData.append('imageSize', imageSize);
            formData.append('txt_pro', pro_text_upload);

            $.ajax({
                type: 'POST',
                url: '../../php/save_image_pro.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log('Image state saved:', response);
                    window.location.href='../home/home.php';
                },
                error: function (error) {
                    console.error('Error saving image state:', error);
                }
            });
        }
        //=========== end upload image into database ===========
    });
    // ===============end Upload Profile Image===================



    //================Menu on Profile ==================
    const spans = document.querySelectorAll('.content-on-profile-text span');
    spans.forEach(span => {
        span.addEventListener('click', function () {
            // Remove blur class from all spans
            spans.forEach(s => s.classList.remove('blur'));

            // Add blur class to the clicked span
            this.classList.add('blur');
        });
    });

    $(document).ready(function () {
        var menuItems = $('.Menu-Content-About-hover');

        menuItems.click(function () {
            // Remove blur class from all items
            menuItems.removeClass('blur');

            // Add blur class to the clicked item
            $(this).addClass('blur');
        });
    });

    //================End Menu on Profile ==================
});
// =====================end nav right=====================
