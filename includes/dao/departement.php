<?php
ini_set('display_errors', 1);

class Departement {
	public $tableName = 'departement';
	private $pdo;

	function __construct(){
			// Connect database
      try
      {
          $this->pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES '" . DB_CHARACSET . "';"));
          $this->pdo->exec("SET CHARACTER SET " . DB_CHARACSET);
          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->pdo->query("set names " . DB_CHARACSET);
      } catch (PDOException $e)
      {
          echo "error " . $e->getMessage();
      }
	}

	function getById($id) {
		$sql = "SELECT * FROM $this->tableName WHERE id=$id LIMIT 1";

    $result = $this->pdo->prepare($sql);
    $result->execute();
    $result->setFetchMode( PDO::FETCH_OBJ );

		return $result;
	}

	function getAll() {
		$sql = "SELECT * FROM $this->tableName";

    $result = $this->pdo->prepare($sql);
    $result->execute();
    $result->setFetchMode( PDO::FETCH_OBJ );

		return $result;
	}

}
?>
