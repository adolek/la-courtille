

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    <h2>Mot de passe oublié</h2>
    <form method="post">
      <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="email" placeholder="Votre Email" name="email" required>
        <button type="submit">Changer mon mot de passe</button>
      </div>
    </form>
  </body>
</html>

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

if(isset($_POST['email']))
{
  $token = uniqid();
  $url = "https://mywebmaker.fr/courtille/token?token=$token";

  $message = "Bonjour, voici votre lien de réinitialisation du mot de passe : ";
  $message .= $url;
  $header="MIME-Version: 1.0\r\n";
  $header.='From:"MyWebMaker" <contact@mywebmaker.fr>'."\n";
  $header.='Content-Type:text/html; charset="uft-8"'."\n";
  $header.='Content-Transfer-Encoding: 8bit';  
  $mail = $_POST['email'];

  if(mail("$mail", "Mot de passe oublié", $message, $header))
  {
    $requete = "UPDATE users SET token = '$token' where email = '$mail'";
    $exec_requete = mysqli_query($db_handle,$requete);
    $result      = mysqli_fetch_array($exec_requete);
    echo "Mail envoyé";

  }
  else{
    echo "Une erreur est survenue.";
  }
}