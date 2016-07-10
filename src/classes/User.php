<?php

namespace Bence;

class User
{
    private $db;

    const COOKIENAME = 'benceLogin';

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function attemptLogin() {
        if (!empty($_COOKIE[$this::COOKIENAME])) {
            $auth = json_decode($_COOKIE[$this::COOKIENAME]);

            $email = $auth->email;
            $password = $auth->password;

            return $this->getUserWithHash($email, $password);
        }
        return false;
    }

    public function login($email, $password, $remember) {

        if ($this->verify($email, $password)) {

            if (!empty($remember)) {
                    $value = array(
                        'email' => $_SESSION['email'],
                        'password' => $_SESSION['password']
                    );
                    $expiry = time()+(365 * 24 * 60 * 60);
                    setcookie($this::COOKIENAME, json_encode($value), $expiry, '/');
            }

            return true;
        }
        return false;
    }

    public function verify($email, $password) {
        $query = $this->db->prepare("SELECT `salt` FROM users WHERE `email` = '$email'");
        $query->execute();
        $salt = $query->fetchColumn();

        if (!empty($salt)) {
            $hash = sha1($password . $salt);
            return $this->getUserWithHash($email, $hash);
        }
        return false;
    }

    private function getUserWithHash($email, $hash) {
        $query = $this->db->prepare("
                SELECT * FROM users
                  LEFT JOIN regions ON users.region=regions.r_id
                  WHERE users.email= '$email'
                    AND users.password = '$hash'"
        );
        $query->execute();
        $user = $query->fetch(\PDO::FETCH_ASSOC);

        if (!empty($user)) {
            $_SESSION = $user;
            $_SESSION['loggedIn'] = true;
            return true;
        }
        return false;
    }
}