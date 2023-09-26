<?php
require_once('google api\vendor\autoload.php');
require_once('GoogleLoginController.class.php'); // Include the GoogleLoginController class

if (isset($_POST['profile']) && isset($_POST['id_token'])) {
    $googleProfile = json_decode($_POST['profile']);
    $id_token = $_POST['id_token'];

    require_once('GoogleLoginController.class.php'); // Include the GoogleLoginController class


    
    $gClient = new Google_Client();
    $gClient->setClientId("376986492477-gsiet0be38sniafts5orvf84v62giqva.apps.googleusercontent.com");
    $gClient->setClientSecret("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");
    $gClient->setRedirectUri("http://localhost/watches/sara/login.php");

    $payload = $gClient->verifyIdToken($id_token);
    
    if ($payload) {
        // The ID token is valid, you can access user information
        $googleUserId = $payload['sub'];
        $googleEmail = $payload['email'];

        $_SESSION['userid'] = $googleUserId;

        echo "Google login successful!";
    } else {
        // Invalid ID token
        echo "Invalid ID token.";
    }
} else {
    // Handle error or unauthorized access
    echo "Error processing Google login.";
}
?>