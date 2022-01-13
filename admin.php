<?php
//identifier votre BDD
$database = "la_courtille";
//identifier votre serveur (localhost), utlisateur (root), mot de passe ("")
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

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
  $extensionsAutorisees = array("jpeg", "jpg", "JPG", "gif", "png", "webp", "svg");

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



//si clic bouton ajout prof 

if (isset($_POST["ajoutProf"])){ 

  $nom = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['nom'])); 
  $mail = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mail'])); 
  $mdp = mysqli_real_escape_string($db_handle,htmlspecialchars($_POST['mdp'])); 


  if(empty($nom)||empty($mail)||empty($mdp))
  {
      $erreur= "Un champ ou plusieurs champs obligatoires sont vides";

      echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
      " . $erreur . "
     <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
     </div>";
  
  }
  else{
  
       $sql="SELECT * FROM  users where nom like '$nom'";
       $result = mysqli_query($db_handle, $sql);

      if (mysqli_num_rows($result) != 0) 
       {
          $erreur= "Professeur déjà ajouté !";
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
              $sql = "INSERT INTO users(email, mdp, nom, type) VALUES('$mail', '$hashpass', '$nom','prof')";
              $result = mysqli_query($db_handle, $sql);
              $erreur= "Nouveau professeur créé !";

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

  $erreur= "Professeur supprimé !";

  echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
  " . $erreur . "
 <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
 </div>";

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
        <a class="navbar-brand" href="index.html">
          <img class="d-inline-block" src="assets/img/logo-school.png" alt="Kidz School">
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
                  <a class="dropdown-item " href="index-v4.html">Restauration</a>
                </li>

                <li>
                  <a class="dropdown-item " href="index-v4.html">Règlement</a>
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
                <i class="fas fa-school nav-icon" aria-hidden="true"></i>
                <span>Bourse & quelque chose</span>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                <li>
                  <a class="dropdown-item " href="index.html">Bourse</a>
                </li>
                <li>
                  <a class="dropdown-item " href="index-v2.html">Autre</a>
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
  <div class="main-wrapper faq"> 
    
  <!-- ====================================
  ———	BREADCRUMB
  ===================================== -->
  <section class="breadcrumb-bg" style="background-image: url(assets/img/tableau.jpg); ">
    <div class="container">
      <div class="breadcrumb-holder">
        <div>
          <h1 class="breadcrumb-title">  <?php if(!isset($_SESSION['email'])){echo "Connexion";} elseif(isset($_SESSION['email'])){echo "Espace";} ?> Admin</h1>
          <ul class="breadcrumb breadcrumb-transparent">
            <li class="breadcrumb-item">
              <a class="text-white" href="index.html">Accueil</a>
            </li>
            <li class="breadcrumb-item text-white active" aria-current="page">
            <?php if(!isset($_SESSION['email'])){echo "Connexion";} elseif(isset($_SESSION['email'])){echo "Espace";} ?> Admin
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
                  <span class="badge bg-<?php echo $color;?> badge-rounded m-4"> 14 <br> Jun</span>
                </div>
                      </div>
  
            <div class="card-body border-top-5 px-3 rounded-bottom border-<?php echo $color;?>">
              <h3 class="card-title">
                <a class="text-<?php echo $color;?> text-capitalize d-block text-truncate" href="blog-single-left-sidebar.html"><?php echo $article['titre']; ?></a>
              </h3>
                          <ul class="list-unstyled d-flex mb-1">
                <li class="me-2">
                                  <a class="text-muted" href="blog-single-left-sidebar.html">
                                      <i class="fa fa-user me-2" aria-hidden="true"></i><?php echo $user['nom']; ?>
                                  </a>
                </li>
             
              </ul>
              <p class="mb-2"><?php echo $article['texte']; ?></p>
              <a class="btn btn-link text-hover-<?php echo $color;?> ps-0" href="blog-single-left-sidebar.html">
                <i class="fa fa-angle-double-right me-1" aria-hidden="true"></i> Read More
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
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                Image (formats autorisés : jpg, png, webp, gif)</br><input type="file" name="monfichier" /></br></br>
                Audio (formats autorisés : mp3, ogg)</br><input type="file" name="monaudio" /></br>
                <button class="btn mt-6 btn-primary" name="ajoutArticle" type="submit">Ajouter</button>
              </form>
              </div>
            </div>

      </div>

      
<?php if($user['type']=="admin"): ?>

<?php 

$req3 = "SELECT * FROM users where type = 'prof'";
$res3 = mysqli_query($db_handle, $req3);
while ($prof = mysqli_fetch_assoc($res3)) { 
$profs[] = $prof; 
} 

?>

<div class="row">

<div class="col-12">
            <div class="mb-8">
            <h3 class="element-title">Les professeurs</h3>

            <?php foreach($profs as $prof):?>
              <form action="admin.php" method="post">
              <ul class="list-group list-group-horizontal">
              <input style="visibility:hidden;width:0;margin:0;padding:0;border:0;" type="text" value="<?php echo $prof['nom']; ?>" name="nom">
                <li class="list-group-item" style="width:100%;text-align:center;display:table;"><div style="display:table-cell;vertical-align:middle;"><?php echo $prof['nom']; ?></div></li>
                <li class="list-group-item" style="width:100%;text-align:center;display:table;"><div style="display:table-cell;vertical-align:middle;"><?php echo $prof['email']; ?></div></li>
                <li class="list-group-item" style="width:100%;text-align:center;display:table;"><div style="display:table-cell;vertical-align:middle;"><?php echo $prof['mdp']; ?></div></li>
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
        <h3 class="element-title">Ajouter un professeur</h3>
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

        <button class="btn btn-primary" name="ajoutProf" type="submit">Ajouter</button>
      </form>
      </div>
    </div>

</div>

<?php endif ?>
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
