<?php
include ("../header.php");
require("../functions/functions.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
  {
  
      $erreurs=post_joueur();
      $success=null;    
      if(empty($erreurs))
       $success="Le joueur a bien ete integre";
  }
  ?>
  <div class="container p-3  d-flex justify-content-center mb-2">


 <form action="post_joueur.php" method="post" class="col-6" enctype="multipart/form-data">
     
 <?php if(!empty($erreurs)):?>
    <?php foreach($erreurs as $erreur):?>
      <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-danger"><p><?= $erreur ?></p> </div>
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
    <h1 class="h3 mb-3 font-weight-normal text-center">Insertion de joueur</h1>

    <input type="text" name="nom" class="form-control mt-2" placeholder="Nom"  required autofocus>

    <input type="text" name="ddn"  class="form-control mt-2" placeholder="Date de naissance"   required>
    
    
    <input type="text" name="ldn" class="form-control mt-2" placeholder="Lieu de naissance"  required>
  
    <input type="text" name="club" class="form-control mt-2" placeholder="Club actuelle du joueur"   required>

    <input type="text" name="poste"  class="form-control mt-2" placeholder="Poste du joueur"   required>

    <input type="file" name="photo"  class="form-control mt-2"  placeholder="Photo du joueur"   required>
   
    <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Inserer le joueur</button>

    </form>
</div>