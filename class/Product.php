<?php
class Product
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    // public function getProductList()
    // {
    //     $sql = "SELECT * FROM products";
    //     $query = $this->con->prepare($sql);
    //     $query->execute();
    //     $results = $query->fetchAll(PDO::FETCH_ASSOC);
    //     $html = "";
    //     foreach ($results as $product) {
    //         $productName = $product['product_name'];
    //         $product_id = $product['product_id'];
    //         $html = $html . "<a href='productDetails.php?id=$product_id'>
    //                             <li>$productName</li>
    //                         </a>";
    //     }
    //     return $html;
    // }
    

    public function addProduct($addProductSku, $addProductName, $addProductPrice, $addProductType, $addProductSize){
        $sql = "INSERT INTO products( product_sku, product_name, product_price, product_type, product_size) VALUES(:product_sku, :product_name, :product_price, :product_type,product_size)";

        $query =$this->con->prepare($sql);
        $query->bindParam(':product_sku', $addProductSku,);
        $query->bindParam(':product_name', $addProductName,);
        $query->bindParam(':product_price', $addProductPrice,);
        $query->bindParam(':product_type', $addProductType,);
        $query->bindParam(':product_size', $addProductSize,);
        //ERROR HANDLING
        echo $addProductSku;
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