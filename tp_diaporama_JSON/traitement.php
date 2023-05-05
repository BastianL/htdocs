<?php
$fname = "photos_volcans/Légende_Volcans_Indo.json";
$containerJson = json_decode(fread(fopen($fname, "r"), filesize($fname)));
$min = 0;
$max = count($containerJson) -1;
if(isset($_GET['min']) && !empty($_GET['min'])){
    $min = $_GET['min'] -1;
}
if(isset($_GET['max']) && !empty($_GET['max'])){
    $max = $_GET['max'];
}
$longueur = $max - $min;
$sousdiapo=array_slice($containerJson, $min, $longueur);
echo json_encode($sousdiapo);
?>