<?php
  include ("../header.php");
  require("../functions/functions.php");

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
      $erreurs=post_article();
  }

?>

<div class="container p-3 d-flex justify-content-center">
  
<form action="post_articles.php" method="post" class="form-signin col-6" enctype="multipart/form-data">
  <img class="mb-4" src="" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal text-center">Insertion d'articles</h1>

   <?php if(isset($erreurs)):?>
    <?php foreach($erreurs as $erreur):?>
      <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-danger"><?= $erreur ?></div>
        </div>
       </div>
     <?php endforeach;?>
  
   <?php endif;?>
  <input type="text"  name="titre" class="form-control" placeholder="titre"  required autofocus>
  
  <input type="file" name="file" id=""  class="form-control  mt-2">
  <textarea name="contenu" id="" cols="30" rows="10" placeholder="contenu" class="form-control  mt-2"></textarea>
 
  <button class="btn btn-lg btn-primary btn-block mt-2" type="submit">Inserer</button>

</form>
</div>
