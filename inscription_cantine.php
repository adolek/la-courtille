<?php
  //identifier le nom de base de données
  $database = "la_courtille";
  //connectez-vous dans votre BDD
  //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost', 'root', '' );
  $db_found = mysqli_select_db($db_handle, $database);
   
  session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inscription cantine - La Courtille</title>

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

  <div class="main-wrapper blog-grid">


    <!-- ====================================
    ——— BREADCRUMB
    ===================================== -->
    <section class="breadcrumb-bg" style="background-image: url(assets/img/tableau.jpg); ">
      <div class="container">
        <div class="breadcrumb-holder">
          <div>
            <h1 class="breadcrumb-title">Inscription cantine</h1>
            <ul class="breadcrumb breadcrumb-transparent">
              <li class="breadcrumb-item">
                <a class="text-white" href="index.html">Secrétariat</a>
              </li>
              <li class="breadcrumb-item text-white active" aria-current="page">
                Inscription cantine
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

  <section class="py-8 py-md-10">
  <div class="container">

    <div class="row">

<div class="col-12">
      <div class="mb-8">
        <h3 class="element-title">Fiche d'inscription cantine 2021-2022</h3>
      <form action="generate_pdf.php" method="post">
      <p class="mb-4 font-size-20">Informations sur l'élève :</p>
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Nom</label>
          <input type="text" class="form-control" name="nomEleve" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Prénom</label>
          <input type="text" class="form-control" name="prenomEleve" id="exampleFormControlInput1" >
          </div>
          </div>
        </div>
        
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Classe</label>
          <input type="text" class="form-control" name="classe" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Date de naissance</label>
          <input type="date" class="form-control" name="naissance" id="exampleFormControlInput1" >
          </div>
          </div>
          </div>
        </div>
       
        <p>J'ai une carte de cantine :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="yesorno[]" value="oui" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Oui
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="yesorno[]" value="non" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Non
          </label>
        </div>
        <p>Si non :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="new[]" value="nouveau" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            Je suis nouveau
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="new[]" value="perdu" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
            J'ai perdu ma carte et je dois la renouveller*
          </label>
        </div>
        <p>*Le prix du renouvellement d’une carte de cantine est de 5 euros.</p>
        <p class="mb-4 mt-6 font-size-20">Responsable de l'élève :</p>
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Nom</label>
          <input type="text" class="form-control" name="nomResponsable" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Prénom</label>
          <input type="text" class="form-control" name="prenomResponsable" id="exampleFormControlInput1" >
          </div>
          </div>
          </div>
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Adresse</label>
          <input type="text" class="form-control" name="adresse" id="exampleFormControlInput1" >
        </div>
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Code postal</label>
          <input type="number" class="form-control" name="cp" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Ville</label>
          <input type="text" class="form-control" name="ville" id="exampleFormControlInput1" >
          </div>
        </div>
        </div>
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
          <input type="mail" class="form-control" name="mail" id="exampleFormControlInput1" >
        </div>        
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Téléphone personnel</label>
          <input type="text" class="form-control" name="telPerso" id="exampleFormControlInput1" >
          </div>  
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Téléphone professionnel</label>
          <input type="text" class="form-control" name="telPro" id="exampleFormControlInput1" >
          </div>  
          </div>  
        </div>        

        <p class="mb-4 mt-6 font-size-20">Inscription :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="inscription[]" value="oui" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
          J’inscris mon enfant pour l’année scolaire 2021/2022
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="inscription[]" value="non" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
          Je n’inscris pas mon enfant à la cantine pour l’année scolaire 2021/2022
          </label>
        </div>
        <div class="mb-3 mt-3">
                    <label for="exampleFormControlSelect1" class="form-label">Forfait choisi</label>
                    <select class="form-select form-control" name="forfait" aria-label="Default select example">
                      <option selected>Veuillez sélectionner :</option>
                      <option value="2">2 jours</option>
                      <option value="3">3 jours</option>
                      <option value="4">4 jours</option>
                    </select>
                  </div>
         <p>Jours de restauration choisis :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="lun" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
          Lundi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="mar" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
          Mardi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="jeu" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
          Jeudi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="ven" id="flexCheckDefault">
          <label class="form-check-label" for="flexCheckDefault">
          Vendredi
          </label>
        </div>
        <div class="mb-3 mt-6">
          <div class="row">
          <div class="col-4">
          <label for="exampleFormControlInput1" class="form-label">Fait à :</label>
          <input type="text" class="form-control" name="lieu" id="exampleFormControlInput1" >
          </div>
          <div class="col-4 offset-4">
          <label for="exampleFormControlInput1" class="form-label">Le :</label>
          <input type="date" class="form-control" name="dateFait" id="exampleFormControlInput1" >
          </div>
          </div>
        </div>
        
        <button class="btn btn-primary mt-3" name="form" type="submit">Valider</button>
      </form>
      </div>
    </div>

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
  