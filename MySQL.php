<?php

require_once "IDatabaseDriver.php";

class MySQL implements IDatabaseDriver
{
    private static $tableColumns = "";
    private static $tableValueParams = "";
    private static $tableSetParams = "";
    private static $tableName = "";
    private static $conditionCounter = 0;
    private static ?string $storedQuery;
    private static ?PDOStatement $storedStatement;


    // Connect the database and set tableName
    public static function connect()
    {

        // Create the pdo object 
        try {
            $pdo = new PDO('mysql:host=mariadb;dbname=odev5', 'root', 'root');
        } catch (\PDOException $ex) {
            exit("Veritabanına bağlanırken bir hata ile karşılaşıldı. {$ex->getMessage()}");
        }

        // Get table name
        self::setTableName();
        return $pdo;
    }

    // Define table name
    public static function setTableName()
    {
        //Define table name the will be using on queries
        if (static::$tableName) {
            // That means there is a custom tableName property variable on Model
            self::$tableName  = static::$tableName;
        } else {
            // That means that there isn't customization. It will be apply  default table naming 
            self::$tableName  = strtolower(static::class) . 's';
        }
    }


    /**
     * Fetch all record as function's model the invoked 
     * 
     * Example : This function returns the Post model array if run like Post::All() 
     * Example : This function returns the User model array if run like User::All() 
     * 
     * @return static::class
     * */
    public static function All()
    {
        $query = self::connect()->query("Select * from " . self::$tableName . "");

        return $query->fetchAll(PDO::FETCH_CLASS, static::class);
    }


    /**
     * Get child class object by id 
     * 
     * Return null if the record doesn't exist.
     * 
     * @param int $id
     * @return static::object|null
     * 
     */
    public static function find($id)
    {
        self::where('id','=', $id);

        self::$storedStatement->execute();

        // Get record as static::object 
        $result = self::$storedStatement->fetchObject(static::class);

        $result = $result ?: null;

        return $result;
    }

    // Add where clausure to pdoStatement 
    public static function where(string $columnName, string $condition = "=", $value = null)
    {
        self::setTableName();
        if (empty(self::$storedQuery)) {
            self::$storedQuery = "SELECT * FROM " . self::$tableName;
        }
        
        if (self::$conditionCounter < 1) {
            self::$storedQuery .= " WHERE $columnName$condition:$columnName";
        } else {
            self::$storedQuery .= " and $columnName$condition:$columnName";
        }
        //Prepare query and bind variables
        self::$storedStatement = self::connect()->prepare(self::$storedQuery);

       
        self::$storedStatement->bindParam(':id', $value);
        self::$storedStatement->execute();      

        return new static;

    }

    // Get all records of query
    public static function get()
    {        
        return static::$storedStatement->fetchAll(PDO::FETCH_CLASS, static::class);
    }


    // Get first record
    public static function first()
    {        
        return static::$storedStatement->fetchObject(static::class);
    }
    /**
     * Creates some part of SQL Queries
     * 
     * @return Array 
     */
    public function serialize(): array
    {
        // Get properties of static class as array
        $properties = get_object_vars($this);
        $totalProperties = count($properties);
        $propertiesCounter = 0;


        foreach ($properties as $columnName => $value) {

            // Ex : VALUES (:value1,:value2,:value3)
            self::$tableValueParams .= ":" . $columnName;
            // Ex : tableName (:column1,:column2,:column3) 
            self::$tableColumns .= $columnName;
            // Ex : SET column1 = :value1, column2 = :value2, column3 = :value3
            self::$tableSetParams .= "$columnName=:$columnName";

            $propertiesCounter++;

            // Don't add semicolon if this is last value of array
            if ($propertiesCounter < $totalProperties) {

                self::$tableSetParams .= ',';
                self::$tableValueParams .= ',';
                self::$tableColumns .= ',';
            }
        }
        return $properties;
    }

    // Create the record
    public function create()
    {
        // Serialize parts of the query
        $properties = $this->serialize();

        $namedQuery = self::connect()->prepare("INSERT INTO " . self::$tableName . "(" . self::$tableColumns . ") VALUES(" . self::$tableValueParams . ")");

        // Bind params
        foreach ($properties as $param => $value) {
            $namedQuery->bindValue(":$param", $value);
        }

        $namedQuery->execute();
    }

    public function update()
    {
        // Serialize parts of the query
        $properties = $this->serialize();

        $query = "UPDATE " . self::$tableName . " SET " . self::$tableSetParams . " WHERE id=:id";
        $namedQuery = self::connect()->prepare($query);

        // Bind params
        foreach ($properties as $param => $value) {
            $namedQuery->bindValue(":$param", $value);
        }

        $namedQuery->execute();
    }

    public function delete()
    {
        // Connect the database
        self::connect();

        $query = "DELETE FROM " . self::$tableName . " WHERE id=:id";
        $namedQuery = self::connect()->prepare($query);

        // Bind id param
        $namedQuery->bindValue(":id", $this->id);

        $namedQuery->execute();
    }
}
