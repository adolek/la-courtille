<?php
  
  require_once('rotation.php');

  class PDF extends PDF_Rotate
  {
  function RotatedText($x,$y,$txt,$angle)
  {
      //Text rotated around its origin
      $this->Rotate($angle,$x,$y);
      $this->Text($x,$y,$txt);
      $this->Rotate(0);
  }

  function RotatedImage($file,$x,$y,$w,$h,$angle)
  {
      //Image rotated around its upper-left corner
      $this->Rotate($angle,$x,$y);
      $this->Image($file,$x,$y,$w,$h);
      $this->Rotate(0);
  }
  }
  //identifier le nom de base de données
  $database = "la_courtille";
  //connectez-vous dans votre BDD
  //Rappel : votre serveur = localhost | votre login = root | votre mot de pass = '' (rien)
  $db_handle = mysqli_connect('localhost', 'root', '' );
  $db_found = mysqli_select_db($db_handle, $database);
 /* 
///SERVEUR WEB///
//identifier votre BDD
$database = "dbs5254611";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('db5006292334.hosting-data.io', 'dbu1630546', 'Rg3p23t!vuA4u@k');
$db_found = mysqli_select_db($db_handle, $database);*/

   
  session_start();

  if (isset($_POST["form"])){

    $inscription='';
    $yesorno='';
    $new='';
    $nomEleve = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nomEleve'])); 
    $prenomEleve = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['prenomEleve'])); 
    $classe = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['classe'])); 
    $naissance = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['naissance'])); 
    $nomResponsable = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nomResponsable'])); 
    $prenomResponsable = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['prenomResponsable'])); 
    $nomEntier = $nomResponsable . '  ' . $prenomResponsable;
    $adresse = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['adresse'])); 
    $cp = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['cp'])); 
    $ville = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['ville'])); 
    $mail = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mail'])); 
    $telPerso = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['telPerso'])); 
    $telPro = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['telPro'])); 
    $lieu = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['lieu'])); 
    $dateFait = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['dateFait'])); 

    $forfait = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['forfait'])); 


    if(empty($forfait)||empty($nomEleve)||empty($prenomEleve)||empty($classe)||empty($naissance)||empty($nomResponsable)||empty($prenomResponsable)||empty($adresse)||empty($cp)||empty($ville)||empty($mail)||empty($telPerso)||empty($telPro)||empty($lieu)||empty($dateFait)||empty($_POST['yesorno'])||empty($_POST['inscription']))
    {
          $erreur= "Un champ ou plusieurs champs n'ont pas été remplis.";
          
          echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
          " . $erreur . "
         <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
         </div>";
    
    }
    else{

        foreach ($_POST['yesorno'] as $check){
            $yesorno = $check;
        }
        if(!empty($_POST['new'])){
        foreach ($_POST['new'] as $check){
            $new = $check;
        }
        }
    
        foreach ($_POST['inscription'] as $check){
            $inscription = $check;
        }
        $error='';

        if($yesorno == "oui" && !empty($new)){

            $error.= "Si vous avez répondu oui à l'affirmation <strong>J'ai une carte de cantine</strong>, merci de laisser les cases situées juste en dessous décochées.<br><br>";
 
        }
        if($yesorno == "non" && empty($new)){

          $error.= "Si vous n'avez pas de carte de cantine merci d'indiquer la raison en cochant la case correspondante.<br><br>";

        } 
        if(!empty($_POST['new'])){

        if(sizeof($_POST['yesorno'])==2 || sizeof($_POST['new'])==2 || sizeof($_POST['inscription'])==2){
          $error.= "Vous ne pouvez pas cocher 2 cases correspondant à une même question.";
        }}

        if(!empty($error)){
          echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
          " . $error . "
         <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
         </div>";  
        }
        else{
          $pdf=new PDF();
        
          $pdf->AddPage();
          $pdf->setSourceFile('assets/pdf/recto formulaire d\'inscription.pdf'); 
          $tplIdx = $pdf->importPage(1); 
          $pdf->useTemplate($tplIdx); 
      
          $pdf->SetFont('Arial','',14);
          $pdf->RotatedText(58,220,utf8_decode($nomEleve),90);
      
          $pdf->SetFont('Arial','',14);
          $pdf->RotatedText(58,124,utf8_decode($prenomEleve),90);
      
          $pdf->SetFont('Arial','',14);
          $pdf->RotatedText(58,55,utf8_decode($classe),90);
      
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(66,227,utf8_decode($naissance),90);
      
          if($yesorno == 'oui'){
              $pdf->SetFont('Arial','',11);
              $pdf->RotatedText(75,217,'x',90);
              
          }
          if($yesorno == 'non'){
              $pdf->SetFont('Arial','',11);
              $pdf->RotatedText(75,202,'x',90);
              
          }
          if($new == 'nouveau'){
            $pdf->SetFont('Arial','',11);
            $pdf->RotatedText(83,255,'x',90);
          }
          if($new == 'perdu'){
            
            $pdf->SetFont('Arial','',11);
            $pdf->RotatedText(83,215,'x',90);
          }
         
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(107,252,utf8_decode($nomResponsable),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(107,118,utf8_decode($prenomResponsable),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(115,250,utf8_decode($adresse),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(115,114,utf8_decode($cp),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(115,71,utf8_decode($ville),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(123,211,utf8_decode($mail),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(131,223,utf8_decode($telPerso),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(131,93,utf8_decode($telPro),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(140,227,utf8_decode($nomEntier),90);
  
          if($inscription == 'oui'){
              $pdf->SetFont('Arial','',11);
              $pdf->RotatedText(157,269,'x',90);
          }
      
          if($forfait == '2'){
              $pdf->SetFont('Arial','',11);
              $pdf->RotatedText(166,222,'x',90);
          }
          if($forfait == '3'){
              $pdf->SetFont('Arial','',11);
              $pdf->RotatedText(166,185,'x',90);
          }
          if($forfait == '4'){
              $pdf->SetFont('Arial','',11);
              $pdf->RotatedText(166,147,'x',90);
          }
  
          foreach($_POST['jours'] as $jour)
          {
              if($jour == 'lun'){
                  $pdf->SetFont('Arial','',11);
                  $pdf->RotatedText(175,182,'x',90);
                  
              }
              elseif($jour == 'mar'){
                  $pdf->SetFont('Arial','',11);
                  $pdf->RotatedText(175,143,'x',90);
                  
              }
              elseif($jour == 'jeu'){
                  $pdf->SetFont('Arial','',11);
                  $pdf->RotatedText(175,104,'x',90);
                  
              }
              elseif($jour == 'ven'){
                  $pdf->SetFont('Arial','',11);
                  $pdf->RotatedText(175,67,'x',90);
                  
              }
          }
  
          if($inscription == 'non'){
              $pdf->SetFont('Arial','',11);
              $pdf->RotatedText(186,269,'x',90);
          }
  
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(193,253,utf8_decode($lieu),90);
          $pdf->SetFont('Arial','',13);
          $pdf->RotatedText(193,121,utf8_decode($dateFait),90);
      
      
          $pdf->AddPage();
          $pdf->setSourceFile('assets/pdf/verso inscription tarification.pdf'); 
          $tplIdx1 = $pdf->importPage(1); 
          $pdf->useTemplate($tplIdx1); 
      
          $pdf->AddPage();
          $pdf->setSourceFile('assets/pdf/reglement dp.pdf'); 
          $tplIdx2 = $pdf->importPage(1); 
          $pdf->useTemplate($tplIdx2); 
      
         $pdf->Output('assets/pdf/VYWQ_15_12_2020.pdf', 'I'); //SALIDA DEL PDF
          //    $pdf->Output('original_update.pdf', 'F');
          //    $pdf->Output('original_update.pdf', 'I'); //PARA ABRIL EL PDF EN OTRA VENTANA
          //	  $pdf->Output('original_update.pdf', 'D'); //PARA FORZAR LA DESCARGA
        }
    
    }

  }


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
        <a class="navbar-brand" href="index.php">
          <img class="d-inline-block" src="assets/img/logo-la-courtille.jpg" alt="La Courtille" height="100" width="100">
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
              <a class="nav-link " href="actualites.php">
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
                    <li><a class="" href="inscription_cantine.php">Inscription</a></li>
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

            <li class="nav-item dropdown bg-success">
              <a class="nav-link " href="faq.html">
                <i class="fas fa-user-edit nav-icon" aria-hidden="true"></i>
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

            <li class="nav-item dropdown bg-blue">
              <a class="nav-link" href="contact.html">
                <i class="fas fa-phone nav-icon" aria-hidden="true"></i>
                <span>Contact</span>
              </a>
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
      <form action="inscription_cantine.php" method="post">
      <p class="mb-4 font-size-20">Informations sur l'élève :</p>
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Nom</label>
          <input type="text" class="form-control" name="nomEleve" value="<?php if(!empty($nomEleve)){echo $nomEleve;} ?>" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Prénom</label>
          <input type="text" class="form-control" name="prenomEleve" value="<?php if(!empty($prenomEleve)){echo $prenomEleve;} ?>" id="exampleFormControlInput1" >
          </div>
          </div>
        </div>
        
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Classe</label>
          <input type="text" class="form-control" name="classe" value="<?php if(!empty($classe)){echo $classe;} ?>" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Date de naissance</label>
          <input type="date" class="form-control" name="naissance" value="<?php if(!empty($naissance)){echo $naissance;} ?>" id="exampleFormControlInput1" >
          </div>
          </div>
          </div>
        </div>
       
        <p>J'ai une carte de cantine :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="yesorno[]" value="oui" id="flexCheckDefault" <?php if($yesorno == 'oui'){echo "checked";}?>>
          <label class="form-check-label" for="flexCheckDefault">
            Oui
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="yesorno[]" value="non" id="flexCheckDefault" <?php if($yesorno == 'non'){echo "checked";}?>>
          <label class="form-check-label" for="flexCheckDefault">
            Non
          </label>
        </div>
        <p>Si non :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="new[]" value="nouveau" id="flexCheckDefault" <?php if($new == 'nouveau'){echo "checked";}?>>
          <label class="form-check-label" for="flexCheckDefault">
            Je suis nouveau
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="new[]" value="perdu" id="flexCheckDefault" <?php if($new == 'perdu'){echo "checked";}?>>
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
          <input type="text" class="form-control" name="nomResponsable" value="<?php if(!empty($nomResponsable)){echo $nomResponsable;} ?>" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Prénom</label>
          <input type="text" class="form-control" name="prenomResponsable" value="<?php if(!empty($prenomResponsable)){echo $prenomResponsable;} ?>" id="exampleFormControlInput1" >
          </div>
          </div>
          </div>
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Adresse</label>
          <input type="text" class="form-control" name="adresse" value="<?php if(!empty($adresse)){echo $adresse;} ?>" id="exampleFormControlInput1" >
        </div>
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Code postal</label>
          <input type="number" class="form-control" name="cp" value="<?php if(!empty($cp)){echo $cp;} ?>" id="exampleFormControlInput1" >
          </div>
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Ville</label>
          <input type="text" class="form-control" name="ville" value="<?php if(!empty($ville)){echo $ville;} ?>" id="exampleFormControlInput1" >
          </div>
        </div>
        </div>
        
        <div class="mb-3">
          <label for="exampleFormControlInput1" class="form-label">Adresse email</label>
          <input type="mail" class="form-control" name="mail" value="<?php if(!empty($mail)){echo $mail;} ?>" id="exampleFormControlInput1" >
        </div>        
        <div class="mb-3">
        <div class="row">
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Téléphone personnel</label>
          <input type="text" class="form-control" name="telPerso" value="<?php if(!empty($telPerso)){echo $telPerso;} ?>" id="exampleFormControlInput1" >
          </div>  
          <div class="col-6">
          <label for="exampleFormControlInput1" class="form-label">Téléphone professionnel</label>
          <input type="text" class="form-control" name="telPro" value="<?php if(!empty($telPro)){echo $telPro;} ?>" id="exampleFormControlInput1" >
          </div>  
          </div>  
        </div>        

        <p class="mb-4 mt-6 font-size-20">Inscription :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="inscription[]" value="oui" id="flexCheckDefault" <?php if($inscription == 'oui'){echo "checked";}?>>
          <label class="form-check-label" for="flexCheckDefault">
          J’inscris mon enfant pour l’année scolaire 2021/2022
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="inscription[]" value="non" id="flexCheckDefault" <?php if($inscription == 'non'){echo "checked";}?>>
          <label class="form-check-label" for="flexCheckDefault">
          Je n’inscris pas mon enfant à la cantine pour l’année scolaire 2021/2022
          </label>
        </div>
        <div class="mb-3 mt-3">
                    <label for="exampleFormControlSelect1" class="form-label">Forfait choisi</label>
                    <select class="form-select form-control" name="forfait" id="forfait" aria-label="Default select example">
                      <option <?php if($forfait != '2'||$forfait!='3'||$forfait!='4'){echo "selected";}?>>Veuillez sélectionner :</option>
                      <option value="2" <?php if($forfait == '2'){echo "selected";}?>>2 jours</option>
                      <option value="3" <?php if($forfait == '3'){echo "selected";}?>>3 jours</option>
                      <option value="4" <?php if($forfait == '4'){echo "selected";}?>>4 jours</option>
                    </select>
                  </div>
         <p>Jours de restauration choisis :</p>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="lun" id="flexCheckDefault" <?php foreach($_POST['jours'] as $jour){if($jour == 'lun'){echo "checked";}}?>>
          <label class="form-check-label" for="flexCheckDefault">
          Lundi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="mar" id="flexCheckDefault" <?php foreach($_POST['jours'] as $jour){if($jour == 'mar'){echo "checked";}}?>>
          <label class="form-check-label" for="flexCheckDefault">
          Mardi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="jeu" id="flexCheckDefault" <?php foreach($_POST['jours'] as $jour){if($jour == 'jeu'){echo "checked";}}?>>
          <label class="form-check-label" for="flexCheckDefault">
          Jeudi
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="jours[]" value="ven" id="flexCheckDefault" <?php foreach($_POST['jours'] as $jour){if($jour == 'ven'){echo "checked";}}?>>
          <label class="form-check-label" for="flexCheckDefault">
          Vendredi
          </label>
        </div>
        <div class="mb-3 mt-6">
          <div class="row">
          <div class="col-4">
          <label for="exampleFormControlInput1" class="form-label">Fait à :</label>
          <input type="text" class="form-control" name="lieu" value="<?php if(!empty($lieu)){echo $lieu;} ?>" id="exampleFormControlInput1" >
          </div>
          <div class="col-4 offset-4">
          <label for="exampleFormControlInput1" class="form-label">Le :</label>
          <input type="date" class="form-control" name="dateFait" value="<?php if(!empty($dateFait)){echo $dateFait;} ?>" id="exampleFormControlInput1" >
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
  