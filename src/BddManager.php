<?php

namespace caradvisor;

class BddManager
{
    /**
     * @var \mysqli
     */
    private $connection; //handler de connection
    public function __construct()
    {
        $mysqli = new \mysqli(Config::HOST, Config::USER, Config::PASSWORD, Config::DBNAME); // on met le "\" car il faut remonter à la racine avec le namespace
        if ($mysqli->connect_errno) {
            throw new \mysqli_sql_exception("Failed to connect to MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
        }
        $mysqli->set_charset("utf8");
        $this->connection = $mysqli;
    }

    /**
     * @return \mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @param string $sql
     * @return bool|\mysqli_result
     */
    public function execSql($sql)
    {
        if (!$result = $this->connection->query($sql)) {
            throw new \mysqli_sql_exception(
                "Failed to run query : (" .
                $this->connection->connect_errno . ") " .
                $this->connection->connect_error
            );
        }
        return $result;
    }
}
