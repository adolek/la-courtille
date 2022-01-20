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
  
   //si le BDD existe, faire le traitement
  if ($db_found) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM articles WHERE idArticle = '$id'";
    $result = mysqli_query($db_handle, $sql);
    $article = mysqli_fetch_assoc($result);

    $idUser = $article['idUser'];
    $sql2 = "SELECT * FROM users WHERE idUser = '$idUser'";
    $result2 = mysqli_query($db_handle, $sql2);
    $user = mysqli_fetch_assoc($result2);
    $nom = $user['nom'];
      
  }//end if

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Contact - La Courtille</title>

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
              <a class="nav-link active" href="actualites.html">
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
              <a class="nav-link " href="https://0931490p.esidoc.fr/">
                <i class="fas fa-book nav-icon" aria-hidden="true"></i>
                <span>CDI</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <div class="main-wrapper home">

<!-- ====================================
——— BLOG DETAILS
===================================== -->
<?php if(!$_GET['edit']):?>
 <section class="py-8 py-md-10">
  <div class="container">
    <div class="card">
      <div class="position-relative">
        <img class="card-img-top" src="assets/img/<?php echo $article['image']; ?>" alt="Card image cap">
        <div class="card-img-overlay">
          <span class="badge badge-rounded bg-primary"><?php echo $article['date'];?></span>
        </div>
      </div>
      <div class="card-body border-top-5 px-3 rounded-bottom border-primary">
        <h3 class="card-title text-primary mb-5"><?php echo $article['titre'];?></h3>
        <ul class="list-unstyled d-flex mb-5">
          <li class="">
            <div class="text-muted d-inline-block me-3"><i class="fa fa-user me-2" aria-hidden="true"></i><?php echo $nom;?></div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-5">
          <li class="">
            <figure>
              <figcaption><i class="fas fa-headphones-alt me-2" aria-hidden="true"></i> Fichier Audio</figcaption>
                  <audio controls>
                      <source src="assets/audio/<?php echo $article['audio'];?>.mp3" >
                            
                      Votre navigateur ne supporte pas la balise audio.
                  </audio>
              </figure>
          </li>
        </ul>
        <p class="card-text text-justify mb-6"><?php echo $article['texte'];?></p>
      </div>
    </div>
</section>
<?php endif ?>

<?php if($_GET['edit']==1): ?>

  <section class="py-8 py-md-10">
  <div class="container">
    <div class="card">
      <div class="position-relative">
        <img class="card-img-top" src="assets/img/<?php echo $article['image'];?>" alt="Card image cap">
        <div class="card-img-overlay">
          <span class="badge badge-rounded bg-primary"><?php echo $article['date'];?></span>
        </div>
      </div>
      <form action="admin.php" method="post">
      <div class="card-body border-top-5 px-3 rounded-bottom border-primary">
          <input type="text" class="text-primary form-control card-title mb-5"  name="titre" value="<?php echo $article['titre'];?>">
        <ul class="list-unstyled d-flex mb-5">
          <li class="">
            <div class="text-muted d-inline-block me-3"><i class="fa fa-user me-2" aria-hidden="true"></i><?php echo $nom;?></div>
          </li>
        </ul>
        <ul class="list-unstyled d-flex mb-5">
          <li class="">
            <figure>
              <figcaption><i class="fas fa-headphones-alt me-2" aria-hidden="true"></i> Fichier Audio</figcaption>
                  <audio controls>
                      <source src="assets/audio/<?php echo $article['audio'];?>.mp3" >
                            
                      Votre navigateur ne supporte pas la balise audio.
                  </audio>
              </figure>
          </li>
        </ul>
          <textarea class="form-control card-text text-justify mb-6" name="texte" style="height: 600px" ><?php echo $article['texte'];?></textarea>
      </div>
      <input type="text" style="visibility:hidden;" name="id" value="<?php echo $article['idArticle'];?>">

    </div>
    <div class="container"> 
      <div class="row">
        <button class="btn col-3 mt-6 btn-primary" name="modifArticle" type="submit">Enregistrer les modifications</button>
        <button class="btn offset-6 col-3 mt-6 btn-danger" type="submit" formaction="admin.php">Annuler</button>
      </div>
    </div>
    </form>
</section>

<?php endif ?>

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
