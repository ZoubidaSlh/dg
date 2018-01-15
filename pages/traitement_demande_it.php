<?php

     $db = new PDO('mysql:host=localhost;charset=utf8;dbname=mundiademande' , 'root' , '');
     session_start();


        $date_creation = date('Y-m-d');

if(isset($_SESSION['login_email']) && isset($_POST['titre']) && isset($_POST['type']) && isset($_POST['description']) && isset($_POST['departement'])){
        $email = $_SESSION['login_email'];
        $titre = $_POST['titre'];
        $type = $_POST['type'];
        $description = $_POST['description'];

$req0 = $db->query('SELECT * FROM type_demande where nom like "demande_it"'); $donnees0=$req0->fetch(); $id_type=$donnees0["id"];
$nom_type_it=$donnees0["nom"];
/*$req1 =$db->query('SELECT * FROM staff where email like "$email"');

    while ($donnees1=$req1->fetch()){
    $id_intervenant=$donnees1["id"];}*/

    //id_intervenant
$req4=$db->query('select staff.id as id_intervenant ,staff.email as emailtosend from staff,profile
where staff.id_profile=profile.id
and profile.nom="service it"
');
$donnees4=$req4->fetch();
$id_intervenant=$donnees4['id_intervenant'];
$emailtosend=$donnees4['emailtosend'];

   // $id_intervenant = 4;
/*$req1=$bdd->query("SELECT demande.id as id,demande.id_demandeur as id_demandeur,
                        demande.email as email,demande.date_creation as date_creation,demande.id_departement as id_departement,
                        demande.id_type as id_type,demande.id_etat as id_etat,demande.id_intervenant as id_intervenant,
                        demande.titre as titre,demande.commentaire as commentaire,demande.devis1 as devis1,
                        demande.devis2 as devis2,demande.devis3 as devis3,demande.note_presentation as note_presentation,
                        demande.fournisseur as fournisseur,demande.type_conges as type_conges,demande.date_debut as date_debut,
                        demande.date_fin as date_fin,demande.raison as raison,demande.interim as interim,demande.date_type as type,
                        demande.description as description,demande.file_url as file_url
                        from demande,staff
                         where demande.id_intervenant=staff.id
                        and staff.email like '$email'");*/


        switch ($_POST['departement']) {
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
}
 //id d etat
$req3=$db->prepare("select * from etat
where id_type=:id_type
and etape=1");
$req3->execute(array(
"id_type"=>$id_type
));
$donnees3=$req3->fetch();
$id_etat=$donnees3['id'];
echo $id_etat.'<br>';

//
if(isset($_SESSION['professeur']))  {  $id_demandeur = $_SESSION['id_professeur'] ;}
if(isset($_SESSION['intervenant'])) {  $id_demandeur = $_SESSION['id_intervenant'];}
if(isset($_SESSION['etudiant'])) {  $id_demandeur = $_SESSION['id_etudiant'];}

$file_dest=NULL;
if(!empty($_FILES) and !isset($_FILES)){
    $file_name = $_FILES['fichier']['name'];
    $file_extension = strrchr($file_name, ".");

    $file_tmp_name = $_FILES['fichier']['tmp_name'];
    $file_dest = "pages/Files/".$file_name;

    $extensions_autorisees = array('.PNG','.png','.jpg','.JPG','.PDF','.pdf','.txt');
        if(in_array($file_extension, $extensions_autorisees)){//est ce que cette valeur fait partie du tableau d'extension
            if(move_uploaded_file($file_tmp_name, $file_dest)){//pour envoyer le fichier

                    echo 'Bien passé';
            }else{
                echo "Une erreur est survenue lors de l'envoi de fichier";
            }
        }else {
            echo 'Seuls les fichiers PDF , TXT';
        }
}



$req = $db->prepare('INSERT INTO demande(id_demandeur,email,date_creation,id_departement,id_type,id_intervenant,id_etat,titre,type,description,file_url) VALUES(?,?,?,?,?,?,?,?,?,?,?)');
                    $req->execute(array($id_demandeur,$email, $date_creation,$id_departement, $id_type, $id_intervenant,$id_etat,$titre , $type, $description,$file_dest));

                    //
                    //id derniere demande
$re=$db->query('select MAX(id) as maxid from demande');
$don=$re->fetch();
$id_demande=$don['maxid'];
$action="En cours";
echo $id_demande.'<br>';
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
require('sendemail/index.php');


header('Location: index.php?page=demande_it');

?>
