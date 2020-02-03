
<?php
require("../functions/functions.php");
if(isset($_GET['type'])&&isset($_GET['id']))
  {
     $pdo=init_bdd();
      extract($_GET);
      if($type=='article')
      {
        $query1=$pdo->query("DELETE from article WHERE id=$id ");
    
        if($query1)
        {
          header('location:listing.php?type=article&message=L\'article a ete supprime avec success');
        }
        else
          header('location:listing.php?type=article&message=L\'article n\'a pas ete supprime veuillez reessayer');
      }
      if($type=='joueur')
      {
        $query1=$pdo->query("DELETE from titulaire WHERE id=$id ");
        if($query1)
        {
          header('location:listing.php?type=joueur&message=Le joueur a ete retire avec success');
        }
        else
          header('location:listing.php?type=joueur&message=Le joueur n\'a pas ete retire veuillez reessayer');
      }
      if($type=='match')
      {
        $query1=$pdo->query("DELETE from programme WHERE id=$id ");
        if($query1)
        {
          header('location:listing.php?type=match&message=Le match a ete retire du programme avec success');
        }
        else
          header('location:listing.php?type=match&message=Le match n\'a pa pu etre retire du programme veuillez reessayer');
      }
    
  }
  ?>
  