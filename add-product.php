<?php

if (isset($_POST['addProductButton'])) {
  $addProductName = $_POST['addProductName'];
  $addProductCategory = $_POST['addProductCategory'];
  $addProductContent = $_POST['addProductContent'];
  $addProductPower = $_POST['addProductPower'];

  $addProductPicture = rand(1000, 10000) . "-" . $_FILES['addProductPicture']['name'];
  print_r($_FILES);
  $tname = $_FILES['addProductPicture']['tmp_name'];
  $uploads_dir = '../assets/img/';
  //ERROR HANDLING
  move_uploaded_file($tname, $uploads_dir . '/' . $addProductPicture);



  $sql = "INSERT INTO products( product_name, product_category, product_power, product_image) VALUES(:product_name, :product_category, :product_power, :product_image)";

  $query = $con->prepare($sql);
  $query->bindParam(':product_name', $addProductName);
  $query->bindParam(':product_category', $addProductCategory);
  $query->bindParam(':product_power', $addProductPower);
  $query->bindParam(':product_image', $addProductPicture);
  //ERROR HANDLING
  $result = $query->execute();

  if ($result) {
    header("Location: adminProduct.php");
  } else {
    echo 'Something went wrong. Please try again later';
    return false;
  }
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
    <form>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product SKU</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Name</label>
            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Product Price</label>
            <input type="number" class="form-control" id="exampleFormControlInput1" min="1" max="100">
        </div>

        <label for="switcher" id="typeSwitcher">Type Switcher: </label>
        <select name="typeSwitcher" id="typeSwitcher">
            <option value="">Choose Type Switcher</option>
            <option value="disc">Disc</option>
            <option value="book">Book</option>
            <option value="furniture">Furniture</option>
        </select>
        <br><br>


        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
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