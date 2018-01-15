<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>GDM -</title>

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

      <!--  <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/7B24FEA8-4D34-1F4F-8AF9-B734FF00917E/main.js" charset="UTF-8"></script><link rel="stylesheet" crossorigin="anonymous" href="https://gc.kis.v2.scr.kaspersky-labs.com/E71900FF437B-9FA8-F4F1-43D4-8AEF42B7/abn/main.css"/><script src="assets/js/modernizr.min.js"></script>

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
                 <?php include("includes/header.php");?>

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

								<h4 class="page-title">Ajouter une demande</h4>
								<ol class="breadcrumb">
									<li>
										<a href="#">Mundia</a>
									</li>
									<li>
										<a href="#">Ajouter demande</a>
									</li>
									<li class="active">
										Demande Reservation
									</li>
								</ol>
							</div>
						</div>

              <form class="form-horizontal" role="form" action="index.php?page=traitement_demande_reservation" method="POST">                                    

                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Demande Reservation</b></h4>
                        			<p class="text-muted m-b-30 font-13">
									</p>
                        		
                                    <div class="row">
                        				
                        				<div class="col-md-10">
	                                             <div class="form-group">
	                                                <label class="col-sm-2 control-label">Local à résérvé  </label>
	                                                <div class="col-sm-10">
	                                                    <select name="local_reservation" class="form-control">
                                                            <option value="salle de conférence">Salle de conférence</option>
                                                            <option value="mundiasport">MundiaSport</option>
                                                            <option value="bibliothèque">Bibilothèque</option> 
                                                            <option value="salle de cours">Salle de cours</option>
                                                            <option value="autre">Autre(précisez dans commentaire) </option>
                                                         
                                                        
	                                                    </select>
	                                            
	                                                </div>
	                                            </div>
												
												
												<div class="form-group">
	                                                <label class="col-sm-2 control-label">Matériel audiovisiuel </label>
	                                                <div class="col-sm-10">
	                                                    <select name="materiel_reservation" class="form-control">
                                                            <option value="systeme de sonorisation">System de sonorisation</option>
                                                            <option value="micophones">Microphones</option>
                                                            <option value="rétroprojecteur">Rétroprojecteur</option> 
															<option value="fauteuils">fauteuils</option> 
															<option value="tables">tables</option> 
                                                            <option value="pas besoin">Pas besion</option>
                                                            <option value="autre">Autre(précisez dans commentaire) </option>
                                                         
                                                        
	                                                    </select>
	                                            
	                                                </div>
	                                            </div>

                                                 <div class="form-group">
                                                    <label class="col-sm-2 control-label">Département</label>
                                                    <div class="col-sm-10">
                                                        <select name="departement_evenement" class="form-control">
                                                            <option value="École d'ingénierie">École d'ingénierie</option>
                                                            <option value="Business school">Business school</option>
                                                            <option value="Faculté des sciences de la santé">Faculté des sciences de la santé</option>
                                                            <option value="Faculté des sciences politiques">Faculté des sciences politiques</option>  
                                                        </select>
                                                
                                                    </div>
                                                </div> 
												
												 <div class="form-group">
	                                                <label class="col-sm-2 control-label">Titre de l'événement </label>
	                                                <div class="col-sm-10">
													<input type="text" name ="titre_evenement" id="textarea" class="form-control" placeholder="Titre"/>
	                                                </div>
	                                            </div> 
												
												
												 <div class="form-group">
	                                                <label class="col-sm-2 control-label">Date de l'evenement </label>
	                                                <div class="col-sm-10">
													<input  class="form-control" type="date" name="date_evenement"/>
	                                                </div>
	                                            </div> 
												
												 <div class="form-group">
	                                                <label class="col-sm-2 control-label">Début</label>
	                                                <div class="col-sm-10">
													<input class="form-control" type="time" name="debut_evenement"/>
	                                                </div>
	                                            </div> 
												<div class="form-group">
                                                    <label class="col-sm-2 control-label">Fin</label>
                                                    <div class="col-sm-10">
                                                    <input class="form-control" type="time" name="fin_evenement"/>
                                                    </div>
                                                </div> 
                                            
										 <div class="form-group">
	                                                <label class="col-sm-2 control-label">Commentaire</label>
	                                                <div class="col-sm-10">
													<textarea name="commentaire_evenement" id="textarea" class="form-control" maxlength="225" rows="5" placeholder="Votre commentaire (max 255 caractères)"></textarea>
	                                                </div>
	                                            </div> 
												
		                                  <div class="form-group">
	                                                <label class="col-sm-2 control-label"></label>
	                                                <div class="col-sm-10">
	                                     <button type="input" class="btn btn-success btn-custom waves-effect waves-light">Creér une demande de résérvation</button>
	                                                </div>
	                                            </div> 
	
	                           
         				</div>
                        				
                        				
                        			</div>
                        		</div>
                        	</div>
                        </div>	                          </form>


                        
                       
                        
                        <!-- Forms -->
                        <!-- content -->

                    <?php include("includes/footer.php");?>


            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar nicescroll">
                <h4 class="text-center">Chat</h4>
                <div class="contact-list nicescroll">
                    <ul class="list-group contacts-list">
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-1.jpg" alt="">
                                </div>
                                <span class="name">Chadengle</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-2.jpg" alt="">
                                </div>
                                <span class="name">Tomaslau</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-3.jpg" alt="">
                                </div>
                                <span class="name">Stillnotdavid</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-4.jpg" alt="">
                                </div>
                                <span class="name">Kurafire</span>
                                <i class="fa fa-circle online"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-5.jpg" alt="">
                                </div>
                                <span class="name">Shahedk</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-6.jpg" alt="">
                                </div>
                                <span class="name">Adhamdannaway</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-7.jpg" alt="">
                                </div>
                                <span class="name">Ok</span>
                                <i class="fa fa-circle away"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-8.jpg" alt="">
                                </div>
                                <span class="name">Arashasghari</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-9.jpg" alt="">
                                </div>
                                <span class="name">Joshaustin</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                        <li class="list-group-item">
                            <a href="#">
                                <div class="avatar">
                                    <img src="assets/images/users/avatar-10.jpg" alt="">
                                </div>
                                <span class="name">Sortino</span>
                                <i class="fa fa-circle offline"></i>
                            </a>
                            <span class="clearfix"></span>
                        </li>
                    </ul>
                </div>
            </div>
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


        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>
		 <!-- jQuery  -->
    

        <script src="assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
        <script src="assets/plugins/switchery/js/switchery.min.js"></script>
        <script type="text/javascript" src="assets/plugins/multiselect/js/jquery.multi-select.js"></script>
        <script type="text/javascript" src="assets/plugins/jquery-quicksearch/jquery.quicksearch.js"></script>
        <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
        <script src="assets/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

        <script type="text/javascript" src="assets/plugins/autocomplete/jquery.mockjax.js"></script>
        <script type="text/javascript" src="assets/plugins/autocomplete/jquery.autocomplete.min.js"></script>
        <script type="text/javascript" src="assets/plugins/autocomplete/countries.js"></script>
        <script type="text/javascript" src="assets/pages/autocomplete.js"></script>

        <script type="text/javascript" src="assets/pages/jquery.form-advanced.init.js"></script>

		       <script src="assets/plugins/ladda-buttons/js/spin.min.js"></script>
        <script src="assets/plugins/ladda-buttons/js/ladda.min.js"></script>
        <script src="assets/plugins/ladda-buttons/js/ladda.jquery.min.js"></script>
		<script>

            $(document).ready(function () {

                // Bind normal buttons
                $('.ladda-button').ladda('bind', {timeout: 2000});

                // Bind progress buttons and simulate loading progress
                Ladda.bind('.progress-demo .ladda-button', {
                    callback: function (instance) {
                        var progress = 0;
                        var interval = setInterval(function () {
                            progress = Math.min(progress + Math.random() * 0.1, 1);
                            instance.setProgress(progress);

                            if (progress === 1) {
                                instance.stop();
                                clearInterval(interval);
                            }
                        }, 200);
                    }
                });


                var l = $('.ladda-button-demo').ladda();

                l.click(function () {
                    // Start loading
                    l.ladda('start');

                    // Timeout example
                    // Do something in backend and then stop ladda
                    setTimeout(function () {
                        l.ladda('stop');
                    }, 12000)


                });

            });

        </script>


	
	</body>
</html>