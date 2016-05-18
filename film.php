<?php
        if(isset($_GET)){
          extract($_GET);
          $link = mysqli_connect("dwarves.iut-fbleau.fr","carlu","ludo1811","carlu");
          if(!$link) die("pb");
          else{
            $resultat=mysqli_query($link,"Insert into Film(titre,annee,idMes,genre,resume,codepays) values ('".$nom."','".$annee."','".$real."','".$genre."','".$resume."','".$pays."');");
            if($resultat)
              echo"Insertion reussie";
            else
              echo"Echec";
          }
        } 
      ?>