<!-- ================Main-profile-user================ -->
<section class="Main-profile-user" style="position: relative;top: 4rem;">
    <div class="Main-user-user">
        <div class="Main-user-user-1">
            <div class="Main-user-user-Img">
                <!-- cover image -->
                <div class="main-Pro-Img-user">
                    <img src="../../html/loginImg/Screenshot 2023-09-29 162759.png" alt="" srcset="">
                </div>

                <!-- create image and choice image -->
                <div class="main-Pro-Img-user-upload">
                    <div class="main-Pro-Img-user-upload-photo">
                        <div class="main-Pro-Img-user-upload-photo-1" style="display: flex; align-items: center;justify-content: center;">
                            <i class="fa-solid fa-user-astronaut" style="color: #F2F2F2;"></i>
                        </div>
                        <div class="main-Pro-Img-user-upload-photo_span" style="display: flex;align-items: center;">
                            <span class="">
                                Create with avatar
                            </span>
                        </div>
                    </div>

                    <!-- main-Pro-Img-user-upload-photo -->
                    <div class="main-Pro-Img-user-upload-photo">
                        <div class="main-Pro-Img-user-upload-photo-1" style="display: flex; align-items: center;justify-content: center;">
                            <i class="fa-solid fa-camera" style="color: #F2F2F2;"></i>
                        </div>
                        <div class="main-Pro-Img-user-upload-photo_span">
                            <span class="">Add cover photo</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="Main-user-user-Info">
                <div class="sub-user-user-Info">
                    <!-- image profile -->
                    <div class="Profile-user">
                        <div class="" style="width: 170px; height: 170px;overflow: hidden; border-radius: 50%;">
                            <?php
                                include '../../php/conn.php';

                                // Assume you have a user_id to identify the user whose image you want to retrieve
                                $user_id = $_SESSION['user_id']; // Replace with the actual user_id

                                $sql = "SELECT profile_image_path, profile_image_size, translateX FROM user_table WHERE user_id = ?";
                                $stmt = $conn->prepare($sql);

                                if ($stmt) {
                                    $stmt->bind_param("i", $user_id);
                                    $stmt->execute();
                                    $stmt->bind_result($profile_image_path, $profile_image_size, $translateX);

                                    if ($stmt->fetch()) {
                                        if ($profile_image_path) {
                                            echo '<img src="../' . $profile_image_path . '" alt="Profile Image" style="width: auto; height: 170px;transform: translateX(' . $translateX . 'px);transform: scale(' .$profile_image_size.');">';
                                        } else {
                                            echo '<img src="../../html/userImg/logoUser1.png" alt="" style="width: 170px; height: 170px;border-radius: 50%;">';
                                        }
                                    } else {
                                        echo '<img src="../../html/userImg/logoUser1.png" alt="" style="border-radius: 50%;">';
                                    }

                                    $stmt->close();
                                } else {
                                    echo 'Error preparing statement: ' . $conn->error;
                                }

                                $conn->close();
                            ?>
                        </div>
                        <div class="Profile-user-upload-1">
                            <i class="fa-solid fa-camera"></i>
                        </div>
                    </div>

                    <!-- text profile-->
                    <div class="Main-user-user-Info-content">
                        <div class="Main-user-user-Info-content-text">
                            <h2 style="font-weight: 700;white-space: nowrap;"><?php echo $_SESSION['FULL_Name']?></h2>
                            <p>1 <span style="font-weight: 600;color: var(--color-nav-icon);">friend</span></p>
                        </div>
                        <div class="btn_3">
                            <div class="group-btn">
                                <a href="#" style="text-decoration: none;font-weight: 600;color: #FFFFFF;"><i class="fa-solid fa-plus"></i> Add to story</a>
                            </div>
                            <div class="group-btn-tow">
                                <div class="group-btn" id="bg_white" style="width: 100%;">
                                    <i class="fa-solid fa-pen"></i> &nbsp;Edit profile
                                </div>
                                <div class="group-btn" id="bg_white">
                                    <i class="fa-solid fa-caret-down"></i>
                                </div>
                            </div>
                            <!-- <div class="group-btn" id="bg_white">
                                <i class="fa-solid fa-caret-down"></i>
                            </div> -->
                        </div>
                    </div>
                </div>
                <hr>

                <!-- content on profile -->
                <div class="content-on-profile">
                    <div class="" style="display: flex;justify-content: space-between;align-items: center;">
                        <div class="content-on-profile-text">
                            <span class="content-on-profile-post blur">Posts</span>
                            <span class="content-on-profile-about">About</span>
                            <span class="content-on-profile-friend content-on-profile-hide">Friends</span>
                            <span class="content-on-profile-photo content-on-profile-hide">Photos</span>
                            <span class="content-on-profile-video content-on-profile-hide">Videos</span>
                            <span class="content-on-profile-check-ins content-on-profile-hide">Check-ins</span>
                            <span class="dropdown content-on-profile-more" data-bs-toggle="dropdown" aria-expanded="false">
                                More <i class="fa-solid fa-caret-down"></i>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Sports</a></li>
                                    <li><a class="dropdown-item" href="#">Music</a></li>
                                    <li><a class="dropdown-item" href="#">Movies</a></li>
                                    <li><a class="dropdown-item" href="#">TV shows</a></li>
                                    <li><a class="dropdown-item" href="#">Books</a></li>
                                    <li><a class="dropdown-item" href="#">Likes</a></li>
                                    <li><a class="dropdown-item" href="#">Events</a></li>
                                    <li><a class="dropdown-item" href="#">Reviews given</a></li>
                                </ul>
                            </span>
                        </div>
                        <div class="group-btn">
                            <svg fill="currentColor" viewBox="0 0 24 24" width="2em" height="1em"><circle cx="12" cy="12" r="2.5"></circle><circle cx="19.5" cy="12" r="2.5"></circle><circle cx="4.5" cy="12" r="2.5"></circle></svg>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Main-sub-content-on-profile -->
            <div class="sub-content-on-profile-data">
                <div class="Main-sub-content-on-profile">
                    <div class="Main-sub-content-on-profile-1">
                        <!-- on-profile-left -->
                        <div class="on-profile-left">
                            <!-- Intro -->
                            <div class="sub-content-on-profile-Intro">
                            <h5>Intro</h5>
                            <div class="group-intro">
                                <span>Add bio</span>
                            </div>
                            <div class="group-intro">
                                <span>Edit details</span>
                            </div>
                            <div class="group-intro">
                                <span>Add hobbies</span>
                            </div>
                            <div class="group-intro">
                                <span>Add featured</span>
                            </div>
                            </div>

                            <!-- Photos -->
                            <div class="sub-content-on-profile-Photos">
                            <div class="">
                                <div class="" style="display: flex;justify-content: space-between;width: 100%;align-items: center;">
                                <div class="">
                                    <h5>Photos</h5>
                                </div>
                                <div class="">
                                    <a href="#" style="text-decoration: none;font-size: 18px;">See all photos</a>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!-- Friend -->
                            <div class="sub-content-on-profile-Friends">
                            <div class="">
                                <div class="" style="display: flex;justify-content: space-between;width: 100%;align-items: center;">
                                <div class="">
                                    <h5>Friends</h5>
                                </div>
                                <div class="">
                                    <a href="#" style="text-decoration: none;font-size: 18px;">See all friends</a>
                                </div>
                                </div>
                                <div class="">
                                <p>1 <span style="font-weight: 600;">friend</span></p>
                                </div>
                                <div class="">
                                <div class="">
                                    <img src="../../html/userImg/logoUser1.png" alt="" style="width: 120px;height: 120px;border-radius: 8px;">
                                </div>
                                <div class="" style="margin-top: 10px;">
                                    <span style="font-weight: 600;font-size: 14px;">Meas Pov</span>
                                </div>
                                </div>
                            </div>
                            </div>

                            <!-- footer -->
                            <div class="profile-footer" style="position: relative;bottom: 10px;">
                                <footer>
                                    <ul>
                                        <li class="group-footer-profile">
                                            <a href="#">Privacy . </a>
                                        </li>

                                        <li class="group-footer-profile">
                                            <a href="#">Terms</a>
                                            <span>
                                            <span class="">&nbsp;</span>
                                            <span aria-hidden="true"> · </span>
                                            </span>
                                        </li>

                                        <li class="group-footer-profile">
                                            <a href="#">Advertising</a>
                                            <span>
                                            <span class="">&nbsp;</span>
                                            <span aria-hidden="true"> · </span>
                                            </span>
                                        </li>

                                        <li class="group-footer-profile">
                                            <a href="#">Ad Choices
                                            <span class="">
                                                <i style="
                                                    background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yB/r/E9gaOoTzAC6.png?_nc_eui2=AeHKPi01gs4A9UY8FJajLD_d2ojHEplE3z_aiMcSmUTfPwZ-yRY8rTvnJfDYEe49lOoeRjBfkctj3K6nFpiWoRib');
                                                    background-position: -176px -88px;
                                                    background-size: 190px 186px;
                                                    width: 12px;
                                                    height: 12px;
                                                    background-repeat: no-repeat;
                                                    display: inline-block;
                                                ">
                                                </i>
                                            </span>
                                            </a>
                                            <span>
                                            <span class="">&nbsp;</span>
                                            <span aria-hidden="true"> · </span>
                                            </span>
                                        </li>

                                        <li class="group-footer-profile">
                                            <a href="#">Cookies</a>
                                            <span>
                                            <span class="">&nbsp;</span>
                                            <span aria-hidden="true"> · </span>
                                            </span>
                                        </li>

                                        <li class="group-footer-profile">
                                            <div>More</div>
                                            <span>
                                            <span class="">&nbsp;</span>
                                            <span aria-hidden="true"> · </span>
                                            </span>
                                        </li>
                                        <li class="group-footer-profile">
                                            <span>Meta © 2023</span>
                                        </li>
                                    </ul>
                                </footer>
                            </div>
                        </div>

                        <!-- on-profile-right -->
                        <div class="on-profile-right">
                            <!-- Crate Post -->
                            <div class="sub-content-on-profile-createPost">
                                <div class="sub-content-on-profile-createPost-1">
                                    <div class="" style="display: flex;align-items: center;width: 100%;gap: 0.5rem;">
                                        <div class="">
                                            <img src="../../html/userImg/logoUser1.png" alt="" style="width: 40px;height: 40px;border-radius: 50%;">
                                        </div>
                                        <div class="" style="width: 100%;">
                                            <input type="search" name="" id="" placeholder="What's on your mind?" style="width: 100%;background: #F2F2F2;border: none;padding: 8px 8px 8px 15px;outline: none;border-radius: 40px;" >
                                        </div>
                                    </div>
                                    <hr>

                                    <!-- Post -->
                                    <div class="sub-content-on-profile-createPost-1-post">
                                        <!-- Live video -->
                                        <div class="group-Post">
                                            <div class="">
                                                <img
                                                    height="24"
                                                    width="24"
                                                    alt=""
                                                    id="live-video"
                                                    referrerpolicy="origin-when-cross-origin"
                                                    src="https://static.xx.fbcdn.net/rsrc.php/v3/yF/r/v1iF2605Cb5.png?_nc_eui2=AeF-1dkpk-K4CP7lPo-V3XtB3Eh3Wgl8GJPcSHdaCXwYk0vzB_CoxrZdT5na46nU1lf-ZeMpmFio-it4TlZWGBPI" /></span
                                                >
                                            </div>
                                            <div class="">
                                                <span style="font-weight: 600;">Live video</span>
                                            </div>
                                        </div>

                                        <!-- Photo/video -->
                                        <div class="group-Post" id="VideoORImage">
                                            <div class="">
                                            <img
                                                height="24"
                                                width="24"
                                                alt=""
                                                id="live-video"
                                                referrerpolicy="origin-when-cross-origin"
                                                src="https://static.xx.fbcdn.net/rsrc.php/v3/yC/r/a6OjkIIE-R0.png?_nc_eui2=AeGU-fbdr3EjaGeD4oGehQxTfK5Z1qDG7FV8rlnWoMbsVeznv25fueobOpWA4k_jIgw-IdxHCYqB-YEbk7sy-hbY" /></span
                                            >
                                            </div>
                                            <div class="">
                                            <span style="font-weight: 600;">Photo/video</span>
                                            </div>
                                        </div>

                                        <!-- Life event -->
                                        <div class="group-Post">
                                            <div class="">
                                            <img
                                                height="24"
                                                width="24"
                                                alt=""
                                                referrerpolicy="origin-when-cross-origin"
                                                src="https://static.xx.fbcdn.net/rsrc.php/v3/yY/r/CenxFlWjtJO.png?_nc_eui2=AeGfXsGGMppP4x8zFxHOU3eiz4XXObU63WDPhdc5tTrdYFkFH8sF4KLew2jeCa-xeHvnoqTc10DhZfpdAplNRBV-" /></span
                                            >
                                            </div>
                                            <div class="">
                                            <span style="font-weight: 600;">Life event</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Setting_Post -->
                            <div class="sub-content-on-profile-Setting-Posts">
                                <div class="" style="display: flex;justify-content: space-between;align-items: center;">
                                    <div class="">
                                        <h5>Posts</h5>
                                    </div>
                                    <div class="" style="display: flex;gap: 0.5rem;">
                                        <!-- Filters -->
                                        <div class="Setting-Posts">
                                            <div class="" style="position: relative;top: 1.5px;">
                                            <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yE/r/fVo51IGVSH_.png?_nc_eui2=AeHK0AxPZN5S1Xbts77Gx_Rk8wRTmg7sPpfzBFOaDuw-l5tbvVdcEBu4ODbJsfsE3RrWL3QGFmA2jnHvZuFvcHNJ&quot;); background-position: 0px -234px; background-size: 34px 468px; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                                            </div>
                                            <div class="">
                                            <span style="font-weight: 600;">Filters</span>
                                            </div>
                                        </div>

                                        <!-- Manage-Posts -->
                                        <div class="Setting-Posts">
                                            <div class="" style="position: relative;top: 1.5px;">
                                                <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yE/r/fVo51IGVSH_.png?_nc_eui2=AeHK0AxPZN5S1Xbts77Gx_Rk8wRTmg7sPpfzBFOaDuw-l5tbvVdcEBu4ODbJsfsE3RrWL3QGFmA2jnHvZuFvcHNJ&quot;); background-position: 0px -432px; background-size: 34px 468px; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                                            </div>
                                            <div class="">
                                                <span style="font-weight: 600;">Manage Posts</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>

                                <div class="Setting_Post_on_hr">
                                    <div class="Setting_Post_on_hr-group" style="display: flex;align-items: center;">
                                        <div class="" style="position: relative;top: 1.5px;">
                                            <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yE/r/fVo51IGVSH_.png?_nc_eui2=AeHK0AxPZN5S1Xbts77Gx_Rk8wRTmg7sPpfzBFOaDuw-l5tbvVdcEBu4ODbJsfsE3RrWL3QGFmA2jnHvZuFvcHNJ&quot;); background-position: 0px -360px; background-size: 34px 468px; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                                        </div>
                                        <div class="">
                                            <span style="font-weight: 600;">List view</span>
                                        </div>
                                    </div>

                                    <div class="Setting_Post_on_hr-group" style="display: flex;align-items: center;">
                                        <div class="" style="position: relative;top: 1.5px;">
                                            <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yE/r/fVo51IGVSH_.png?_nc_eui2=AeHK0AxPZN5S1Xbts77Gx_Rk8wRTmg7sPpfzBFOaDuw-l5tbvVdcEBu4ODbJsfsE3RrWL3QGFmA2jnHvZuFvcHNJ&quot;); background-position: 0px -288px; background-size: 34px 468px; width: 16px; height: 16px; background-repeat: no-repeat; display: inline-block;"></i>
                                        </div>
                                        <div class="">
                                            <span style="font-weight: 600;">Grid view</span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- All Post GET from db-->
                            <div class="All_Post_GET_from_db">
                                <!-- data from getIMG_handler.js -->
                            </div>


                            <!-- All Post -->
                            <div class="sub-content-on-profile-All-Posts " style="position: relative;bottom: 16px">
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
                                                <h6 class="FUllNAME"><?php echo $_SESSION['FULL_Name']?></h6>
                                                </div>
                                                <div class="">
                                                <span>February 17, 2003 .
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
                                                <div class="name_detail_right-btn">
                                                <svg fill="currentColor" viewBox="0 0 20 20" width="1em" height="1em" class="x1lliihq x1k90msu x2h7rmj x1qfuztq xcza8v6 x1qx5ct2 xw4jnvo">
                                                    <g fill-rule="evenodd" transform="translate(-446 -350)">
                                                    <path d="M458 360a2 2 0 1 1-4 0 2 2 0 0 1 4 0m6 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0m-12 0a2 2 0 1 1-4 0 2 2 0 0 1 4 0"></path>
                                                    </g>
                                                </svg>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Main Social -->
                                    <div class="">
                                        <div class="" style="text-align: center;">
                                            <div class="" style="display: flex;justify-content: center;align-items: center;">
                                                <div class="" style="width: 40px;height: 40px;border-radius: 50%;background: #0866FF;display: flex;align-items: center;justify-content: center;">
                                                    <img height="20" width="20"
                                                    src="https://static.xx.fbcdn.net/rsrc.php/v3/y-/r/3g9F3UOPitA.png?_nc_eui2=AeFro721FMChRF7M6JUPxwA0m1jvQ-j_dgSbWO9D6P92BMwul-CQdCmem6pODCEzWJGT1qV86zw5KhOvV7S3mCkc"
                                                    />
                                                </div>
                                            </div>
                                            <div class="" style="margin-top: 10px;">
                                                <h5 style="font-weight: 400">Born on <?php echo $_SESSION['BIT_MONTH']?> <?php echo $_SESSION['BIT_DAY']?>, <?php echo $_SESSION['BIT_YEAR']?></h5>
                                            </div>
                                        </div>

                                        <!-- Social -->
                                        <div class="Top_reach_select d-flex align-items-center gap-1 invisible" style="position: relative;top: 10px">
                                            <div class="hover_show_reach_select_top" style="display: flex;align-items: center;">
                                                <i></i>
                                            </div>
                                            <div class="" style="position: relative;top: 4px;">
                                                <h6 style="font-weight: 400;"><?php echo $_SESSION['FULL_Name']; ?></h6>
                                            </div>
                                        </div>
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
                                                <div class="hover_show_reach_select" style="display: flex;align-items: center;">
                                                    <i style="
                                                        background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/y9/r/BBpOFqlaCQ6.png?_nc_eui2=AeEWzJMqwvFWV9CzCsMajqC6b1QDXe9Wg-BvVANd71aD4AdlPG4d6qP3DBdrU0wmxsEcofGCcHmT3ufI5mzXsK1_');
                                                        background-position: 0px -352px;
                                                        background-size: 22px 620px;
                                                        width: 20px;
                                                        height: 20px;
                                                        background-repeat: no-repeat;
                                                        display: inline-block;
                                                    "></i>
                                                </div>
                                                <!-- Container for icons on hover -->
                                                <div class="icons-container">
                                                    <!-- Like -->
                                                    <img class="icon" src="../../html/Icon6/like.png" alt="Like" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Like"/>
                                                    <!-- Love -->
                                                    <img class="icon" src="../../html/Icon6/love.svg" alt="Love" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Love">
                                                    <!-- Care -->
                                                    <img class="icon" src="../../html/Icon6/car.svg" alt="Care" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Care">
                                                    <!-- Hasha -->
                                                    <img class="icon" src="../../html/Icon6/hasha.svg" alt="Hasha" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Hasha">
                                                    <!-- Wow -->
                                                    <img class="icon" src="../../html/Icon6/wow.svg" alt="Wow" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Wow">
                                                    <!-- Sad -->
                                                    <img class="icon" src="../../html/Icon6/sad.svg" alt="Sad" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Sad">
                                                    <!-- Angry -->
                                                    <img class="icon" src="../../html/Icon6/angry.svg" alt="Angry" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Angry">
                                                </div>
                                                <div class="Main_selectedText" style="display: flex;align-items: center;">
                                                    <h6 id="selectedText" style="position: relative;top: 4px;">Like</h6>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- VIDEO OR IMAGE MODAL-->
    <div class="modal fade" id="Video_OR_Image_1" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalToggleLabel">Create post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" action="../../php/post_handler.php">
                        <div class="">
                            <div class="d-flex justify-items-center">
                                <div class="" style="border-radius: 50%;width: 40px;height: 40px;background: #606266;">
                                    <img src="../../html/userImg/logoUser1.png" alt="" style="width: 40px;height: 40px;border-radius: 50%">
                                </div>

                                <!-- Create post -->
                                <div class="" style="margin-left: 12px;">
                                    <div style="position: relative; bottom: 3px">
                                        <h6>Proxy MN</h6>
                                    </div>
                                    <div class="d-flex align-items-center gap-1" style="position: relative; bottom: 7px; background: #E4E6EB;padding: 0px 5px 0px 5px; border-radius: 5px;">
                                        <div class="" style="position: relative; bottom: 2px;">
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v3/ys/r/L39Daxsxmmw.png?_nc_eui2=AeGSzisonYs8SWqRRbl9_zUM7IOJAI68cdTsg4kAjrxx1I935fJOObZ1aKIvOK8XTL08AqtlUonU2HJPrAnh9lxa" alt="Public" height="12" width="12">
                                        </div>
                                        <div class="" style="font-size: 13px; font-weight: 600;">
                                            <span>Public</span>
                                        </div>
                                        <div class="">
                                            <i style="background-image: url(&quot;https://static.xx.fbcdn.net/rsrc.php/v3/yB/r/E9gaOoTzAC6.png?_nc_eui2=AeHKPi01gs4A9UY8FJajLD_d2ojHEplE3z_aiMcSmUTfPwZ-yRY8rTvnJfDYEe49lOoeRjBfkctj3K6nFpiWoRib&quot;); background-position: -70px -172px; background-size: 190px 186px; width: 12px; height: 12px; background-repeat: no-repeat; display: inline-block;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- caption -->
                            <div class="mb-2 mt-2" id="custom_input_container">
                                <textarea name="textarea_caption_input" id="textarea_caption_input" placeholder="What's on your mind?"></textarea>
                            </div>

                            <!-- Select image -->
                            <div class="Main_Select_image" id="Main_Select_image">
                                <div class="Select_image">
                                    <div class="Select_image_1">
                                        <!-- <input type="file" id="fileInput" name="fileInput" class="d-none" /> -->
                                        <div class="">
                                            <div class="">
                                                <div class=""
                                                style="
                                                border-radius: max(
                                                    0px,
                                                    min(8px, ((100vw - 4px) - 100%) * 9999)
                                                    ) / 8px;
                                                "
                                                >
                                                <div class="">
                                                    <div class="text-center">
                                                    <div class="logo_upload_video_image">
                                                        <i
                                                        style="
                                                        background-image: url('https://static.xx.fbcdn.net/rsrc.php/v3/yG/r/9oLIQ46ecpP.png?_nc_eui2=AeFmcPB7CnsBG9rWg5WWn_6hhpn_qOU1dm-Gmf-o5TV2b3oxv7VTRDKNrj901A9-E_xzHeBcyctkZEz6o4aHkeVN');
                                                        background-position: 0px -64px;
                                                        background-size: 38px 122px;
                                                        width: 20px;
                                                        height: 20px;
                                                        background-repeat: no-repeat;
                                                        display: inline-block;
                                                        ">
                                                        </i>
                                                    </div>
                                                    <div class="" style="font-weight: 600;">
                                                        <span>Add Photos/Videos</span>
                                                    </div>
                                                    <div class="" style="font-size: 14px;">
                                                        <span>or drag and drop</span>
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="clear_video_image d-none" style="z-index: 9999;">
                                        <i class="fa-solid fa-xmark" id="clearImage"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="file" id="fileInput" name="fileInput" class="d-none"/>
                            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']?>">
                            <button type="submit" class="btn btn-primary col-12" id="Video_OR_Image_POST" name="Video_OR_Image_POST" disabled>Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end VIDEO OR IMAGE MODAL-->


    <!-- UPLOAD PROFILE IMAGE -->
    <div class="modal fade" id="UPLOAD_PROFILE_IMAGE" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Choice profile picture</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <textarea class="form-control" id="profile-text-upload" placeholder="Description"></textarea>
                        </div>
                        <div class="">
                            <div class="main-image-upload" style="">
                                <div class="sub-image-upload">
                                    <div class="text-center p-2" style="cursor: pointer;background: #DFE9F2;font-weight: 600;" id="profile-photo-upload">
                                        <span><i class="fa-solid fa-upload"></i>&nbsp;Upload photo</span>
                                    </div>
                                    <div class="d-none">
                                        <input type="file" class="form-control" id="profile-file-upload">
                                    </div>
                                </div>
                                <div class="main-show-image-upload">
                                    <div class="show-image-upload" id="draggable-container">
                                        <img id="uploaded-image" src="" alt="Uploaded Image" style="width: 100%; height: 250px;border-radius: 3px;display: none;"/>
                                        <div class="circle-overlay"></div>
                                    </div>
                                </div>

                                <div class="main-resize-controls-line mt-3 d-none" style="width: 100%;display: flex;justify-content: space-between;align-items: center">
                                    <div class="zoom-down" style="cursor: pointer;color:#BEC3C9">
                                        <i class="fa-solid fa-minus"></i>
                                    </div>
                                    <div class="sub-resize-controls-line" style="width: 100%;">
                                        <div class="resize-controls-line"></div>
                                    </div>
                                    <div class="zoom-up" style="cursor: pointer;">
                                        <i class="fa-solid fa-plus"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white text-primary" id="clear-image-profile-upload" style="font-weight: 600;">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="save-image-profile-upload" style="font-weight: 600;" disabled>Save</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END UPLOAD PROFILE IMAGE -->

</section>
<!-- ================Main-profile-user================ -->
