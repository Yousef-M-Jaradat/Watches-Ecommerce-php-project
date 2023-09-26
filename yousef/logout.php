<?php 
if (isset($_COOKIE['userid'])) {
    // Clear the userid cookie by setting its expiration in the past
    setcookie('userid', '', time() - 3600, '/');
}

header('Location: home.php');
exit();
?>