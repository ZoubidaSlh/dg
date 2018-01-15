<?php
session_start();
require("dbconfig.php");
if(isset($_SESSION['id_etudiant'])){
	$id_user=$_SESSION['id_etudiant'];
$email=$_SESSION['login_email'];
}
if(isset($_POST['submit']) and isset($id_user)){
$departement=$_POST['departement'];
$type=$_POST['typedemande'];
$titre=$_POST['titredemande'];
$commentaire=$_POST['sujetdemande'];
//id de departement
$req1=$bdd->query('select * from departement where nom="Business school"');
$donnees1=$req1->fetch();
$id_departement=$donnees1['id'];
//type de demande (attestation,releve)

$req2=$bdd->query('select * from type_demande
where id=1');
$donnees2=$req2->fetch();
$id_type=$donnees2['id'];

//id d etat
$req3=$bdd->prepare("select * from etat
where id_type=:id_type
and etape=1");
$req3->execute(array(
"id_type"=>$id_type
));
$donnees3=$req3->fetch();
$id_etat=$donnees3['id'];
//id_intervenant
$req4=$bdd->query('select staff.id as id_intervenant,staff.email as emailtosend from staff,profile
where staff.id_profile=profile.id
and profile.nom="service recouvrement"
');
$donnees4=$req4->fetch();
$id_intervenant=$donnees4['id_intervenant'];
$emailtosend=$donnees4['emailtosend'];
//
$req=$bdd->prepare("insert into demande (email,id_demandeur,date_creation,id_departement,id_type,id_etat,id_intervenant,titre,commentaire) values(:email,:id_demandeur,:date_creation,:id_departement,:id_type,:id_etat,:id_intervenant,:titre,:commentaire)");
$req->execute(array(
"email"=>$email,
"id_demandeur"=>$id_user,
"date_creation"=>date('Y-m-d'),
"id_departement"=>$id_departement,
"id_type"=>$id_type,
"id_etat"=>$id_etat,
"id_intervenant"=>$id_intervenant,
"titre"=>$type,
"commentaire"=>$commentaire
));
//id derniere demande
$re=$bdd->query('select MAX(id) as maxid from demande');
$don=$re->fetch();
$id_demande=$don['maxid'];
$action="En cours";
//
$req5=$bdd->prepare("insert into action_demande (id_demande,id_utilisateur,email,date_action,id_etat,action) values(:id_demande,:id_utilisateur,:email,:date_action,:id_etat,:action)");
$req5->execute(array(
"id_demande"=>$id_demande,
"id_utilisateur"=>$id_user,
"email"=>$email,
"date_action"=>date('Y-m-d H-i-s'),
"id_etat"=>$id_etat,
"action"=> $action
));
//send email
//recuper le nom de demandeur
$req001=$bdd->query("select nom,prenom from etudiant where email='$email'");
$donnees001=$req001->fetch();
$nom_demandeur=$donnees001["nom"]." ".$donnees001["prenom"];
/*if($type == "demande_scolarite")
	$type_demande="demande de scolarité";
elseif($type == "demande_achat")
	$type_demande="demande d'achat";
elseif($type == "demande_conges")
	$type_demande="demande de conges";
elseif($type == "demande_it")
	$type_demande="demande it";
elseif($type == "demande_reservation")
	$type_demande="demande reservation";
	*/

require('sendemail/index.php');



header("Location: " . $_SERVER["HTTP_REFERER"]);

}
else
header("Location: " . $_SERVER["HTTP_REFERER"]);






?>
