<?php 

session_start();
// received user input
include('../config/DatabaseConnect.php');

$fullname        = htmlspecialchars($_POST["fullname"]);
$username        = htmlspecialchars($_POST["username"]);
$password        = htmlspecialchars($_POST["password"]);
$confirmPassword = htmlspecialchars($_POST["confirmPassword"]);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate confirmPassword
    $db = new DatabaseConnect();
    $conn = $db->connectDB();

    // Check if the username already exists
    $stmt = $conn->prepare("SELECT user_id FROM users WHERE username = :username LIMIT 1");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    
    // If the username exists, show an error message
    if ($stmt->rowCount() > 0) {
        $_SESSION["error"] = "Username is already taken. Please choose another one.";
        header("Location: /registration.php");
        exit;
    }

    // Proceed with password confirmation check
    if (trim($password) == trim($confirmPassword)) {
        try {
            // Hash the password before storing it
            $password = password_hash($password, PASSWORD_BCRYPT);

            // Insert the new user into the database
            $stmt = $conn->prepare('INSERT INTO users (fullname, username, password, created_at, updated_at) 
                                    VALUES (:p_fullname, :p_username, :p_password, NOW(), NOW())');
            $stmt->bindParam(':p_fullname', $fullname);
            $stmt->bindParam(':p_username', $username);
            $stmt->bindParam(':p_password', $password);

            $stmt->execute();

            // Set session success message and redirect to login page
            $_SESSION["success"] = "Registration Successful";
            header("Location: /login.php");
            exit;
        } catch (Exception $e) {
            echo "Connection Failed: " . $e->getMessage();
        }
    } else {
        // Passwords don't match, set error message and redirect back to registration page
        $_SESSION["error"] = "Passwords do not match. Try Again";
        header("Location: /registration.php");
        exit;
    }
}

?>
