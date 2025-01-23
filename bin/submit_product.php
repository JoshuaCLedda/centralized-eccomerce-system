<?php
// submit_product.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atbi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $product_description = $conn->real_escape_string($_POST['product_description']);
    $product_price = $conn->real_escape_string($_POST['product_price']);

    // Handle file upload
    $target_dir = "../phinry/uploads/";
    $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image
    $check = getimagesize($_FILES["product_image"]["tmp_name"]);
    if ($check === false) {
        $uploadOk = 0;
        $error_message = "File is not an image.";
    }

    // Check file size
    if ($_FILES["product_image"]["size"] > 5000000) {
        $uploadOk = 0;
        $error_message = "Sorry, your file is too large.";
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        $uploadOk = 0;
        $error_message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

    // Attempt to upload file
    if ($uploadOk == 0) {
        $error_message = "Sorry, your file was not uploaded: " . $error_message;
    } else {
        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            // Insert data into database with a "pending" status
            $sql = "INSERT INTO productreq (product_name, product_description, product_image, product_price, status) VALUES ('$product_name', '$product_description', '$target_file', '$product_price', 'pending')";

            if ($conn->query($sql) === TRUE) {
                $success_message = "New product posted successfully. Please wait for approval.";
            } else {
                $error_message = "Error: " . $conn->error;
            }
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .back-button {
            position: fixed;
            top: 16px;
            left: 16px;
            display: inline-flex;
            align-items: center;
            padding: 8px 16px;
            font-size: 14px;
            color: #333;
            text-decoration: none;
            background-color: #f1f1f1;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: background-color 0.3s;
            z-index: 1000;
        }

        .back-button:hover {
            background-color: #e1e1e1;
        }

        .message {
            margin: 20px;
            padding: 10px;
            border-radius: 5px;
            background-color: #f8f9fa;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>
<body>

<a href="javascript:history.back()" class="back-button">Back</a>

<div class="message">
    <?php
    if (isset($error_message)) {
        echo "<div class='error'>$error_message</div>";
    }
    if (isset($success_message)) {
        echo "<div class='success'>$success_message</div>";
    }
    ?>
</div>

</body>
</html>
