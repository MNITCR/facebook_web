<?php
    // Initialize your bot with the token
    // ================hwo to show id bot=================
    // https://api.telegram.org/bot6521503624:AAFKlknrcD3G4Nlf1Jfn0-_XNNHeJXTtNL8/getUpdates


    $botToken = '6521503624:AAFKlknrcD3G4Nlf1Jfn0-_XNNHeJXTtNL8';
    $chatId = '6132093492'; // Replace with the recipient's chat ID


    // Generate a random 6-digit code
    $randomCode = rand(100000, 999999);


    // Apply formatting to the code
    // $formattedCode = "<b>This is a bold text</b>, <i>italic text</i>, and <code><pre style='background-color:#FFFF00;color:#FF0000;'>$randomCode</pre></code>";
    $formattedCode = "<b><span class='tg-spoiler'>$randomCode</span></b> is confirmation Facebook code";
    // $formattedCode = "<span $randomCode class='tg-spoiler'>[<font color='#0000FF'>__underline__</font>]$randomCode</span> is confirmation Facebook code";


    // Compose the message
    $message = urlencode($formattedCode);

    // Create the cURL request
    // $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message&parse_mode=MarkdownV2";
    $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message&parse_mode=HTML";
    // $url = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatId&text=$message";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    // Execute the cURL request
    $output = curl_exec($ch);

    // Check for errors
    if (curl_errno($ch)) {
        echo 'Error: ' . curl_error($ch);
    }

    // Close cURL session
    curl_close($ch);

    // Check the response from the Telegram API
    $response = json_decode($output, true);

    if ($response && $response['ok']) {
        $alertMessage = "Sent successfully to $mobile";
    } else {
        echo 'Error sending code: ' . $response['description'];
    }

?>
