<?php
session_start();
include '../controller/Dmmmsu.php';
$db = new db;

// Create Product
if (isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_FILES['image'];  // Use $_FILES for file upload
    $product_description = $_POST['product_description'];
    $product_quantity = $_POST['product_quantity'];
    $status = $_POST['status'];

    // Call the function to add the product
    $result = $db->addProduct($name, $price, $image, $product_description, $product_quantity, $status);

    if ($result != 0) {
        $message = "Product Added Successfully.";
    } else {
        $message = "Product Already Exists";
    }
}
?>

<!-- HTML form to add a product -->
<?php include '../layouts/header.php' ?>
<?php include '../layouts/dmmmsu/sidebar.php' ?>
<?php include '../layouts/dmmmsu/navbar.php' ?>

<div class="pcoded-main-container">
    <nav class="mx-3" style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Manage Product</li>
        </ol>
    </nav>

    <div class="pcoded-wrapper">

        <div class="pcoded-content">
       
            <div class="pcoded-inner-content">
                <div class="main-body">
                <div class="col-lg-12 d-flex justify-content-end">
                            <a href="products.php" class="btn btn-primary">Back
                            </a>
                        </div>    
                <div class="row">
                       
                        <div class="col-lg-12">

                            <?php include '../layouts/components/alert.php' ?>

                            <div class="card">
                                <div class="card-header">
                                    <h5>Add New Product</h5>
                                </div>
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="productName">Product Name</label>
                                                <input type="text" class="form-control" id="productName" name="name" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="productPrice">Price</label>
                                                <input type="number" class="form-control" id="productPrice" name="price" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="productQuantity">Product Quantity</label>
                                                <input type="number" class="form-control" id="productQuantity" name="product_quantity" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="productImage">Product Image</label>
                                                <input type="file" class="form-control" id="productImage" name="image" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="productDescription">Product Description</label>
                                                <textarea class="form-control" id="productDescription" name="product_description" rows="3" required></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control" aria-label="Default select example">
                                                    <option selected>Open this select menu</option>
                                                    <option value="0">Active</option>
                                                    <option value="1">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" name="submit" class="btn btn-primary mt-3">Add Product</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>