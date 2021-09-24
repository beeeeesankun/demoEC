<?php
require_once '../functions/dbConnect.php';
class Product
{
    /**
    * 商品情報の一覧の取得
    * @param void
    * @return array|bool $products|false
    */
    public static function getAllProducts()
    {
        $sql = 'SELECT * FROM products_table';
        try {
            $stmt = dbc()->query($sql);
            $products = $stmt->fetchAll();
            return $products;
        } catch (\Exception $e) {
            echo $e ->getMessage();
            return $result = false;
        }
    }
    /**
    * 商品情報の登録
    * @param array $product
    * @return bool $result
    */
    public static function insertProduct($product)
    {
        $sql = 'INSERT INTO products_table(name,price,stock,pass,category,gender) VALUE (?,?,?,?,?,?)';
        $arr = [];
        $arr[] = $product['name'];
        $arr[] = $product['price'];
        $arr[] = $product['stock'];
        $arr[] = $product['pass'];
        $arr[] = $product['category'];
        $arr[] = $product['gender'];

        try {
            $stmt = dbc()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (\Exception $e) {
            echo $e ->getMessage();
            return $result = false;
        }
        return $result;
    }

    /** idから商品を検索して取得
     * @param string $id
     * @return array|bool $product|false
     */
    public static function getProductById($id)
    {
        $sql = 'SELECT * FROM products_table WHERE id = ?';
        $arr = [];
        $arr[] = $id;
        try {
            $stmt = dbc()->prepare($sql);
            $stmt->execute($arr);

            return $user = $stmt->fetch();
        } catch (\Exception $e) {
            return false;
        }
    }
    /**
    * 商品情報の登録
    * @param array $product
    * @return bool $result
    */
    public static function updateProduct($product)
    {
        return $result = true;
    }
}
