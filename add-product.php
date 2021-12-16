<?php
include("includes/config.php");
include("class/Product.php");

$product = new Product($con);

if (isset($_POST['addProductButton'])) {
    echo "salam addProductButton";
    $addProductSku = $_POST['productSku'];
    $addProductName = $_POST['productName'];
    $addProductPrice = $_POST['productPrice'];
    $addProductType = $_POST['typeSwitcher'];
    $addProductSize = $_POST['size'];
    echo $addProductType;
    echo $addProductSku;
    echo $addProductName;
    echo $addProductPrice;
    echo $addProductSize;

    $wasSuccessful = $product->addProduct($addProductSku, $addProductName, $addProductPrice, $addProductType, $addProductSize);
    
//     if ($wasSuccessful) {
//         header("Location: product.php");
//     } else {
//         echo 'Something went wrong. Please try again later';
//         return false;
//   }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1 class="primary">Add New Product</h1>
    <form action="add-product.php" method="POST">
        <div class="form-group">
            <label for="exampleFormControlInput1">Product SKU</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="productSku">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <div class="form-group">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="productName">
        </div>
            <label for="exampleFormControlInput1">Product Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" min="1" max="100"
                name="productPrice">
        </div>

        <label name="typeProduct" for="switcher" id="typeSwitcher">Type Switcher: </label>
        <select name="typeSwitcher" id="typeSwitcher">
            <option value="">Choose Type Switcher</option>
            <option value="disc">Disc</option>
            <option value="book">Book</option>
            <option value="furniture">Furniture</option>
        </select>

        <div class="form-group">
            <label for="exampleFormControlInput1">Size (MB)</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" min="1" max="100" name="size">
        </div>

        <!-- <div class="form-group">
            <label for="exampleFormControlInput1">Weight(KG)</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" min="1" max="100" name="weight">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput1">Length(HxWxL)</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" min="1" max="100" name="length">
        </div> -->
        <br><br>
        <button type="submit" class="btn btn-primary" name="addProductButton">Add new Product</button>
    </form>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>