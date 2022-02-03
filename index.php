<?php session_start(); ?>

<!--Actualité -->
<?php
  //identifier le nom de base de données
  $database = "la_courtille";
  //connectez-vous dans votre BDD
  //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost', 'root', '' );
  $db_found = mysqli_select_db($db_handle, $database);
  /*$database = "dbs5254611";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('db5006292334.hosting-data.io', 'dbu1630546', 'zegregh56ozfl');
$db_found = mysqli_select_db($db_handle, $database);*/
   
   //si le BDD existe, faire le traitement
  if ($db_found) {
   $sql = "SELECT * FROM `articles` ORDER BY `articles`.`date` DESC";
   $result = mysqli_query($db_handle, $sql);
   
   while ($temp = mysqli_fetch_assoc($result)) { 
    $temps[] = $temp; 
  }//end while
   
  }//end if
  //si le BDD n'existe pas
  else {
   echo "Database not found";
  }//end else

$count=-1;
$current=-1;
$articles = [];
for ($i=0; $i<3; $i++) {
     $articles[$i]=$temps[$i];   
    }

    $users=[];
    $i=0;
    foreach($articles as $article){
     $idUser = $article['idUser'];
     $sql2 = "SELECT * FROM users WHERE idUser like '$idUser'";
     $result2 = mysqli_query($db_handle, $sql2);
     $user = mysqli_fetch_assoc($result2);
     $users[$i] = $user['nom'];
     $i = $i+1;
    }
  //fermer la connection
  mysqli_close($db_handle);
?>
<!--Fin Actualité -->

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Accueil - La Courtille</title>

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
      <div class="container p-0">
        <a class="navbar-brand" href="index.php">
          <img class="d-inline-block" src="assets/img/logo-la-courtille.jpg" alt="La Courtille" height="80">
        </a>

        

        <button class="navbar-toggler py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-lg-auto">
              <li class="nav-item dropdown bg-primary">
              <a class="nav-link active" href="index.php">
                <i class="fas fa-laptop-house nav-icon" aria-hidden="true"></i>
                <span>Accueil</span>
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
                  <a class="dropdown-item " href="presentation.html">L'établissement</a>
                </li>

                <li>
                  <a class="dropdown-item " href="association-sportive.php">Association sportive</a>
                </li>

                <li>
                  <a class="dropdown-item " href="projets-ateliers.php">Projets et ateliers</a>
                </li>

                <li>
                  <a class="dropdown-item " href="FabScience.php">FabScience</a>
                </li>

                <li>
                  <a class="dropdown-item " href="reglement.html">Règlement</a>
                </li>

                <li>
                  <a class="dropdown-item " href="organigramme.html">Organigramme</a>
                </li>

                <li>
                  <a class="dropdown-item " href="cafe-des-parents.php">Café des parents</a>
                </li>

                <li>
                  <a class="dropdown-item " href="faq.html">F.A.Q.</a>
                </li>
                

              </ul>
            </li>

            <li class="nav-item dropdown bg-danger">
              <a class="nav-link " href="actualites.php">
                <i class="far fa-newspaper nav-icon" aria-hidden="true"></i>
                <span>Actualités</span>
              </a>
            </li>

            <li class="nav-item dropdown bg-info">
              <a class="nav-link" href="javascript:void(0)"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-scroll nav-icon" aria-hidden="true"></i>
                <span>Intendance</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                  <a class="dropdown-item " href="javascript:void(0)">
                    Bourse <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                  <ul class="sub-menu">
                    <li><a class="" href="bourse-college.html">Collège</a></li>
                    <li><a class="" href="bourse-lycee.html">Lycée</a></li>
                  </ul>
                </li>
                <li>
                  <a class="dropdown-item " href="javascript:void(0)">
                    Demi-pension<i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                  <ul class="sub-menu">
                    <li><a class="" href="inscription_cantine.php">Inscription</a></li>
                    <li><a class="" href="paiement_cantine.html">Paiement</a></li>
                    <li><a class="" href="reglement_cantine.html">Règlement</a></li>
                  </ul>
                </li>
                <li>
                  <a class="dropdown-item " href="noel.html">Inscription Noël</a>
                </li>
                <li>
                  <a class="dropdown-item " href="ramadan.html">Inscription Ramadan</a>
                </li>
                <li>
                  <a class="dropdown-item " href="tarification-particuliere.php">Tarification particulière</a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown bg-success">
              <a class="nav-link " href="javascript:void(0)">
                <i class="fas fa-user-edit nav-icon" aria-hidden="true"></i>
                <span>Secrétariat</span>
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                    <a class="dropdown-item " href="https://connexion.enthdf.fr/">Accès ENT</a>
                  </li>
                <li>
                    <a class="dropdown-item " href="modification_mdp_ent.html">Modification mot de passe ENT</a>
                  </li>
                  
                  <li>
                    <a class="dropdown-item " href="inscription-administrative.html">Inscription administrative</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="convention-de-stage.php">Convention de stage</a>
                  </li>
                  <li>
                  <a class="dropdown-item " href="les-dates-importantes.php">
                    Les dates importantes <i class="fa fa-chevron-right" aria-hidden="true"></i>
                  </a>
                  <ul class="sub-menu">
                    <li><a class="" href="les-dates-importantes.php#conseils-de-classe">Conseils de classe</a></li>
                    <li><a class="" href="les-dates-importantes.php#brevets-blanc">Brevets blancs</a></li>
                    <li><a class="" href="les-dates-importantes.php#DNB">DNB</a></li>
                    <li><a class="" href="les-dates-importantes.php#rentree-scolaire">rentrée scolaire</a></li>
                  
                  </ul>
                </li>
                </ul>
            </li>

            <li class="nav-item dropdown bg-pink">
              <a class="nav-link " href="cdi.php">
                <i class="fas fa-book nav-icon" aria-hidden="true"></i>
                <span>CDI</span>
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                  <li>
                    <a class="dropdown-item " href="cdi.php">Le C.D.I.</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="https://0931490p.esidoc.fr/">Site externe</a>
                  </li>
                </ul>
            </li>
            <li class="nav-item dropdown bg-blue">
              <a class="nav-link" href="contact.html">
                <i class="fas fa-phone nav-icon" aria-hidden="true"></i>
                <span>Contact</span>
              </a>
            </li>
            <?php if($_SESSION['email']): ?>
              <li class="nav-item dropdown bg-secondary">
              <a class="nav-link" href="admin.php">
                <i class="fas fa-user-circle nav-icon" style="color:#6c757d;font-size:2.4em;" aria-hidden="true"></i>
                <span>Admin</span>
              </a>
            </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="main-wrapper home">

      <div class="carousel-single owl-carousel owl-drag owl-theme cover">
            
      <div class="carousel-item w-100 d-flex align-items-center" style="background-image: url('assets/img/cours.jpg');">
          <div class="container">
              <div class="row">
                  <div class="col text-center text-white">
                  <h2 class="h1 text-uppercase"><strong>Bienvenue sur le site du collège La Courtille</strong></h2>
                      <a href="presentation.php" class="btn btn-primary mt-3">Voir la page Présentation</a>
                  </div>
              </div>
          </div>
        </div>
        
        <div class="carousel-item w-100 d-flex align-items-center" style="background-image: url('assets/img/cdi.jpg');">
          <div class="container">
              <div class="row">
                  <div class="col text-center text-white">
                  <h2 class="h1 text-uppercase "><strong>Le CDI vous accueille</strong></h2>
                      <a href="cdi.php" class="btn btn-primary mt-3">Voir la page CDI</a>
                  </div>
              </div>
          </div>
        </div>
        
      </div>

<!-- ====================================
——— PRESENTATION SECTION
 ===================================== -->
<section class="bg-light py-7 py-md-10">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-sm-6 col-xs-12">
        <div>
          <div class="section-title mb-4 mb-md-8 wow fadeInUp">
            <h2 class="text-danger">Le collège la Courtille</h2>
          </div>
          <div class="align-items-baseline mb-4 px-5 font-weight-medium font-size-20">
          <div> Le college la Courtille est un lieu propice à l'education des jeunnes adolescents </div>
          <div> Retrouvez au college la Courtille : </div>

          <ul>
            <li>Des projet</li>
            <li>Des activitées sportives régulieres</li>
            <li>Des sortie</li>
          </ul>



          </div>

          
        </div>
        
    </div>
    <div class="col-sm-6 col-xs-12">
        <div>
          <img class="img-fluid rounded" src="assets/img/collegeLaCourtille.jpg" width="100%" allowfullscreen="" loading="lazy">
        </div>
        
    </div>
  </div>
</div>
</section>

</div> <!-- element wrapper ends -->





<!-- ====================================
——— BLOG SECTION
===================================== -->
<!--<section class="pt-9 pb-7" id="blog">-->
  <section class="py-8 py-md-10">
    <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">Les dernières actualités</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="container">
      <div class="row">
  
        <?php foreach ($articles as $article) : ?>

          <?php $count = $count + 1;
          $current = $current + 1;
        $count = $count % 6;
        if($count==0){$color="primary";}
        elseif($count==1){$color="success";}
        elseif($count==2){$color="danger";}
        elseif($count==3){$color="info";}
        elseif($count==4){$color="purple";}
        elseif($count==5){$color="pink";}
        ?>

        <div class="col-md-6 col-lg-4">
          <div class="card">
             <div class="position-relative">
                <a href="pageArticle.php?id=<?php echo $article['idArticle'];?>">
                  <img class="card-img-top" src="assets/img/<?php echo $article['image']; ?>" alt="Card image">
               </a>
                <div class="card-img-overlay p-0">
                  <span class="badge bg-<?php echo $color; ?> badge-rounded m-4"> <?php echo $article['date'];?></span>
                </div>
              </div>
  
            <div class="card-body border-top-5 px-3 rounded-bottom border-<?php echo $color; ?>">
              <h3 class="card-title">
                <a class="text-<?php echo $color; ?> text-capitalize d-block text-truncate" href="blog-single-left-sidebar.html"><?php echo $article['titre'];?></a>
              </h3>
                  <ul class="list-unstyled d-flex mb-1">
                    <li class="me-2">
                      <a class="text-muted" href="blog-single-left-sidebar.html">
                        <i class="fa fa-user me-2" aria-hidden="true"></i><?php echo $users[$current]; ?>
                      </a>
                    </li>
                  </ul>
              <p class="mb-2"> 
                  <script type="text/javascript">  
                    var texte = "<?php echo $article['texte'];?>";
                    document.write(texte.slice(0, 150)+"...");
                  </script>
              </p>
              
              <a class="btn btn-link text-hover-<?php echo $color; ?> ps-0" href="pageArticle.php?id=<?php echo $article['idArticle'];?>">
                <i class="fa fa-angle-double-right me-1" aria-hidden="true"></i> Voir l'article
              </a>

            </div>
          </div>
        </div>


  <?php endforeach?>
        
  
            
      </div>
    </div>
  </section>

<!-- ====================================
——— FAQ SECTION
===================================== -->
<section class="bg-light pt-9 pb-7" id="blog">
  <div class="container">
    <div class="section-title justify-content-center mb-4 mb-md-8 wow fadeInUp">
      <span class="shape shape-left bg-info"></span>
      <h2 class="text-danger">Questions fréquentes</h2>
      <span class="shape shape-right bg-info"></span>
    </div>

    <div class="row">
      <div class="col-lg-12 col-sm-12 col-xs-12">
        <div class="accordion" id="accordionOne">
        <div class="card">
            <div class="card-header bg-primary" id="headingOne">
              <h5 class="icon-bg" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <span>Comment se rendre au collège La Courtille ?</span>
              </h5>
            </div>

            <div id="collapseOne" class="accordion-collapse collapse show shadow-sm rounded-sm" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
              <div class="card-body">
                <p class="mb-6">Le collège est desservi par les bus <strong>150, 153 et 250</strong> qui sont reliés au <strong>RER B</strong>.</p>
                <p class="mb-0">Voir sur <a href="https://goo.gl/maps/77dsywbnqQsHLb1h6">Google Maps</a> l'itinéraire précis via les transports en commun.</p>

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header bg-success" id="headingTwo">
              <h5 class="icon-bg collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span>Quels sont les sports proposés par l'Association Sportive (A.S.) ?</span>
              </h5>
            </div>

            <div id="collapseTwo" class="accordion-collapse collapse shadow-sm rounded-sm" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
              <div class="card-body">
                <p class="mb-6">L'A.S. propose 3 sports : <strong>basket-ball</strong>, la <strong>natation</strong> et le <strong>football</strong>.</p>
                <p class="mb-0">Retrouvez toutes les informations relatives à l'A.S. sur <a href="association-sportive.php">la page dédiée.</a></p>

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header bg-danger" id="headingThree">
              <h5 class="icon-bg collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <span>Ai-je le droit à des aides pour la scolarité de mon enfant ?</span>
              </h5>
            </div>

            <div id="collapseThree" class="accordion-collapse collapse shadow-sm rounded-sm" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
              <div class="card-body">
                <p class="mb-6">Oui, il existe plusieurs aides : </p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="btn-aria text-center mt-4 wow fadeInUp">
      <a href="faq.html" class="btn btn-danger text-uppercase">Voir plus</a>
    </div>
  </div>
</section>

</div> <!-- element wrapper ends -->

<!-- ====================================
——— FOOTER
===================================== -->
<footer class="footer-bg-img">
  <!-- Footer Color Bar -->
  

  <div class="pt-8" style="
    background:linear-gradient(rgba(0,0,0,0.05), black), url(assets/img/footer2.png); background-size: cover; background-repeat: no-repeat;">
    <div class="container">
      <div class="row">
        
        <div class="col-sm col-lg col-xs">
          <h4 class="section-title-sm font-weight-bold text-white mb-6">Infos contact</h4>
          <ul class="list-unstyled text-white">
            <li class="mb-4">
                <i class="fas fa-phone-square-alt me-2 text-white" aria-hidden="true"></i>Téléphone : 01 86 78 34 30
            </li>
            <li class="mb-4">
                <i class="fas fa-envelope-square me-2 text-white" aria-hidden="true "></i>Mail : <a href="mailto:ce.0931490p@ac-creteil.fr">ce.0931490p@ac-creteil.fr</a>
            </li>
            <li class="mb-4">
                <i class="fas fa-map-marker-alt me-2 text-white" aria-hidden="true"></i>12 Rue Jacques Vache, 93200 Saint Denis
            </li>
            <li class="mb-3">
                  <table>
                    <thead>
                        <tr>

                            <th colspan="2"><h4 class="section-title-sm font-weight-bold text-white">Horaires d'ouverture du secrétariat :</h4></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>8h30 - 17h30</td>
                            <td>lundi, mardi et vendredi</td>
                        </tr>
                        <tr>
                            <td>8h30 - 12h30</td>
                            <td>mercredi et jeudi</td>
                        </tr>
                    </tbody>
                </table>
            </li>

            
          </ul>
        </div>

        <div class="col-sm col-lg col-xs">
          <h4 class="section-title-sm font-weight-bold text-white mb-6">Adresse</h4>

          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3760.14170228514!2d2.3788464799816476!3d48.9401035485792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66bf96ad25cab%3A0xaf44150bdcedc736!2sColl%C3%A8ge%20la%20Courtille!5e0!3m2!1sfr!2sfr!4v1641385695534!5m2!1sfr!2sfr" width="100%" height="75%" allowfullscreen="" loading="lazy"></iframe>
                
        </div>

        
  </div>

  <!-- Copy Right -->
  
    </div>
  </div>

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


<!--scrolling-->
<div class="">
  <a href="#pageTop" class="back-to-top" id="back-to-top" style="opacity: 1;">
    <i class="fas fa-arrow-up" aria-hidden="true"></i>
  </a>
</div>

<!-- Javascript -->
<script src='assets/js/jquery.min.js'></script>
<script src='assets/js/bootstrap.bundle.min.js'></script>

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

<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js' type="text/javascript" ></script>

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

