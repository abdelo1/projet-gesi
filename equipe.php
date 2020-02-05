<?php
  include ("header.php");
  require("functions/functions.php");
  error_reporting(0);
  $pdo=init_bdd();
  $query=$pdo->query("SELECT * from  titulaire");
  $query1=$pdo->query("SELECT * from article ORDER BY id DESC LIMIT 2,3 ");
  $result1=$query1->fetchAll(PDO::FETCH_OBJ);

  $erreurpasdejoueur=null;
  $erreurpasarticles=null;
  if(!$result1)
  {
    $erreurpasarticles="Aucun article pour l'instant";
  }

   if($result=$query->fetchAll(PDO::FETCH_OBJ))
   {
     $attaquants=[];
     $milieux=[];
     $defenseur=[];
     $gardien=[];
     $coach=[];
       
      foreach($result as $value)
      {
        if(strtolower($value->poste) =="attaquant")
          array_push($attaquants,$value);
        else if (strtolower($value->poste)=="milieux de terrain" || strtolower($value->poste)=="milieux")
          array_push($milieux,$value);
        else if (strtolower($value->poste)=="defenseur")
          array_push($defenseur,$value);
        else if(strtolower($value->poste)=="gardien")
          array_push($gardien,$value);
        if(strtolower($value->poste)=="entraineur")
          array_push($coach,$value);
      }
   }
   else{
      $erreurpasdejoueur="Il n'ya aucun joueur dans l'equipe !";
   }
   
?>
<div class=" container-all ">
   <div style="width:65%;background-color: #f8f9fa; " class=" p-2 m-2 container-joueur">
     <?php  if (isset($erreurpasdejoueur)):?>
        <h3 class="text-center text-muted"><?=$erreur ?></h3>
      <?php endif ;?>
       <h5 style=" background-color: black;" class="w-100  p-1 text-white" >ATTAQUANTS</h5>
       <div class="attaquant w-100 d-flex flex-row flex-wrap">
          <?php foreach ($attaquants as $value):?>
            <div  class="d-flex attaquant-inner ml-1 flex-column align-items-start">
              <img class="" src="<?= $value->photo?>" width="200px" height="150px" alt="">
              <div style=" background-color:#185e8f;" class="w-100 p-1">
                <p style="font-size:0.7rem" class="text-white font-weight-bold"><?= $value->nom?></p>
                <p style="font-size:0.7rem" class="text-white">Ne le <?= $value->ddn?></p>
                <p style="font-size:0.7rem"class="text-white">A <?= $value->ldn?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->club?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->poste?></p>       
              </div>
            
            </div>
          <?php endforeach;?>
       </div>
       <h5 style=" background-color:black;" class="w-100 mt-1 p-1 text-white" >MILIEUX</h5>
       <div class="milieux w-100 d-flex flex-row flex-wrap">
          <?php foreach ($milieux as $value):?>
            <div  class="d-flex attaquant-inner ml-1 flex-column align-items-start">
              <img class="" src="<?= $value->photo?>" width="200px" height="150px" alt="">
              <div style=" background-color:#185e8f;" class="w-100 p-1">
                <p style="font-size:0.7rem" class="text-white font-weight-bold"><?= $value->nom?></p>
                <p style="font-size:0.7rem" class="text-white">Ne le <?= $value->ddn?></p>
                <p style="font-size:0.7rem"class="text-white">A <?= $value->ldn?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->club?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->poste?></p>       
              </div>
            
            </div>
          <?php endforeach;?>
       </div>
       <h5 style=" background-color: black;" class="w-100 mt-1 p-1 text-white" >DEFENSEURS</h5>
       <div class="attaquant w-100 d-flex flex-row flex-wrap">
          <?php foreach ($defenseur as $value):?>
            <div  class="d-flex attaquant-inner ml-1 flex-column align-items-start">
              <img class="" src="<?= $value->photo?>" width="200px" height="150px" alt="">
              <div style=" background-color:#185e8f;" class="w-100 p-1">
                <p style="font-size:0.7rem" class="text-white font-weight-bold"><?= $value->nom?></p>
                <p style="font-size:0.7rem" class="text-white">Ne le <?= $value->ddn?></p>
                <p style="font-size:0.7rem"class="text-white">A <?= $value->ldn?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->club?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->poste?></p>       
              </div>
            
            </div>
          <?php endforeach;?>
       </div>
       <h5 style=" background-color:black;" class="w-100 mt-1 p-1 text-white" >GARDIEN</h5>
       <div class="attaquant w-100 d-flex flex-row flex-wrap">
          <?php foreach ($gardien as $value):?>
            <div  class="d-flex attaquant-inner ml-1 flex-column align-items-start">
              <img class="" width="200px" height="150px" src="<?= $value->photo?>" alt="">
              <div style=" background-color:#185e8f;" class="w-100 p-1">
                <p style="font-size:0.7rem" class="text-white font-weight-bold"><?= $value->nom?></p>
                <p style="font-size:0.7rem" class="text-white">Ne le <?= $value->ddn?></p>
                <p style="font-size:0.7rem"class="text-white">A <?= $value->ldn?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->club?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->poste?></p>       
              </div>
            
            </div>
          <?php endforeach;?>
       </div>
       <h5 style=" background-color: black;" class="w-100 mt-1 p-1 text-white" >ENTRAINEUR</h5>
       <div class="attaquant w-100 d-flex flex-row flex-wrap">
          <?php foreach ($coach as $value):?>
            <div  class="d-flex attaquant-inner ml-1 flex-column align-items-start">
              <img class="" width="200px" height="150px" src="<?= $value->photo?>" alt="">
              <div style=" background-color:#185e8f;" class="w-100 p-1">
                <p style="font-size:0.7rem" class="text-white font-weight-bold"><?= $value->nom?></p>
                <p style="font-size:0.7rem" class="text-white">Ne le <?= $value->ddn?></p>
                <p style="font-size:0.7rem"class="text-white">A <?= $value->ldn?></p>
                <p style="font-size:0.7rem"class="text-white"><?= $value->poste?></p>       
              </div>
            
            </div>
          <?php endforeach;?>
       </div>
   </div>
   <div style="width:30%;" class="aside mt-3 ">
    <div><h5 style=" background-color:#185e8f; font-weight-bold" class="text-white p-1">VOIR AUSSI</h5></div>
    <?php  if(isset($erreurpasarticles)):?>
        <h3 class="text-muted"><?=$erreurpasarticles?></h3>
    <?php endif; ?>
    <?php foreach ($result1 as $value):?>
     <div class="w-100 mt-3"> 
        <a style="color: #185e8f" href="article.php?id=<?=$value->id?>" class=" d-flex flex-row justify-content-between">
        <img src="<?= $value->photo?>" class="w-40" width="134px" alt="">
        <div class="d-flex flex-column w-50 ">
         
            <p style="font-size:12px" >EQUIPE DE FRANCE</p>
            <p style="font-size:14px;margin-top:-12px" ><?= $value->titre?></p>
            <p style="font-size:14px;margin-top:-12px"><?= reduce($value->contenu) ?></p>
         
        </div>
       </a>
      </div>
    <?php endforeach;?>
  </div>
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