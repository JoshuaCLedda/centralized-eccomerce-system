<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'Connection.php';
class db extends Connection
{
    public function getProducts()
    {
        $sql = "SELECT * FROM products";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

    public function registerUser($username, $email, $password, $first_name, $last_name)
    {
        $stmtCheck = $this->con->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        if (!$stmtCheck) {
            die("Prepare failed: " . $this->con->error);
        }
        $stmtCheck->bind_param("ss", $username, $email);
        $stmtCheck->execute();
        $resultCheck = $stmtCheck->get_result();

        if ($resultCheck->num_rows > 0) {
            return 0;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmtInsert = $this->con->prepare("INSERT INTO users (username, password, email, first_name, last_name) VALUES (?, ?, ?, ?, ?)");
        if (!$stmtInsert) {
            die("Prepare failed: " . $this->con->error);
        }
        $stmtInsert->bind_param("sssss", $username, $hashedPassword, $email, $first_name, $last_name);

        if ($stmtInsert->execute()) {
            return 1;
        } else {
            return "Error inserting data into the database: " . $this->con->error;
        }
    }

    public function addProduct($name, $price, $image, $product_description, $product_quantity, $status)
    {
        if (!isset($image['name']) || $image['error'] !== UPLOAD_ERR_OK) {
            return "No file uploaded or there was an error uploading the file.";
        }

        $check = "SELECT * FROM products WHERE name = '$name'";
        $resultCheck = mysqli_query($this->con, $check);
        $num_rows = mysqli_num_rows($resultCheck);
        if ($num_rows > 0) {
            return 0;
        } else {
            $targetDir = "../uploads/";
            $targetFile = $targetDir . basename($image["name"]);
            $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

            $checkImage = getimagesize($image["tmp_name"]);
            if ($checkImage === false) {
                return "File is not an image.";
            }
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                return "Sorry, only JPG, JPEG, PNG files are allowed.";
            }

            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;

                $sql = "INSERT INTO products (name, price, image, product_description, product_quantity, status)
                        VALUES ('$name', '$price', '$imagePath', '$product_description', '$product_quantity', '$status')";
                $resultsql = mysqli_query($this->con, $sql);
                if ($resultsql) {
                    return 1;
                } else {
                    return "Error inserting data into the database.";
                }
            } else {
                return "Sorry, there was an error uploading your file.";
            }
        }
    }

    public function login($username, $password)
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE username = ?");
        if (!$stmt) {
            die("Prepare failed: " . $this->con->error);
        }

        $stmt->bind_param("s", $username);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if (password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['username'] = $user['username'];
                $_SESSION['role'] = $user['role'];

                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }

    // Activity Log
    public function getActivityLog()
    {
        $sql = "SELECT * FROM activity_log";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }
}
