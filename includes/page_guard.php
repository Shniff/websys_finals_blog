<?php 
    if(!isset($_SESSION["username"]) || !isset($_SESSION["is_admin"]) || $_SESSION["is_admin"] != "1"){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unauthorized Access - 401</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJf+H9onSNRFj6Xz7c8EZTr3mBLMOLvH9JolddnX2j6Ww84Fq2XvoDGMw3I8" crossorigin="anonymous">
    <style>
        body {
            background-color: #000; /* Black background */
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            color: #fff; /* White text for better contrast */
        }
        .error-card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(255, 255, 255, 0.1);
            max-width: 500px;
            width: 100%;
            padding: 20px;
            background-color: #1a1a1a; /* Dark background for the card */
            color: #fff; /* White text inside the card */
        }
        .error-title {
            font-size: 100px;
            color: #dc3545;
            font-weight: bold;
        }
        .error-description {
            font-size: 18px;
            color: #ccc; /* Light gray for the description */
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
            box-shadow: 0 6px 12px rgba(0, 86, 179, 0.4);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="card error-card text-center">
        <h1 class="error-title">401</h1>
        <h2 class="mb-3">Unauthorized Access</h2>
        <p class="error-description mb-4">Sorry, you are not authorized to view this page.</p>
        <a href="login.php" class="btn btn-primary">Go to Login</a>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybK9Q3B8JKpQY/9pZt+ZTtLML3ewhZ7SS7wqI8o0B76t6j0Ki" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyA7xY95YNk7pY2Pt6nH5gF5cz9yTETe7pCmr6kzVnxTk+lct6kS8Pl" crossorigin="anonymous"></script>
</body>
</html>

<?php 
    exit;
    }
?>
