<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'serviceitmundia@gmail.com';          // SMTP username
$mail->Password = 'Service2018'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->setFrom('serviceitmundia@gmail.com', 'Mundiapolis');
$mail->addReplyTo($emailtosend, 'GDM');
$mail->addAddress($emailtosend);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// $nom_cv=pathinfo($file_cv, PATHINFO_FILENAME);
// $nom_lm=pathinfo($donnees['lm'], PATHINFO_FILENAME);
// $mail->addStringAttachment(file_get_contents($file_cv), $nom_cv);
// $mail->addStringAttachment(file_get_contents($file_lm), $nom_lm);
//$mail->addAttachment($file_cv);
//$mail->addAttachment($file_lm);

$mail->isHTML(true);  // Set email format to HTML
if($operation=="Validee" and $demandevalidee =="false"){
$bodyContent = '<h4>Bonjour,</h4>';
$bodyContent .= 'Nouvelle demande de la part <B>'.$nom_demandeur. ' </B> ('.$profile_intervenant.')</br><br>
<p>Veuillez consulter la plateforme GDM pour accepter ou réfuser la demande </p><br>GDM';

$mail->Subject = 'Nouvelle demande ';
$mail->Body    = $bodyContent;

}
elseif(isset($demandevalidee) and $demandevalidee=="true"){
	$bodyContent = '<h4>Bonjour <B>'.$nom_demandeur. ' </B>,</h4>';
$bodyContent .= 'Votre demande a été validée  </br><br>
<p>Veuillez la récuperer chez notre sercice</p><br>GDM';

$mail->Subject = 'Demande validée';
$mail->Body    = $bodyContent;
}
else{
$bodyContent = '<h4>Bonjour <B>'.$nom_demandeur. ' </B>,</h4>';
$bodyContent .= 'Votre demande a été refusée </br><br>
<p>Veuillez consulter la plateforme GDM pour voir plus de details </p><br>GDM';

$mail->Subject = 'Demande refusée';
$mail->Body    = $bodyContent;	
}

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
