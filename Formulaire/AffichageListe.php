<!DOCTYPE html>
<html>
<head>
	<title>Lister Les elements de la base de donnée</title>
	<META charset="utf-8"/>
</head>
<body>
   <?php
   try{
   	require('ConnectionBD.php');
   	$requete = $con->query("SELECT * from Personne");
   	?>
   	<table>
   	<tr>
   		<td colspan="6" id="entete">Listes des clients</td>
   	</tr>
   	<p><tr>
   	    <th>ID</th>
   		<th>NOM</th>
   		<th>PRENOM</th>
   		<th>ADRESSE</th>
   		<th>VILLE</th>
   		<th>CODE</th>
   	</tr>
   	</p>


   		<?php
             while($resultat = $requete->fetch()){
        ?>
                <tr>
                 <p><td><?php echo $resultat['ID']; ?></td>
                  <td><?php echo $resultat['NOM']; ?></td>
                  <td><?php echo $resultat['PRENOM'];  ?></td>
                  <td><?php echo $resultat['ADRESSE'];  ?></td>
                  <td><?php echo $resultat['VILLE'] ; ?></td>
                  <td><?php echo $resultat['CODE'];  ?>
                 </p>
                </tr>

        
    </table>
   	<?php
   }catch(PDOException $e){
   	     die('Erreur!!!'.$e->getMessage());
   }
   ?>

</body>
</html>