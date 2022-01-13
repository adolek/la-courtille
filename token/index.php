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

if($db_found)
{
    if(isset($_GET['token']) && $_GET['token'] != '')
    {
        $token = $_GET['token'];
        $requete = "SELECT DISTINCT email FROM users where token = '$token'";
        $exec_requete = mysqli_query($db_handle,$requete);
        $email      = mysqli_fetch_array($exec_requete);
        $email = $email[0];

        if($email)
        {
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <title>Récupération du mot de passe</title>
            </head>
            <body>
                <form method="post">
                    <label for="newPassword">Nouveau mot de passe</label>
                    <input type="password" name="newPassword">
                    <input type="submit" value="Confirmer">
                </form>
            </body>
            </html>
            <?php

        }

    }
}

if(isset($_POST['newPassword']))
{
    $options = [
        'cost' => 12,
    ];
    $mdp = $_POST['newPassword'];
    $hashedPassword = password_hash($mdp, PASSWORD_BCRYPT, $options);
    $requete = "UPDATE users SET mdp = '$hashedPassword' where email = '$email'";
    $exec_requete = mysqli_query($db_handle,$requete);
    $requete2 = "UPDATE users SET token = NULL where email = '$email'";
    $exec_requete2 = mysqli_query($db_handle,$requete2);
    echo "Mot de passe modifié avec succès";

}

?>


