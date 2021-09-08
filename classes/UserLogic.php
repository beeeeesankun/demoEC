<?php
require_once '../functions/dbConnect.php';

class UserLogic
{
    /**
     *  ユーザーを登録する
     * @param array $userData
     * @return bool $result
     */
    public static function createUser($userData)
    {
        $sql = 'INSERT INTO employee_table(name,email,pass) VALUES(?,?,?)';
        $arr = [];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);

        try {
            $stmt = dbc()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (\Exception $e) {
            return $result = false;
        }
    }

    /** ログイン機能
     * @param string $email
     * @param string $password
     * @return bool $result
     */
    public static function login($email, $password)
    {
        $user = self::getUserByEmail($email);

        if (!$user) {
            $_SESSION['msg'] = 'emailが一致しません。';

            return $result = false;
        }
        if (password_verify($password, $user['pass'])) {
            session_regenerate_id(true);
            $_SESSION['login_user'] = $user;

            return  $result = true;
        } else {
            $_SESSION['msg'] = 'パスワードが一致しません。';
            return $result = false;
        }
    }

    /** メールからユーザーを検索して取得
     * @param string $email
     * @return array|bool $user|false
     */
    public static function getUserByEmail($email)
    {
        $sql = 'SELECT * FROM employee_table WHERE email = ?';
        $arr = [];
        $arr[] = $email;
        try {
            $stmt = dbc()->prepare($sql);
            $stmt->execute($arr);

            return $user = $stmt->fetch();
        } catch (\Exception $e) {
            return false;
        }
    }

    /** ログインチェック
    * @param void
    * @return bool $result
    */
    public static function checkLogin()
    {
        if (isset($_SESSION['login_user']) && $_SESSION['login_user']['id'] > 0) {
            return $result = true;
        }
        return $result = false;
    }
    /** ログインアウト
    * @param void
    * @return bool $result
    */
    public static function logout()
    {
        $_SESSION = [];
        session_destroy();
    }
}
