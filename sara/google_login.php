<?php 

require_once('google api\vendor\autoload.php');
require_once('GoogleLoginController.class.php'); // Include the GoogleLoginController class



$login_url = $gClient->createAuthUrl();

// Initialize the GoogleLoginController
$googleLoginController = new GoogleLoginController();

// Handle the Google login and user insertion or login
if (isset($_GET['code'])) {
    $token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
    if (!$token || isset($token["error"])) {
        echo "Google login failed.";
    } else {
        // Get user data from Google
        $userData = $googleLoginController->getUserData($token);
        
        // Insert or log in the user in your application
        if ($userData) {
            $result = $googleLoginController->handleUser($userData);
            if ($result === true) {
                echo "User logged in or registered successfully.";
            } else {
                echo "User registration or login failed.";
            }
        } else {
            echo "Unable to fetch user data from Google.";
        }
    }
} else {
    // Display Google login button
    echo "<a href='$login_url'>Log in with Google</a>";
}
?>







<script src="https://apis.google.com/js/platform.js" async defer></script>
<script>
  gapi.load('auth2', function() {
    gapi.auth2.init({
      client_id: '376986492477-gsiet0be38sniafts5orvf84v62giqva.apps.googleusercontent.com', // Replace with your actual client ID
    });
  });

  function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    var id_token = googleUser.getAuthResponse().id_token;

    $.ajax({
      url: 'process_google_login.php', // Replace with the actual PHP file
      method: 'POST',
      data: {
        profile: profile,
        id_token: id_token
      },
      success: function(response) {
        console.log(response); // Log the response from the server
        // Optionally, redirect the user to the home page or perform other actions
      },
      error: function(xhr, status, error) {
        console.error(error); // Log any errors
      }
    });
  }
</script>


