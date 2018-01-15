<?php

$db = new PDO('mysql:host=localhost;charset=utf8;dbname=mundia_demande' , 'zo' , 'zz');
session_start();


        $date_creation = date('Y-m-d H-i-s');

if(isset($_SESSION['login_email']) && isset($_POST['local_reservation'])  && isset($_POST['departement_evenement']) && isset($_POST['materiel_reservation']) && isset($_POST['titre_evenement']) && isset($_POST['date_evenement']) && isset($_POST['debut_evenement']) && isset($_POST['fin_evenement']) && isset($_POST['commentaire_evenement'])){

        $email = $_SESSION['login_email'];
        $local_reservation = $_POST['local_reservation'];
        $materiel_reservation = $_POST['materiel_reservation'];
        $titre_evenement = $_POST['titre_evenement'];
        $date_evenement = $_POST['date_evenement'];
        $debut_evenement = $_POST['debut_evenement'];
        $fin_evenement = $_POST['fin_evenement'];
        $commentaire = $_POST['commentaire_evenement'];


$req0 = $db->query('SELECT * FROM type_demande where nom like "demande_reservation"');
//$id_type
$donnees0=$req0->fetch(); $id_type=$donnees0["id"];

//id_intervenant
$req4=$db->query("select staff.id as id_intervenant,staff.email as emailtosend  from staff,profile where staff.id_profile=profile.id and profile.nom like 'Responsable d’achat et logistique'");
$donnees4=$req4->fetch();
$id_intervenant=$donnees4['id_intervenant'];
$emailtosend=$donnees4['emailtosend'];

switch ($_POST['departement_evenement']) {
            case "École d'ingénierie":
                $id_departement = 1;
                break;

            case "Business school":
                $id_departement = 2;
                break;

            case "Faculté des sciences de la santé":
                $id_departement = 3;
                break;

            case "Faculté des sciences politiques":
                $id_departement = 4;
                break;

            default:
                # code...
                break;
        }

    //id d etat
$req3=$db->prepare("select * from etat where id_type=:id_type and etape=1");
$req3->execute(array("id_type"=>$id_type));
$donnees3=$req3->fetch();
$id_etat=$donnees3['id'];



    //id_demandeur
if(isset($_SESSION['professeur']))  {  $id_demandeur = $_SESSION['id_professeur'] ;}
if(isset($_SESSION['intervenant'])) {  $id_demandeur = $_SESSION['id_intervenant'];}

$req = $db->prepare('INSERT INTO demande(id_demandeur,email,date_creation,id_departement,id_type,id_intervenant,id_etat,local_reservation,materiel_reservation,titre,date_evenement,debut_evenement,fin_evenement) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)');

         $req->execute(array($id_demandeur,$email, $date_creation,$id_departement, $id_type, $id_intervenant,$id_etat,$local_reservation,$materiel_reservation,$titre_evenement,$date_evenement,$debut_evenement,$fin_evenement));

      //id derniere demande
$re=$db->query('select MAX(id) as maxid from demande');
$don=$re->fetch();
$id_demande=$don['maxid'];
$action="En cours";
//
$req5=$db->prepare("insert into action_demande (id_demande,id_utilisateur,email,date_action,id_etat,action) values(:id_demande,:id_utilisateur,:email,:date_action,:id_etat,:action)");
$req5->execute(array(
                    "id_demande"=>$id_demande,
                    "id_utilisateur"=>$id_demandeur,
                    "email"=>$email,
                    "date_action"=>date('Y-m-d H-i-s'),
                    "id_etat"=>$id_etat,
                    "action"=> $action
));
//send email
//recuper le nom de demandeur
$req001=$db->query("select nom,prenom from etudiant where email='$email' union select nom,prenom from staff where email='$email' ");
$donnees001=$req001->fetch();
$nom_demandeur=$donnees001["nom"]." ".$donnees001["prenom"];
//
$type=$titre_evenement;
//
require('sendemail/index.php');
header('Location: index.php?page=demande_reservation');
}
?>
