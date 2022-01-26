<?php
///LOCALHOST///
//identifier votre BDD
$database = "la_courtille";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
/*
///SERVEUR WEB///
//identifier votre BDD
$database = "dbs5254611";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('db5006292334.hosting-data.io', 'dbu1630546', 'Rg3p23t!vuA4u@k');
$db_found = mysqli_select_db($db_handle, $database);*/


session_start();


if($db_found)
{
  if (isset($_POST["button"])){

if(isset($_POST['id']) && isset($_POST['pw']))
{
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['id'])); 
    $password = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['pw']));
    
    if($username !== "" && $password !== "")
    {
        $passhash ="";
        $req = "SELECT * FROM users";
        $res = mysqli_query($db_handle, $req);
        while ($user = mysqli_fetch_assoc($res)) { 
          $users[] = $user; 
        }
        foreach($users as $user)
        {
          if (password_verify($password, $user['mdp'])) {
            $passhash = $user['mdp'];
          } 
        }
       
        $requete = "SELECT count(*) FROM users where email = '".$username."' and mdp = '".$passhash."' ";
        $exec_requete = mysqli_query($db_handle,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count!=0) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['email'] = $username;

           echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
           Identifiant et mot de passe corrects.
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
          </div>";
         
           $req = "SELECT * FROM users WHERE email = '$username' AND mdp = '$passhash'";
           $res = mysqli_query($db_handle, $req);
           $user = mysqli_fetch_assoc($res);

           $_SESSION['id'] = $user['idUser'];

        }
        else
        {
           echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
           Identifiant ou mot de passe incorrects.
          <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
          </div>";
        }
    }
    else
    {
       echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
       Identifiant ou mot de passe vides.
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }
}
else
{
   
}
}


//si clic bouton ajout article 

if (isset($_POST["ajoutArticle"])){ 

  $titre = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['titre'])); 
  $texte = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['texte'])); 

  $nomOrigine2 = $_FILES['monaudio']['name'];
  $elementsChemin2 = pathinfo($nomOrigine2);
  $extensionFichier2 = $elementsChemin2['extension'];
  $extensionsAutorisees2 = array("mp3", "ogg", "wma");
  $extensionsAutorisees = array("jpeg", "jpg", "JPG", "JPEG", "gif", "png", "webp", "svg");

  $nomDestination2="";  

  if (!(in_array($extensionFichier2, $extensionsAutorisees2))) {
    echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    L'audio téléchargé n'a pas l'extension attendue.
   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
   </div>";
} else {    
    
    // Copie dans le repertoire du script avec un nom
    $repertoireDestination2 = dirname(__FILE__)."/assets/audio/";
    $nomDestination2 = $titre.".".$extensionFichier2;

    if (move_uploaded_file($_FILES["monaudio"]["tmp_name"], $repertoireDestination2.$nomDestination2)) {

    }
    else {
        echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        Le fichier audio est trop volumineux pour être importé.
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }
}

  $nomOrigine = $_FILES['monfichier']['name'];
  $elementsChemin = pathinfo($nomOrigine);
  $extensionFichier = $elementsChemin['extension'];

  if (!(in_array($extensionFichier, $extensionsAutorisees))) {
      echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
      L'image téléchargée n'a pas l'extension attendue ou vous avez omis d'ajouter une image.
     <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
     </div>";
  } else {    
      
      // Copie dans le repertoire du script avec un nom
      $repertoireDestination = dirname(__FILE__)."/assets/img/";
      $nomDestination = $titre.".".$extensionFichier;

      if (move_uploaded_file($_FILES["monfichier"]["tmp_name"], $repertoireDestination.$nomDestination)) {

        if(empty($titre)||empty($texte))
        {
            echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
            Un champ ou plusieurs champs obligatoires sont vides.
           <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
           </div>";
        
        }
        else{
        
            $id = $_SESSION['id'];
        
             $sql="SELECT * FROM  articles where titre like '$titre' AND idUser like '$id'";
             $result = mysqli_query($db_handle, $sql);
      
            if (mysqli_num_rows($result) != 0) 
             {
                echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                Article déjà ajouté !
               <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
               </div>";
      
             }else 
                 {
                    $sql = "INSERT INTO articles(idUser, titre, texte, image, audio, date) VALUES('$id', '$titre', '$texte','$nomDestination','$nomDestination2',DATE(NOW()))";
                    $result = mysqli_query($db_handle, $sql);
                    echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    Nouvel article ajouté avec succès.
                   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                   </div>";
                  }
            }

      } else {
          echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
          L'image est trop volumineuse pour être importée.
        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
        </div>";
      }
  }


}

if (isset($_POST["ajoutActivite"])){

  $titre = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['titre'])); 

  $nomOrigine = $_FILES['monimage']['name'];
  $elementsChemin = pathinfo($nomOrigine);
  $extensionFichier = $elementsChemin['extension'];
  $extensionsAutorisees = array("jpeg", "jpg", "JPG", "JPEG", "gif", "png", "webp", "svg");

  if (!(in_array($extensionFichier, $extensionsAutorisees))) {
    echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    L'image téléchargée n'a pas l'extension attendue.
   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
   </div>";
  } else {    
    
    // Copie dans le repertoire du script avec un nom
    $repertoireDestination = dirname(__FILE__)."/assets/img/";
    $nomDestination = $titre.".".$extensionFichier;

    if (move_uploaded_file($_FILES["monimage"]["tmp_name"], $repertoireDestination.$nomDestination)) {

        $sql = "INSERT INTO activites(image) VALUES('$nomDestination')";
        $result = mysqli_query($db_handle, $sql);
        echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        Activité ajoutée avec succès !
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }
    else {
        echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        Le fichier image est trop volumineux pour être importé.
      <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
      </div>";
    }
}

}



//si clic bouton ajout prof 

if (isset($_POST["ajoutProf"])){ 

  $nom = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nom'])); 
  $mail = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mail'])); 
  $mdp = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mdp'])); 

  $choixType ="";

  if(empty($nom)||empty($mail)||empty($mdp)||sizeof($_POST['type'])!=1)
  {
        if(sizeof($_POST['type'])!=1 && !empty($_POST['type'])){
          $erreur= "Erreur, vous ne pouvez choisir qu'un seul type d'utilisateur lors de la création d'un nouveau compte.";
        }
        else{
          $erreur= "Un champ ou plusieurs champs obligatoires sont vides";
        }
        echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
        " . $erreur . "
       <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
       </div>";
  
  }
  else{
  
      foreach ($_POST['type'] as $check){
        $choixType = $check;
      }
      
      $sql="SELECT * FROM  users where nom like '$nom'";
      $result = mysqli_query($db_handle, $sql);

      if (mysqli_num_rows($result) != 0) 
       {
          $erreur= "Cet utilisateur a déjà été ajouté.";
          echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
          " . $erreur . "
         <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
         </div>";

       }else 
           {
              $options = [
                  'cost' => 12,
              ];
              $hashpass = password_hash($mdp, PASSWORD_BCRYPT, $options);
              $sql = "INSERT INTO users(email, mdp, nom, type) VALUES('$mail', '$hashpass', '$nom','$choixType')";
              $result = mysqli_query($db_handle, $sql);
              $erreur= "Nouvel utilisateur créé !";

              echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
              " . $erreur . "
             <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
             </div>";
            }
      }
  
}

//si clic bouton supprimer prof

if (isset($_POST["profSup"])){ 

  $nom = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nom'])); 

  $supprimer = "DELETE FROM users WHERE nom = '$nom'";
  $supression = mysqli_query($db_handle, $supprimer);

  $erreur= "Compte supprimé !";

  echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  " . $erreur . "
 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
 </div>";

}

//si clic bouton enregistrer les modifications

if (isset($_POST["modifArticle"])){

  $titre = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['titre'])); 
  $texte = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['texte'])); 
  $id = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['id'])); 

  $req = "UPDATE articles SET titre = '$titre', texte = '$texte' WHERE idArticle = '$id'";
  $update = mysqli_query($db_handle, $req);

  echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  Article modifié avec succès !
 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
 </div>";

}

if($_GET['out']==1){

  $_SESSION['id']=NULL;
  $_SESSION['email']=NULL;
  echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  Déconnecté
 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
 </div>";

}

if($_GET['delete']==1)
{
  $id = $_GET['id'];

  $supprimer = "DELETE FROM articles WHERE idArticle = '$id'";
  $supression = mysqli_query($db_handle, $supprimer);

  $erreur= "Article supprimé !";

  echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  " . $erreur . "
 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
 </div>";

}

if($_GET['deleteActivite']==1)
{
  $id = $_GET['id'];

  $supprimer = "DELETE FROM activites WHERE idActivte = '$id'";
  $supression = mysqli_query($db_handle, $supprimer);

  $erreur= "Activité supprimée !";

  echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  " . $erreur . "
 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
 </div>";

}

if (isset($_POST["chTarif"])){

  $nomOrigine = $_FILES['pdf']['name'];
  $elementsChemin = pathinfo($nomOrigine);
  $extensionFichier = $elementsChemin['extension'];
  $extensionsAutorisees = array("pdf");
  if (!(in_array($extensionFichier, $extensionsAutorisees))) {
    echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
    Le fichier téléchargé n'a pas l'extension attendue.
   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
   </div>";
  } else {    
      
      // Copie dans le repertoire du script avec un nom
      $repertoireDestination = dirname(__FILE__)."/assets/pdf/";
      $nomDestination = "verso inscription tarification.pdf";

      if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $repertoireDestination.$nomDestination)) {
        echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    Votre nouvelle tarification a bien été prise en compte.
                   <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                   </div>";

      }
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
  <title>Admin - Collège La Courtille</title>

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
  <div class="main-wrapper faq"> 
    
  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
<?php
  
$id = $_SESSION['id'];
$type='';

$req = "SELECT * FROM users WHERE idUser = '$id'";
$res = mysqli_query($db_handle, $req);
$user = mysqli_fetch_assoc($res);

if($user['type']=="admin")
{
  $type="admin";
}
elseif($user['type']=="prof")
{
  $type="prof";
}
elseif($user['type']=="documentaliste")
{
  $type="documentaliste";
}
elseif($user['type']=="secretariat")
{
  $type="secretariat";
}
?>
  <section class="breadcrumb-bg" style="background-image: url(assets/img/tableau.jpg); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">  <?php if(!isset($_SESSION['email'])){echo "Connexion";} elseif(isset($_SESSION['email'])){echo "Espace";} ?> <?php if($type=="admin"){echo "Administrateur";}elseif($type=="prof"){echo "Professeur";}elseif($type=="secretariat"){echo "Secrétariat";}elseif($type=="documentaliste"){echo "Documentaliste";}?></h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.html">Accueil</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
            <?php if(!isset($_SESSION['email'])){echo "Connexion";} elseif(isset($_SESSION['email'])){echo "Espace";} ?> <?php if($type=="admin"){echo "administrateur";}elseif($type=="prof"){echo "professeur";}elseif($type=="secretariat"){echo "secrétariat";}elseif($type=="documentaliste"){echo "documentaliste";}?>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <?php if(!isset($_SESSION['email'])): ?>    
  
<!-- ====================================
———	SIGN-UP OR LOG-IN
===================================== -->
<section class="py-8 py-md-10">
  <div class="container">
    <div class="row">
      <div class="offset-2 col-8" >
        <div class="mb-4 mb-sm-0">
          
  
          <div class="border rounded-bottom-sm rounded-top-sm">
            <div class="p-3">
              <form action="admin.php" method="POST" role="form">
                <div class="form-group form-group-icon">
                  <input type="text" name="id" class="form-control border" placeholder="User name" required="">
                </div>

                <div class="form-group form-group-icon">
                  <input type="password" name="pw" class="form-control border" placeholder="Password" required="">
                </div>

                <div class="form-group">
                  <button type="submit" name="button" class="btn btn-danger text-uppercase w-100">Se connecter</button>
                </div>

                <div class="container" style="background-color:#f1f1f1; padding:16px 16px 40px 16px;">
                  <span class="psw"><a href="forgot_password.php">Mot de passe oublié ?</a></span>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endif ?>

<?php if($_SESSION['email']): ?>


<?php

$id = $_SESSION['id'];

$req = "SELECT * FROM users WHERE idUser = '$id'";
$res = mysqli_query($db_handle, $req);
$user = mysqli_fetch_assoc($res);

if($user['type']=="admin")
{
  $req2 = "SELECT * FROM articles";
$res2 = mysqli_query($db_handle, $req2);
while ($article = mysqli_fetch_assoc($res2)) { 
  $articles[] = $article; 
  } 

}
elseif($user['type']=="prof")
{
  $req2 = "SELECT * FROM articles WHERE idUser = '$id'";
$res2 = mysqli_query($db_handle, $req2);
while ($article = mysqli_fetch_assoc($res2)) { 
  $articles[] = $article; 
  } 

}

$count=-1;
?>  

<?php if($user['type']=="documentaliste"): ?>

  <section class="pt-8 pt-md-10 pb-3">
    <div class="container">

  <div class="row">

<div class="col-12">
      <div class="mb-1">
        <h3 class="element-title">Ajouter une activité - Espace CDI</h3>
      <form action="admin.php" enctype="multipart/form-data" method="post">
      <div class="form-floating mb-3">
                  <input type="text" name="titre" placeholder="Nom de l'activité" class="form-control" id="floatingInput">
                  <label for="floatingInput">Nom de l'activité</label>
                </div>
        <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
        Image (formats autorisés : jpg, png, webp, gif)</br><input type="file" name="monimage" /></br></br>
        <button class="btn mt-6 btn-primary" name="ajoutActivite" type="submit">Ajouter</button>
      </form>
      </div>
    </div>

</div>
</div>
</section>

<section class="">
    <div class="container">
      <div class="row mb-6">

      <h3 class="element-title">Les activités</h3>

      <?php
              $req = "SELECT * FROM activites";
              $res = mysqli_query($db_handle, $req);
              while ($activite = mysqli_fetch_assoc($res)) { 
                $activites[] = $activite; 
              }
      ?>

      <?php foreach($activites as $activite):?>
  
              <div class="col-md-6 col-lg-4">
          <div class="card">
                      <div class="position-relative">
                  <img class="card-img-top" src="assets/img/<?php echo $activite['image']; ?>" alt="Card image">
                          
                      </div>
  
            <div class="card-body border-top-5 px-3 rounded-bottom border-primary">
              
              <a class="btn btn-link text-danger ps-0" href="admin.php?id=<?php echo $activite['idActivite'];?>&deleteActivite=1">
                <i class="fa fa-trash me-1" aria-hidden="true"></i> Supprimer l'activité
              </a>
            </div>
          </div>
        </div>
        <?php endforeach ?>

      </div>
    </div>
</section>

<?php endif ?>

 
  <!-- ====================================
  ———	BLOG GRID
  ===================================== -->
  <section class="py-8 py-md-10">
    <div class="container">
      <div class="row mb-6">

      <h3 class="element-title">Vos actualités</h3>

      <?php foreach($articles as $article):?>

        <?php $count = $count + 1;
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
                          <a href="blog-single-left-sidebar.html">
                  <img class="card-img-top" src="assets/img/<?php echo $article['image']; ?>" alt="Card image">
                          </a>
                <div class="card-img-overlay p-0">
                  <span class="badge bg-<?php echo $color;?> badge-rounded m-4"><?php echo $article['date'];?></span>
                </div>
                      </div>
  
            <div class="card-body border-top-5 px-3 rounded-bottom border-<?php echo $color;?>">
              <h3 class="card-title">
                <a class="text-<?php echo $color;?> text-capitalize d-block text-truncate" href="pageArticle.php?id=<?php echo $article['idArticle'];?>"><?php echo $article['titre']; ?></a>
              </h3>
                          <ul class="list-unstyled d-flex mb-1">
                <li class="me-2">
                                  <a class="text-muted" href="blog-single-left-sidebar.html">
                                      <i class="fa fa-user me-2" aria-hidden="true"></i><?php echo $user['nom']; ?>
                                  </a>
                </li>
             
              </ul>
              <p class="mb-2"> 
                  <script type="text/javascript">  
                    var texte = "<?php echo $article['texte'];?>";
                    document.write(texte.slice(0, 150)+"...");
                  </script>
              </p>
              <a class="btn btn-link text-hover-<?php echo $color;?> ps-0" href="pageArticle.php?id=<?php echo $article['idArticle'];?>&edit=1">
                <i class="fa fa-edit me-1" aria-hidden="true"></i> Modifier l'article
              </a>
              <a class="btn btn-link text-danger ps-0" href="admin.php?id=<?php echo $article['idArticle'];?>&delete=1">
                <i class="fa fa-trash me-1" aria-hidden="true"></i> Supprimer l'article
              </a>
            </div>
          </div>
        </div>
        <?php endforeach ?>

      </div>

      <div class="row">

        <div class="col-12">
              <div class="mb-8">
                <h3 class="element-title">Ajouter une actualité</h3>
              <form action="admin.php" enctype="multipart/form-data" method="post">
                <div class="form-floating mb-3">
                  <input type="text" name="titre" placeholder="titre" class="form-control" id="floatingInput">
                  <label for="floatingInput">Titre</label>
                </div>

                <div class="form-floating mb-3">
                  <textarea class="form-control" name="texte" id="floatingInput" placeholder="texte" style="height: 100px"></textarea>
                  <label for="floatingTextarea2">Texte</label>
                </div>
                <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
                Image (formats autorisés : jpg, png, webp, gif)</br><input type="file" name="monfichier" /></br></br>
                Audio (formats autorisés : mp3, ogg)</br><input type="file" name="monaudio" /></br>
                <button class="btn mt-6 btn-primary" name="ajoutArticle" type="submit">Ajouter</button>
              </form>
              </div>
            </div>

      </div>

      
<?php if($user['type']=="admin"): ?>

<?php 

$req3 = "SELECT * FROM users where type = 'prof' OR type = 'documentaliste' OR type = 'secretariat'";
$res3 = mysqli_query($db_handle, $req3);
while ($prof = mysqli_fetch_assoc($res3)) { 
$profs[] = $prof; 
} 

?>

<div class="row">

<div class="col-12">
            <div class="mb-8">
            <h3 class="element-title">Les comptes</h3>

            <?php foreach($profs as $prof):?>
              <form action="admin.php" method="post">
              <ul class="list-group list-group-horizontal">
              <input style="visibility:hidden;width:0;margin:0;padding:0;border:0;" type="text" value="<?php echo $prof['nom']; ?>" name="nom">
                <li class="list-group-item" style="width:100%;text-align:center;display:table;"><div style="display:table-cell;vertical-align:middle;"><?php echo $prof['nom']; ?></div></li>
                <li class="list-group-item" style="width:100%;text-align:center;display:table;"><div style="display:table-cell;vertical-align:middle;"><?php echo $prof['email']; ?></div></li>
                <li class="list-group-item" style="width:100%;text-align:center;display:table;"><div style="display:table-cell;vertical-align:middle;"><?php echo $prof['type']; ?></div></li>
                <li class="list-group-item" style="width:100%;text-align:center;display:table;"><div style="display:table-cell;vertical-align:middle;">
                <button class="btn btn-danger btn-sm" name="profSup" type="submit">Supprimer</button></div>
                </li>
              </ul>
            </form>
              <?php endforeach ?>
            </div>
          </div>
</div>

<div class="row">

<div class="col-12">
      <div class="mb-8">
        <h3 class="element-title">Ajouter un compte</h3>
      <form action="admin.php" method="post">
        <div class="form-floating mb-3">
          <input type="text" name="nom" placeholder="titre" class="form-control" id="floatingInput">
          <label for="floatingInput">Nom</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="mail" placeholder="titre" class="form-control" id="floatingInput">
          <label for="floatingInput">Mail</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="mdp" placeholder="titre" class="form-control" id="floatingInput">
          <label for="floatingInput">Mot de passe</label>
        </div>
        <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="type[]" value="prof" id="flexCheckChecked" checked>
                      <label class="form-check-label" for="flexCheckDefault">
                        Professeur
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="type[]" value="documentaliste" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckChecked">
                        Documentaliste
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="type[]" value="secretariat" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        Secrétariat
                      </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="type[]" value="admin" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckChecked">
                        Administrateur
                      </label>
                    </div>
        
        <button class="btn btn-primary mt-3" name="ajoutProf" type="submit">Ajouter</button>
      </form>
      </div>
    </div>

</div>

<?php endif ?>
    </div>
  </section>
  
<?php endif ?>

<?php if($user['type']=="secretariat"): ?>

  <section class="pb-8 pb-md-10">
    <div class="container">
      <div class="row">

        <div class="col-12">
              <div class="mb-8">
                <h3 class="element-title">Tarifications de la demi-pension</h3>
              <form action="admin.php" enctype="multipart/form-data" method="post">
                <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
                Fichier PDF</br><input type="file" name="pdf" /></br></br>
                <button class="btn mt-6 btn-primary" name="chTarif" type="submit">Modifier la tarification</button>
              </form>
              </div>
            </div>

      </div>

    </div>
  </section>

<?php endif ?>

<?php if($_SESSION['id']) :?>
<section class="">
    <div class="container">
      <div class="row">

        <div class="boutonDeco">
         <a href="admin.php?out=1">
          <button class="btn btn-sm mt-6 offset-11 col-1  btn-danger" >Déconnexion</button>
         </a>
        </div>

      </div>

    </div>
  </section>

  <?php endif ?>


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
