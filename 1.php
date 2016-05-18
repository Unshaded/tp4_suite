<html>
  <head>
    <meta charset='latin'/>
    <title>Artistes</title> 
  </head>
  <body>
    <h2>Ajouter un artiste</h2>
    <form method="get" action="1.php">
      Nom:
      <br>
      <input type="text" name="nom">
      <br>
      Prenom:
      <br>
      <input type="text" name="prenom">
      <br>
      Annee de Naissance:
      <br>
      <input type="text" name="annee">
      <br>
      <input type="submit" name="Envoyer"/>
      <?php
        if(isset($_GET)){
          extract($_GET);
          $link = mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
          if(!$link) die("pb");
          else{
            $resultat=mysqli_query($link,"Insert into Artiste(nom,prenom,anneeNaiss) values ('".$nom."','".$prenom."','".$annee."');");
            if($resultat)
              echo"Insertion reussie";
            else
              echo"Echec";
          }
        } 
      ?>
    </form>
     <h2>
       Artistes
      </h2>
      <table>
        <thead>
          <tr>
            <th>Artiste</th>
            <th>Annee de naissance</th>
          </tr>
        </thead>
        <?php
          $resultat=mysqli_query($link,"SELECT nom,prenom,anneeNaiss FROM Artiste");

          if($resultat){
            foreach($resultat as $artiste){
              echo"<tr>";
              echo"<td>".$artiste['nom']." ".$artiste['prenom']."</td>";
              echo"<td>".$artiste['anneeNaiss']."</td>";
              echo"</tr>";
            }
          }
        else
          die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
         ?>
    </table>
  </body>
</html>