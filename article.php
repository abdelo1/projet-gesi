<?php
include_once ("header.php");
require("functions/functions.php");

if (!isset($_GET['id']))
{ 
   include('page404.php');
   die();
}
else
{
   extract($_GET);
   if($id=="")
   {
    include('page404.php');
    die();
   }
   else
   {
  
    $pdo=init_bdd();
    $result=$pdo->query("SELECT * from article WHERE id={$id}");
    $data=$result->fetch(PDO::FETCH_OBJ);
    if(!$data)
    {
      include('page404.php');
      die();
    }
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
<div class="infojoueur-div d-flex flex-column flex-md-row  justify-content-md-between justify-content-center align-items-center">
    <div class="div-img ">
      <img src="" alt="">
    </div>
    <div class="div-info  d-flex flex-column justify-content-center align-items-center">
     <div class="d-flex w-100 flex-row justify-content-around">
       <span class="text-muted">Nom : </span><span class="ml-1 nom"> </span>
     </div> 
     <div class="d-flex w-100 flex-row justify-content-around">
       <span style="margin-left:-20px" class="text-muted">Ne le : </span><span class="ml-1 ddn"> </span>
     </div> 
     <div class="d-flex w-100 flex-row justify-content-around">
       <span  class="text-muted">A : </span><span class="ml-1 ldn"> </span>
     </div> 
     <div class="d-flex w-100 flex-row justify-content-around">
       <span    class="text-muted">Club : </span><span class="ml-1 club"> </span>
     </div> 
     <div class="d-flex w-100 flex-row justify-content-around">
       <span   class="text-muted">Poste: </span><span class="ml-1 poste"> </span>
     </div> 
    </div>
  </div>
  <div class="maskAll"> </div>
<?php
include ("footer.php");
?>
