<?php
class Product
{
    /**
    * 商品情報の一覧の取得
    * @param void
    * @return array|bool $products|false
    */
    public static function getAllProducts()
    {
        // $sql = 'SELECT * FROM products_table';
        // $stmt = dbc()->query($sql);
        // $products = $stmt->fetchAll();
        return $products = false;
    }
    /**
    * 商品情報の登録
    * @param array $product
    * @return bool $result
    */
    public static function insertProduct($product)
    {
        echo 'called';
        return $result = false;
    }
}
