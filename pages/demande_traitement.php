<?php
session_start();
require("dbconfig.php");

if(isset($_GET['id_demande']) and isset($_GET['oper']) and isset($_GET['intervenant']) or isset($_POST['id_demande'])){
	if(isset($_GET['id_demande'])){
$id_demande=$_GET['id_demande'];
$operation=$_GET['oper'];
$email_intervenant=$_GET['intervenant'];
$profile_intervenant=$_SESSION['profile_intervenant'];
$id_etat=$_GET["id_etat"];
$id_type=$_GET["id_type"];
	}
	elseif(isset($_POST['id_demande'])){
$motif=$_POST["motif"];
$id_demande=$_POST['id_demande'];
$operation=$_POST['oper'];
$email_intervenant=$_POST['intervenant'];
$profile_intervenant=$_SESSION['profile_intervenant'];
$id_etat=$_POST["id_etat"];
$id_type=$_POST["id_type"];
		
	}
//recuperer email de demandeur
		$reqd=$bdd->query("select * from demande where id='$id_demande'");
		$donnesd=$reqd->fetch();
		$email_demandeur=$donnesd["email"];	
		
		
//traitement
if($operation=="Validee"){
//recuperer etape de demande
$req1=$bdd->query("select * from etat where id='$id_etat'");
$donnes1=$req1->fetch();
$etape=$donnes1["etape"];
//recuperer lenombre des etape
$req0=$bdd->query("select count(id) as nbr_etape from etat where id_type='$id_type'  ");
$donnes0=$req0->fetch();
$nbr_etape=$donnes0["nbr_etape"];
//recuperer le nombre des action en demande_action pour savoir si la demande a fini ou pass
$req00=$bdd->query("select count(id) as nbr_action from action_demande where id_demande='$id_demande'  ");
$donnes00=$req00->fetch();
$nbr_action=$donnes00["nbr_action"];
echo $nbr_action." ".$nbr_etape;

//
if($etape <= $nbr_etape){
	if($etape < $nbr_etape)
		$etape++;
	
		//si demande est de type congé
		if($nbr_action == $nbr_etape and $id_type==3){
			//recuperer email de demandeur
		$reqd=$bdd->query("select * from demande where id='$id_demande'");
		$donnesd=$reqd->fetch();
		$email_demandeur=$donnesd["email"];	
		$periode=$donnesd["periode"];		
		//update solde de conge
			
		$requp=$bdd->prepare("UPDATE staff set solde_conges=solde_conges -'$periode'
		where email=:email");	
		$requp->execute(array(
		"email"=>$email_demandeur
		));
		
		
											}
	
	//id d etat
    $req3=$bdd->prepare("select * from etat 
	where id_type=:id_type
	and etape=:etape");
	$req3->execute(array(
	"id_type"=>$id_type,
	"etape"=>$etape));
	$donnees3=$req3->fetch();
	
	$id_etat_suivant=$donnees3['id'];
	$profile=$donnees3["profile"];
	
	//id_intervenant
	$req4=$bdd->query("select staff.id as id_intervenant ,staff.email as emailtosend from staff,profile
	where staff.id_profile=profile.id
	and profile.nom='$profile'");
	$donnees4=$req4->fetch();
	$id_intervenant=$donnees4['id_intervenant'];
	$emailtosend=$donnees4['emailtosend'];    


	//update la demande
$req=$bdd->prepare("UPDATE demande set id_intervenant=:id_intervenant, id_etat=:id_etat where id=:id");	
$req->execute(array(
"id_etat"=>$id_etat_suivant,
"id_intervenant"=>$id_intervenant,
"id"=>$id_demande));
//insert into action demande
$req5=$bdd->prepare("insert into action_demande (id_demande,id_utilisateur,email,date_action,id_etat,action) values(:id_demande,:id_utilisateur,:email,:date_action,:id_etat,:action)");	
$req5->execute(array(
"id_demande"=>$id_demande,
"id_utilisateur"=>3,
"email"=>$email_intervenant,	
"date_action"=>date('Y-m-d H-i-s'),
"id_etat"=>$id_etat_suivant,
"action"=> $operation
));	
if( $nbr_action < $nbr_etape){
	$demandevalidee="false";
//send email
//recuper le nom de demandeur
$req001=$bdd->query("select nom,prenom from etudiant where email='$email_intervenant' union select nom,prenom from staff where email='$email_intervenant' ");
$donnees001=$req001->fetch();	
$nom_demandeur=$donnees001["nom"]." ".$donnees001["prenom"];	
//
require('sendemail/index2.php');
	
}
else{
$demandevalidee="true";
//recuper le nom de demandeur
$req001=$bdd->query("select nom,prenom from etudiant where email='$email_demandeur' union select nom,prenom from staff where email='$email_demandeur' ");
$donnees001=$req001->fetch();	
$nom_demandeur=$donnees001["nom"]." ".$donnees001["prenom"];	
$emailtosend=$email_demandeur;
require('sendemail/index2.php');	
}
	
$_SESSION["demande_traitee"]=$id_demande;	
//header("Location: " . $_SERVER["HTTP_REFERER"]);

	
}

}
else{
	//insert into action demande
$req5=$bdd->prepare("insert into action_demande (id_demande,id_utilisateur,email,date_action,id_etat,action) values(:id_demande,:id_utilisateur,:email,:date_action,:id_etat,:action)");	
$req5->execute(array(
"id_demande"=>$id_demande,
"id_utilisateur"=>3,
"email"=>$email_intervenant,
"date_action"=>date('Y-m-d H-i-s'),
"id_etat"=>$id_etat,
"action"=> $operation
));	

	//update la demande "le motif"
$req=$bdd->prepare("UPDATE demande set motif=:motif where id=:id");	
$req->execute(array(
"id"=>$id_demande,
"motif"=>$motif));


//send email
//recuper le nom de demandeur
$req001=$bdd->query("select nom,prenom from etudiant where email='$email_demandeur' union select nom,prenom from staff where email='$email_demandeur' ");
$donnees001=$req001->fetch();	
$nom_demandeur=$donnees001["nom"]." ".$donnees001["prenom"];	
$emailtosend=$email_demandeur;
//
require('sendemail/index2.php');	



$_SESSION["demande_traitee"]=$id_demande;	
//header("Location: " . $_SERVER["HTTP_REFERER"]);

}





	
}

?>