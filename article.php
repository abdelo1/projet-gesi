<?php
include ("header.php");
require("functions/functions.php");

if (!isset($_GET['id']))
{ header("location:page404.php");
   
}
else
{
   extract($_GET);
    $pdo=init_bdd();
    $result=$pdo->query("SELECT * from article WHERE id={$id}");
    $data=$result->fetch(PDO::FETCH_OBJ);
    if(!$data)
    {
        $erreurarticle="Cet artice n'existe pas";
    }

}

?>
<div class="container w-100 p-5 d-flex flex-column flex-md-row justify-content-center ">
  <?php if(!empty($erreurarticle)):?>

  <div class="row">
    <div class="col-sm-12">
        <div class="alert alert-danger"><?= $erreurarticle ?></div>
    </div>
  </div>

  <?php else :?>
  <div class="photo-article bg-success">
     <img style="border-radius:12px"  class="" src="<?=$data->photo?>" alt="<?= explode("/",$data->photo)[1]?>">
  </div>
  <div class="contenu-article  d-flex flex-column justify-content-around">
    <span class="ddp-article text-muted"> Poste le <i><?= format_date($data->ddp)?></i> </span>  
    <p class="titre-article font-weight-bold">  <?= $data->titre?></p>
    <p class="text-article"><?=$data->contenu?> </p>
  </div>
  <?php endif;?> 
</div>
<?php
include ("footer.php");
?>
