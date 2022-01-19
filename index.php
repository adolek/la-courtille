<?php session_start(); ?>
<?php echo $_SESSION['email']; ?>

<!--Actualité -->
<?php
  //identifier le nom de base de données
  $database = "la_courtille";
  //connectez-vous dans votre BDD
  //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost', 'root', '' );
  $db_found = mysqli_select_db($db_handle, $database);
   
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

$articles = [];
for ($i=0; $i<3; $i++) {
     $articles[$i]=$temps[$i];   
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
  <title>Acceuil - La Courtille</title>

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
              <a class="nav-link active" href="index.php">
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
                  <a class="dropdown-item " href="index-v2.html">L'établlissement</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v3.html">Sortie</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Association sportive</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v3.html">Projet et atelier</a>
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

                <li>
                  <a class="dropdown-item " href="index-v4.html">Café des parents</a>
                </li>

                <li>
                  <a class="dropdown-item " href="faq.html">F.A.Q.</a>
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
                    <li><a class="" href="bourse-college.html">Inscription</a></li>
                    <li><a class="" href="bourse-lycee.html">Paiement</a></li>
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

            <li class="nav-item dropdown bg-green">
              <a class="nav-link " href="faq.html">
                <i class="fas fa-question-circle nav-icon" aria-hidden="true"></i>
                <span>Secrétariat</span>
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Inscription administrative</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Convention de stage</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Dates des conseils de classe par trimestre</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Dates des brevets blancs</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Date du DNB</a>
                  </li>
                  <li>
                    <a class="dropdown-item " href="index-v2.html">Date et planning de la rentrée scolaire</a>
                  </li>
                </ul>
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

      <div class="carousel-single owl-carousel owl-drag owl-theme cover">
            
        <div class="carousel-item w-100 d-flex align-items-center" style="background-image: url('assets/img/img-1.jpg');">
          <div class="container">
              <div class="row">
                  <div class="col text-center text-white">
                      <h2 class="h1 text-uppercase"><strong>Slide #1</strong></h2>
                      <p class="text-uppercase small">Shine bright like a diamond</p>
                      <a href="#" class="btn btn-primary">Read more</a>
                  </div>
              </div>
          </div>
        </div>
        
        <div class="carousel-item w-100 d-flex align-items-center" style="background-image: url('assets/img/img-1.jpg');">
          <div class="container">
              <div class="row">
                  <div class="col text-center text-white">
                      <h2 class="h1 text-uppercase "><strong>Slide #2</strong></h2>
                      <p class="text-uppercase small">Like diamonds in the sky</p>
                      <a href="#" class="btn btn-primary">Read more</a>
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
            <h2 class="text-danger">Le collège La Courtille</h2>
          </div>
          <div class="align-items-baseline mb-4 px-3 font-weight-medium font-size-20">
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

        <div class="col-md-6 col-lg-4">
          <div class="card">
             <div class="position-relative">
                <a href="blog-single-left-sidebar.html">
                  <img class="card-img-top" src="assets/img/<?php echo $article['image']; ?>" alt="Card image">
               </a>
                <div class="card-img-overlay p-0">
                  <span class="badge bg-info badge-rounded m-4"> <?php echo $article['date'];?></span>
                </div>
              </div>
  
            <div class="card-body border-top-5 px-3 rounded-bottom border-info">
              <h3 class="card-title">
                <a class="text-info text-capitalize d-block text-truncate" href="blog-single-left-sidebar.html"><?php echo $article['titre'];?></a>
              </h3>
                  <ul class="list-unstyled d-flex mb-1">
                    <li class="me-2">
                      <a class="text-muted" href="blog-single-left-sidebar.html">
                        <i class="fa fa-user me-2" aria-hidden="true"></i>Jone Doe
                      </a>
                    </li>
                  </ul>
              <p class="mb-2"> 
                  <script type="text/javascript">  
                    var texte = "<?php echo $article['texte'];?>";
                    document.write(texte.slice(0, 150)+"...");
                  </script>
              </p>
              
              <a class="btn btn-link text-hover-info ps-0" href="pageArticle.php?id=<?php echo $article['idArticle'];?>">
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
                <span>Where does it come from?</span>
              </h5>
            </div>

            <div id="collapseOne" class="accordion-collapse collapse show shadow-sm rounded-sm" aria-labelledby="headingOne" data-bs-parent="#accordionOne">
              <div class="card-body">
                <p class="mb-6">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>

                <p class="mb-6">Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil)
                by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The
                first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem </p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header bg-success" id="headingTwo">
              <h5 class="icon-bg collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <span>How do I list multiple rooms?</span>
              </h5>
            </div>

            <div id="collapseTwo" class="accordion-collapse collapse shadow-sm rounded-sm" aria-labelledby="headingTwo" data-bs-parent="#accordionOne">
              <div class="card-body">
                <p class="mb-6">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>

                <p class="mb-6">Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of
                  Good and Evil)
                  by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                  The
                  first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>

                <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem </p>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header bg-danger" id="headingThree">
              <h5 class="icon-bg collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <span>How do I list multiple rooms?</span>
              </h5>
            </div>

            <div id="collapseThree" class="accordion-collapse collapse shadow-sm rounded-sm" aria-labelledby="headingThree" data-bs-parent="#accordionOne">
              <div class="card-body">
                <p class="mb-6">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of
                  classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                  Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum
                  passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
              
                <p class="mb-6">Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes
                  of
                  Good and Evil)
                  by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.
                  The
                  first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
              
                <p class="mb-0">There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                  alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you
                  are going to use a passage of Lorem </p>
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

  <div class="pt-8 pb-7  bg-repeat" style="background-image: url(assets/img/enfantheureux.jpg);">
    <div class="container">
      <div class="row">
        
        <div class="col-sm col-lg col-xs">
          <h4 class="section-title-sm font-weight-bold text-white mb-6">Info contact</h4>
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

                            <th colspan="2"><h4 class="section-title-sm font-weight-bold text-white">Horaires d'ouverture du secretariat :</h4></th>
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
 

</footer>

<!-- Modal Login -->
<div class="modal fade" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="bg-warning rounded-top p-2">
        <h3 class="text-white font-weight-bold mb-0 ms-2">Login</h3>
      </div>

      <div class="rounded-bottom-md border-top-0">
        <div class="p-3">
          <form action="#" method="POST" role="form">
            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="User name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="password" class="form-control border" placeholder="Password" required="">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-danger text-uppercase w-100">Log In</button>
            </div>

            <div class="form-group text-center text-secondary mb-0">
              <a class="text-danger" href="javascript:void(0)">Forgot password?</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Create Account -->
<div class="modal fade" id="modal-createAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm rounded" role="document">
    <div class="modal-content">
      <div class="bg-warning rounded-top p-2">
        <h3 class="text-white font-weight-bold mb-0 ms-2">Create An Account</h3>
      </div>

      <div class="rounded-bottom-md border-top-0">
        <div class="p-3">
          <form action="#" method="POST" role="form">
            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="Name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="User name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="Phone" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="password" class="form-control border" placeholder="Password" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="password" class="form-control border" placeholder="Re-Password" required="">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-danger text-uppercase w-100">Register</button>
            </div>

            <div class="form-group text-center text-secondary mb-0">
              <p class="mb-0">Allready have an account? <a class="text-danger" href="javascript:void(0)">Log in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Enroll -->
<div class="modal fade" id="modal-enrolAccount" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-sm rounded" role="document">
    <div class="modal-content">
      <div class="bg-pink rounded-top p-2">
        <h3 class="text-white font-weight-bold mb-0 ms-2">Create An Account</h3>
      </div>

      <div class="rounded-bottom-md border-top-0">
        <div class="p-3">
          <form action="#" method="POST" role="form">
            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="Name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="User name" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="text" class="form-control border" placeholder="Phone" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="password" class="form-control border" placeholder="Password" required="">
            </div>

            <div class="form-group form-group-icon">
              <input type="password" class="form-control border" placeholder="Re-Password" required="">
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-pink text-uppercase text-white w-100">Register</button>
            </div>

            <div class="form-group text-center text-secondary mb-0">
              <p class="mb-0">Allready have an account? <a class="text-pink" href="javascript:void(0)">Log in</a></p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Products -->
<div class="modal fade" id="modal-products" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-6 col-xs-12">
            <img class="img-fluid d-block mx-auto" src="assets/img/products/products-preview01.jpg" alt="preview01.jpg">
          </div>
          <div class="col-sm-6 col-xs-12">
            <div class="product-single">
              <h1>Barbie Racing Car</h1>

              <span class="pricing font-size-55">$50 <del>$60</del></span>

              <p class="mb-7">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                incididunt ut
                labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi.</p>

              <div class="add-cart mb-0">
                <div class="count-input">
                  <input class="quantity btn-primary" type="text" value="1">
                  <a class="incr-btn incr-up" data-action="decrease" href="#"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                  <a class="incr-btn incr-down" data-action="increase" href="#"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                </div>
                <button type="button" class="btn btn-danger text-uppercase" onclick="location.href='product-cart.html';">Add to cart</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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

