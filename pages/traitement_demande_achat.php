<?php
	//
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);
	// --------
	// echo $_POST['id_demandeur'];exit();
	//
	// $lignes_demande = $_POST['ligneDemande'];
	// foreach ($lignes_demande as $ld) {
	// 	$values = array_values($ld);
	// 	print_r($values);
	// }
	// exit();
	session_start();


  // Include helpers & db classes
  include("includes/config.php");
  include("includes/dao/departement.php");
  include("includes/dao/demande_achat.php");
  $demande_achat = new DemandeAchat;
	$db = $demande_achat->pdo;

	// Get id_type
	$req0 = $db->query('SELECT * FROM type_demande where nom like "demande_it"');
	$donnees0 = $req0->fetch();
	$id_type = $donnees0["id"];
	$nom_type_it = $donnees0["nom"];
 // Get id_etat
	$req3 = $db->prepare("select * from etat where id_type=:id_type and etape=1");
	$req3->execute(array("id_type"=>$id_type));
	$donnees3 = $req3->fetch();
	$id_etat = $donnees3['id'];

	// Get id_intervenant
	if(isset($_SESSION['id_professeur']))  {  $id_demandeur = $_SESSION['id_professeur'] ;}
	if(isset($_SESSION['id_intervenant'])) {  $id_demandeur = $_SESSION['id_intervenant'];}
	if(isset($_SESSION['id_etudiant'])) {  $id_demandeur = $_SESSION['id_etudiant'];}


	// Get id_intervenant
	$req4=$db->query("select staff.id as id_intervenant ,staff.email as emailtosend from staff,profile
	where staff.id_profile=profile.id and profile.nom='achat et logistic'");
	$donnees4=$req4->fetch();
	$id_intervenant=$donnees4['id_intervenant'];
	$emailtosend=$donnees4['emailtosend'];

  $date_creation = date('Y-m-d');
	$email = $_SESSION['login_email'];

  if( isset($_POST)) {
    $lastInsertId = $demande_achat->insert(
      $_POST['titre'],
      $id_demandeur, // id_demandeur
      $_POST['id_departement'],
      $date_creation, // date_creation
      $id_type, // id_type
      $id_etat, // id_etat
      $id_intervenant, // id_intervenant
      '', // devis1
      '', // devis2
      '', // devis3
      '', // note_presentation
      $_POST['fournisseur'],
			$email
    );
    // echo "lastInsertId: $lastInsertId";
		$lignes_demande = $_POST['ligneDemande'];
		foreach ($lignes_demande as $ld) {
			$values = array_values($ld);
			// 0: description, 1: quantite, 2: prixUnitaite, 3: montant, 4: observation
			// echo $values[0]." - ".$values[1]." - ".$values[2]." - ".$values[3]." - ";
			$demande_achat->insertLigneDemant($lastInsertId, $values[0], $values[1], $values[2], $values[3], $values[4]);
		}
  }

	// Send email
	//recuper le nom de demandeur
	// $req001=$db->query("select nom,prenom from etudiant where email='$email' union select nom,prenom from staff where email='$email' ");
	// $donnees001=$req001->fetch();
	// $nom_demandeur=$donnees001["nom"]." ".$donnees001["prenom"];
	// require('sendemail/index.php');

header('Location: /gd/index.php?page=liste_demande');
