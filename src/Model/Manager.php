<?php

namespace AlaskaBlog\Model;


/**
 * Class Manager
 *
 * @package AlaskaBlog\Model
 */
class Manager
{

    /**
     * @var string
     */
    protected $name;
    /**
     * @var array
     */
    protected $config;

    /**
     * @var \PDO
     */
    private $db;
    /**
     * Classes pour l'élément des messages Flash
     */
    const FLASH_SUCCESS = 'success';
    const FLASH_ERROR = 'danger';
    const FLASH_WARNING = 'warning';
    const FLASH_INFO = 'info';

    public function __construct()
    {
        if (!$this->config) {
            $this->config = require APP . 'config.php';
        }
        if (!$this->name) {
            $this->name = $this->config['Site']['name'];
        }
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return \PDO
     */
    protected function dbConnect()
    {
        $config = $this->config;
        $database = (object)$config['Database'];
        try {
            $db = new \PDO("mysql:host={$database->host};dbname={$database->name};charset={$database->charset};port={$database->port}",
                $database->username, $database->password
            );
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
            $db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage());
        }
        
        return $db;
    }

    /**
     * @return \PDO
     */
    protected function getPdo()
    {
        if (!$this->db) {
            $this->db = $this->dbConnect();
        }
        return $this->db;
    }

    /**
     * @param string $uri
     */
    public function redirect($uri = '/')
    {
        header("Location: $uri");
        exit();
    }

    /**
     * @param string $message
     * @param string $class
     */
    public function setFlash($message, $class = 'success')
    {
        $_SESSION['Flash'] = new \stdClass();
        $_SESSION['Flash']->class = $class;
        $_SESSION['Flash']->message = $message;
    }

    /**
     * @return mixed
     */
    public function getReferer()
    {
        return $_SERVER['HTTP_REFERER'];
    }

    /**
     * @return bool
     */
    public function isAdmin()
    {
        return (new AdminManager())->isAdmin();
    }

    /**
     * @param bool $fakeMethod
     * @return string
     */
    public function getMethod($fakeMethod = false)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        if ($fakeMethod) {
            $method = $_SERVER['REQUEST_METHOD'];
        }
        return strtoupper($method);
    }
}