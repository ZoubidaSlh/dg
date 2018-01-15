<?php

     $db = new PDO('mysql:host=localhost;charset=utf8;dbname=mundia_demande' , 'zo' , 'zz');
     session_start();


        $date_creation = date('Y-m-d H-i-s');

if(isset($_SESSION['login_email']) && isset($_POST['periode_jours_demandee']) && isset($_POST['type_conge']) && isset($_POST['raison_conge']) && isset($_POST['interim']) && isset($_POST['commentaire_conge'])){

        $email = $_SESSION['login_email'];
        $periode= $_POST['periode_jours_demandee'];
        $type_conge = $_POST['type_conge'];
        $raison= $_POST['raison_conge'];
        $interim = $_POST['interim'];
        $commentaire = $_POST['commentaire_conge'];

$req0 = $db->query('SELECT * FROM type_demande where nom like "demande_conge"');

    //$id_type
$donnees0=$req0->fetch(); $id_type=$donnees0["id"];



//id_superieur
$req4=$db->query("select staff.id_superieur from staff
where staff.email='$email'
");
$donnees4=$req4->fetch();
$id_intervenant=$donnees4['id_superieur'];
//email de superieur pour lui envoyer un email
$req44=$db->query("select email from staff
where id='$id_intervenant'
");
$donnees44=$req44->fetch();
$emailtosend=$donnees44['email'];
/*switch ($_POST['departement']) {
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
        }*/
$id_departement = 3;

    //id d etat
$req3=$db->prepare("select * from etat where id_type=:id_type and etape=1");
$req3->execute(array("id_type"=>$id_type));
$donnees3=$req3->fetch();
$id_etat=$donnees3['id'];


    //id_demandeur
if(isset($_SESSION['professeur']))  {  $id_demandeur = $_SESSION['id_professeur'] ;}
if(isset($_SESSION['intervenant'])) {  $id_demandeur = $_SESSION['id_intervenant'];}


$req = $db->prepare('INSERT INTO demande(id_demandeur,email,date_creation,id_departement,id_type,id_intervenant,id_etat,periode,type_conge,raison_conge,interim,description) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)');
 $req->execute(array($id_demandeur,$email, $date_creation,$id_departement, $id_type, $id_intervenant,$id_etat,$periode,$type_conge,$raison,$interim,$commentaire));

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
$type="Congé ".$type_conge;
//
require('sendemail/index.php');

header('Location: index.php?page=demande_conge');
}
?>
