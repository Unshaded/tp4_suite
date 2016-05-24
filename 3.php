<html>
  <head>
    <meta charset='latin'/>
    <title>Roles</title> 
  </head>
  <body>
    <h2>Ajouter un Role</h2>
    <form method="get" action="role.php">
      Role:
      <br>
      <input type="text" name="role">
      <br>
      Acteur:
      <br>
      <select name="acteur">
          <?php
            $link = mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
            if(!$link) die("pb");
              $resultat=mysqli_query($link,"SELECT Distinct nom,prenom,idArtiste From Artiste Join Film On(idArtiste != idMes);");
              while($artiste=mysqli_fetch_object($resultat)){
                echo"<option value=".$artiste->idArtiste.">".$artiste->nom." ".$artiste->prenom."</option>";
              }
          ?>
        </select>
      <br>
      Film:
      <br>
      <select name="film">
        <?php
        $resultat=mysqli_query($link,"SELECT titre,idFilm From Film;");
            while($film=mysqli_fetch_object($resultat)){
                echo"<option value=".$film->idFilm.">".$film->titre."</option>";
            }
        ?>
      </select>
      <br>
      <input type="submit" name="Envoyer"/>
    </form>
     <h2>
       Roles
      </h2>
      <table>
        <thead>
          <tr>
            <th>idFilm</th>
            <th>idActeur</th>
            <th>Nom role</th>
          </tr>
        </thead>
        <?php
          $resultat=mysqli_query($link,"SELECT idFilm,idActeur,nomRole FROM Role");

          if($resultat){
            foreach($resultat as $role){
              echo"<tr>";
              echo"<td>".$role['idFilm']."</td>";
              echo"<td>".$role['idActeur']."</td>";
              echo"<td>".$role['nomRole']."</td>";
              echo"</tr>";
            }
          }
        else
          die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
         ?>
    </table>
  </body>
</html>