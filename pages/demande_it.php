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

        <script src="assets/js/modernizr.min.js"></script>

	</head>

	<body class="fixed-left">

		<!-- Begin page -->
		<div id="wrapper">

            <!-- Top Bar Start -->
                <?php include("includes/header.php");?>

            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->


			<!-- Left Sidebar End -->
                <?php include("includes/leftbar.php");?>
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
										Demande IT
									</li>
								</ol>
							</div>
						</div>

                        
                        <div class="row">
                        	<div class="col-sm-12">
                        		<div class="card-box">
                        			<h4 class="m-t-0 header-title"><b>Demande IT</b></h4>
                        			<p class="text-muted m-b-30 font-13">
									</p>
                        			<div class="row">
                        				
                        				<div class="col-md-10">
                        					<form action="index.php?page=traitement_demande_it" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">                                    
	                                             
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Titre</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" type="text" name="titre" placeholder="Incident d'utilisation , Installation logiciels , Réseau Internet , Sonorisation , Wifi , ...">
                                                
                                                    </div>
                                                </div>     

	                                             <div class="form-group">
                                                    <label class="col-sm-2 control-label">Département</label>
                                                    <div class="col-sm-10">
                                                        <select name="departement" class="form-control">
                                                            <option>École d'ingénierie</option>
                                                            <option>Business school</option>
                                                            <option>Faculté des sciences de la santé</option>
                                                            <option>Faculté des sciences politiques</option>  
                                                        </select>
                                                
                                                    </div>
                                                </div> 
												
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label">Type</label>
                                                    <div class="col-sm-10">
                                                        <select name="type" class="form-control">
                                                            <option>Incident</option>
                                                            <option>Demande</option> 
                                                        </select>
                                                
                                                    </div>
                                                </div> 

										 <div class="form-group">
	                                                <label class="col-sm-2 control-label">Description</label>
	                                                <div class="col-sm-10">
													<textarea class="form-control" type="textarea" name="description" placeholder="Votre problème (max 255 caractères)" maxlength="225" id="textarea" rows="5"></textarea> 
	                                                </div>
	                                     </div> 

                                         <div class="form-group">
                                                    <label class="col-sm-2 control-label">Fichier (tous formats | max. 2 Mo) :</label><br />
                                                    <div class="col-sm-10">
                                                    <input class="form-control" type="file" name="fichier" value="2097152"/>
                                                    </div>
                                          </div>   
												
		                                  <div class="form-group">
	                                                <label class="col-sm-2 control-label"></label>
	                                                <div class="col-sm-10">
	                                     <button class="btn btn-success btn-custom waves-effect waves-light" type="submit" />Creér un ticket</button>
                                            </div>
	                                            </div> 
	
	                           
	                                        </form>
                        				</div>
                        				
                        				
                        			</div>
                        		</div>
                        	</div>
                        </div>

                        
                       
                        
                        <!-- Forms -->
                        <!-- content -->

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