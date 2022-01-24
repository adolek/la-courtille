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

if ($db_found) {

    $sql = "SELECT * FROM modification";
    $result = mysqli_query($db_handle, $sql);
    while ($modif = mysqli_fetch_assoc($result)) { 
        $modifs[] = $modif; 
      }
      
  }//end if
  
	session_start();
	$id_session = $_SESSION['id'];
	error_reporting(0);

	$edit=$_GET['edit'];
	error_reporting(E_ALL);
	


	$req = "SELECT * FROM users WHERE idUser = '$id_session'";
	$res = mysqli_query($db_handle, $req);
  $user = mysqli_fetch_assoc($res);

    $type = $user['type'];
    //echo "$type";

    foreach ($modifs as $modif) {
    	if ($modif['idModif'] == "1")
    	{
    		$idm1 = $modif['idModif'];
    		$m1 = $modif['textModif'];
    	}
    }
    //echo "$m1";

?>


<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>L'association sportive - La Courtille</title>

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
<?php if($type == "admin" && $edit != "1") : ?>
  	<div class="boutonModifier">
  		<a href="association-sportive.php?edit=1">
			<button class="btn mt-6 btn-primary" >Modifier</button>
		</a>
	</div>
<?php endif ?>
<?php if($edit == "1") : ?>
    <div class="boutonTerminer">
      <a href="association-sportive.php">
      <button class="btn mt-6 btn-danger" >Terminer</button>
    </a>
  </div>
<?php endif ?>


<?php

if (isset($_POST["savemodif"])){

  $textmodif1 = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['modif1'])); 


  $req = "UPDATE modification SET textModif = '$textmodif1' WHERE idModif = '$idm1'";
  $update = mysqli_query($db_handle, $req);

  echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  Article modifié avec succès !
 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
 </div>";

}


?>

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
              <a class="nav-link active" href="contact.html">
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
  ——— BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url(assets/img/tableau.jpg); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">L'association sportive</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.html">Accueil</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
              Association sportive 
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

<!-- ====================================
——— ABOUT MEDIA
===================================== -->
<section class="bg-light py-8 py-md-10">
  <div class="container">
     <div class="section-title mb-4 wow fadeInUp">
      <!--=========SECTION DE MODIFICATION DES INFORMATION=========-->
  		<?php if($edit != "1") : ?>
        <h2 class="text-danger">L’association  sportive a repris depuis le <?php echo "$m1"; ?> !</h2>
    	<?php endif ?>
      
    	<?php if($edit == "1") : ?>
    		<form action="association-sportive.php?edit=1" method="post">
    			<ul>
    				<li>
    					<h2 class="text-danger">L’association  sportive a repris depuis le
			      		<input type="text" class="text-danger"  name="modif1" value="<?php echo $m1;?>"> !
			        	</h2>
    				</li>
    			</ul>   			
				  <div class="boutonModifier">  	
						<button class="btn mt-6 btn-primary" name="savemodif" type="submit" >Enregistrer</button>
					</div>
        </form>
    	<?php endif ?>
    <!--========FIN SECTION DE MODIFICATION DES INFORMATION=========-->
    </div>
    <div class="section-title px-5 wow fadeInUp">
      <h3 class="text-danger"><i>Nous vous attendons nombreux en <strong class="text-primary"> basket ball </strong>, <strong class="text-info">natation</strong> et <strong class="text-success">football</strong></i></h3>
    </div>
    
    
  </div>
</section>
<section class="py-7 py-md-10">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-sm-6 col-xs-12 pe-5">
          <div class="section-title mb-4 mb-md-8 wow fadeInUp">
            <h2 class="text-primary">AS Basket ball</h2>
          </div>
          <div class="align-items-baseline mb-4 px-3 font-weight-medium font-size-20">
          <ul class="list-unstyled mb-5 px-2">
            <li class="text-muted mb-2"><i class="fa fa-check me-2" aria-hidden="true"></i>
              <u><i>Heure</i></u> : de <strong class="text-danger">13h30 à 15H pour les 6ème et 5ème</strong><br>
              Et de <strong class="text-info">15h à 16h30 pour les 4ème et 3ème</strong>
            </li>
            <li class="text-muted mb-2"><i class="fa fa-check me-2" aria-hidden="true"></i><u><i>Lieu</i></u> : Rendez-vous devant le Gymnase La Courtille et à l’heure !</li>
            <li class="text-muted mb-2"><i class="fa fa-check me-2" aria-hidden="true"></i><u><i>Affaires</i></u> : Tenue de sport, bouteille d’eau ou gourde et pas d’objet de valeurs.</li>
          </ul>
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

<section class="bg-light py-7 py-md-10">
  <div class="container">
    <div class="row wow fadeInUp">
    <div class="col-sm-6 col-xs-12">
        <div>
          <img class="img-fluid rounded" src="assets/img/collegeLaCourtille.jpg" width="100%" allowfullscreen="" loading="lazy">
        </div>
        
    </div>
    <div class="col-sm-6 col-xs-12">
        <div>
          <div class="section-title mb-4 mb-md-8 wow fadeInUp">
            <h2 class="text-info">AS Natation</h2>
          </div>
          <div class="align-items-baseline mb-4 px-3 font-weight-medium font-size-20">
          <ul class="list-unstyled mb-5 px-2">
            <li class="text-muted mb-2">              <i class="fa fa-check me-2" aria-hidden="true"></i>
              <u><i>Heure</i></u> : de <strong class="text-danger">14h à 15h30 pour le groupe 1</strong><br>
              Et de <strong class="text-info">15h30 à 17h pour le groupe 2</strong>
            </li>             
            <li class="text-muted mb-2"><i class="fa fa-check me-2" aria-hidden="true"></i><u><i>Lieu</i></u> : Rendez-vous devant la piscine de Marville à 13H45 et à l’heure!</li>
            <li class="text-muted mb-2"><i class="fa fa-check me-2" aria-hidden="true"></i><u><i>Affaires</i></u> : Maillot de bain, bonnet, lunettes, serviette, sac de natation, bouteille d’eau ou gourde et pas d’objet de valeurs.</li>
          </ul>
          </div>

          
        </div>
        
    </div>
  </div>
</div>
</section>
<section class="py-7 py-md-10">
  <div class="container">
    <div class="row wow fadeInUp">
      <div class="col-sm-6 col-xs-12 pe-5">
          <div class="section-title mb-4 mb-md-8 wow fadeInUp">
            <h2 class="text-success">AS FootBall</h2>
          </div>
          <div class="align-items-baseline mb-4 px-3 font-weight-medium font-size-20">
          <ul class="list-unstyled mb-5 px-2">
            <li class="text-muted mb-2">
              <i class="fa fa-check me-2" aria-hidden="true"></i>
                <u><i>Heure</i></u> : de <strong class="text-danger">13h30 à 15H pour les 6ème et 5ème</strong><br>
              Et de <strong class="text-info">15h à 16h30 pour les 4ème et 3ème</strong>
            </li>
            <li class="text-muted mb-2">              <i class="fa fa-check me-2" aria-hidden="true"></i>
              <u><i>Lieu</i></u> : Rendez-vous dans la cour du collège et à l’heure!</li>
            <li class="text-muted mb-2">              <i class="fa fa-check me-2" aria-hidden="true"></i>
              <u><i>Affaires</i></u> : Tenue de sport, bouteille d’eau ou gourde et pas d’objet de valeurs.</li>
          </ul>
          
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
<section class="bg-light py-7 py-md-10">
  <div class="container">
     <div class="section-title mb-4 wow fadeInUp">
        <h2 class="text-danger">Comment faire pour y participer?</h2>
    </div>
    <div class="section-title wow fadeInUp font-weight-medium font-size-20">
      <ul class="list-unstyled mb-5 px-5">
        <li class="d-flex align-items-baseline text-muted mb-2">
          <i class="fa fa-check me-2" aria-hidden="true"></i>
          Il suffit de venir au lieu de rendez vous à l’heure pour pratiquer l’activité que tu préfères.
        </li>
        <li class="d-flex align-items-baseline text-muted mb-2">
          <i class="fa fa-check me-2" aria-hidden="true"></i>
          Venir avec sa fiche d’inscription et le paiement (chèque ou billet de 10 euros).
        </li>
        <li class="d-flex align-items-baseline text-muted mb-2">
          <i class="fa fa-check me-2" aria-hidden="true"></i>
          Etre motivé et prendre du plaisir à pratiquer.
        </li>
        <li class="d-flex align-items-baseline text-muted mb-2">
          <i class="fa fa-check me-2" aria-hidden="true"></i>
          Tous les niveaux sont acceptés, que tu sois là pour le loisir ou la compétition.
        </li>
      </ul>

    </div>
    
    
  </div>
</section>
<section class="py-7 py-md-10">
  <div class="container">
     <div class="section-title mb-4 wow fadeInUp">
        <h2 class="text-danger">Où trouver les informations?</h2>
    </div>
    <div class="section-title wow fadeInUp font-weight-medium font-size-20">
      <ul class="list-unstyled mb-5 px-5">
        <li class="d-flex align-items-baseline text-muted mb-2">
          <i class="fa fa-check me-2" aria-hidden="true"></i>
          Tu peux les trouver sous le préau près du local EPS au niveau de l’affichage.
        </li>
        <li class="d-flex align-items-baseline text-muted mb-2">
          <i class="fa fa-check me-2" aria-hidden="true"></i>
          Demander à ton professeur pendant l’AS.
        </li>
        <li class="d-flex align-items-baseline text-muted mb-2">
          <i class="fa fa-check me-2" aria-hidden="true"></i>
          Il est important de bien regarder pour ne rien rater !
        </li>
        
      </ul>
      
    </div>
    
    
  </div>
</section>
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