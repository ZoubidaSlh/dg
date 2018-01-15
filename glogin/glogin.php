<?php
// ini_set('display_errors', 1);
session_start(); //session start

require_once ('libraries/Google/autoload.php');

//Insert your cient ID and secret
//You can get it from : https://console.developers.google.com/
$client_id = '551118018603-mjkh47rq2hh2086dokh6mipasdfrrpif.apps.googleusercontent.com';
$client_secret = 'JuK_bDOyTniR6tf9X65owoPN';
$redirect_uri = 'http://localhost/gd/glogin/glogin.php';

//database
$db_username = "zo"; //Database Username
$db_password = "zz"; //Database Password
$host_name = "127.0.0.1"; //Mysql Hostname
$db_name = 'mundia_demande'; //Database Name

//incase of logout request, just unset the session var
if (isset($_GET['logout'])) {
  unset($_SESSION['access_token']);
  unset($_SESSION['professeur']);
  unset($_SESSION['etudiant']);

  $_SESSION=array();
session_destroy();

}

/************************************************
  Make an API request on behalf of a user. In
  this case we need to have a valid OAuth 2.0
  token for the user, so we need to send them
  through a login flow. To do this we need some
  information from our API console project.
 ************************************************/
$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope("email");
$client->addScope("profile");

/************************************************
  When we create the service here, we pass the
  client to it. The client then queries the service
  for the required scopes, and uses that when
  generating the authentication URL later.
 ************************************************/
$service = new Google_Service_Oauth2($client);

/************************************************
  If we have a code back from the OAuth 2.0 flow,
  we need to exchange that with the authenticate()
  function. We store the resultant access token
  bundle in the session, and redirect to ourself.
*/

if (isset($_GET['code'])) {
  $client->authenticate($_GET['code']);
  $_SESSION['access_token'] = $client->getAccessToken();
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
  exit;
}

/************************************************
  If we have an access token, we can make
  requests, else we generate an authentication URL.
 ************************************************/
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
  $client->setAccessToken($_SESSION['access_token']);
} else {
  $authUrl = $client->createAuthUrl();

}


//Display user info or display login url as per the info we have.
// echo '<div style="margin:20px">';
 // if (isset($authUrl)){
	//show login url
	// echo '<div align="center">';
	// echo '<h3>Login with Google -- Demo</h3>';
	// echo '<div>Please click login button to connect to Google.</div>';
	// echo '<a class="login" href="' . $authUrl . '"><img src="images/google-login-button.png" /></a>';
	// echo '</div>';
	// echo "erreur";

 // }
 if (!isset($authUrl)){

	$user = $service->userinfo->get(); //get user info

	// connect to database
	try
{
	$bdd = new PDO("mysql:host=$host_name;dbname=$db_name;charset=utf8", $db_username, $db_password);
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

	$_string = $user->email;
    $_request = "@";

    // die('#'.$_request.'#', $_string);
if(preg_match('#'.$_request.'#', $_string)){

	//check if user exist in database using COUNT
	$result = $bdd->prepare("SELECT id,email FROM etudiant WHERE email =:email");
	$result->execute(array(
		'email' => $_string
	));
	// $user_count = $result->fetch_object()->usercount; //will return 0 if user doesn't exist
	$user_count=$result->rowCount();
	$user_donnees=$result->fetch();
	//
	$req1 = $bdd->prepare("SELECT staff.id,email FROM staff,profile
	WHERE staff.id_profile=profile.id
	and staff.email=:email
    and profile.nom='Professeur' ");
	$req1->execute(array(
		'email' => $_string
	));
	$prof_count=$req1->rowCount();
	$prof_donnees=$req1->fetch();

	 //requete selectionner les intervenant
	 	$req2 = $bdd->prepare("SELECT staff.id as id,staff.email,profile.nom as nom_profile FROM staff,profile
	WHERE staff.id_profile=profile.id
	and staff.email=:email
    and profile.nom NOT LIKE('Professeur') ");
	$req2->execute(array(
		'email' => $_string
	));
	$intervenant_count=$req2->rowCount();
	$donnees=$req2->fetch();

	//
	//show user picture
	// echo '<img src="'.$user->picture.'" style="float: right;margin-top: 33px;" />';
	if($user_count != 0) //if user already exist change greeting text to "Welcome Back"
    {
        // echo 'Welcome back '.$user->name.'! [<a href="'.$redirect_uri.'?logout=1">Log Out</a>]';
		$_SESSION['login_user']= $user->id;
		$_SESSION['login_name']= $user->name;
		$_SESSION['picture']= $user->picture;
		$_SESSION['login_email']= $user->email;
		$_SESSION['etudiant']="etudiant";
		$_SESSION['id_etudiant']=$user_donnees['id'];
		$_SESSION["connexion"]="";

		header('Location: ../index.php?page=home');
		// echo "etudiant deja inscris";





    }
//


	elseif($prof_count !=0)
	 {
		 // $done=$req1->fetch();
	 	$_SESSION['login_user']= $user->id;
		$_SESSION['picture']= $user->picture;
		$_SESSION['login_name']= $user->name;
		$_SESSION['login_email']= $user->email;
		$_SESSION['professeur']="Professeur";
		$_SESSION['profile_intervenant']=$donnees['nom_profile'];
		$_SESSION['id_professeur']=$prof_donnees['id'];
		$_SESSION["connexion"]="";
		// $_SESSION['numero_professeur']=$done['numero_telephone'];
		// echo "Professeur".$prof_count;
	header('Location: ../index.php?page=home?');
	 }
	  elseif($intervenant_count !=0)
	 {
		 // $done=$req1->fetch();
		 $_SESSION["connexion"]="";
	 	$_SESSION['login_user']= $user->id;
		$_SESSION['picture']= $user->picture;
		$_SESSION['login_name']= $user->name;
		$_SESSION['login_email']= $user->email;
		$_SESSION['intervenant']="intervenant";
		$_SESSION['profile_intervenant']=$donnees['nom_profile'];
	   $_SESSION['id_intervenant']=$donnees['id'];
		// $_SESSION['numero_professeur']=$done['numero_telephone'];
		// echo "Professeur".$prof_count;
	header('Location: ../index.php?page=home?');
	 }
}
	else{
	$client->revokeToken();
	unset($authUrl);
	unset($_SESSION['access_token']);
	header('Location: ../index.php?page=page-login-v2');
	$_SESSION['erreurconnexion']='<div style="z-index:1000;position:fixed;left:313px;top:6px;" class="col-md-6"><div  class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
	<strong >Oops !</strong> Vous ne faites pas partie de la communauté de Mundiapolis.</div></div>';
	}





 }

	//print user details
	// echo '<pre>';
	// print_r($user);
	// echo '</pre>';


// echo '</div>';







?>
<!-- <script type="text/javascript">
function lance() {
document.forms['f_text'].submit();

}
onload=lance;
</script>
 <form name="f_text" method="post" action="../index.php">
<input type="hidden" name="verifier" value="ok">
</form> -->
