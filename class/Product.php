<?php
class Product
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function getProductList()
    {
        $sql = "SELECT * FROM products";
        $query = $this->con->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $html = "";
        foreach ($results as $product) {
            $productName = $product['product_name'];
            $productSku = $product['product_sku'];
            $productPrice = $product['product_price'];
            $productSize = $product['product_size']; 
           
            $html = $html . "<div class='card m-3' style='width: 18rem;'>
            <div class='card-body'>
                <div class='d-flex justify-content-between'>
                    <div class='form-check'>
                        <input class='form-check-input' type='checkbox' value='' id='flexCheckDefault'>
                        <label class='form-check-label' for='flexCheckDefault'></label>
                    </div>
                </div>
                <h6 class='card-subtitle mb-2 text-muted'>Product Name: $productName</h6>
                <p class='card-text'>Product SKU: $productSku</p>
                <p>Product Price: $productPrice</p>
                <p>Product Size: $productSize</p>
            </div>
        </div>";
        }
        return $html;
    }
    

    public function addProduct($addProductSku, $addProductName, $addProductPrice, $addProductType, $addProductSize){
        $sql = "INSERT INTO products(product_sku, product_name, product_price, product_type, product_size) VALUES(:product_sku, :product_name, :product_price, :product_type,:product_size)";

        $query =$this->con->prepare($sql);
        $query->bindParam(':product_sku', $addProductSku);
        $query->bindParam(':product_name', $addProductName);
        $query->bindParam(':product_price', $addProductPrice);
        $query->bindParam(':product_type', $addProductType);
        $query->bindParam(':product_size', $addProductSize);
        //ERROR HANDLING
        $result = $query->execute();
        print($result);
        if($result) {
            return true;
        } else {
            echo 'Something went wrong. Please try again later';
            return false;
        }
    }   




}