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

}

?>
<div class="container w-100 p-5 d-flex flex-column flex-md-row justify-content-center ">
  <div class="photo-article bg-success">
     <img class="" src="<?=$data->photo?>" alt="<?= explode("/",$data->photo)[1]?>">
  </div>
  <div class="contenu-article  d-flex flex-column justify-content-around">
    <span class="ddp-article text-muted"> Poste le <?= format_date($data->ddp)?></span>  
    <p class="titre-article font-weight-bold">  <?= $data->titre?></p>
    <p class="text-article"><?=$data->contenu?> </p>
  </div>
</div>
<?php
include ("footer.php");
?>
