<?php
// Amani
// This code determines the language selected by the user (Arabic or English) and saves it using cookies and session.


session_start();  // Start the session to store user-specific data


// Check if the "lang" value exists in the URL (GET) and that it is either "ar" or "en"
if (isset($_GET['lang']) && in_array($_GET['lang'], ['ar', 'en'])) {
    $lang = $_GET['lang'];
    
    
    // Store the selected language in a cookie for 30 days, so the language persists even after closing the browser
    setcookie('lang', $lang, time() + (86400 * 30), "/");
    
    // Also store the language in the session to be used during the current browsing session
    $_SESSION['lang'] = $lang;
}

// Redirect to the previous page after selecting the language
$redirect = $_SERVER['HTTP_REFERER'] ?? 'Home.html';
header("Location: $redirect");
exit;
?>
