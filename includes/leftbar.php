      <?php
		session_start();
		?>
		  <div class="left side-menu">

				<div class="card-box">

                                        <div class="member-info">

										<?php
										if(isset($_SESSION['etudiant'])){
											?>
											<a style="margin-right:5px;margin-top:-15px;" class="pull-left" href="#">
                                            <img class="thumb-md img-circle" src="<?php echo $_SESSION['picture'];?>" alt="">
                                        </a>
											 <h4 class="m-t-4 m-b-0 header-title" ><b><?php echo $_SESSION['login_name'];?></b></h4><br><br>
                                            <p class="text-muted"><i class="md md-business m-r-10"></i>Etudiant</p>
                                            <p class="text-dark"><i class="md md-email m-r-10"></i><?php echo $_SESSION['login_email'];?></p>

										<?php
										}
										else{
											?>
											<a style="margin-right:5px;margin-top:-15px;" class="pull-left" href="#">
                                            <img class="thumb-md img-circle" src="<?php echo $_SESSION['picture'];?>" alt="">
                                        </a>
											 <h4 class="m-t-4 m-b-0 header-title" ><b><?php echo $_SESSION['login_name'];?></b></h4><br><br>
                                            <p class="text-muted"><i class="md md-business m-r-10"></i><?php echo $_SESSION['profile_intervenant'];?></p>
                                            <p class="text-dark"><i class="md md-email m-r-10"></i><?php echo $_SESSION['login_email'];?></p>

										<?php
										}
										?>


                                        </div>

                        		</div>

                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->

                    <div id="sidebar-menu">


                        <ul>


                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-home"></i> <span> Tableau de bord </span> <span class="menu-arrow"></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="index.html">Tableau de bord</a></li>

                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-pencil-alt"></i> <span> Ajouter Demande </span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
								<?php
								if(isset($_SESSION["etudiant"]) and !isset($_SESSION["professeur"]) and !isset($_SESSION["intervenant"]))
									echo '<li><a href="./index.php?page=demande_scolarite">Demande de scolarité</a></li>';
								elseif(!isset($_SESSION["etudiant"]) and isset($_SESSION["professeur"]) or isset($_SESSION["intervenant"])){
									echo '<li><a href="./index.php?page=demande_achat"> Demande d\'achat</a></li>';
									echo '<li><a href="./index.php?page=demande_conge">Demande de congé</a></li>';
									echo '<li><a href="./index.php?page=demande_it">Demande IT</a></li>';
									echo '<li><a href="./index.php?page=demande_reservation">Demande de Reservation</a></li>';
								}
								?>





                                </ul>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="ti-light-bulb"></i> <span> Liste des demandes </span> <span class="menu-arrow"></span> </a>
                                <ul class="list-unstyled">
									<?php
								if(isset($_SESSION["etudiant"]) or isset($_SESSION["professeur"]))
									echo '<li><a href="./index.php?page=liste_demande">Mes demandes</a></li>';
								elseif(!isset($_SESSION["etudiant"]) and !isset($_SESSION["professeur"]) or isset($_SESSION["intervenant"])){
									echo '<li><a href="./index.php?page=liste_demande">Mes demandes</a></li>';
									echo '<li><a href="./index.php?page=demande_recues"> Demandes reçues</a></li>';
								}
								?>



                                </ul>
                            </li>


                            <li class="text-muted menu-title">Extra</li>

                            <li class="has_sub">
                                <a href="./index.php?page=page-login-v2&logout=1" class="waves-effect"><i class="ti-user"></i><span> Déconnexion </span> </a>

                            </li>


                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            </div>
