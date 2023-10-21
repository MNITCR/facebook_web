# facebook_web

CREATE TABLE user_table (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    surname VARCHAR(50),
    mobileOremail VARCHAR(50),
    password VARCHAR(50),
    birthday_day INT,
    birthday_month INT,
    birthday_year INT,
    gender INT,
    profile_image_path VARCHAR(250),
    profile_image_size DECIMAL(18, 16),
    translateX VARCHAR(250),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);


CREATE TABLE posts_table (
    post_id INT PRIMARY KEY AUTO_INCREMENT,
    caption VARCHAR(255),
    file_path VARCHAR(255),
    user_id INT,
    post_day VARCHAR(20),
    post_month VARCHAR(20),
    post_year VARCHAR(20),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
    FOREIGN KEY (user_id) REFERENCES user_table(user_id)
);


CREATE TABLE store_icon_reach (
    store_icon_id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT,
    image_url VARCHAR(255),
    text_icon VARCHAR(50),
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    FOREIGN KEY (post_id) REFERENCES posts_table(post_id)
);

========================Download PHPMailer===================
https://github.com/PHPMailer/PHPMailer
