<?php
  //identifier le nom de base de données
 /* $database = "la_courtille";
  //connectez-vous dans votre BDD
  //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost', 'root', '' );
  $db_found = mysqli_select_db($db_handle, $database);*/

///SERVEUR WEB///
//identifier votre BDD
$database = "dbs5254611";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('db5006292334.hosting-data.io', 'dbu1630546', 'zegregh56ozfl');
$db_found = mysqli_select_db($db_handle, $database);

session_start();
   
   //si le BDD existe, faire le traitement
  if ($db_found) {
    $sql = "SELECT * FROM `articles` WHERE projet  ORDER BY `articles`.`date` DESC";
    $result = mysqli_query($db_handle, $sql);
   
   while ($article = mysqli_fetch_assoc($result)) {
    $articles[]=$article;
    
   }//end while
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
 
   
  }//end if
  //si le BDD n'existe pas
  else {
   echo "Database not found";
  }//end else
  //fermer la connection
  mysqli_close($db_handle);
  $count=-1;
  $current=-1;
?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Projets et Ateliers - La Courtille</title>

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
          <img class="d-inline-block" src="assets/img/logo-la-courtille.jpg" alt="La Courtille" height="80" >
        </a>

        

        <button class="navbar-toggler py-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
          aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
          <ul class="navbar-nav ms-lg-auto">
              <li class="nav-item dropdown bg-primary">
              <a class="nav-link " href="index.php">
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
                  <a class="dropdown-item " href="index-v2.html">L'établissement</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v3.html">Sorties</a>
                </li>

                <li>
                  <a class="dropdown-item " href="association-sportive.php">Association sportive</a>
                </li>

                <li>
                  <a class="dropdown-item " href="projets-ateliers.php">Projets et ateliers</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">FabLab</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Règlement</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Organigramme</a>
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
                  <a class="dropdown-item " href="index-v2.html">Inscription Noël</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v2.html">Inscription Ramadan</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v2.html">Tarification particulière</a>
                </li>
              </ul>
            </li>

            <li class="nav-item dropdown bg-success">
              <a class="nav-link " href="faq.html">
                <i class="fas fa-user-edit nav-icon" aria-hidden="true"></i>
                <span>Secrétariat</span>
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                  <li>
                    <a class="dropdown-item " href="inscription-administrative.html">Inscription administrative</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Convention de stage</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Dates des conseils de classe</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Dates des brevets blancs</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Date du DNB</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Planning de la rentrée scolaire</a>
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

  <div class="main-wrapper blog-grid">


    <!-- ====================================
    ——— BREADCRUMB
    ===================================== -->
    <section class="breadcrumb-bg" style="background-image: url(assets/img/tableau.jpg); ">
      <div class="container">
        <div class="breadcrumb-holder">
          <div>
            <h1 class="breadcrumb-title">Projets & Ateliers</h1>
            <ul class="breadcrumb breadcrumb-transparent">
              <li class="breadcrumb-item">
                <a class="text-white" href="index.html">Accueil</a>
              </li>

              <li class="breadcrumb-item text-white active" aria-current="page">
                Présentation
              </li>
              <li class="breadcrumb-item text-white active" aria-current="page">
                Projets & Ateliers
              </li>

            </ul>
          </div>
        </div>
      </div>
    </section>
  
  <!-- ====================================
  ——— BLOG GRID
  ===================================== -->
  <section class="py-8 py-md-10">
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
                  <span class="badge bg-<?php echo $color;?> badge-rounded m-4"> <?php echo $article['date'];?></span>
                </div>
              </div>
  
            <div class="card-body border-top-5 px-3 rounded-bottom border-<?php echo $color;?>">
              <h3 class="card-title">
                <a class="text-<?php echo $color;?> text-capitalize d-block text-truncate" href="pageArticle.php?id=<?php echo $article['idArticle'];?>"><?php echo $article['titre'];?></a>
              </h3>
                  <ul class="list-unstyled d-flex mb-1">
                    <li class="me-2">
                        <i class="fa fa-user me-2" aria-hidden="true"></i><?php echo $users[$current]; ?>
                  
                    </li>
                  </ul>
              <p class="mb-2"> 
                  <?php $var=$article['texte']; echo substr(nl2br($var),0,150)."...";?>
              </p>
              
              <a class="btn btn-link text-hover-<?php echo $color;?> ps-0" href="pageArticle.php?id=<?php echo $article['idArticle'];?>">
                <i class="fa fa-angle-double-right me-1" aria-hidden="true"></i> Voir l'article
              </a>

            </div>
          </div>
        </div>


  <?php endforeach?>
        
  
            
      </div>
    </div>
  </section>
  
  </div> <!-- element wrapper ends -->
  
<!-- ====================================
——— FOOTER
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

  <div class="pt-8  bg-repeat" style="background-image: url(assets/img/enfantheureux.jpg);">
    <div class="container">
      <div class="row">
        
        <div class="col-sm col-lg col-xs">
          <h4 class="section-title-sm font-weight-bold text-white mb-6">Infos contact</h4>
          <ul class="list-unstyled">
            <li class="mb-4">
                <i class="fas fa-phone-square-alt me-2" aria-hidden="true"></i>Téléphone : 01 86 78 34 30
            </li>
            <li class="mb-4">
                <i class="fas fa-envelope-square me-2" aria-hidden="true"></i>Mail : <a href="mailto:roedianto.yohann@gmail.com">ecole@gmail.com</a>
            </li>
            <li class="mb-4">
                <i class="fas fa-map-marker-alt me-2" aria-hidden="true"></i>12 Rue Jacques Vache, 93200 Saint Denis
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

