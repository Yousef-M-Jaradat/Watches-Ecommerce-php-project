<?php
include('connection.php');

if (isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $Username = $_POST['Username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // to check the user email is used
    $query_select = "SELECT * FROM customer WHERE email = ?";
    $stmt_select = $pdo->prepare($query_select);
    $stmt_select->bindParam(1, $email);
    $stmt_select->execute();

    // $result = $stmt_select->fetch(PDO::FETCH_ASSOC);
    $result = $stmt_select->rowCount(); //result =1 there are recored where email 
    // echo $result;// boolen (0 , 1 );
    if($result>0){

        echo '<script> alert("the email is used"); </script>';
        include('registration.php');
        
        echo <<<EOD
        <script>
          document.querySelector('input[name="firstname"]').value = "$firstname";
          document.querySelector('input[name="lastname"]').value = "$lastname";
          document.querySelector('input[name="Username"]').value = "$Username";
        </script>
        EOD;
        
        

    } else {

        //  insert the new uer
            $query = "INSERT INTO `customer`(`Username`,`firstname`, `lastname`, `email`, `password`)  VALUES (?, ?, ?, ?,?)";
            try {
                $stmt = $pdo->prepare($query);
            
                $stmt->bindParam(1, $Username);
                $stmt->bindParam(2, $firstname);
                $stmt->bindParam(3, $lastname);
                $stmt->bindParam(4, $email);
                $stmt->bindParam(5, $hashedPassword);

                if ($stmt->execute()) {
                    // echo "Data inserted successfully.";
                    header(('location:login.php'));
                } else {
                    echo "Error: Unable to insert data.";
                }
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
            }

            // Close the connection
            $pdo = null;


            }

}

?>