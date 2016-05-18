<html>
  <head>
    <meta charset='latin'/>
    <title>Films</title> 
  </head>
  <body>
    <h2>Ajouter un film</h2>
    <form method="get" action="film.php">
      Nom:
        <br>
        <input type="text" name="nom">
        <br>
      Genre:
        <br>
        <select name="genre">
          <?php
          $link = mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
          if(!$link) die("pb");
          $resultat=mysqli_query($link,"SELECT Distinct genre From Film;");
          if($resultat){
            foreach($resultat as $film){
              echo"<option>".$film['genre']."</option>";
            }
          }
          ?>
        </select>
        <br>
      Pays:
        <br>
        <select name="pays">
          <?php
            if(!$link) die("pb");
            $resultat=mysqli_query($link,"SELECT Distinct code From Pays;");
            if($resultat){
              foreach($resultat as $pays){
                echo"<option>".$pays['code']."</option>";
              }
            }
          ?>
        </select>
        <br>
      Realisateur:
      <br>
      <select name="real">
          <?php
            if(!$link) die("pb");
            $resultat=mysqli_query($link,"SELECT Distinct nom,prenom,idMes From Artiste Join Film On(idArtiste=idMes);");
              while($real=mysqli_fetch_object($resultat)){
                echo"<option value=".$real->idMes.">".$real->nom." ".$real->prenom."</option>";
              }
          ?>
        </select>
      <br>
      Resume:
      <br>
      <textarea rows="5" cols="50" name="resume"></textarea>
      <br>
      Annee:
      <br>
      <input type="text" name="annee">
      <br>
      <input type="submit" name="Envoyer"/>
    </form>
     <h2>
       Films
      </h2>
      <table>
        <thead>
          <tr>
            <th>Titre</th>
            <th>Genre</th>
          </tr>
        </thead>
        <?php
          $resultat=mysqli_query($link,"SELECT titre,genre FROM Film");

          if($resultat){
            foreach($resultat as $film){
              echo"<tr>";
              echo"<td>".$film['titre']."</td>";
              echo"<td>".$film['genre']."</td>";
              echo"</tr>";
            }
          }
        else
          die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
         ?>
    </table>
  </body>
</html>