<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh; //db handler
    private $error;
    private $stmt; //statement

    public function __construct()
    {
        //  set DSN(database source name)
        $dsn = 'mysql:host=' . $this->host . '; dbname=' . $this->dbname;

        //  Set options
        $options = [
            PDO::ATTR_PERSISTENT => true, //Request a persistent connection, rather than creating a new connection.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //Throw a PDOException if an error occurs.
        ];

        //  Create a new PDO instance 
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        }  // Catch any errors
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }


    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }


    public function execute()
    {
        return $this->stmt->execute();
    }


    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ); // fetch result as object, I can use here array instead
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ); // same as above, only diff is FETCH to FETCHALL
    }

    public function rowCount()
    {
        return $this->stmt->rowCount();
    }

    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }

    // Transaction 
    public function beginTransaction()
    {
        return $this->dbh->beginTransaction();
    }

    public function endTransaction()
    {
        return $this->dbh->commit();
    }
    
    public function cancelTransaction()
    {
        return $this->dbh->rollBack();
    }


    /*The Debug Dump Parameters methods dumps the the information that was contained in the Prepared Statement. 
    This method uses the PDOStatement::debugDumpParams PDO Method. */
    public function debugDumpParams()
    {
        return $this->stmt->debugDumpParams();
    }

} 
