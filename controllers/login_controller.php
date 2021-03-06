<?php
class LoginController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            require_once('views/auth/login.php');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $username = htmlspecialchars(trim($_POST['username']));
            $password = $_POST['password'];

            if ($username === 'admin' && $password === '123') {
                $_SESSION['login'] = true;
                header("Location: http://www.php.loc/"); /* Redirect browser */
            } else {
                $userError = 'Wrong Email';
                $passError = 'Wrong Password';
                require_once('views/auth/login.php');

            }

        }
    }

    public function logout() {
        session_start();
        $_SESSION['login'] = false;
        header("Location: http://www.php.loc/"); /* Redirect browser */
        session_end();
    }

}