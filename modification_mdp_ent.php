<?php session_start();?>
<?php

$database = "dbs5254611";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('db5006292334.hosting-data.io', 'dbu1630546', 'zegregh56ozfl');
$db_found = mysqli_select_db($db_handle, $database);


if($db_found){
    
}


if(isset($_POST['form']))
{
$nom = isset($_POST["nom"])? $_POST["nom"] : "";
$prenom = isset($_POST["prenom"])? $_POST["prenom"] : "";
$email = isset($_POST["email"])? $_POST["email"] : "";

$mail = '
<html>
 <head>
  <title>Nouvelle demande de modification de mot de passe ENT</title>
 </head>
 <body>
 <div>
 <p><strong>Nouvelle demande de modification de mot de passe ENT</strong></p>
 </div>
 <div>
 Nom : ';
 $mail.=$nom;
 $mail.=
 '
 <br/><br/>
 Prénom : ';
 $mail.=$prenom;
 $mail.=
 '
 <br/><br/>
 Email : ';
 $mail.=$email;
 $mail.=
 '
 </div>
 </body>
</html>
';

$header="MIME-Version: 1.0\r\n";
$header.='From:<'.$email.'>'."\n";
$header.='Content-Type:text/html; charset="uft-8"'."\n";
$header.='Content-Transfer-Encoding: 8bit';

mail("ce.0931490p@ac-creteil.fr", "Demande de modification de mot de passe ENT", $mail, $header);

echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Votre demande a bien été soumise.
       <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
       </div>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modification mot de passe ENT - La Courtille</title>

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
                  <a class="dropdown-item " href="index-v3.html">Projets et ateliers</a>
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
              <a class="nav-link active" href="javascript:void(0)"
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
            <h1 class="breadcrumb-title">Modification mot de passe ENT</h1>
            <ul class="breadcrumb breadcrumb-transparent">
              <li class="breadcrumb-item">
                <a class="text-white" href="javascript:void(0)">Secrétariat</a>
              </li>
              <li class="breadcrumb-item text-white active" aria-current="page">
                Modification mot de passe ENT
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
        <h3 class="element-title">Vos informations</h3>
      <form action="modification_mdp_ent.php" method="post">
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Nom</label>
          <input type="text" class="form-control" name="nom"  id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Prénom</label>
          <input type="text" class="form-control" name="prenom"  id="exampleFormControlInput1" >
          </div>
          </div>
        </div>
        
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
          <input type="text" class="form-control" name="email" id="exampleFormControlInput1" >
          </div>
          
          </div>
          </div>
        </div>      
              
        <button class="btn btn-primary mt-3" name="form" type="submit">Soumettre ma demande de modification de mot de passe</button>
      </form>
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
  