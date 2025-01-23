<?php
session_start();
include "../controller/Dmmmsu.php";
$db = new db;

// login
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $resultCheckLogin = $db->login($username, $password);

    if ($resultCheckLogin != 0) {
        if ($_SESSION['role'] == 0) {
            header("Location: ../dmmmsu/dashboard.php");
            exit(); 
        } elseif ($_SESSION['role'] == 1) {
            header("Location: ../staff/dashboard.php");
            exit(); 
        }
    } else {
        $message = "Invalid Credentials!";
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
				<h3 class="mb-4">Login</h3>
				<?php
				if (isset($message)) {
					echo "
    <div id=\"success-alert\" class='alert success' role='alert'>
        $message
    </div>";
				}
				?>
				<form method="post" action="">
					<div class="input-group mb-3">
					</div>
					<div>
						<br>
						<input type="text" class="form-control" placeholder="Username" name="username">
					</div>
					<br>
					<div class="input-group mb-4">
						<input type="password" class="form-control" placeholder="password" name="password">
					</div>
					<div class="form-group text-left">
						<div class="checkbox checkbox-fill d-inline">
							<input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" checked="">
							<label for="checkbox-fill-a1" class="cr"> Save Details</label>
						</div>
					</div>
					<button class="btn btn-primary shadow-2 mb-4" name="submit">Login</button>
				</form>
				<p class="mb-2 text-muted">Forgot password? <a href="auth-reset-password.php">Reset</a></p>
				<p class="mb-0 text-muted">Don’t have an account? <a href="auth-signup.php">Signup</a></p>
			</div>
		</div>
	</div>
</div>

<?php include '../layouts/footer.php' ?>