<?php
namespace School\Database;
use \PDO;


/**
 * Class Database
 * @package School\Database
 */
class Database extends DatabaseConfig
{
    /**
     * @var string
     */
    private static $db_name;
    /**
     * @var string
     */
    private static $db_user;
    /**
     * @var string
     */
    private static $db_pass;
    /**
     * @var string
     */
    private static $db_host;
    /**
     * @var string
     */
    private static $pdo;

    /**
     * Database constructor.
     */
    public function __construct()
    {
        self::$db_name = $this->BDD_NAME;
        self::$db_user = $this->BDD_USER;
        self::$db_pass = $this->BDD_PASSWORD;
        self::$db_host = $this->BDD_HOST;
    }

    /**
     * @return PDO
     */
    private function getPDO()
    {
        if (self::$pdo == null) {
            $pdo = new PDO('mysql:dbname=' . self::$db_name . ';host=' . self::$db_host . '', self::$db_user, self::$db_pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$pdo = $pdo;
        }
        return self::$pdo;
    }


    /**
     * @param $statement
     * @param null $one
     * @return array|mixed
     */
    public static function query($statement, $one = null)
    {
        $req = (new Database)->getPDO()->query($statement);
        if ($one) {
            $datas = $req->fetch(PDO::FETCH_CLASS);
        } else {
            $datas = $req->fetchAll(PDO::FETCH_CLASS);
        }
        return $datas;
    }

    /**
     * @param $statement
     * @param $attributes
     * @param bool $return
     * @param null $one
     * @return array|bool|mixed
     */
    public static function prepare($statement, $attributes = null, $return = true , $one = null)
    {
        $req = (new Database)->getPDO()->prepare($statement);
        $req->execute($attributes);
        if($return) {
            if ($one) {
                $datas = $req->fetch();
            } else {
                $datas = $req->fetchAll();
            }
        }
        (isset($datas))?  $datas = $datas : $datas = false;
        return $datas;
    }

    /**
     * @param $statement
     * @param $attributes
     * @return int
     */
    public static function count($statement, $attributes)
    {
        $req = (new Database)->getPDO()->prepare($statement);
        $req->execute($attributes);

        $datas = $req->rowCount();

        return $datas;
    }
}
