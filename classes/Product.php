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
        $params = [];
        $params[] = $product['name'];
        $params[] = $product['price'];
        $params[] = $product['stock'];
        $params[] = $product['pass'];
        $params[] = $product['category'];
        $params[] = $product['gender'];

        try {
            $stmt = dbc()->prepare($sql);
            $result = $stmt->execute($params);
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
        $params = [];
        $params[] = $id;
        try {
            $stmt = dbc()->prepare($sql);
            $stmt->execute($params);

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
        $sql = 'UPDATE products_table SET
                name = :name,
                price = :price,
                stock = :stock,
                pass = :pass,
                category = :category,
                gender = :gender
                WHERE id = :id';
        $params = [
         ':name' => $product['name'],
         ':price' => $product['price'],
         ':stock' => $product['stock'],
         ':pass' => $product['pass'],
         ':category' => $product['category'],
         ':gender' => $product['gender'],
         ':id' => $product['id'],
        ];

        try {
            $stmt = dbc()->prepare($sql);
            $result = $stmt->execute($params);
            return $result;
        } catch (\Exception $e) {
            echo $e ->getMessage();
            return $result = false;
        }
        return $result;
        // update テーブル名 set カラム1名 = 更新後の値1, カラム2名 = 更新後の値2 where 条件式;
        return $result = true;
    }

    /** 商品の削除
     * @param string $id
     * @return bool $result
     */
    public static function removeProduct($id)
    {
        $sql = 'DELETE FROM products_table WHERE id = :id';
        $params = [':id'=>$id];

        try {
            $stmt = dbc()->prepare($sql);
            $result = $stmt->execute($params);
            return $result;
        } catch (\Exception $e) {
            $err_mes = '正常に通信が完了しませんでした。再度お試しください。';
            return $err_mes;
        }
    }
}
