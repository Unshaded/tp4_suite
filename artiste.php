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