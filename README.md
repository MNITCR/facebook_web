# facebook_web

CREATE TABLE user_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    surname VARCHAR(50),
    mobileOremail VARCHAR(50),
    password VARCHAR(50),
    birthday_day INT,
    birthday_month INT,
    birthday_year INT,
    sex INT,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);


========================Download PHPMailer===================
https://github.com/PHPMailer/PHPMailer
