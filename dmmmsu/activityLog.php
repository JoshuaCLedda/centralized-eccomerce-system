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
            <li class="breadcrumb-item active" aria-current="page">Activity Log</li>
        </ol>
    </nav>


    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">

                            <div class="col-xl-12 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Activity Log Data</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">User Name</th>
                                                        <th scope="col">Activity</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = $db->getActivityLog();
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '<tr>';
                                                        echo '<td>' . $row['user_id'] . '</td>';
                                                        echo '<td>' . $row['activity'] . '</td>';


                                                        echo '<td>' . $row['created_at'] . '</td>';

                                                        echo '<td>';
                                                        echo '<a class="btn btn-sm" href="viewActivtyLog.php?id=' . $row['id'] . '">View</a>';
                                                        echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                    ?>
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