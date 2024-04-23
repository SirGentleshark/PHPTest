<?php

//NAMESPACE DECLARATIONS
namespace App\Utils;
use PDO;

class DB
{
	//PRIVATE PROPERTIES
	private $pdo;
	private static $instance = null;

	//CONSTRUCT FUNCTION CONNECTING TO DATABASE VIA PDO
	private function __construct()
	{
		$dsn = 'mysql:dbname=phptest;host=127.0.0.1';
		$user = 'root';
		$password = '0flamingHorses!';

		$this->pdo = new PDO($dsn, $user, $password);
	}

	//Singleton getInstance method
	public static function getInstance()
	{
		if (null === self::$instance) {
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}


	//Run provided SQL Select query string with provided parameters array, returns all rows from the result as an array
	public function select($sql, $params = [])
	{
    	$stmt = $this->pdo->prepare($sql);
    
    	foreach ($params as $key => $value) 
		{
       	 $stmt->bindValue($key, $value);
 		}

    	$stmt->execute();

		//Fetches data from the result set and returns it as an associative array
    	return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}

	//Run provided SQL query and return number of affected rows
	public function exec($sql)
	{
		return $this->pdo->exec($sql);
	}

	//Returns ID of the last inserted row from the database
	public function lastInsertId()
	{
		return $this->pdo->lastInsertId();
	}
}