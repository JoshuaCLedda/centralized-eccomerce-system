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
            <li class="breadcrumb-item active" aria-current="page">Manage Stocks</li>
        </ol>
    </nav>


    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="row">

                            <div class="col-lg-12 d-flex justify-content-end">
                                <a href="addProduct.php" class="btn btn-primary">Add Stocks
                                </a>
                            </div>

                            <div class="col-xl-12 col-md-6">
                                <div class="card Recent-Users">
                                    <div class="card-header">
                                        <h5>Products Data</h5>
                                    </div>
                                    <div class="card-block px-0 py-3">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Image</th>
                                                        <th scope="col">Product Quantity</th>
                                                        <th scope="col">Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $result = $db->getProducts();
                                                    while ($row = mysqli_fetch_array($result)) {
                                                        echo '<tr>';
                                                        echo '<td>' . $row['name'] . '</td>';
                                                        echo '<td>' . $row['price'] . '</td>';

                                                        // Display image using <img> tag
                                                        echo '<td><img src="' . $row['image'] . '" alt="Product Image" width="50" height="50"></td>';

                                                        echo '<td>' . $row['product_quantity'] . '</td>';

                                                        echo '<td>';
                                                        echo '<a class="btn btn-sm" href="viewProduct.php?id=' . $row['id'] . '">Edit</a>';
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