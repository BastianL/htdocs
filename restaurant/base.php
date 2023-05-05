<?php
    require ("maconnection.php");

    class mytable{
        private $BDD;
        private $PDOstatement;
        public function __construct($dbname, $id, $password, $table){
            $this->BDD = maConnection::getInstance($dbname, $id, $password);
            $this->PDOstatement = $this->BDD->prepare("SELECT * FROM $table");
        }
        public function getBDD(){
            return $this->BDD;
        }
        public function getPDOstatement(){
            return $this->PDOstatement;
        }
        public function rendreHTML(){
            echo json_encode($_POST);
            if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['prix']) && isset($_POST['Commentaire']) && isset($_POST['Note']) && isset($_POST['visite']) && isset($_POST['ajligne'])){
                $this->ajouterligne($_POST);
            }
            else{
                if(isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['prix']) && isset($_POST['Commentaire']) && isset($_POST['Note']) && isset($_POST['visite']) && isset($_POST['modifierligne'])){
                    $this->modifierligne($_POST);
                }
                elseif(isset($_POST['nom']) || isset($_POST['adresse']) || isset($_POST['prix']) || isset($_POST['Commentaire']) || isset($_POST['Note']) || isset($_POST['visite'])){
                    echo "Vous n'avez pas rempli tout les champs!";
                }
            }
            if(isset($_POST["supprimer"])){
                $this->supprimerelement($_POST);
            }
            if(isset($_POST["modifier"])){
                $this->modifierpage($_POST["modifier"]);
            } else {
            echo "<form method='post'>";
            echo "<table>";
            echo $this->Info_table();
            echo "<tbody>";
            $j = 0;
            $this->PDOstatement->execute();
            while($ligne = $this->PDOstatement->fetch()){
                echo "<tr>";
                echo "<td><label><input id = 'supprimer$ligne[0]' type=\"submit\" name = \"supprimer\" value = '$ligne[0]'></label></td>";
                echo "<td><label>Modifier Ligne<input id ='modifier$ligne[0]' type='submit' name='modifier' value= '$ligne[0]'";
                for($i=0; $i < count($ligne); $i++){
                    echo "<td>$ligne[$i]</td>";
                }
                echo "</tr>";
                $j++;
            }
            echo "</tbody></table></form>";
            echo '<form method="post">';
            echo "<label>Nom<input type = 'text' id = 'nom' name = 'nom'></label><br>";
            echo "<label>Adresse<input type = 'text' id = 'adresse' name = 'adresse'></label><br>";
            echo "<label>Prix<input type = 'number' id = 'prix' name='prix' step ='0.01'></label><br>";
            echo "<label>Commentaire<input type = 'text' id = 'Commentaire' name = 'Commentaire'></label><br>";
            echo "<label>Note<input type = 'number' id = 'Note' name = 'Note' step = '0.1'></label><br>";
            echo "<label>Date Visite<input type = 'date' id = 'visite' name = 'visite'></label><br>";
            echo "<label><input id = 'ajouter une ligne' type = 'submit' name = 'ajligne' value = 'ajouter une ligne'></label></form>";
            }
        }
        private function Info_table()
        {
            $this->PDOstatement->execute();
            $ligne = $this->PDOstatement->fetch();
            if ($ligne != null){
                $return ="<thead><tr>";
                $return .= "<th>suppression</th>";
                for($i=0; $i < count($ligne); $i++){
                    $return .="<th>";
                    $meta = $this->PDOstatement->getColumnMeta($i);
                    $return .= $meta["name"];
                    $return .="</th>";
                }
                $return .="</tr></thead>";
            }
            else{
                $return = "<h1>Table Vide!</h1>";
            }
            return $return;
        }
        public function supprimerelement($requête){
            $deletestatement = $this->BDD->prepare("DELETE FROM restaurant WHERE id = $requête[supprimer]");
            $deletestatement->execute();
        }
        public function ajouterligne(array $parametres){
            $createstatement = $this->BDD->prepare("INSERT INTO restaurant VALUES (id, :nom, :adresse, :prix, :commentaire, :note, :visite)");
            $createstatement->bindParam(':nom', $parametres['nom'], PDO::PARAM_STR);
            $createstatement->bindParam(':adresse', $parametres['adresse'], PDO::PARAM_STR);
            $createstatement->bindParam(':prix', $parametres['prix'], PDO::PARAM_STR);
            $createstatement->bindParam(':commentaire', $parametres['Commentaire'], PDO::PARAM_STR);
            $createstatement->bindParam(':note', $parametres['Note'], PDO::PARAM_STR);
            $createstatement->bindParam(':visite', $parametres['visite'], PDO::PARAM_STR);
            $createstatement->execute();
        }
        public function modifierpage($ligneamodifier)
        {
            $lignestatement = $this->BDD->prepare("SELECT * FROM restaurant WHERE id = $ligneamodifier");
            $lignestatement->execute();
            $ligneselectioné = $lignestatement->fetch();
            echo "<form method = 'post'>";
            echo "<label>Nom<input type = 'text' id = 'nom' name = 'nom' value = $ligneselectioné[1]></label><br>";
            echo "<label>Adresse<input type = 'text' id = 'adresse' name = 'adresse' value = $ligneselectioné[2]></label><br>";
            echo "<label>Prix<input type = 'number' id = 'prix' name='prix' step ='0.01' value = $ligneselectioné[3]></label><br>";
            echo "<label>Commentaire<input type = 'text' id = 'Commentaire' name = 'Commentaire' value = $ligneselectioné[4]></label><br>";
            echo "<label>Note<input type = 'number' id = 'Note' name = 'Note' step = '0.1' value = $ligneselectioné[5]></label><br>";
            echo "<label>Date Visite<input type = 'date' id = 'visite' name = 'visite' value = $ligneselectioné[6]></label><br>";
            echo "<label><input id = 'modifier une ligne' type = 'submit' name = 'modifierligne' value = '$ligneamodifier'></label></form>";
        }
        public function modifierligne(array $parametres){
            $createstatement = $this->BDD->prepare("UPDATE restaurant SET nom = :nom, adresse = :adresse, prix = :prix, Commentaire = :commentaire, Note = :note, visite = :visite WHERE id = :id");
            $createstatement->bindParam(':nom', $parametres['nom'], PDO::PARAM_STR);
            $createstatement->bindParam(':adresse', $parametres['adresse'], PDO::PARAM_STR);
            $createstatement->bindParam(':prix', $parametres['prix'], PDO::PARAM_STR);
            $createstatement->bindParam(':commentaire', $parametres['Commentaire'], PDO::PARAM_STR);
            $createstatement->bindParam(':note', $parametres['Note'], PDO::PARAM_STR);
            $createstatement->bindParam(':visite', $parametres['visite'], PDO::PARAM_STR);
            $createstatement->bindParam(':id', $parametres['modifierligne'], PDO::PARAM_INT);
            $createstatement->execute();
        }    
    }
?>
