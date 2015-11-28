<?php
class db {

    private static $_INSTANCE;
    private $_host = 'localhost';
    private $_username = 'velo';//mslstats
    private $_password = 'velo';//ePbjsC1FuC@AfL
    private $_database = 'velo';//mslstats
    private $_connection = null;

    private function __construct() {
        $this->_connection = mysqli_connect($this->_host, $this->_username, $this->_password, $this->_database);
    }

    public static function GetInstance() {
        if (!self::$_INSTANCE instanceof self) {
            self::$_INSTANCE = new self();
        }
        return self::$_INSTANCE;
    }

    public function Query($strSQL) {
        $result = mysqli_query($this->_connection, $strSQL);
        if (!$result) {
            die('Invalid query: ' . mysqli_error( $this->_connection ) . '\n'.'strSQL: '.$strSQL.'\n');
        }
        return $result;
    }

    public function Escape($value) {
        if ($this->_connection != null) {
            return mysqli_real_escape_string($this->_connection, $value);
        }
        die('Could not excape, no connection!');
    }

    public function InsertId() {
        if ($this->_connection != null) {
            return mysqli_insert_id($this->_connection);
        }
        die('Could not get insert ID, no connection!');
    }

    public function Close() {
        if ($this->_connection) {
            return mysqli_close($this->_connection);
        } else {
            return false;
        }
    }

    public function __destruct() {
        $this->close();
    }

}

?>