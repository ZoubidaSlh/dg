<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
  // Include helpers & db classes
  include("includes/config.php");
  include("includes/dao/departement.php");
  include("includes/dao/demande_achat.php");
  // Prepare listes
  $departement = new Departement;
  $departements = $departement->getAll();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <link rel="shortcut icon" href="assets/images/favicon_1.ico">

    <title>GDM -</title>

    <link href="assets/plugins/bootstrap-sweetalert/sweet-alert.css" rel="stylesheet" type="text/css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <script src="assets/js/modernizr.min.js"></script>
    <style>
      .width-50 {
        width: 50px;
      }
      .width-150 {
        width: 150px;
      }
      .text-right {
        text-align: right;;
      }
    </style>
</head>

<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
             <?php include("includes/header.php");?>
             <?php include("includes/leftbar.php");?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="row">
            <div class="col-sm-12">
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <div class="container">
                            <!-- Page-Title -->
                          <form class="form-horizontal" role="form" action="index.php?page=traitement_demande_achat" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group pull-right m-t-12">
                                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light pull-right" onclick="$.Notification.notify('success','top centre','Demande envoyée', 'Votre demande a été envoyée avec succès au Responsable d\'Achat et Logistique')">
                                            <span class="fa fa-check"></span> Envoyer
                                        </button>
                                    </div>
                                    <div class="btn-group pull-right m-t-12">
                                        <button type="submit" class="btn btn-inverse btn-rounded waves-effect waves-light pull-right" style="margin-right: 4px;" onclick=" $.Notification.notify('black','top centre','Demande enregisrtée', 'Votre demande a été enregisrtée avec succès')">
                                            <span class="md md-save"></span> Sauvegarder
                                        </button>
                                    </div>

                                    <h4 class="page-title">Création d'une Demande d'Achat</h4>
                                </div>
                            </div>
                            <br>

                            <div class="card-box">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5><b>Centre/SA</b></h5>

                                            <select class="form-control select2" name="id_departement">
                                                <option value="">Selectionner</option>
                                              <? foreach ($departements as $demande): ?>
                                                <option value="<?php echo $demande->id; ?>"><?php echo $demande->nom; ?></option>
                                              <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <h5><b>Responsable</b></h5>
                                            <div class="">
                                                <input type="text" readonly name="demandeur" class="form-control" placeholder="Responsable" value="<? echo $_SESSION['login_name']; ?>">
                                                <input type="hidden" name="id_demandeur" value="<? echo $_SESSION['login_user']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col-md-6">
                                            <h5><b>Titre</b></h5>
                                            <div class="">
                                                <input type="text" name="titre" class="form-control" placeholder="Titre">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h5><b>Fournisseur</b></h5>
                                            <div class="">
                                                <input type="text" name="fournisseur" class="form-control" placeholder="Fournisseur">
                                            </div>
                                        </div>
                                    </div>
                              </div>
                              <div class="card-box">
                                    <h3 class="m-t-0 m-b-40 header-title">
                                      <i class="md md-add-circle"></i> Ajouter un article
                                    </h3>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h5><b>Description</b></h5>
                                            <div class="">
                                                <input type="text" name="description" class="form-control" placeholder="Description" id="article_description">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5><b>Quantité</b></h5>
                                            <div class="">
                                                <input type="numeric" name="quantite" class="form-control" placeholder="Quantité" id="article_quantite">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h5><b>Prix Unitaire</b></h5>
                                            <div class="">
                                                <input type="text" name="prix_unitaire" class="form-control" placeholder="P.U" id="article_prixUnitaire">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5><b>Observation</b></h5>
                                            <div class="">
                                                <textarea name="" cols="30" rows="1" name="observation" class="form-control" placeholder="Observation" style="min-height: 40px;" id="article_observation"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-pink btn-rounded waves-effect waves-light pull-right" style="margin-top: 42px;" onclick="addLigneDemande();">
                                                <span class="md-add-circle-outline"></span> Ajouter</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card-box">
                                            <div class="table-responsive">
                                                <table class="table table-actions-bar table-bordered" id="ligneDemandeTable">
                                                    <thead>
                                                        <tr>
                                                            <th>Description</th>
                                                            <th>Quantité</th>
                                                            <th>Prix Unitaire</th>
                                                            <th>Montant HT </th>
                                                            <th>Observation</th>
                                                            <!-- <th style="min-width: 80px;"></th> -->
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                    </tbody>
                                                    <tfoot style="border-top: 2px solid #e2e2e2">
                                                      <tr>
                                                          <th colspan="3">
                                                              <span class="pull-right">Total HT</span>
                                                          </th>
                                                          <th>
                                                            <input type="text" id="montantTotal" name="montantTotal" class="text-right width-150 form-control" value="" readonly>
                                                          </th>
                                                      </tr>
                                                      <tr>
                                                          <th colspan="3">
                                                              <span class="pull-right">TVA 20%</span>
                                                          </th>
                                                          <th>
                                                            <input type="text" id="tva" name="tva" class="text-right width-150 form-control" value="" readonly>
                                                          </th>
                                                      </tr>
                                                      <tr>
                                                          <th colspan="3">
                                                              <span class="pull-right">Total TTC</span>
                                                          </th>
                                                          <th>
                                                            <input type="text" id="totalTTC" name="totalTTC" class="text-right width-150 form-control" value="" readonly>
                                                          </th>
                                                      </tr>
                                                  </tfoot>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-box">
                                            <h3 class="m-t-0 m-b-40 header-title"><i class="md md-attach-file"></i>devis & note présentation</p>
                                            </h3>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label">Devis 1</label>
                                                    <input type="file" class="filestyle" data-input="false" data-buttonname="btn-pink" name="devis1" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">Devis 2</label>
                                                    <input type="file" class="filestyle" data-input="false" data-buttonname="btn-pink" name="devis2" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">Devis 3</label>
                                                    <input type="file" class="filestyle" data-input="false" data-buttonname="btn-pink" name="devis3" />
                                                </div>
                                                <div class="col-md-3">
                                                    <label class="control-label">Note Présentation</label>
                                                    <input type="file" class="filestyle" data-input="false" data-buttonname="btn-pink" name="note_presentation" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- Page-Title -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="btn-group pull-right m-t-12">
                                        <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light pull-right" onclick="$.Notification.notify('success','top centre','Demande envoyée', 'Votre demande a été envoyée avec succès au Responsable d\'Achat et Logistique')">
                                            <span class="fa fa-check"></span> Envoyer
                                        </button>
                                    </div>
                                    <div class="btn-group pull-right m-t-12">
                                        <button type="submit" class="btn btn-inverse btn-rounded waves-effect waves-light pull-right" style="margin-right: 4px;" onclick="$.Notification.notify('black','top centre','Demande enregisrtée', 'Votre demande a été enregisrtée avec succès')">
                                            <span class="md md-save"></span> Sauvegarder
                                        </button>
                                    </div>
                                </div>
                            </div>
                          </form>
							     <?php include("includes/footer.php");?>

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

                <!-- jQuery  -->
                <script src="assets/plugins/moment/moment.js"></script>

                <!-- jQuery  -->
                <script src="assets/plugins/waypoints/lib/jquery.waypoints.js"></script>
                <script src="assets/plugins/counterup/jquery.counterup.min.js"></script>

                <!-- jQuery  -->
                <script src="assets/plugins/bootstrap-sweetalert/sweet-alert.min.js"></script>

                <!-- skycons -->
                <script src="assets/plugins/skyicons/skycons.min.js" type="text/javascript"></script>

                <script src="assets/plugins/peity/jquery.peity.min.js"></script>

                <script src="assets/pages/jquery.widgets.js"></script>

                <!-- Todojs  -->
                <script src="assets/pages/jquery.todo.js"></script>

                <!-- chatjs  -->
                <script src="assets/pages/jquery.chat.js"></script>

                <!-- Knob -->
                <script src="assets/plugins/jquery-knob/jquery.knob.js"></script>

                <script src="assets/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
                <script src="assets/plugins/notifyjs/js/notify.js"></script>
                <script src="assets/plugins/notifications/notify-metro.js"></script>

                <script src="assets/js/jquery.core.js"></script>
                <script src="assets/js/jquery.app.js"></script>
                <script src="assets/plugins/select2/js/select2.min.js" type="text/javascript"></script>
                <script src="assets/plugins/bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
                <script src="assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>

                <script type="text/javascript">
                    $(document).ready(function($) {
                        $(".knob").knob();

                        $(".select2").select2();
                    });

                    var addLigneDemande = function() {
                      // Obtien l'index du prochaine ligne à inserer,
                      var index = $("tr[id^=LigneDemandeRow_]").size();
                      // Créer une nouvelle ligne avec an ID
                      var tableRow = $(document.createElement("tr")).attr("id", "LigneDemandeRow_" + index);
                      // Obtenir les données depuis le formulaire
                      var ligneArticle = getLigneDemande();
                      // Créarion d'une ligne dans et l'ajouter au tableau
                      // Setup form inputs
                      var inputDescription  = $(document.createElement("input")).attr("name", "ligneDemande["+index+"]['description']").attr("id", "ligneDemande_" + index + "_description").attr("value", ligneArticle.description).attr("class", "form-control");
                      var inputQuantite     = $(document.createElement("input")).attr("name", "ligneDemande["+index+"]['quantite']").attr("id", "ligneDemande_" + index + "_quantite").attr("value", ligneArticle.quantite).attr("class", "form-control width-50");
                      var inputPrixUnitaire = $(document.createElement("input")).attr("name", "ligneDemande["+index+"]['prixUnitaite']").attr("id", "ligneDemande_" + index + "_prixUnitaite").attr("value", ligneArticle.prixUnitaite).attr("class", "form-control text-right width-150");
                      var inputMontant      = $(document.createElement("input")).attr("name", "ligneDemande["+index+"]['montant']").attr("id", "ligneDemande_" + index + "_montant").attr("value", ligneArticle.montant).attr("class", "form-control text-right width-150").attr("readonly", "readonly");
                      var inputObservation  = $(document.createElement("input")).attr("name", "ligneDemande["+index+"]['observation']").attr("id", "ligneDemande_" + index + "_observation").attr("value", ligneArticle.observation).attr("class", "form-control");
                      tableRow.append($(document.createElement("td")).append(inputDescription));
                      tableRow.append($(document.createElement("td")).append(inputQuantite));
                      tableRow.append($(document.createElement("td")).append(inputPrixUnitaire));
                      tableRow.append($(document.createElement("td")).append(inputMontant));
                      tableRow.append($(document.createElement("td")).append(inputObservation));
                      // Setup actions
                      // var editLink = '<a href="#editLignedemande-' + index + '" class="table-action-btn" onclick="editLigneDemandeRow(' + index + ')"><i class="md md-edit"></i></a>';
                      var deleteLink = '<a id=removeLignedemande-' + index + '" href="#removeLignedemande-' + index + '" class="table-action-btn" onclick="removeLigneDemandeRow(' + index + '); return false;"><i class="md md-close"></i></a>';
                      tableRow.append($(document.createElement("td")).append(deleteLink));

                      resetLigneDemandeForm();

                      $("#ligneDemandeTable tbody").append(tableRow);
                      calculateTotals();
                    }

                    var getLigneDemande = function () {
                      var ligneDemande = {
                        description: $("#article_description").val(),
                        quantite: $("#article_quantite").val(),
                        prixUnitaite: $("#article_prixUnitaire").val(),
                        montant: 0,
                        observation: $("#article_observation").val(),
                      };

                      // Calculer le montant total
                      ligneDemande.montant = ligneDemande.prixUnitaite * ligneDemande.quantite;

                      return ligneDemande;
                    }

                    var resetLigneDemandeForm = function () {

                      $("#article_description").val('');
                      $("#article_quantite").val('');
                      $("#article_prixUnitaire").val('');
                      $("#article_observation").val('');

                    }

                    var removeLigneDemandeRow = function (index) {
                      console.log(index)
                      // Supprimer une ligne à l'index spécific
                      $("#LigneDemandeRow_" + index).remove();

                      // Itérer chaque ligne de la table
                      $("tr[id^=LigneDemandeRow_]").each(function (i) {
                          var $this = $(this);
                          // Refrechir les cellules de chaque ligne
                          $this.attr("id", "LigneDemandeRow_" + i);
                          $("td input[id*=description]", $this).attr("id", "ligneDemande_" + i + "_description").attr("name", "ligneDemande["+i+"]['description']");
                          $("td input[id*=quantite]", $this).attr("id", "ligneDemande_" + i + "_quantite").attr("name", "ligneDemande["+i+"]['quantite']");
                          $("td input[id*=prixUnitaire]", $this).attr("id", "ligneDemande_" + i + "_prixUnitaire").attr("name", "ligneDemande["+i+"]['prixUnitaire']");
                          $("td input[id*=montant]", $this).attr("id", "ligneDemande_" + i + "_montant").attr("name", "ligneDemande["+i+"]['montant']");
                          $("td input[id*=observation]", $this).attr("id", "ligneDemande_" + i + "_observation").attr("name", "ligneDemande["+i+"]['observation']");
                          $("td a[id^=removeLignedemande]", $this).attr("href", "#removeLignedemande-" + i).attr("onlick", "removeLigneDemandeRow(" + i + "); return false;");
                        });
                    }

                    var calculateTotals = function () {
                      var montantTotal = 0;
                      $("tr[id^=LigneDemandeRow_]").each(function (i) {
                          var $this = $(this);

                          var montant = $("td input[id*=montant]", $this).val();
                          console.log(montant)
                          montantTotal = parseFloat(montantTotal) +parseFloat(montant);
                      });

                      var tva = Math.round(montantTotal * 0.2);
                      var totalTTC = Math.round(montantTotal * 1.2);
                      $("#montantTotal").val(montantTotal);
                      $("#tva").val(tva);
                      $("#totalTTC").val(totalTTC);
                    }
                </script>


</body>

</html>
