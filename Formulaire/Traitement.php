<?php
try{
  require('ConnectionBD.php');
  $requete=$con->prepare("INSERT INTO Personne(ID,NOM,PRENOM,ADRESSE,VILLE,CODE)
                          VALUES(:id,:nom,:prenom,:adresse,:ville,:code)"
                          );
 function securisation($info){
                $info = trim($info);
                $info = stripslashes($info);
                $info = strip_tags($info);
                return $info;
          }
          $id = securisation($_POST['id']);
          $nom = securisation($_POST['nom']);
          $prenom = securisation($_POST['prenom']);
          $adresse = securisation($_POST['adresse']);
          $ville = securisation($_POST['ville']);
          $code = securisation($_POST['code']);
  $requete->bindParam(':id',$id);
  $requete->bindParam(':nom',$nom);
  $requete->bindParam(':prenom',$prenom);
  $requete->bindParam(':adresse',$adresse);
  $requete->bindParam(':ville',$ville);
  $requete->bindParam(':code',$code);
  $resultat = $requete->execute();
  if($resultat){
     header('Location: AffichageListe.php');
  }else{
     header('Location: Erreur.php');
  }

}catch(PDOException $e){
  echo 'Erreur!!! '.$e->getMessage();
  echo 'Echec de la connexion avec la base de donnée';
}
?>
