<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require ("base.php");
        $table = new mytable("guide", "root", "", "restaurant");
        $table->rendreHtml();
       // foreach( $BDD->query('SELECT * FROM restaurant') as $row)
       // echo $row['nom'];
    ?>
</body>
</html>