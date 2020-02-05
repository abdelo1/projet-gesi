<?php
include ("../header.php");
require("../functions/functions.php");
if($_SERVER['REQUEST_METHOD']=='GET')
{

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
        else {
          $include=true;
        }
    }
}

else
{
  extract($_GET);
  $include=null;
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

else {
        $include=true;
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
      <?php if(empty($erreurs) && !isset($success)): ?>
      
            <input type="text" value="<?=$result1->titre?>"  name="titre" class="form-control" placeholder="titre"  required autofocus>
            <div class="mt-2">
              <a href="#" class="btn ajout-article btn-dark btn-md">modifier la photo de l'article</a>
              <input type="file" disabled  name="file" id=""  class="form-control  mt-2">
            </div>
            <textarea name="contenu" id="" cols="30" rows="10" placeholder="contenu" class="form-control  mt-2"><?= str_replace("<br />"," ",$result1->contenu) ?></textarea>
        
            <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Modifier</button>
          
        <?php endif;?>
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
      <?php if(empty($erreurs) && !isset($success)): ?>
        <input type="date" name="ddm" value="<?=$result1->ddm?>" class="form-control mt-2" placeholder="ddm"  required autofocus>

        <input type="text" name="hdm" value="<?=$result1->hdm?>"  class="form-control mt-2" placeholder="hdm"   required>
        <p class="mt-1">Categorie du match :</p>
        <select name="categorie"  class="browser-default custom-select"required>

          <option <?php if(  strtolower($result1->categorie) =='euro') echo 'selected';?>  value="Euro">Euro</option>
          <option <?php if(  strtolower($result1->categorie) =='coupe du monde') echo 'selected';?> value="Coupe du monde">Coupe du monde</option>
        </select>
        <input type="text" name="equipe1" value="<?=$result1->equipe1?>" class="form-control mt-2" placeholder="Nom de l'equipe 1"   required>

        <input type="text" name="equipe2" value="<?=$result1->equipe2?>" class="form-control mt-2" placeholder="Nom de l'equipe 2"   required>

        <input type="text" name="scoreequipe1" value="<?=$result1->scoreequipe1?>"  class="form-control mt-2" placeholder="Nombre de but equipe 1"  required>


        <input type="text" name="scoreequipe2" value="<?=$result1->scoreequipe2?>" class="form-control mt-2" placeholder="Nombre de but equipe 2"  required>
        <div class="mt-2">
            <a href="#" class="btn ajout-equipe1 btn-dark btn-md">modifier le logo de l'equipe 1</a>
          <input type="file" disabled name="photoequipe1" value="<?=$result1->photoequipe1?>" class="form-control mt-2"  placeholder="photoequipe1"   >
        </div>
          <div class="mt-2">
            <a href="#" class="btn ajout-equipe2 btn-dark btn-md">modifier le logo de l'equipe 2</a>
             <input type="file" disabled name="photoequipe2" value="<?=$result1->photoequipe2?>" class="form-control mt-2"  placeholder="photoequipe2"  >
          </div>
        <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Modifier</button>
      <?php endif; ?>
      
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
      <?php if(empty($erreurs) && !isset($success)): ?>
        <input type="text" name="nom" value="<?=$result1->nom?>" class="form-control mt-2" placeholder="Nom"  required autofocus>

        <input type="text" name="ddn" value="<?=$result1->ddn?>" class="form-control mt-2" placeholder="Date de naissance"   required>


        <input type="text" name="ldn" value="<?=$result1->ldn?>" class="form-control mt-2" placeholder="Lieu de naissance"  required>

        <input type="text" name="club" value="<?=$result1->club?>" class="form-control mt-2" placeholder="Club actuelle du joueur"   required>
        <p class="mt-1">Poste du joueur :</p>
        <select name="poste"  class="browser-default custom-select"required>

          <option <?php if(  strtolower($result1->poste) =='defenseur') echo 'selected';?>  value="Defenseur">Defenseur</option>
          <option <?php if(  strtolower($result1->poste) =='attaquant') echo 'selected';?> value="Attaquant">Attaquant</option>
          <option <?php if(  strtolower($result1->poste) =='milieux de terrain') echo 'selected';?> value="Milieux de terrain">Milieux de terrain</option>
          <option <?php if(  strtolower($result1->poste) =='entraineur') echo 'selected';?> value="Entraineur">Entraineur</option>
        </select>

        <div class="mt-2">
          <a href="#" class="btn ajout btn-dark btn-md">modifier la photo du joueur</a>
          <input type="file" disabled name="photo" value="" class="form-control mt-2"  placeholder="Photo du joueur"  >
        </div>
        <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Modifier</button>

        <?php endif;?>
    <?php endif;?>
  </form>
  <?php endif; ?>

  </div>
  <script src="../src/js/jquery-3.4.1.js"></script> 
  <script>
  
  $(function(){
   $('.ajout').click(function(e){
    e.preventDefault();
    if($(this).text()=="modifier la photo du joueur")
    {
      $(this).next($('input:file')).removeAttr('disabled')
      $(this).text("Annuler")
    }
      
    else
    {
       $(this).next($('input:file')).attr('disabled','disabled')
      $(this).text("modifier la photo du joueur")
    }
    
     
   })
   $('.ajout-equipe1').click(function(e){
    e.preventDefault();
    if($(this).text()=="modifier le logo de l'equipe 1")
    {
      $(this).next($('input:file')).removeAttr('disabled')
      $(this).text("Annuler")
    }
      
    else
    {
       $(this).next($('input:file')).attr('disabled','disabled')
      $(this).text("modifier le logo de l'equipe 1")
    }
    
     
   })
   $('.ajout-equipe2').click(function(e){
    e.preventDefault();
    if($(this).text()=="modifier le logo de l'equipe 2")
    {
      $(this).next($('input:file')).removeAttr('disabled')
      $(this).text("Annuler")
    }
      
    else
    {
       $(this).next($('input:file')).attr('disabled','disabled')
      $(this).text("modifier le logo de l'equipe 2")
    }
    
     
   })
   $('.ajout-article').click(function(e){
    e.preventDefault();
    if($(this).text()=="modifier la photo de l'article")
    {
      $(this).next($('input:file')).removeAttr('disabled')
      $(this).text("Annuler")
    }
      
    else
    {
       $(this).next($('input:file')).attr('disabled','disabled')
      $(this).text("modifier la photo de l'article")
    }
    
     
   })
  })
  </script>
  </body>