<?php

///LOCALHOST///
//identifier votre BDD
$database = "la_courtille";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

///SERVEUR WEB///
//identifier votre BDD
/*$database = "dbs5254611";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('db5006292334.hosting-data.io', 'dbu1630546', 'zegregh56ozfl');
$db_found = mysqli_select_db($db_handle, $database);*/

session_start();

if ($db_found) {

  $sql = "SELECT * FROM activites";
  $result = mysqli_query($db_handle, $sql);
  while ($activite = mysqli_fetch_assoc($result)) { 
       $activites[] = $activite; 
     }

  if (isset($_POST["savemodif"])){

      for($i=17; $i<87; $i++)//jusqu'au nombre de modification
      {
        $modi = "modif".$i;
        $textmodif1 = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST[$modi])); 

        $y=$i+1;
        $req = "UPDATE modification SET textModif = '$textmodif1' WHERE idModif = '$y'";
        $update = mysqli_query($db_handle, $req);

      }
        
        echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Page modifiée avec succès !
       <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
       </div>";

      }

    $sql = "SELECT * FROM modification";
    $result = mysqli_query($db_handle, $sql);
    while ($modif = mysqli_fetch_assoc($result)) { 
        $modifs[] = $modif; 
      }
      
  }//end if
  

  error_reporting(0);
  $id_session = $_SESSION['id'];
  $edit=$_GET['edit'];
  
  

  $req = "SELECT * FROM users WHERE idUser = '$id_session'";
  $res = mysqli_query($db_handle, $req);
  $user = mysqli_fetch_assoc($res);

    $type = $user['type'];
    error_reporting(E_ALL);
    foreach ($modifs as $key => $modif) {
      # code...
      if ($modif['idModif'] == $key+1)
      {
        
        $tid=$modif['idModif'];
        $ttext=$modif['textModif'];
        $idm[$key] = $tid;
        $m[$key] = $ttext;
      }
    }
    /*foreach ($idm as $idms) {
    echo $idms.' '; // Avec insertion d'un espace entre 2 valeurs
}*/

    /*foreach ($modifs as $modif) {
      if ($modif['idModif'] == "1")
      {
        $idm1 = $modif['idModif'];
        $m1 = $modif['textModif'];
      }
    }*/
    //echo "$m1";

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Site Tittle -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Les dates importantes - La Courtille</title>

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
      <a href="les-dates-importantes.php?edit=1">
      <button class="btn mt-6 btn-primary" >Modifier</button>
    </a>
  </div>
<?php endif ?>
<?php if($edit == "1") : ?>
    <div class="boutonTerminer">
      <a href="les-dates-importantes.php">
      <button class="btn mt-6 btn-danger" >Terminer</button>
    </a>
  </div>
<?php endif ?>

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
              <a class="nav-link" href="index.php">
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
                  <a class="dropdown-item " href="role-du-mediateur.php">Rôle du médiateur</a>
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
                    <li><a class="" href="bourse-college.php">Collège</a></li>
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
              <a class="nav-link active" href="javascript:void(0)">
                <i class="fas fa-user-edit nav-icon" aria-hidden="true"></i>
                <span>Secrétariat</span>
              </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                    <a class="dropdown-item " href="https://connexion.enthdf.fr/">Accès ENT</a>
                  </li>
                <li>
                    <a class="dropdown-item " href="modification_mdp_ent.php">Modification mot de passe ENT</a>
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
                    <li><a class="" href="les-dates-importantes.php#rentree-scolaire">Rentrée scolaire</a></li>
                  
                  </ul>
                </li>
                </ul>
            </li>

            <li class="nav-item dropdown bg-pink">
              <a class="nav-link " href="javascript:void(0)">
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
  <div class="main-wrapper faq"> 
    
    <!-- ====================================
    ———	BREADCRUMB
    ===================================== -->
    <section class="breadcrumb-bg" style="background-image: url(assets/img/tableau.jpg); ">
      <div class="container">
        <div class="breadcrumb-holder">
          <div>
            <h1 class="breadcrumb-title">Les dates importantes</h1>
            <ul class="breadcrumb breadcrumb-transparent">
              <li class="breadcrumb-item">
                <a class="text-white" href="index.php">Accueil</a>
              </li>
              <li class="breadcrumb-item text-white active" aria-current="page">
              Secrétariat
              </li>
              <li class="breadcrumb-item text-white active" aria-current="page">
              Les dates importantes
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- ====================================
——— ABOUT MEDIA
===================================== -->

<?php if($edit == "1") : ?>
<form action="les-dates-importantes.php?edit=1" method="post">
<?php endif ?>

<section class="py-7 py-md-10"">
  <div class="container">
    <div class="row wow fadeInUp">
 
      
          <div class="align-items-baseline mb-4 px-5">

          <?php if($edit != "1") : ?>
          <div class="section-title mb-3 wow fadeInUp">
            <h3 id="conseils-de-classe" class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Date des conseils de classe :</i></h3>
          </div>
            <table class="text-dark font-size-15 mb-4 font-size-20" style="width:100%">
              <colgroup span="5" class="columns"></colgroup>
              <tr style="border-bottom: 1px solid #ddd;">
                <th class="pb-2 pt-3"></th>
                <th class="pb-2 pt-3"></th>                
                <th class="pb-2 pt-3">Date</th>
                <th class="pb-2 pt-3">Heure</th>
                <th class="pb-2 pt-3">Salle</th>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">6ème</td>
                <td class="pb-2 pt-3">6A<br>6B<br>6C<br>6D</td>
                <td class="pb-2 pt-3"><?php echo $m[33];?><br><?php echo $m[34];?><br><?php echo $m[35];?><br><?php echo $m[36];?></td>
                <td class="pb-2 pt-3"><?php echo $m[37];?><br><?php echo $m[38];?><br><?php echo $m[39];?><br><?php echo $m[40];?></td>
                <td class="pb-2 pt-3"><?php echo $m[41];?><br><?php echo $m[42];?><br><?php echo $m[43];?><br><?php echo $m[44];?></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">5ème</td>
                <td class="pb-2 pt-3">5A<br>5B<br>5C<br>5D<br>5E</td>
                <td class="pb-2 pt-3"><?php echo $m[45];?><br><?php echo $m[46];?><br><?php echo $m[47];?><br><?php echo $m[48];?><br><?php echo $m[49];?></td>
                <td class="pb-2 pt-3"><?php echo $m[50];?><br><?php echo $m[51];?><br><?php echo $m[52];?><br><?php echo $m[53];?><br><?php echo $m[54];?></td>
                <td class="pb-2 pt-3"><?php echo $m[55];?><br><?php echo $m[56];?><br><?php echo $m[57];?><br><?php echo $m[58];?><br><?php echo $m[59];?></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">4ème</td>
                <td class="pb-2 pt-3">4A<br>4B<br>4C<br>4D</td>
                <td class="pb-2 pt-3"><?php echo $m[60];?><br><?php echo $m[61];?><br><?php echo $m[62];?><br><?php echo $m[63];?></td>
                <td class="pb-2 pt-3"><?php echo $m[64];?><br><?php echo $m[65];?><br><?php echo $m[66];?><br><?php echo $m[67];?></td>
                <td class="pb-2 pt-3"><?php echo $m[68];?><br><?php echo $m[69];?><br><?php echo $m[70];?><br><?php echo $m[71];?></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">3ème</td>
                <td class="pb-2 pt-3">3A<br>3B<br>3C<br>3D<br>3E</td>
                <td class="pb-2 pt-3"><?php echo $m[72];?><br><?php echo $m[73];?><br><?php echo $m[74];?><br><?php echo $m[75];?><br><?php echo $m[76];?></td>
                <td class="pb-2 pt-3"><?php echo $m[77];?><br><?php echo $m[78];?><br><?php echo $m[79];?><br><?php echo $m[80];?><br><?php echo $m[81];?></td>
                <td class="pb-2 pt-3"><?php echo $m[82];?><br><?php echo $m[83];?><br><?php echo $m[84];?><br><?php echo $m[85];?><br><?php echo $m[86];?></td>
              </tr>

            </table>
          <div class="section-title mb-3 mt-8 wow fadeInUp">
            <h3 id="brevets-blanc" class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Dates des brevets blanc :</i></h3>
          </div>
            <table class="text-dark font-size-15 mb-4 font-size-20" style="width:100%">
              <colgroup span="4" class="columns"></colgroup>
              <tr style="border-bottom: 1px solid #ddd;">
                <th class="pb-2 pt-3"></th>
                <th class="pb-2 pt-3">1er Trimestre</th>
                <th class="pb-2 pt-3">2ème Trimestre</th>
                <th class="pb-2 pt-3">3ème Trimestre</th>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">Date : </td>
                <td class="pb-2 pt-3"><?php echo $m[27];?></td>
                <td class="pb-2 pt-3"><?php echo $m[28];?></td>
                <td class="pb-2 pt-3"><?php echo $m[29];?></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">Heure : </td>
                <td class="pb-2 pt-3"><?php echo $m[30];?></td>
                <td class="pb-2 pt-3"><?php echo $m[31];?></td>
                <td class="pb-2 pt-3"><?php echo $m[32];?></td>
              </tr>

            </table>

          <div class="section-title mb-3 mt-8 wow fadeInUp">
            <h3 id="DNB" class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Date du DNB :</i></h3>
          </div>
          <p class="text-dark font-size-15 mb-4 font-size-20">Les dates du DNB ont lieu cette année les <strong><i><?php echo $m[25];?></i></strong> et <strong><i><?php echo $m[26];?></i></strong>.<br><br> <strong>Bon courage à tous !</strong>
          </p>
          

          </table>

          <div class="section-title mb-3 mt-8 wow fadeInUp">
            <h3 id="rentree-scolaire" class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Planning de la rentrée scolaire :</i></h3>
          </div>
          <table class="text-dark font-size-15 mb-4 font-size-20" style="width:100%">
            <colgroup span="5" class="columns"></colgroup>
            <tr style="border-bottom: 1px solid #ddd;">
              <th class="pb-2 pt-3"></th>
              <th class="pb-2 pt-3">6ème</th>
              <th class="pb-2 pt-3">5ème</th>
              <th class="pb-2 pt-3">4ème</th>
              <th class="pb-2 pt-3">3ème</th>
            </tr>
            <tr style="border-bottom: 1px solid #ddd;">
              <td class="pb-2 pt-3">Date : </td>
              <td class="pb-2 pt-3"><?php echo $m[17];?></td>
              <td class="pb-2 pt-3"><?php echo $m[18];?></td>
              <td class="pb-2 pt-3"><?php echo $m[19];?></td>
              <td class="pb-2 pt-3"><?php echo $m[20];?></td>
            </tr>
            <tr style="border-bottom: 1px solid #ddd;">
              <td class="pb-2 pt-3">Heure : </td>
              <td class="pb-2 pt-3"><?php echo $m[21];?></td>
              <td class="pb-2 pt-3"><?php echo $m[22];?></td>
              <td class="pb-2 pt-3"><?php echo $m[23];?></td>
              <td class="pb-2 pt-3"><?php echo $m[24];?></td>
            </tr>

          </table>
          <?php endif ?>

          <?php if($edit == "1") : ?>
          <div class="section-title mb-3 wow fadeInUp">
            <h3 class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Date des conseils de classe :</i></h3>
          </div>
            <table class="text-dark font-size-15 mb-4 font-size-20" style="width:100%">
              <colgroup span="5" class="columns"></colgroup>
              <tr style="border-bottom: 1px solid #ddd;">
                <th class="pb-2 pt-3"></th>
                <th class="pb-2 pt-3"></th>                
                <th class="pb-2 pt-3">Date</th>
                <th class="pb-2 pt-3">Heure</th>
                <th class="pb-2 pt-3">Salle</th>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">6ème</td>
                <td class="pb-2 pt-3">6A<br>6B<br>6C<br>6D</td>
                <td class="pb-2 pt-3"><input type="text" name="modif33" value="<?php echo $m[33];?>"><br>
                  <input type="text" name="modif34" value="<?php echo $m[34];?>"><br>
                  <input type="text" name="modif35" value="<?php echo $m[35];?>"><br>
                  <input type="text" name="modif36" value="<?php echo $m[36];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif37" value="<?php echo $m[37];?>"><br>
                  <input type="text" name="modif38" value="<?php echo $m[38];?>"><br>
                  <input type="text" name="modif39" value="<?php echo $m[39];?>"><br>
                  <input type="text" name="modif40" value="<?php echo $m[40];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif41" value="<?php echo $m[41];?>"><br>
                  <input type="text" name="modif42" value="<?php echo $m[42];?>"><br>
                  <input type="text" name="modif43" value="<?php echo $m[43];?>"><br>
                  <input type="text" name="modif44" value="<?php echo $m[44];?>"></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">5ème</td>
                <td class="pb-2 pt-3">5A<br>5B<br>5C<br>5D<br>5E</td>
                <td class="pb-2 pt-3"><input type="text" name="modif45" value="<?php echo $m[45];?>"><br>
                  <input type="text" name="modif46" value="<?php echo $m[46];?>"><br>
                  <input type="text" name="modif47" value="<?php echo $m[47];?>"><br>
                  <input type="text" name="modif48" value="<?php echo $m[48];?>"><br>
                  <input type="text" name="modif49" value="<?php echo $m[49];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif50" value="<?php echo $m[50];?>"><br>
                  <input type="text" name="modif51" value="<?php echo $m[51];?>"><br>
                  <input type="text" name="modif52" value="<?php echo $m[52];?>"><br>
                  <input type="text" name="modif53" value="<?php echo $m[53];?>"><br>
                  <input type="text" name="modif54" value="<?php echo $m[54];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif55" value="<?php echo $m[55];?>"><br>
                  <input type="text" name="modif56" value="<?php echo $m[56];?>"><br>
                  <input type="text" name="modif57" value="<?php echo $m[57];?>"><br>
                  <input type="text" name="modif58" value="<?php echo $m[58];?>"><br>
                  <input type="text" name="modif59" value="<?php echo $m[59];?>"></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">4ème</td>
                <td class="pb-2 pt-3">4A<br>4B<br>4C<br>4D</td>
                <td class="pb-2 pt-3"><input type="text" name="modif60" value="<?php echo $m[60];?>"><br>
                  <input type="text" name="modif61" value="<?php echo $m[61];?>"><br>
                  <input type="text" name="modif62" value="<?php echo $m[62];?>"><br>
                  <input type="text" name="modif63" value="<?php echo $m[63];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif64" value="<?php echo $m[64];?>"><br>
                  <input type="text" name="modif65" value="<?php echo $m[65];?>"><br>
                  <input type="text" name="modif66" value="<?php echo $m[66];?>"><br>
                  <input type="text" name="modif67" value="<?php echo $m[67];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif68" value="<?php echo $m[68];?>"><br>
                  <input type="text" name="modif69" value="<?php echo $m[69];?>"><br>
                  <input type="text" name="modif70" value="<?php echo $m[70];?>"><br>
                  <input type="text" name="modif71" value="<?php echo $m[71];?>"></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">3ème</td>
                <td class="pb-2 pt-3">3A<br>3B<br>3C<br>3D<br>3E</td>
                <td class="pb-2 pt-3"><input type="text" name="modif72" value="<?php echo $m[72];?>"><br>
                  <input type="text" name="modif73" value="<?php echo $m[73];?>"><br>
                  <input type="text" name="modif74" value="<?php echo $m[74];?>"><br>
                  <input type="text" name="modif75" value="<?php echo $m[75];?>"><br>
                  <input type="text" name="modif76" value="<?php echo $m[76];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif77" value="<?php echo $m[77];?>"><br>
                  <input type="text" name="modif78" value="<?php echo $m[78];?>"><br>
                  <input type="text" name="modif79" value="<?php echo $m[79];?>"><br>
                  <input type="text" name="modif80" value="<?php echo $m[80];?>"><br>
                  <input type="text" name="modif81" value="<?php echo $m[81];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif82" value="<?php echo $m[82];?>"><br>
                  <input type="text" name="modif83" value="<?php echo $m[83];?>"><br>
                  <input type="text" name="modif84" value="<?php echo $m[84];?>"><br>
                  <input type="text" name="modif85" value="<?php echo $m[85];?>"><br>
                  <input type="text" name="modif86" value="<?php echo $m[86];?>"></td>
              </tr>

            </table>

          <div class="section-title mb-3 mt-8 wow fadeInUp">
            <h3 id="brevets-blanc" class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Dates des brevets blanc :</i></h3>
          </div>
          <table class="text-dark font-size-15 mb-4 font-size-20" style="width:100%">
              <colgroup span="4" class="columns"></colgroup>
              <tr style="border-bottom: 1px solid #ddd;">
                <th class="pb-2 pt-3"></th>
                <th class="pb-2 pt-3">1er Trimestre</th>
                <th class="pb-2 pt-3">2ème Trimestre</th>
                <th class="pb-2 pt-3">3ème Trimestre</th>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">Date : </td>
                <td class="pb-2 pt-3"><input type="text" name="modif27" value="<?php echo $m[27];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif28" value="<?php echo $m[28];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif29" value="<?php echo $m[29];?>"></td>
              </tr>
              <tr style="border-bottom: 1px solid #ddd;">
                <td class="pb-2 pt-3">Heure : </td>
                <td class="pb-2 pt-3"><input type="text" name="modif30" value="<?php echo $m[30];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif31" value="<?php echo $m[31];?>"></td>
                <td class="pb-2 pt-3"><input type="text" name="modif32" value="<?php echo $m[32];?>"></td>
              </tr>

            </table>

          <div class="section-title mb-3 mt-8 wow fadeInUp">
            <h3 id="DNB" class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Date du DNB :</i></h3>
          </div>
            <p class="text-dark font-size-15 mb-4 font-size-20">Les dates du DNB ont lieu cette année les 
              <input type="text" name="modif25" value="<?php echo $m[25];?>"> et 
              <input type="text" name="modif26" value="<?php echo $m[26];?>">.<br> 
              <strong>Bon courage à tous</strong>
            </p>
          

          <div class="section-title mb-3 mt-8 wow fadeInUp">
            <h3 class="text-danger" style="font-family: dosis, sans-serif; font-weight: bold;"><i>Planning de la rentrée scolaire :</i></h3>
          </div>
          
          <table class="text-dark font-size-15 mb-4 font-size-20" style="width:100%">
            <colgroup span="5" class="columns"></colgroup>
            <tr style="border-bottom: 1px solid #ddd;">
              <th class="pb-2 pt-3"></th>
              <th class="pb-2 pt-3">6ème</th>
              <th class="pb-2 pt-3">5ème</th>
              <th class="pb-2 pt-3">4ème</th>
              <th class="pb-2 pt-3">3ème</th>
            </tr>
            <tr style="border-bottom: 1px solid #ddd;">
              <td class="pb-2 pt-3">Date : </td>
              <td class="pb-2 pt-3"><input type="text" name="modif17" value="<?php echo $m[17];?>"></td>
              <td class="pb-2 pt-3"><input type="text" name="modif18" value="<?php echo $m[18];?>"></td>
              <td class="pb-2 pt-3"><input type="text" name="modif19" value="<?php echo $m[19];?>"></td>
              <td class="pb-2 pt-3"><input type="text" name="modif20" value="<?php echo $m[20];?>"></td>
            </tr>
            <tr style="border-bottom: 1px solid #ddd;">
              <td class="pb-2 pt-3">Heure : </td>
              <td class="pb-2 pt-3"><input type="text" name="modif21" value="<?php echo $m[21];?>"></td>
              <td class="pb-2 pt-3"><input type="text" name="modif22" value="<?php echo $m[22];?>"></td>
              <td class="pb-2 pt-3"><input type="text" name="modif23" value="<?php echo $m[23];?>"></td>
              <td class="pb-2 pt-3"><input type="text" name="modif24" value="<?php echo $m[24];?>"></td>
            </tr>

          </table>
          <?php endif ?>

          </div>
        
  
   
  </div>
</div>
</section>



  
      <?php if($edit == "1") : ?>
        <div class="boutonModifier">
           <button class="btn mt-6 btn-primary" name="savemodif" type="submit">Enregistrer</button>
        </div>
        </form>
    <?php endif?>


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
