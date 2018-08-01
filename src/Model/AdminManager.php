<?php

namespace AlaskaBlog\Model;

/**
 * Class AdminManager
 *
 * @package AlaskaBlog\Model
 */
class AdminManager extends Manager
{
    /**
     * @param string $login
     * @param string $password
     * @return array|bool
     */
    public function getLogin($login, $password)
	{
        $hash = sha1($password);
        $req = $this->getPdo()->prepare('SELECT id, password FROM administrateur WHERE login = :login');
        $req->execute(['login' => $login]);
 
        $result = $req->fetch();

        if ($result && $result->password === $hash) {
            return ['login' => $login];
        }
        return false;
	}

    /**
     * @param bool|string $password
     * @return mixed
     */
    public function getPassword($password)
	{
        $req = $this->getPdo()->prepare('SELECT id, password FROM administrateur WHERE password = :password');
        $req->execute(['password' => sha1($password)]);
 
        return $req->fetch();
	}

    /**
     * @return bool
     */
    public function isAdmin()
    {
        if (isset($_SESSION['administrateur']) && !empty($_SESSION['administrateur'])) {
            return $_SESSION['administrateur'] === true;
        }
        return false;
    }
}