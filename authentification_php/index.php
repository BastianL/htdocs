<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
<?php
    require("maconnection.php");
    $PDO = maConnection::getInstance("voilier", "root", '');
    if (session_start()){
        if(isset($_POST["email"]) && isset($_POST["motdepasse"])){
            $createstatement = $PDO->prepare("SELECT * FROM utilisateurs WHERE mail_user = :mail");
            $createstatement->bindParam(":mail", $_POST["email"], PDO::PARAM_STR);
            $createstatement->execute();
            $nbligne = $createstatement->rowcount();
            if($nbligne == 1){
                $ligne = $createstatement->fetch();
                if(password_verify($_POST["motdepasse"], $ligne[4]))
                {
                    $_SESSION['login'] = $ligne[1];
                    header('Location: liste.php');
                    exit;
                } else {
                    echo "mot de passe erroné";
                }
            }
        } else {
            if (isset($_SESSION["login"])){
                if(isset($_POST["Déconnexion"])){
                    if (session_unset()){
                        echo "Déconnexion réussie ! Veuillez actualiser la page";
                    }
                    else {
                        echo "Erreur déconnexion. Veuillez actualiser la page";
                    }
                } else {
                ?>
                <form method = "POST">
                    <label><input type = "submit" name = "Déconnexion" value = "deconnexion"></label>
                </form>
                <?php
                }
            } else {
                ?>
                <h1>ACCES MEMBRES</h1>
                <form method = "POST" action="index.php">
                <label>email<br><input type="email" name ="email"></label><br>
                <label>Mot de passe<br><input type="password" name = "motdepasse"></label><br>
                <label><input type="submit" name="Valider"></label>
                </form>
                <a href = "liste.php">Accéder a la liste</a>
                <?php    
            }
        }
    } else {
        echo "Erreur : la session n'a pas pu s'initialiser";
    }
?>

</body>
</html>