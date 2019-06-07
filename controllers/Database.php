<?php 

class Database {

	const HOSTNAME = "localhost";
	const USERNAME = "root";
	const PASSWORD = "";
	const DBNAME = "db_superlogica";

	private $conn;

	public function __construct()
	{

		$this->conn = new \PDO(
			"mysql:dbname=".Database::DBNAME.";host=".Database::HOSTNAME, 
			Database::USERNAME,
			Database::PASSWORD
		);

	}

	public function query($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);
		$stmt->execute($params);

	}

	public function select($rawQuery, $params = array())
	{

		$stmt = $this->conn->prepare($rawQuery);
		$stmt->execute($params);

		return $stmt->fetchAll(PDO::FETCH_ASSOC);

	}

}

 ?>