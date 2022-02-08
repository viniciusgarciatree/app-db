<?php

namespace App\Services;

use PDO;
use PDOException;

class Conect
{
    protected $dbh;

    public function __construct($db_host, $db_name, $db_user, $user_pw)
    {
        try {
            $con = new PDO('mysql:host='.$db_host.'; dbname='.$db_name, $db_user, $user_pw);  
            $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $con->exec("SET CHARACTER SET utf8");  //  return all sql requests as UTF-8  
        }
        catch (PDOException $err) {  
            echo "harmless error message if the connection fails";
            $err->getMessage() . "<br/>";
            file_put_contents('PDOErrors.txt',$err, FILE_APPEND);  // write some details to an error-log outside public_html  
            die();  //  terminate connection
        }
    }

    public function dbh()
    {
        return $this->dbh;
    }
}
