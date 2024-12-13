<?php 
session_start();
require_once($_SERVER["DOCUMENT_ROOT"]."/app/config/Directories.php");
    if (isset($_SESSION["error"])) {
        $messageErr = $_SESSION["error"];
        unset($_SESSION["error"]);
    }
    if (isset($_SESSION["success"])) {
        $messageSucc = $_SESSION["success"];
        unset($_SESSION["success"]);
    }
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<link rel="stylesheet" href="Styles/login.css">
<body class="login-page">
    <div class="login wrap">
        <div class="h1">Login</div>

           
        <!-- Message response -->
        <?php if (isset($messageSucc)) { ?>
        <div class="alert alert-success">
            <strong><?php echo $messageSucc; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <?php if (isset($messageErr)) { ?>
        <div class="alert alert-danger">
            <strong><?php echo $messageErr; ?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php } ?>

        <form action="app/auth/Login.php" method="POST">
        <input placeholder="Username" id="Username" name="username" type="text" required>
        <input placeholder="Password" id="password" name="password" type="password" required>
            <input value="Login" class="btn" type="submit">
        </form>
        <br>
        <div class="registration-link">
            <a href="registration.php">Don't have an account? Register here</a>
        </div>

        <!-- Back Button -->
        <div class="back-link" style="display: flex; justify-content: center; align-items: center; margin-top: 20px;">
            <a href="index.php" class="btn btn-secondary" style="background-color: #6c757d; color: white; padding: 12px 20px; text-align: center; text-decoration: none; border-radius: 5px; font-size: 16px; transition: background-color 0.3s, transform 0.2s;">Back to Home</a>
        </div>
    </div>
</body>
<?php include("includes/footer.php")?>
