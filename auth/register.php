<?php
session_start();
include "../controller/Dmmmsu.php";
$db = new db;

// backend
// Check if the form is submitted
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    // Call the registerUser function
    $resultUser = $db->registerUser($username, $email, $password, $first_name, $last_name);
    if ($resultUser === 1) {
        $message = "User Successfully Added!";
    } elseif ($resultUser === 0) {
        $message = "User Already Exists!";
    } else {
        $message = $resultUser; // Display error message
    }
}

?>

<?php include '../layouts/header.php' ?>

<div class="auth-wrapper">
    <div class="auth-content">
        <div class="auth-bg">
            <span class="r"></span>
            <span class="r s"></span>
            <span class="r s"></span>
            <span class="r"></span>
        </div>
        <div class="card">

            <div class="card-body text-center">
                <img src="assets/images/dmmmsu.png" style="height: 30px; width: 30px;">
                <h3 class="mb-4">Sign up</h3>
                <?php
                if (isset($message)) {
                    echo "
    <div id=\"success-alert\" class='alert success' role='alert'>
        $message
    </div>";
                }
                ?>


                <form method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" required>
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" required>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" required>
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                            <label for="checkbox-fill-1" class="cr"> Save Details</label>
                        </div>
                    </div>

                    <button class="btn btn-primary shadow-2 mb-4" name="submit">Sign up</button>
                </form>

                <p class="mb-0 text-muted">Already have an account? <a href="auth-signin.html"> Log in</a></p>
            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function() {
        var alert = document.getElementById("success-alert");
        if (alert) {
            alert.classList.remove('fade', 'show');
            alert.style.display = 'none';
        }
    }, 3000); // 3000 milliseconds = 3 seconds
</script>
<?php include '../layouts/footer.php' ?>