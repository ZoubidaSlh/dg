<?php
session_start();
require("dbconfig.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>Mundia -</title>
				<link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">
		<link href="assets/plugins/custombox/css/custombox.css" rel="stylesheet">
		<link href="assets/plugins/bootstrap-table/css/bootstrap-table.min.css" rel="stylesheet" type="text/css" />

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
                               <?php include("includes/header.php");?>

            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

                                           <?php include("includes/leftbar.php");?>

			<!-- Left Sidebar End -->

			<!-- ============================================================== -->
			<!-- Start right Content here -->
			<!-- ============================================================== -->
			<div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">

						<!-- Page-Title -->
						<div class="row">
							<div class="col-sm-12">
                                <div class="btn-group pull-right m-t-15">
                                    <button type="button" class="btn btn-default dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Settings <span class="m-l-5"><i class="fa fa-cog"></i></span></button>
                                    <ul class="dropdown-menu drop-menu-right" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                    </ul>
                                </div>

								<h4 class="page-title">La liste des demande</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Mundia</a>
									</li>
									
									<li class="active">
										Liste des demandes
									</li>
								</ol>
							</div>
							            		<!-- sample modal content -->

                                    <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                        <div class="modal-dialog" style="width:55%;">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title" id="custom-width-modalLabel">Modal Heading</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <h4>Text in a modal</h4>
                                                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                                                    <hr>
                                                    <h4>Overflowing text to show scroll behavior</h4>
                                                    <p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
									<!-- /.modal -->

                                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

										<div class="modal-dialog"> 
                                            <div class="modal-content"> 
                                                <div class="modal-header"> 
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                                                    <h4 class="modal-title">Motif</h4> 
                                                </div> 
                                                <form action="index.php?page=demande_traitement" method="post">

                                                <div class="modal-body"> 

                                                    <div class="row"> 
                                                        <div class="col-md-12"> 
                                                            <div class="form-group no-margin"> 
                                                                <label for="field-7" class="control-label">Motif de refus</label> 
                                                                <textarea class="form-control autogrow" name="motif" id="field-7" placeholder="Motif" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
																
                                                            </div> 
                                                        </div> 
												<input type="hidden" id="id_demande" name="id_demande"></input>
												<input type="hidden" id="id_type" name="id_type"></input>
												<input type="hidden" id="id_etat" name="id_etat"></input>
												<input type="hidden" id="intervenant" name="intervenant"></input>
												<input type="hidden" id="oper" name="oper"></input>
                                                    </div> 

                                                </div> 
												
												

                                                <div class="modal-footer"> 
                                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                                                    <button type="submit" class="btn btn-info waves-effect waves-light">Save</button> 
                                                </div> 
												</form>

                                            </div> 
                                        </div>

                                    </div><!-- /.modal -->
						</div>

                        <!--Basic Columns-->
						<!--===================================================-->
						<?php
						if(isset($_SESSION['id_intervenant']))
						$id_user=$_SESSION['id_intervenant'];
					elseif(isset($_SESSION['id_professeur']))
						$id_user=$_SESSION['id_professeur'];

					
				        $email=$_SESSION['login_email'];

						$req1=$bdd->query("select * from
						(SELECT demande.id as id,demande.id_demandeur as id_demandeur,
						demande.email email,demande.date_creation date_creation,demande.id_departement id_departement,
						demande.id_type id_type,demande.id_etat id_etat,demande.id_intervenant id_intervenant,
						demande.titre titre,demande.commentaire commentaire,demande.devis1 devis1,
						demande.devis2 devis2,demande.devis3 devis3,demande.note_presentation note_presentation,
						demande.fournisseur fournisseur,demande.type_conge type_conge,demande.debut_evenement debut_evenement,
						demande.fin_evenement fin_evenement,demande.raison_conge raison_conge,demande.interim interim,demande.date_evenement date_evenement,
						demande.local_reservation local_reservation,demande.materiel_reservation materiel_reservation,demande.type as type,demande.description as description,demande.file_url as file ,demande.periode periode
						from demande,staff
                         where demande.id_intervenant=staff.id
						and staff.email like '$email' 
						UNION 
						select demande.id as id,demande.id_demandeur as id_demandeur,
						demande.email email,demande.date_creation date_creation,demande.id_departement id_departement,
						demande.id_type id_type,demande.id_etat id_etat,demande.id_intervenant id_intervenant,
						demande.titre titre,demande.commentaire commentaire,demande.devis1 devis1,
						demande.devis2 devis2,demande.devis3 devis3,demande.note_presentation note_presentation,
						demande.fournisseur fournisseur,demande.type_conge type_conge,demande.debut_evenement debut_evenement,
						demande.fin_evenement fin_evenement,demande.raison_conge raison_conge,demande.interim interim,demande.date_evenement date_evenement,
						demande.local_reservation local_reservation,demande.materiel_reservation materiel_reservation,demande.type as type,demande.description as description,demande.file_url as file ,demande.periode periode
						from demande,action_demande
						where demande.id=action_demande.id_demande
						and action_demande.email like '$email' and action_demande.action not like 'En cours' ) as b
						order by b.id desc
						
						
						
");
                        
						
						
						?>
						<div class="row">
							
							
							
								<div class="col-sm-12">
								<div class="card-box">
									<h4 class="m-t-0 header-title"><b>Liste des demandes</b></h4>
									<p class="text-muted m-b-30 font-13">
										
									</p>
									
									<table id="demo-foo-filtering" class="table table-striped toggle-circle m-b-0" data-page-size="7">
										<thead>
											<tr>
												<th data-toggle="true">Id demande</th>
												<th>Type demande</th>
												<th data-hide="phone">Date de création</th>
												<th data-hide="phone, tablet">Status</th>
												<th data-hide="phone, tablet">Etats</th>
												<th data-hide="phone">Details</th>
											    <th data-hide="phone">Action</th>


												

											</tr>
									
										</thead>
										<div class="form-inline m-b-20">
											<div class="row">
												<div class="col-sm-6 text-xs-center">
													<div class="form-group">
														<label class="control-label m-r-5">Status</label>
														<select id="demo-foo-filter-status" class="form-control input-sm">
															<option value="">Voir tout</option>
															<option value="Cloturee">Cloturée</option>
															<option value="Refusee">Refusée</option>
															<option value="En cours">En cours</option>
														</select>
													</div>
												</div>
												<div class="col-sm-6 text-xs-center text-right">
													<div class="form-group">
														<input id="demo-foo-search" type="text" placeholder="Search" class="form-control input-sm" autocomplete="on">
													</div>
												</div>
											</div>
										</div>
										<tbody>

											<?php
											while($donnees1=$req1->fetch()){
						//etat
						$id_demande=$donnees1["id"];
						$id_etat=$donnees1["id_etat"];
						$id_type=$donnees1["id_type"];

						$req2=$bdd->query("select * from action_demande where id_demande='$id_demande'");
						$req3=$bdd->query("select * from action_demande where id_demande='$id_demande' order by date_action desc limit 1");
                        $donnees3=$req3->fetch();
						//savoir si demande traiter ou pas
						$req22=$bdd->query("select * from action_demande where id_demande='$id_demande' and email='$email'");
						$donnees22=$req22->rowCount();
//recuper lenombre des etape
$req0=$bdd->query("select count(id) as nbr_etape from etat where id_type='$id_type'  ");
$donnes0=$req0->fetch();
$nbr_etape=$donnes0["nbr_etape"];

//
$req01=$bdd->query("select count(*) as nbr_action from action_demande where id_demande='$id_demande'");
$donnes01=$req01->fetch();
$nbr_action=$donnes01["nbr_action"];
//
						

											
												
												
												?><tr>
												<td><?php echo $id_demande;?></td>
												<td><?php if($donnees1["type_conge"]!= null) echo "Congé ".$donnees1["type_conge"]; else echo $donnees1['titre'];?></td>
												<td><?php echo $donnees1["date_creation"];?></td>
													<td>
												<?php 
if(($nbr_etape+1) == $nbr_action && $donnees3['action']=="Validee"){
	echo '<span class="label label-table label-success">Validée</span>';
}
elseif(($nbr_etape+1) == $nbr_action && $donnees3['action']=="Refusee"){
	echo '<span class="label label-table label-danger">Refusée</span>';
}
elseif(($nbr_etape+1) != $nbr_action && $donnees3['action']!="Validee" && $donnees3['action']!="En cours" )
	echo '<span class="label label-table label-danger">Refusée</span>';

elseif(($nbr_etape+1) != $nbr_action && $donnees3['action']=="Validee" )
	echo '<span class="label label-table label-warning">En cours</span>';
elseif(($nbr_etape+1) != $nbr_action && $donnees3['action']=="En cours" )
	echo '<span class="label label-table label-warning">En cours</span>';
												?></td>
											  <td> 
											  <?php
											   	while($donnees2=$req2->fetch())
												{
											$email_courant=$donnees2["email"];	   
											$req001=$bdd->query("SELECT nom,prenom from staff WHERE email='$email_courant' UNION select nom,prenom from etudiant where email='$email_courant'");
											$donnees001=$req001->fetch();
											//recuperer le service dont lequel la demande se trouve
											$req002=$bdd->query("SELECT p.nom as nomprofile from action_demande as ad,staff as s,profile as p
											where ad.email=s.email and s.id_profile=p.id
											and ad.email='$email_courant'");
											$donnees002=$req002->fetch();
											

											   if($donnees2['action']=="En cours")
																										   
												echo "- Crée par <B>".$donnees001['nom'].' '.$donnees001['prenom']."</B> Le ".$donnees2['date_action']."<br>";
                                              else
											  echo "- ".$donnees2['action']." par <B>".$donnees001['nom'].' '.$donnees001['prenom']." (".$donnees002["nomprofile"].")</B> Le ".$donnees2['date_action']."<br>";

											    }
												?></td>
												<td><button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#custom-width-modal">Info</button></td>
												<td>
												<?php 
												if($donnees22 == 0){
												?>
												<a class="btn btn-icon waves-effect waves-light btn-success" href="index.php?page=demande_traitement&id_demande=<?php echo $id_demande;?>&oper=Validee&intervenant=<?php echo $_SESSION['login_email'];?>&id_type=<?php echo $id_type;?>&id_etat=<?php echo $id_etat;?>"><i class="fa fa-thumbs-o-up"></i></a>
												<a class="btn btn-icon waves-effect waves-light btn-danger" data-id="<?php echo $id_demande;?>" data-oper="Refusee" data-intervenant="<?php echo $_SESSION['login_email'];?>" data-type="<?php echo $id_type;?>" data-etat="<?php echo $id_etat;?>" data-toggle="modal" data-target="#con-close-modal" ><i class="fa fa-remove"></i></a>

												<?php
												}elseif($donnees22 != 0){
												?>
												<a class="btn btn-icon waves-effect waves-light btn-success autohidebut" href="javascript:;"onclick="$.Notification.autoHideNotify('warning', 'top right', 'Vous avez déja accepté ou refusé cette demande','')"><i class="fa fa-thumbs-o-up"></i></a>
												<a class="btn btn-icon waves-effect waves-light btn-danger autohidebut" href="javascript:;"onclick="$.Notification.autoHideNotify('warning', 'top right', 'Vous avez déja accepté ou refusé cette demande','')"><i class="fa fa-remove"></i></a>

												<?php												
												}
												?>
												
												</td>

												</tr>

											<?php	
													
											}
											?>
										
							
										
							
										
										</tbody>
										<tfoot>
											<tr>
												<td colspan="5">
													<div class="text-right">
														<ul class="pagination pagination-split m-t-30 m-b-0"></ul>
													</div>
												</td>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						
						
						
						<!--Checkbox Select-->
						<!--===================================================-->
						

                    </div> <!-- container -->
                               
                </div> <!-- content -->

                                <?php include("includes/footer.php");?>


            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            
            <!-- /Right-bar -->


        </div>
        <!-- END wrapper -->
    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <script src="assets/plugins/bootstrap-table/js/bootstrap-table.min.js"></script>

        <script src="assets/pages/jquery.bs-table.js"></script>


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
		<!-- Sweet-Alert  -->
        <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>
        <script src="assets/pages/jquery.sweet-alert.init.js"></script>
         <!--FooTable-->
		<script src="assets/plugins/footable/js/footable.all.min.js"></script>
		
		<script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>

		<!--FooTable Example-->
		<script src="assets/pages/jquery.footable.js"></script>
		 <script src="assets/plugins/notifyjs/js/notify.js"></script>
        <script src="assets/plugins/notifications/notify-metro.js"></script>
		 <script type="text/javascript">
$(document).ready(function(){
  $("td a").click(function(){
    var id_demande = $(this).attr("data-id");
document.getElementById("id_demande").value = id_demande;

    var id_etat = $(this).attr("data-etat");
document.getElementById("id_etat").value = id_etat;

    var id_type = $(this).attr("data-type");
document.getElementById("id_type").value = id_type;


    var intervenant = $(this).attr("data-intervenant");
document.getElementById("intervenant").value = intervenant;


    var oper = $(this).attr("data-oper");
document.getElementById("oper").value = oper;



  });
 });
	</script>

	
	</body>
</html>