$(document).ready(function () {
    // Use window.onload as an event listener

    let FUllNAME = $('.FUllNAME').text();
    $.ajax({
        url: '../../php/getIMG_handler.php',
        method: 'GET',
        dataType: 'json',
        success: function (data) {
            // Iterate through posts and update the DOM
            data.forEach(function (post) {
                console.log(post.image_urls);
                $monthMapping = {
                    '1' : 'January',
                    '2' : 'February',
                    '3' : 'March',
                    '4' : 'April',
                    '5' : 'May',
                    '6' : 'June',
                    '7' : 'July',
                    '8' : 'August',
                    '9' : 'September',
                    '10' : 'October',
                    '11' : 'November',
                    '12' : 'December'
                };
                var currentMonth = $monthMapping[post.post_month];
                var postHtml = `
                <div class="sub-content-on-profile-All-Posts mb-3">
                <div class="">
                    <div class="">
                        <div class="main_name_detail" style="display: flex; justify-items: center;width: 100%;">
                            <div class="" style="border-radius: 50%;width: 40px;height: 40px;background: #606266;">
                                <img src="../../html/userImg/logoUser1.png" alt="" style="width: 40px;height: 40px;border-radius: 50%">
                            </div>

                            <!-- name detail -->
                            <div class="name_detail">
                            <!-- left -->
                            <div class="name_detail_left">
                                <div class="">
                                <h6>${FUllNAME}</h6>
                                </div>
                                <div class="">
                                <span>${currentMonth} ${post.post_day}, ${post.post_year} .
                                    <i style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yt/r/C9BvCcWK0Z8.png?_nc_eui2=AeFmqznzgvfftsHTj8vEEzEatuRYejGsUIq25Fh6MaxQikM_zeNc4YUQR3FHaIkc7Xfha3L1oDMlCh86eiDEsYS0');
                                    background-position: 0 -236px;
                                    background-size: 26px 264px;
                                    width: 12px;
                                    height: 12px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                    </i> .
                                    <svg fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em" title="Shared with Your friends of friends" style="position: relative;bottom: 2.8px">
                                    <title>Shared with Your friends of friends</title>
                                    <g fill-rule="evenodd" transform="translate(-448 -544)">
                                        <path d="M451 552c-.827 0-1.5-.784-1.5-1.75 0-1.08.575-1.75 1.5-1.75s1.5.67 1.5 1.75c0 .966-.673 1.75-1.5 1.75m10 0c-.827 0-1.5-.784-1.5-1.75 0-1.08.575-1.75 1.5-1.75s1.5.67 1.5 1.75c0 .966-.673 1.75-1.5 1.75m-5-.5c-1.24 0-2.25-1.121-2.25-2.5 0-1.542.863-2.5 2.25-2.5s2.25.958 2.25 2.5c0 1.379-1.01 2.5-2.25 2.5m-5.5 5.06v-.496c0-.963.303-1.856.815-2.593a.3.3 0 0 0-.245-.471h-.388a2.685 2.685 0 0 0-2.682 2.682 1.32 1.32 0 0 0 1.318 1.318h.886a.302.302 0 0 0 .3-.318 1.975 1.975 0 0 1-.004-.122m8.56 1.44h-6.12c-.794 0-1.44-.646-1.44-1.44v-.496a3.568 3.568 0 0 1 3.564-3.564h1.872a3.568 3.568 0 0 1 3.564 3.564v.496c0 .794-.646 1.44-1.44 1.44m2.258-5h-.387a.3.3 0 0 0-.247.471c.513.737.816 1.63.816 2.593v.496c0 .04-.002.081-.004.122a.3.3 0 0 0 .3.318h.886a1.32 1.32 0 0 0 1.318-1.318 2.685 2.685 0 0 0-2.682-2.682"></path>
                                    </g>
                                    </svg>
                                </span>
                                </div>
                            </div>

                            <!-- right -->
                            <div class="name_detail_right">
                                <div class="name_detail_right-btn dropdown-center" name_detail_right_icon  data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo">
                                        <g fill-rule="evenodd" transform="translate(-446 -350)">
                                        <path d="M458 360a2 2 0 1 1-4 0 2 2 0 0 1 4 0m6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0"></path>
                                        </g>
                                    </svg>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#" data-postid="${post.post_id}" data_postId>Delete</a></li>
                                        <li><a class="dropdown-item" href="" data-postid="${post.post_id}" id="editPost_${post.post_id}">Edit Text</a></li>
                                    </ul>
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Social -->
                    <div class="">
                        <div class="Main-Social-post_PRO">
                            <div class="main_edit_postId">
                                <p id="caption_${post.post_id}" class="">${post.caption}</p>
                                <div class="mb-3" id="sub_edit_postId_${post.post_id}" style="display: none;">
                                    <textarea class="form-control" id="editTextArea_${post.post_id}" style="height: 10px; border: none; outline: none;" placeholder="Enter your new text">${post.caption}</textarea>
                                    <button class="save-edit-button btn btn-primary mt-2 col-12" data-postid="${post.post_id}" data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-title="Save">
                                        <i class="fa-solid fa-upload text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <img src="../${post.file_path}" />
                        </div>

                        <!-- Social -->


                        ${post.image_urls && post.image_urls.length > 0 && post.image_urls[0] !== ""
                            ? `
                                <div class="Top_reach_select${post.post_id} d-flex align-items-center gap-1 visible" style="position: relative;top: 10px;">
                                    <div class="hover_show_reach_select_top${post.post_id}" style="display: flex;align-items: center;">
                                        <img src="${post.image_urls}" style="width: 20px;height: 20px;"/>
                                    </div>
                                    <div class="visible" style="position: relative; top: 4px;">
                                        <h6 style="font-weight: 400;">${FUllNAME}</h6>
                                    </div>
                                </div>
                            `
                            :  `
                                <div class="Top_reach_select${post.post_id} d-flex align-items-center gap-1 visible" style="position: relative; top: 10px;">
                                    <div class="hover_show_reach_select_top${post.post_id}" style="display: flex; align-items: center;">
                                        <!-- i -->
                                    </div>
                                    <div class="hide_and_name_user_reach${post.post_id} ${post.image_urls && post.image_urls.length > 0 && post.image_urls[0] !== "" ? 'd-block' : 'd-none'}" style="position: relative; top: 4px;">
                                        <h6 style="font-weight: 400;">${FUllNAME}</h6>
                                    </div>
                                </div>
                                `
                        }




                        <hr style ="
                            display: block;
                            margin-bottom: 0.2em;
                            margin-left: auto;
                            margin-right: auto;
                            border-style: inset;
                            border-width: 1px;
                        "/>
                        <div class="main-group-social">

                            <!-- like -->
                            <div class="group-social" id="hover_show_reach" style="position: relative;">
                                <div class="hover_show_reach_select${post.post_id}" style="display: flex;align-items: center;">
                                    ${post.image_urls && post.image_urls.length > 0 && post.image_urls[0] !== ""
                                        ? `<img src="${post.image_urls}" style="width: 20px;height: 20px;"/>
                                        `
                                        : `<i style="
                                            background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/BBpOFqlaCQ6.png?_nc_eui2=AeEWzJMqwvFWV9CzCsMajqC6b1QDXe9Wg-BvVANd71aD4AdlPG4d6qP3DBdrU0wmxsEcofGCcHmT3ufI5mzXsK1_');
                                            background-position: 0px -352px;
                                            background-size: 22px 620px;
                                            width: 20px;
                                            height: 20px;
                                            background-repeat: no-repeat;
                                            display: inline-block;
                                        "></i>`
                                    }
                                </div>
                                <!-- Container for icons on hover -->
                                <div class="icons-container">
                                    <!-- Like -->
                                    <img class="icon_${post.post_id}" src="../../html/Icon6/like.png" alt="Like" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Like"/>
                                    <!-- Love -->
                                    <img class="icon_${post.post_id}" src="../../html/Icon6/love.svg" alt="Love" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Love">
                                    <!-- Care -->
                                    <img class="icon_${post.post_id}" src="../../html/Icon6/car.svg" alt="Care" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Care">
                                    <!-- Hasha -->
                                    <img class="icon_${post.post_id}" src="../../html/Icon6/hasha.svg" alt="Hasha" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hasha">
                                    <!-- Wow -->
                                    <img class="icon_${post.post_id}" src="../../html/Icon6/wow.svg" alt="Wow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Wow">
                                    <!-- Sad -->
                                    <img class="icon_${post.post_id}" src="../../html/Icon6/sad.svg" alt="Sad" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sad">
                                    <!-- Angry -->
                                    <img class="icon_${post.post_id}" src="../../html/Icon6/angry.svg" alt="Angry" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Angry">
                                </div>
                                <div class="Main_selectedText" style="display: flex;align-items: center;" data-id-reach="${post.post_id}">
                                    ${post.text_icon && post.text_icon.length > 0
                                        ? `<h6 id="selectedText${post.post_id}" style="position: relative;top: 4px;">${post.text_icon}</h6>`
                                        : `<h6 id="selectedText${post.post_id}" style="position: relative;top: 4px;">Like</h6>`
                                    }
                                </div>
                            </div>

                            <!-- Comment -->
                            <div class="group-social">
                                <div class="" style="display: flex;align-items: center;">
                                    <i style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/BBpOFqlaCQ6.png?_nc_eui2=AeEWzJMqwvFWV9CzCsMajqC6b1QDXe9Wg-BvVANd71aD4AdlPG4d6qP3DBdrU0wmxsEcofGCcHmT3ufI5mzXsK1_');
                                    background-position: 0px -176px;
                                    background-size: 22px 620px;
                                    width: 20px;
                                    height: 20px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                    </i>
                                </div>
                                <div class="" style="display: flex;align-items: center;">
                                    <h6 style="position: relative;top: 3px;">Comment</h6>
                                </div>
                            </div>

                            <!-- Share -->
                            <div class="group-social">
                                <div class="" style="display: flex;align-items: center;">
                                    <i style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/BBpOFqlaCQ6.png?_nc_eui2=AeEWzJMqwvFWV9CzCsMajqC6b1QDXe9Wg-BvVANd71aD4AdlPG4d6qP3DBdrU0wmxsEcofGCcHmT3ufI5mzXsK1_');
                                    background-position: 0px -462px;
                                    background-size: 22px 620px;
                                    width: 20px;
                                    height: 20px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                    </i>
                                </div>
                                <div class="" style="display: flex;align-items: center;">
                                    <h6 style="position: relative;top: 2px;">Share</h6>
                                </div>
                            </div>
                        </div>
                        <hr style ="
                            display: block;
                            margin-left: auto;
                            margin-top: 0.3em;
                            margin-right: auto;
                            border-style: inset;
                            border-width: 1px;
                        "/>
                    </div>

                    <!-- Comment on post -->
                    <div class="main-comment-on-post">
                        <div class="comment-on-post" style="display: flex;justify-content: space-between;">
                            <div class="" style="position: relative;">
                                <img
                                    src="../../html/userImg/logoUser1.png"
                                    alt=""
                                    width="33px"
                                    height="33px"
                                    style="border-radius: 50%;"
                                />
                            <div class="" style="position: absolute;top: 20px;left: 23px; border-radius: 50%;background: #dcdcdc;width: 12px;height: 12px;display: flex;align-items: center;justify-content: center;cursor: pointer;">
                                <svg fill="currentColor" viewBox="0 0 16 16" width="1em" height="1em">
                                    <g fill-rule="evenodd" transform="translate(-448 -544)"><path fill-rule="nonzero" d="M452.707 549.293a1 1 0 0 0-1.414 1.414l4 4a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L456 552.586l-3.293-3.293z"></path>
                                    </g>
                                </svg>
                            </div>
                        </div>

                        <!-- comment-on-post-2 -->
                        <div class="comment-on-post-2">
                            <div class="" style="width: 100%;top: 3px;position: relative;">
                                <textarea name="" id="" cols="40" rows="1" style="width: 100%;" placeholder="Write a comment...."></textarea>
                            </div>
                            <div class="" style="display: flex;align-items: center;">
                                <div title="Comment with an avatar sticker" class="comment-on-post-2-icon">
                                <i
                                    data-visualcompletion="css-img"
                                    class="x1b0d499 x1d69dk1"
                                    style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yg/r/OH3b5mzlwwA.png?_nc_eui2=AeHvXMJ-Kt8PbatNoMEYmDSly_fTt-nCLGnL99O36cIsaRbs5VY714eKI7GJX4zMThWXyRARwBbbnsqsCxToXPPi');
                                    background-position: 0px -304px;
                                    background-size: 26px 656px;
                                    width: 16px;
                                    height: 16px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                </i>
                                </div>

                                <div title="Insert an emoji" class="comment-on-post-2-icon">
                                <i
                                    data-visualcompletion="css-img"
                                    class="x1b0d499 x1d69dk1"
                                    style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yg/r/OH3b5mzlwwA.png?_nc_eui2=AeHvXMJ-Kt8PbatNoMEYmDSly_fTt-nCLGnL99O36cIsaRbs5VY714eKI7GJX4zMThWXyRARwBbbnsqsCxToXPPi');
                                    background-position: 0px -412px;
                                    background-size: 26px 656px;
                                    width: 16px;
                                    height: 16px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                </i>
                                </div>

                                <div title="Attach a photo or video" class="comment-on-post-2-icon">
                                <i
                                    style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yg/r/OH3b5mzlwwA.png?_nc_eui2=AeHvXMJ-Kt8PbatNoMEYmDSly_fTt-nCLGnL99O36cIsaRbs5VY714eKI7GJX4zMThWXyRARwBbbnsqsCxToXPPi');
                                    background-position: 0px -340px;
                                    background-size: 26px 656px;
                                    width: 16px;
                                    height: 16px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                </i>
                                <input
                                    accept="video/*,  video/x-m4v, video/webm, video/x-ms-wmv, video/x-msvideo, video/3gpp, video/flv, video/x-flv, video/mp4, video/quicktime, video/mpeg, video/ogv, .ts, .mkv, image/*, image/heic, image/heif"
                                    type="file"
                                    style="display: none;"
                                />
                                </div>

                                <div title="Comment with a GIF" class="comment-on-post-2-icon">
                                <i
                                    style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yg/r/OH3b5mzlwwA.png?_nc_eui2=AeHvXMJ-Kt8PbatNoMEYmDSly_fTt-nCLGnL99O36cIsaRbs5VY714eKI7GJX4zMThWXyRARwBbbnsqsCxToXPPi');
                                    background-position: 0px -448px;
                                    background-size: 26px 656px;
                                    width: 16px;
                                    height: 16px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                </i>
                                </div>

                                <div title="Comment with a Sticker" class="comment-on-post-2-icon">
                                <i
                                    style="
                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yg/r/OH3b5mzlwwA.png?_nc_eui2=AeHvXMJ-Kt8PbatNoMEYmDSly_fTt-nCLGnL99O36cIsaRbs5VY714eKI7GJX4zMThWXyRARwBbbnsqsCxToXPPi');
                                    background-position: 0px -574px;
                                    background-size: 26px 656px;
                                    width: 16px;
                                    height: 16px;
                                    background-repeat: no-repeat;
                                    display: inline-block;
                                    ">
                                </i>
                                </div>
                            </div>

                            <!-- send -->
                            <div class="comment-on-post-2-send">
                                <div aria-disabled="true" title="Comment"
                                    class="comment-on-post-2-icon" role="button" tabindex="-1">
                                    <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yg/r/OH3b5mzlwwA.png?_nc_eui2=AeHvXMJ-Kt8PbatNoMEYmDSly_fTt-nCLGnL99O36cIsaRbs5VY714eKI7GJX4zMThWXyRARwBbbnsqsCxToXPPi&quot;); background-position: 0px -502px; background-size: 26px 656px; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
                `;
                // Append the post HTML to the container
                $('.All_Post_GET_from_db').append(postHtml);
            });
        },
        error: function () {
            console.error('Error fetching posts.');
        }
    });
});
