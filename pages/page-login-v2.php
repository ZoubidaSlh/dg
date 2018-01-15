<?php
 // session_start(); //session start
 require_once("glogin/glogin.php");
 if (!isset($_SESSION['access_token'])){

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
		<meta name="author" content="Coderthemes">

		<link rel="shortcut icon" href="assets/images/favicon_1.ico">

		<title>Mundia - </title>

		<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/carousel.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

	</head>
	<body>

		<!--Carousel-->
			<div id="carousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="false">
			  <ol class="carousel-indicators">
			      <li data-target="#carousel" data-slide-to="0" class="active"></li>
			      <li data-target="#carousel" data-slide-to="1"></li>
			      <li data-target="#carousel" data-slide-to="2"></li>
			  </ol>
<?php
if(isset($_SESSION["erreurconnexion"])){
	//echo $_SESSION["erreurconnexion"];
	unset($_SESSION["erreurconnexion"]);
	?>
	<a class="waves-effect waves-light" id="btn" href="javascript:;" onclick="$.Notification.notify('error','top left', '<strong >Oops !</strong>', ' Vous ne faites pas partie de la communauté de Mundiapolis..')"></a>
	<?php
}
?>
			  <!-- Carousel items -->
			  <div class="carousel-inner">
			    <div class="item active">
			      <div class="slide-content">
			         <video controls loop>
			             <source src="assets/Mundiapolis/Film institutionnel/Film_part_2.mp4" type="video/mp4">
			         	 <source src="assets/Mundiapolis/Film institutionnel/Film_part_2.ogg" type="video/ogg">
			        </video>
			        <div class="slide-overlay door">

			          <!--Connexion-->
								<div style="margin-top: 615px" class="wrapper-page">



												<div class="text-center">
							                           <h2 style="background: #FFF;border-radius:30px">Connexion à <strong class="text-custom">Mundia</strong></h2>
							                           <?php
						                                if (isset($authUrl)) {
														echo '<a class="login" href="' . $authUrl . '"><button type="button" class="btn btn-googleplus waves-effect waves-light m-t-50">
								                           <i class="fa fa-google-plus m-r-5"></i> Google+
								                        </button></a>';
														}

														?>
												</div>


								</div>
			        </div>
			      </div>
			    </div>
			   <div class="item">
			      <div class="slide-content">
			          <video controls loop>
			             <source src="assets/Mundiapolis/Film institutionnel/Film_part_3.mp4" type="video/mp4">
			         	 <source src="assets/Mundiapolis/Film institutionnel/Film_part_3.ogg" type="video/ogg">
			        </video>
			        <div class="slide-overlay door">

			           <!--Connexion-->
								<div style="margin-top: 615px" class="wrapper-page">



												<div class="text-center">
							                           <h2 style="background: #FFF;border-radius:30px">Connexion à <strong class="text-custom">Mundia</strong></h2>
							                           <?php
						                                if (isset($authUrl)) {
														echo '<a class="login" href="' . $authUrl . '"><button type="button" class="btn btn-googleplus waves-effect waves-light m-t-50">
								                           <i class="fa fa-google-plus m-r-5"></i> Google+
								                        </button></a>';
														}

														?>
												</div>


								</div>
			        </div>
			      </div>
			    </div>
			  <div class="item">
			      <div class="slide-content">
			          <video controls loop>
			             <source src="assets/Mundiapolis/Film institutionnel/Film_part_4.mp4" type="video/mp4">
			         	 <source src="assets/Mundiapolis/Film institutionnel/Film_part_4.ogg" type="video/ogg">
			        </video>
			        <div class="slide-overlay door">

			          <!--Connexion-->
								<div style="margin-top: 615px" class="wrapper-page">



												<div class="text-center">
							                           <h2 style="background: #FFF;border-radius:30px">Connexion à <strong class="text-custom">Mundia</strong></h2>
							                           <?php
						                                if (isset($authUrl)) {
														echo '<a class="login" href="' . $authUrl . '"><button type="button" class="btn btn-googleplus waves-effect waves-light m-t-50">
								                           <i class="fa fa-google-plus m-r-5"></i> Google+
								                        </button></a>';
														}

														?>
												</div>


								</div>
			        </div>
			      </div>
			    </div>

			  </div>

			  <a class="carousel-control left" href="#carousel" data-slide="prev">
			   <span class="glyphicon glyphicon-chevron-left"></span>
			  </a>

			  <a class="carousel-control right" href="#carousel" data-slide="next">
			   <span class="glyphicon glyphicon-chevron-right"></span>
			  </a>

			</div>
		<!---->





		</div>

		<script>
			var resizefunc = [];
		</script>


		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		  		<script src="js/func.js"></script>
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

		<!-- js  -->
		<script src="https://apis.google.com/js/platform.js" async defer></script>

		<!--Script Carousel-->
		<script>
			    // If not iPhone, play first video and setup event handlers for  carousel rotations
			// iPhone will not play videos inline, and will take control of the browser
			if(!/iPhone/i.test(navigator.userAgent)) {
			    $('.active > div > video').get(0).play();

			    $('#carousel').bind('slide.bs.carousel', function(e) {
			      $(e.relatedTarget).find('video').get(0).play();
			    });

			    $('#carousel').bind('slid.bs.carousel', function(e) {
			      $('video').not('.active > div > video').each(function() {
			        $(this).get(0).pause();
			      });
			    });
			  }
			</script>


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
var evt = document.createEvent("MouseEvents");
evt.initMouseEvent("click", true, true, window,0, 0, 0, 0, 0, false, false, false, false, 0, null);
document.getElementById("btn").dispatchEvent(evt);
	</script>

	</body>
</html>
<?php
}
else
		header('Location: index.php?page=home');
