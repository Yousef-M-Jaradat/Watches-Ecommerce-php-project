<?php
class GoogleLoginController
{
    private $connection;

    public function __construct()
    {
        $this->connection = new Connect(); // Initialize the database connection
    }

    public function insertUserData($email, $name)
    {
        try {
            $sql = "SELECT id FROM customer WHERE email = :email";
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {
                // User already exists, log them in
                $_SESSION['userid'] = $result['id'];
                $_SESSION['username'] = $name;
                $_SESSION['role'] = 0;

                // Redirect to the user's profile or home page
                header("location: profile.php");
                exit();
            } else {
                // Insert new user data
                $insertStmt = $this->connection->prepare("INSERT INTO customer (email, firstname) VALUES (:email, :firstname)");
                $insertStmt->bindParam(':email', $email);
                $insertStmt->bindParam(':firstname', $name);
                $insertStmt->execute();

                $lastInsertId = $this->connection->lastInsertId();
                $_SESSION['userid'] = $lastInsertId;
                $_SESSION['username'] = $name;
                $_SESSION['role'] = 0;

                // Redirect to the user's profile or home page
                header("location: profile.php");
                exit();
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
