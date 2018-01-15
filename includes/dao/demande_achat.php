<?php
ini_set('display_errors', 1);
class DemandeAchat {
	public $tableName = 'demande';
	public $pdo;

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

		$query = $this->pdo->prepare($sql);
		$query->execute();

		$result = $query->fetch_assoc();

		if($result){
			return $result;
		}else{
			return false;
		}
	}

	function getAll() {
		$sql = "SELECT * FROM $this->tableName";

		$query = $this->pdo->prepare($sql);
		$query->execute();

		$result = $query->fetch_assoc();

		if($result){
			return $result;
		}else{
			return false;
		}
	}

	/**
	 * get last insert id
	 * @return int last insert id
	 */
	public function get_last_id()
	{
			return $this->pdo->lastInsertId();
	}

	function insert($titre, $id_demandeur, $id_departement, $date_Creation, $id_type, $id_etat, $id_intervenant, $devis1, $devis2, $devis3, $note_presentation, $fournisseur, $email) {
			$sql = "INSERT INTO $this->tableName (`titre`, `id_demandeur`, `id_departement`, `date_Creation`, `id_type`, `id_etat`, `id_intervenant`, `devis1`, `devis2`, `devis3`, `note_presentation`, `fournisseur`, `email`)
			VALUES('".$titre."' , ".$id_demandeur." , ".$id_departement." , '".$date_Creation."' , ".$id_type." , ".$id_etat." , ".$id_intervenant." , '".$devis1."' , '".$devis2."' , '".$devis3."' , '".$note_presentation."' , '".$fournisseur."', '".$email."')";

			// die($sql);
			$ins = $this->pdo->prepare($sql);
			$ins->execute();

			return $this->get_last_id();
	}

	function insertLigneDemant($id_demande, $description_article, $quantite, $prix_article, $montant, $observation) {
			$sql = "INSERT INTO ligne_demande (id_demande, description_article, quantite, prix_article, montant, observation)
			VALUES(".$id_demande." , '".$description_article."' , ".$quantite." , ".$prix_article." , ".$montant.", '".$observation."')";

			// die($sql);
			$ins = $this->pdo->prepare($sql);
			$ins->execute();

			return $this->get_last_id();
	}

	function update($id, $url, $source) {
		// update code here
	}

	function delete($id) {
		$sql = "DELETE FROM $this->tableName WHERE id=?;";

    $data = array( $id );
    $result = $this->pdo->prepare($sql);
    $result->execute( $data );
	}
}
?>
