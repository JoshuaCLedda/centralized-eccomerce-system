<?php
session_start();
include '../controller/Dmmmsu.php';
$db = new db;
?>

<?php include '../layouts/header.php' ?>
<?php include '../layouts/dmmmsu/sidebar.php' ?>
<?php include '../layouts/dmmmsu/navbar.php' ?>
<!-- test -->
<div class="pcoded-main-container">

    <nav class="mx-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Staff</li>
        </ol>
    </nav>

    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">

                            <div class="col-lg-12 d-flex justify-content-end">
                                <a href="addProduct.php" class="btn btn-primary">Add Staff
                                </a>
                            </div>

                            <div class="col-xl-12 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Staff Data</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Post</th>
                                                        <th scope="col">Department</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>John Doe</td>
                                                        <td>Manager</td>
                                                        <td>HR</td>
                                                        <td>Active</td>
                                                        <td><a class='btn btn-sm' href='viewProduct.php?id=1'>Edit</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jane Smith</td>
                                                        <td>Assistant</td>
                                                        <td>Finance</td>
                                                        <td>Inactive</td>
                                                        <td><a class='btn btn-sm' href='viewProduct.php?id=2'>Edit</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Bob Johnson</td>
                                                        <td>Developer</td>
                                                        <td>IT</td>
                                                        <td>Active</td>
                                                        <td><a class='btn btn-sm' href='viewProduct.php?id=3'>Edit</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

<?php include '../layouts/footer.php' ?>

</body>

</html>
