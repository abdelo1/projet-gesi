<?php
include ("../header.php");
require("../functions/functions.php");
if($_SERVER['REQUEST_METHOD']=='GET')
{
  echo'get';
        if(isset($_GET['type'])&&isset($_GET['id']))
    {
        $pdo=init_bdd();
        extract($_GET);
        if($type=='article') 
        {
            $query1=$pdo->query("SELECT * from article WHERE id=$id ");
            $result1=$query1->fetch(PDO::FETCH_OBJ);
            if(!$result1)
            {
                $erreurarticle="Cet artice n'existe pas";
            }
        }
        if($type=='match')    
        {
            $query1=$pdo->query("SELECT * from programme WHERE id=$id ");
            $result1=$query1->fetch(PDO::FETCH_OBJ);
            if(!$result1)
            {
                $erreurarticle="Ce match ne figure pas dans le programme ";
            }
        }
        if($type=='joueur')   
        {
            $query1=$pdo->query("SELECT * from titulaire WHERE id=$id ");
            $result1=$query1->fetch(PDO::FETCH_OBJ);
            if(!$result1)
            {
                $erreurarticle="Ce joueur n'existe pas ";
            }
        }
    }
}

else
{
  extract($_POST);
  extract($_GET);
  if($type=='article')
  {
     $erreurs=modifier_article();
     $success=null;
     if(empty($erreurs))
       $success="L'article a ete modifie avec succes";
  }
  if($type=='match')
  {
     $erreurs=modifier_match();
     $success=null;
     if(empty($erreurs))
       $success="Les details du match ont ete modifie avec succes";
  }

  if($type=='joueur')
  {
     
     $erreurs=modifier_joueur();
     $success=null;
     if(empty($erreurs))
       $success="Les details du joueur ont ete modifie avec succes";
  }
  



}
?>

<div class="container p-3 d-flex justify-content-center">
  <?php if($type=='article'):?>
  <form action="modifier.php?type=article&id=<?= $result1->id ?>" method="post" class="form-signin col-6" enctype="multipart/form-data">
    <img class="mb-4" src="" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal text-center">Modifier l'article</h1>
  
     <?php if(!empty($erreurarticle)):?>

        <div class="row">
          <div class="col-sm-12">
              <div class="alert alert-danger"><?= $erreurarticle ?></div>
          </div>
        </div>
      
    <?php else :?>
      <?php if(!empty($erreurs)):?>
       <?php foreach($erreurs as $erreur):?>
          <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger"><?= $erreur?></div>
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
      <?php if(isset($success)): ?>
        <div class="row">
          <div class="col-sm-12">
              <div class="alert alert-primary"><p><?=$success?></p></div>
          </div>
         </div>
      <?php endif; ?>
      
        <input type="text" value="<?=$result1->titre?>"  name="titre" class="form-control" placeholder="titre"  required autofocus>
        
        <input type="file" value="<?=$result1->photo?>" name="file" id=""  class="form-control  mt-2">
        <textarea name="contenu" id="" cols="30" rows="10" placeholder="contenu" class="form-control  mt-2"><?=$result1->contenu?></textarea>
    
        <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Modifier</button>
      
    <?php endif;?>

  </form>
  <?php endif; ?>
  <?php if($type=='match'):?>
  <form action="modifier.php?type=match&id=<?= $result1->id ?>" method="post" class="form-signin col-6" enctype="multipart/form-data">
    <img class="mb-4" src="" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal text-center">Modifier un match</h1>
  
     <?php if(!empty($erreurarticle)):?>

        <div class="row">
          <div class="col-sm-12">
              <div class="alert alert-danger"><?= $erreurarticle ?></div>
          </div>
        </div>
    <?php else :?>
      <?php if(!empty($erreurs)):?>
       <?php foreach($erreurs as $erreur):?>
          <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger"><?= $erreur?></div>
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
      <?php if(isset($success)): ?>
        <div class="row">
          <div class="col-sm-12">
              <div class="alert alert-primary"><p><?=$success?></p></div>
          </div>
         </div>
      <?php endif; ?>
    
        <input type="text" name="ddm" value="<?=$result1->ddm?>" class="form-control mt-2" placeholder="ddm"  required autofocus>

        <input type="text" name="hdm" value="<?=$result1->hdm?>"  class="form-control mt-2" placeholder="hdm"   required>


        <input type="text" name="categorie" value="<?=$result1->categorie?>" class="form-control mt-2" placeholder="categorie"  required>

        <input type="text" name="equipe1" value="<?=$result1->equipe1?>" class="form-control mt-2" placeholder="Nom de l'equipe 1"   required>

        <input type="text" name="equipe2" value="<?=$result1->equipe2?>" class="form-control mt-2" placeholder="Nom de l'equipe 2"   required>

        <input type="text" name="scoreequipe1" value="<?=$result1->scoreequipe1?>"  class="form-control mt-2" placeholder="Nombre de but equipe 1"  required>


        <input type="text" name="scoreequipe2" value="<?=$result1->scoreequipe2?>" class="form-control mt-2" placeholder="Nombre de but equipe 2"  required>

        <input type="file" name="photoequipe1" value="<?=$result1->photoequipe1?>" class="form-control mt-2"  placeholder="photoequipe1"   required>

        <input type="file" name="photoequipe2" value="<?=$result1->photoequipe2?>" class="form-control mt-2"  placeholder="photoequipe2"   required>

        <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Modifier</button>
      
    <?php endif;?>
    
  </form>
  <?php endif; ?>

  <?php if($type=='joueur'):?>
  <form action="modifier.php?type=joueur&id=<?= $result1->id ?>"  method="post" class=" col-6" enctype="multipart/form-data">
    <img class="mb-4" src="" alt="" width="72" height="72">
    <h1 class="h3 mb-3 font-weight-normal text-center">Modifier les details d'un joueur</h1>
  
     <?php if(!empty($erreurarticle)):?>

        <div class="row">
          <div class="col-sm-12">
              <div class="alert alert-danger"><?= $erreurarticle ?></div>
          </div>
        </div>
    <?php else :?>
      <?php if(!empty($erreurs)):?>
       <?php foreach($erreurs as $erreur):?>
          <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger"><?= $erreur?></div>
            </div>
          </div>
        <?php endforeach;?>
      <?php endif;?>
      <?php if(isset($success)): ?>
        <div class="row">
          <div class="col-sm-12">
              <div class="alert alert-primary"><p><?=$success?></p></div>
          </div>
         </div>
      <?php endif; ?>
    
        <input type="text" name="nom" value="<?=$result1->nom?>" class="form-control mt-2" placeholder="Nom"  required autofocus>

        <input type="text" name="ddn" value="<?=$result1->ddn?>" class="form-control mt-2" placeholder="Date de naissance"   required>


        <input type="text" name="ldn" value="<?=$result1->ldn?>" class="form-control mt-2" placeholder="Lieu de naissance"  required>

        <input type="text" name="club" value="<?=$result1->club?>" class="form-control mt-2" placeholder="Club actuelle du joueur"   required>

        <input type="text" name="poste" value="<?=$result1->poste?>" class="form-control mt-2" placeholder="Poste du joueur"   required>

        <input type="file" name="photo" value="<?=$result1->photo?>" class="form-control mt-2"  placeholder="Photo du joueur"   required>

        <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Modifier</button>

      
    <?php endif;?>
  </form>
  <?php endif; ?>
  </div>
