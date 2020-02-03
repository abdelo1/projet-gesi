<?php
include ("../header.php");
require("../functions/functions.php");
if($_SERVER["REQUEST_METHOD"]=="POST")
  {
  
      $erreurs=post_match();
      $success=null;    
      if(empty($erreurs))
       $success="Le match a bien ete publie";
  }
  ?>
  <div class="container p-3  d-flex justify-content-center mb-2">


 <form action="post_match.php" method="post" class="col-6" enctype="multipart/form-data">
     
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
    <h1 class="h3 mb-3 font-weight-normal text-center">Insertion de match</h1>

    <input type="text" name="ddm" class="form-control mt-2" placeholder="ddm"  required autofocus>

    <input type="text" name="hdm"  class="form-control mt-2" placeholder="hdm"   required>
    
    
    <input type="text" name="categorie" class="form-control mt-2" placeholder="categorie"  required>
  
    <input type="text" name="equipe1" class="form-control mt-2" placeholder="Nom de l'equipe 1"   required>

    <input type="text" name="equipe2"  class="form-control mt-2" placeholder="Nom de l'equipe 2"   required>
    
    <input type="text" name="scoreequipe1"  class="form-control mt-2" placeholder="Nombre de but equipe 1"  required>


    <input type="text" name="scoreequipe2"  class="form-control mt-2" placeholder="Nombre de but equipe 2"  required>

    <input type="file" name="photoequipe1"  class="form-control mt-2"  placeholder="photoequipe1"   required>

    <input type="file" name="photoequipe2"  class="form-control mt-2"  placeholder="photoequipe2"   required>
   
    <button class="btn btn-lg btn-dark btn-block mt-2" type="submit">Inserer le match</button>

    </form>
</div>