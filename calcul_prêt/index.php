<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <form action = "index.php" method = "POST">
        <p><label>Capital emprunté : <input type="number" id="capital" step = "1" name="capital"></label></p>
        <p><label>Taux intérêt en % : <input type="number" id="taux" name="taux" step = "0.01"></label></p>
        <p><label>Durée de remboursement en nb d'années : <input type="number" id="durée" name="durée"></label>
        <p><input type="submit" value="calculer" name="valider"> <label>Mensualité : <input type="text" readonly="readonly" id = "mensualité" value= '<?php
        require("./model/pret.php");
        if(isset($_POST["valider"])){
            $monObj = new GestionPublic($_POST["capital"], $_POST["taux"], $_POST["durée"]);
            $test = $monObj->calculMensualités();
            echo $test;
        }
    ?>'></label></p>
    </form>
    <p>Tableau de remboursements (d'amortissements) du prêt</p>
    <table>
    <?php
        if(isset($_POST["valider"])){
            $tableau = $monObj->tableauMensualités($test);
            echo $tableau;
        }
    ?>
    </table>
</body>
</html>