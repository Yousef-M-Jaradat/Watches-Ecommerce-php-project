<?php
include('connection.php');

// "<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); "// for puton .

if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $path = parse_url($urle, PHP_URL_PATH);
    $lastPart = basename($path);
    echo $lastPart; // blog.html;
}
if (isset($_POST['submit_login'])) {
    $Username = $_POST['Username'];
    $password = $_POST['password'];


    // header('Location:../yousef/home.php');
    // To check if the user exists
    $query_select = "SELECT * FROM customer WHERE Username = ?";
    $stmt_select = $pdo->prepare($query_select);
    $stmt_select->bindParam(1, $Username);
    $stmt_select->execute();
    $user = $stmt_select->rowCount();
    $row = $stmt_select->fetch(PDO::FETCH_ASSOC);

    $expiration = strtotime('+1 month');
    setcookie('userid', $row['id'], time() + $expiration, '/');
    // print_r($row);
    if (isset($_COOKIE['userid'])) {
        $User = $_COOKIE['userid'];
    }
    session_start();
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product) {
            $prodid = $product['productid'];
            $quantity = $product['quantity'];
    
            // Check if the cart entry already exists for the user and product
            $checkQuery = "SELECT id FROM cart WHERE customerid = :user AND productid = :prodid";
            $checkStatement = $pdo->prepare($checkQuery);
            $checkStatement->bindParam(':user', $row['id']);
            $checkStatement->bindParam(':prodid', $prodid);
            $checkStatement->execute();
            $existingEntry = $checkStatement->fetch(PDO::FETCH_ASSOC);
    
            if ($existingEntry) {
                $updateQuery = "UPDATE cart SET quantity = quantity + :quantity WHERE id = :Id";
                $updateStatement = $pdo->prepare($updateQuery);
                $updateStatement->bindParam(':quantity', $quantity);
                $updateStatement->bindParam(':Id', $existingEntry['id']);
                $updateStatement->execute();
            } else {
                $insertQuery = "INSERT INTO cart (quantity, customerid, productid) VALUES (:quantity, :user, :prodid)";
                $insertStatement = $pdo->prepare($insertQuery);
                $insertStatement->bindParam(':quantity', $quantity);
                $insertStatement->bindParam(':user', $row['id']);
                $insertStatement->bindParam(':prodid', $prodid);
                $insertStatement->execute();
            }
        }
    
        unset($_SESSION['cart']);
        setcookie('session_id_cart', '', time() - 3600, '/');
    }
    
    if (isset($_SESSION['current_url'])) {
        $savedUrl = $_SESSION['current_url'];
        header("Location:$savedUrl");
        exit();
    } else {
        header("Location:../yousef/home.php");
    }

}

if ($user > 0) {


    // Verify the password
    if (password_verify($password, $row['password'])) {
        // Assuming $row['password'] is the hashed password
        // $_SESSION['userid'] = $row['id'];
        // $user = $_SESSION['userid'];
        // $session_id = session_id();

        // Set session variables
        $_SESSION['username'] = $Username;
        if (isset($_COOKIE['userid'])) {
            $user = $_COOKIE['userid'];
        } else {
            // Handle the case where the cookie is not set
        }


        $_SESSION['loginstatus'] = 1;
        if ($row['role'] == 1) { // Role 1 (Admin)
            // Redirect to admin page
            header('Location: ../admin/admin-dashboard/admin-view.php');
            exit(); // Make sure to exit after redirecting
        }


    } else if ($password != '') {
        echo 'Invalid password';
        include('login.php');
    } else {
        echo '<script>alert("Please enter a password.");</script>';
        include('login.php');
    }
} else if ($Username != '') {
    echo 'User not found';
    include('login.php');
} else {
    echo '<script>alert("User not found.");</script>';
    include('login.php');
}


$pdo = null;
?>