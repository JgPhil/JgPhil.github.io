<?php

namespace App\Model;

class Db
{
public static function dbConnect() {
try{
$db = new PDO('mysql:host=localhost;dbname=blog','root','', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch(PDOException $e)
{
echo $e ;
}
return $db;
}
}
