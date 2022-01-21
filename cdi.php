<?php
///LOCALHOST///
//identifier votre BDD
$database = "la_courtille";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

/*///SERVEUR WEB///
//identifier votre BDD
$database = "dbs5254611";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('db5006292334.hosting-data.io', 'dbu1630546', 'Rg3p23t!vuA4u@k');
$db_found = mysqli_select_db($db_handle, $database);*/
  

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CDI - La Courtille</title>

  <!-- Plugins css Style -->
  <link href='assets/css/all.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css' rel='stylesheet'>
  <link href='assets/css/animate.css' rel='stylesheet'>

  <link href='assets/css/jquery.fancybox.min.css' rel='stylesheet'>
  <link href='assets/css/isotope.min.css' rel='stylesheet'>
  <link href="assets/css/nivo-slider.css" rel="stylesheet">
  
  <link href='assets/css/owl.carousel.min.css' rel='stylesheet' media='screen'>
  <link href='assets/css/owl.theme.default.min.css' rel='stylesheet' media='screen'>
  <link href='assets/css/settings.css' rel='stylesheet'>
  <link href='assets/css/layers.css' rel='stylesheet'>
  <link href='assets/css/navigation.css' rel='stylesheet'>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Custom css -->
  <link href="assets/css/style.css" id="option_style" rel="stylesheet">

  <!-- Favicon -->
  <link href="assets/img/favicon.png" rel="shortcut icon">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>

<body id="body" class="up-scroll">
  <!-- ====================================
  ——— PRELOADER
  ===================================== -->
  <div id="preloader" class="smooth-loader-wrapper">
    <div class="smooth-loader">
      <div class="loader">
        <span class="dot dot-1"></span>
        <span class="dot dot-2"></span>
        <span class="dot dot-3"></span>
        <span class="dot dot-4"></span>
      </div>
    </div>
  </div>

  <!-- ====================================
  ——— HEADER
  ===================================== -->
  <header class="header" id="pageTop">
    <!-- Top Color Bar -->
    <div class="color-bars">
      <div class="container-fluid">
        <div class="row">
          <div class="col color-bar bg-warning d-none d-md-block"></div>
          <div class="col color-bar bg-success d-none d-md-block"></div>
          <div class="col color-bar bg-danger d-none d-md-block"></div>
          <div class="col color-bar bg-info d-none d-md-block"></div>
          <div class="col color-bar bg-purple d-none d-md-block"></div>
          <div class="col color-bar bg-pink d-none d-md-block"></div>
          <div class="col color-bar bg-warning"></div>
          <div class="col color-bar bg-success"></div>
          <div class="col color-bar bg-danger"></div>
          <div class="col color-bar bg-info"></div>
          <div class="col color-bar bg-purple"></div>
          <div class="col color-bar bg-pink"></div>
        </div>
      </div>
    </div>



      <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-scrollUp navbar-sticky navbar-white">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img class="d-inline-block" src="assets/img/logo-school.jpg" alt="La Courtille">
        </a>

        

        <button class="navbar-toggler py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-lg-auto">
              <li class="nav-item dropdown bg-primary">
              <a class="nav-link" href="index.html">
                <i class="fas fa-laptop-house nav-icon" aria-hidden="true"></i>
                <span>Acceuil</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-purple">
              <a class="nav-link text-blue" href="javascript:void(0)"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <i class="fas fa-school nav-icon" aria-hidden="true"></i>
                <span>Présentation</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                  <a class="dropdown-item " href="index-v2.html">Activités periscolaire</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v3.html">Sortie</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v3.html">Projet des élèves</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">FabLab</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Restauration</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Règlement</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Engagement de l'établisement</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Organigramme</a>
                </li>

                

              </ul>
            </li>

            <li class="nav-item dropdown bg-danger">
              <a class="nav-link " href="actualites.html">
                <i class="far fa-newspaper nav-icon" aria-hidden="true"></i>
                <span>Actualité</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-info">
              <a class="nav-link" href="javascript:void(0)"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-scroll nav-icon" aria-hidden="true"></i>
                <span>Espace Administratif</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                  <a class="dropdown-item " href="index.html">Bourse</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v2.html">Cantine</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v2.html">Stage</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v2.html">Tarification livre perdu</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v2.html">Voyage</a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown bg-green">
              <a class="nav-link " href="faq.html">
                <i class="fas fa-question-circle nav-icon" aria-hidden="true"></i>
                <span>FAQ</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-blue">
              <a class="nav-link" href="contact.html">
                <i class="fas fa-phone nav-icon" aria-hidden="true"></i>
                <span>Contact</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-pink">
              <a class="nav-link active" href="https://0931490p.esidoc.fr/">
                <i class="fas fa-book nav-icon" aria-hidden="true"></i>
                <span>CDI</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="main-wrapper faq"> 
    
    <!-- ====================================
    ———	BREADCRUMB
    ===================================== -->
    <section class="breadcrumb-bg" style="background-image: url(assets/img/tableau.jpg); ">
      <div class="container">
        <div class="breadcrumb-holder">
          <div>
            <h1 class="breadcrumb-title">CDI</h1>
            <ul class="breadcrumb breadcrumb-transparent">
              <li class="breadcrumb-item">
                <a class="text-white" href="index.php">Accueil</a>
              </li>
              <li class="breadcrumb-item text-white active" aria-current="page">
              CDI
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ====================================
——— ABOUT MEDIA
===================================== -->


<section class="pt-7 pt-md-10">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-sm-8 col-xs-12 pe-5">
          <div class="section-title mb-4 wow fadeInUp">
            <h2 class="text-danger">Tout savoir sur le CDI</h2>
          </div>
          <div class="align-items-baseline mb-4 px-5">
          <p class="text-dark font-size-15 mb-4">Le <strong class="text-danger">C</strong>entre de <strong class="text-danger">D</strong>ocumentation et d'<strong class="text-danger">I</strong>nformation est un lieu ouvert à tous : élèves, enseignants de discipline et personnel non enseignant. Mme Guihéneuf (professeure documentaliste) vous accueille dans ce lieu de découverte, de lecture et de travail.
<br>Le CDI est un lieu où le calme doit être respecté. Il offre la documentation et l'information dont vous avez besoin.
</p>

          <ul class="list-unstyled mb-5">
            <li class="d-flex align-items-baseline text-muted mb-2">
							<i class="fa fa-clock me-2" aria-hidden="true"></i>
                            <p><small class="text-danger font-size-15 mb-4">Vous pouvez venir au CDI</small> pendant vos <small class="text-danger font-size-15 mb-4">heures de permanence</small>, les récréations et la pause méridienne, en fonction des séances pédagogiques prévues.	</p>					</li>
            <li class="d-flex align-items-baseline text-muted mb-2">
							<i class="fa fa-book me-2" aria-hidden="true"></i>
                            <p><small class="text-danger font-size-15 mb-4">Vous pouvez y emprunter jusqu’à 5 livres</small> pour une <small class="text-danger font-size-15 mb-4"> durée de 15 jours renouvelable une fois.</small></p>
						</li>
            <li class="d-flex align-items-baseline text-muted mb-2">
							<i class="fa fa-desktop me-2" aria-hidden="true"></i>
							<p><small class="text-danger font-size-15 mb-4">8 ordinateurs</small> sont à la disposition des élèves et des tablettes avec un accès contrôlé à Internet. Pour y accéder, il est nécessaire de demander l'autorisation de même que pour le prêt d’un casque.</p>
            </li>
            
          </ul>
          </div>
        
    </div>
    <div class="col-sm-4 col-xs-12">
        <div>
          <img class="img-fluid rounded" src="assets/img/collegeLaCourtille.jpg" width="100%" allowfullscreen="" loading="lazy">
        </div>
        
    </div>
  </div>
</div>
</section>



<section class="pt-4 pt-md-6 pb-10">
  <div class="container">
     <div class="section-title mb-4 wow fadeInUp">
        <h2 class="text-danger">Le portail du CDI</h2>
    </div>
    <div class="align-items-baseline mb-4 px-5">
          <p class="text-dark font-size-15 mb-4">
          Sur le <a href="https://0931490p.esidoc.fr/">portail du CDI</a> retrouvez le catalogue des <small class="text-danger font-size-15 mb-4">documents disponibles au CDI</small> mais aussi de nombreuses <small class="text-danger font-size-15 mb-4">ressources accessibles en ligne</small>.
<br><small class="text-danger font-size-15 mb-4">Faire une recherche</small>, <small class="text-danger font-size-15 mb-4">découvrir</small> une nouvelle chaîne Youtube, retrouver le roman ou la bande dessinée dont vous ont parlé vos amis, <small class="text-danger font-size-15 mb-4">tester</small> une application, <small class="text-danger font-size-15 mb-4">réserver</small> un livre déjà emprunté, <small class="text-danger font-size-15 mb-4">donner votre avis</small> sur un livre... tout cela est possible sur le portail du collège.
          </p>
          <p class="text-danger font-size-15 mb-4"><strong>
          Pour accéder au portail, rendez-vous dans votre compte ENT Webcollège, rubrique "Ressources numériques" : "esidoc"</strong>
          </p>
  </div>
    
  </div>
</section>


<!-- ====================================
———	PRICING TABLE 3
===================================== -->
<section class="bg-light py-7 py-md-10 pb-10">
  <div class="container">
    <div class="section-title justify-content-center mb-8">
      <h2 class="text-danger">Les activités du moment</h2>
    </div>

    <div class="row justify-content-between">
      <div class="col-md-6 col-lg-4 px-5 mb-6">
        <div class="card">
        <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img class="img-fluid rounded" src="assets/img/AfficheSiestesContées.jpg" alt="Card image cap"></a>
         <!-- Modal -->
         <div class="modal fade mb-8" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                  <div class="modal-content">
                    
                    <div class="modal-body text-center">
                      <img class="img-modal" src="assets/img/AfficheSiestesContées.jpg">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>
      </div>

      <div class="col-md-6 col-lg-4 px-5 mb-6">
        <div class="card">
        <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img class="img-fluid rounded" src="assets/img/Ouvrir l'école aux parents pour la réussite des enfants.jpg" alt="Card image cap"></a>
         <!-- Modal -->
         <div class="modal fade mb-8" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                  <div class="modal-content">
                    
                    <div class="modal-body text-center">
                      <img class="img-modal" src="assets/img/Ouvrir l'école aux parents pour la réussite des enfants.jpg">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>
      </div>

      <div class="col-md-6 col-lg-4 px-5 mb-6">
        <div class="card">
        <a style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <img class="img-fluid rounded" src="assets/img/affichePlanningSilenceOnLit.jpg" alt="Card image cap"></a>
         <!-- Modal -->
         <div class="modal fade mb-8" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog " role="document">
                  <div class="modal-content">
                    
                    <div class="modal-body text-center">
                      <img class="img-modal" src="assets/img/affichePlanningSilenceOnLit.jpg">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>
      </div>
    </div>
  </div>
</section>

    </div> <!-- element wrapper ends -->

<!-- ====================================
———	FOOTER
===================================== -->
<footer class="footer-bg-img">
<!-- Footer Color Bar -->
<div class="color-bar">
  <div class="container-fluid">
    <div class="row">
      <div class="col color-bar bg-warning"></div>
      <div class="col color-bar bg-danger"></div>
      <div class="col color-bar bg-success"></div>
      <div class="col color-bar bg-info"></div>
      <div class="col color-bar bg-purple"></div>
      <div class="col color-bar bg-pink"></div>
      <div class="col color-bar bg-warning d-none d-md-block"></div>
      <div class="col color-bar bg-danger d-none d-md-block"></div>
      <div class="col color-bar bg-success d-none d-md-block"></div>
      <div class="col color-bar bg-info d-none d-md-block"></div>
      <div class="col color-bar bg-purple d-none d-md-block"></div>
      <div class="col color-bar bg-pink d-none d-md-block"></div>
    </div>
  </div>
</div>

<!-- Copy Right -->

<div class="copyright">
  <div class="container">
    <div class="row py-4 align-items-center">
      <div class="col-sm-7 col-xs-12 order-1 order-md-0">
        <p class="copyright-text"><span id="copy-year"></span> © Copyright Collège La Courtille. Tous droits réservés.</a></p>
      </div>

    </div>
  </div>
</div>

</footer>




<!-- Javascript -->
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/bootstrap.bundle.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src='assets/js/jquery.fancybox.min.js'></script>
<script src='assets/js/isotope.min.js'></script>
<script src='assets/js/imagesloaded.pkgd.min.js'></script>

<script src='assets/js/lazyestload.js'></script>
<script src='assets/js/velocity.min.js'></script>
<script src='assets/js/SmoothScroll.js'></script>

<script src="assets/js/jquery.nivo.slider.js"></script>

<script src='assets/js/owl.carousel.min.js'></script>
<script src='assets/js/jquery.themepunch.tools.min.js'></script>
<script src='assets/js/jquery.themepunch.revolution.min.js'></script>

<!-- Load revolution slider only on Local File Systems. The following part can be removed on Server -->
<!--
<script src='assets/plugins/revolution/js/extensions/revolution.extension.slideanims.min.js'></script>
<script src='assets/plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js'></script>
<script src='assets/plugins/revolution/js/extensions/revolution.extension.navigation.min.js'></script> 
-->

<script src='assets/js/wow.min.js'></script>

<script>
var d = new Date();
var year = d.getFullYear();
document.getElementById("copy-year").innerHTML = year;
</script>
<script src='assets/js/main.js'></script>

</body>

</html>
