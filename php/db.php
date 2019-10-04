<?php
    class Database
    {
        public static $dbh;

        public static function getDbh()
        {
            $host = "127.0.0.1";
            $user = "root";
            $password = "";
            $dbname = "crsdiscount";

            self::$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            return self::$dbh;
        }

        public static function query($query)
        {
            $sth = self::getDbh()->prepare("$query");
            $sth->execute();
            return $sth->fetch(PDO::FETCH_ASSOC);
        }

        public static function queryAll($query)
        {
            $sth = self::getDbh()->prepare($query);
            $sth->execute();
            return $sth->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function queryExecute($query)
        {
            $sth = self::getDbh()->prepare($query);
            $sth->execute();
        }
    }
?>