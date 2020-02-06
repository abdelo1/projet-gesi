<?php
include ("header.php");
require ("functions/functions.php");
error_reporting(0);
$pdo=init_bdd();
$result=$pdo->query("SELECT * from programme WHERE scoreequipe1='NULL'");
$data=$result->fetchAll(PDO::FETCH_OBJ);
$euroArray=[];
$coupeArray=[];
  foreach($data as $value)
  {
    if($value->categorie=="Euro")
     array_push($euroArray,$value);
    else
      array_push($coupeArray,$value);
         
  };
?> 
<div class="container p-5">
      <div class="last_match w-100  mt-5 ">
         <p class="text-dark">Programme des match a venir </p>
         <div class="tab-link w-100">
            <a class="link-tab link-tab_active" href="#">
                 Euro
            </a>
            <a class="link-tab ml-4" href="#">
                Coupe du monde
            </a>
         </div>
         <div class="div_tab euro w-100 mt-4 d-flex flex-column">
           <?php foreach($euroArray as $value):  ?>
            <div class=" mt-2 card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                  <div class="d-flex flex-md-row col-md-4 flex-column  col-12 justify-content-center  justify-content-md-start align-items-center ">
                    <img src="<?=$value->photoequipe1?>"  alt="">
                    <span class="ml-2 mt-4"><?=$value->equipe1?></span>
                  </div>
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-column justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white">VS</span>
                    <span style="font-size:14px" class="score-left text-white mt-1 "><?=convert_date($value->ddm)?></span>
                  </div>
                  <div class="d-flex flex-md-row flex-column justify-content-center col-12  align-items-center justify-content-md-end col-md-4 ">
                    <span class=" ml-2 mt-4"><?=$value->equipe2?></span>
                    <img src="<?=$value->photoequipe2?>" class="ml-2 mt-3 mt-md-0"  alt="">
                  </div>   
                </div>
                
              </div>
           <?php endforeach;?>
           </div>
         <div class="div_tab coupe w-100 mt-4 d-flex flex-column">
           <?php foreach($coupeArray as $value):  ?>
            <div class=" mt-2 card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                  <div class="d-flex flex-md-row flex-column  col-12  justify-content-center  justify-content-md-start align-items-center col-md-4">
                    <img src="<?=$value->photoequipe1?>"  alt="">
                    <span class="ml-2 mt-4"><?=$value->equipe1?></span>
                  </div>
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-column justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white">VS</span>
                    <span style="font-size:14px" class="score-left  text-white mt-1"><?= convert_date($value->ddm)?></span>
                  </div>
                  <div class="d-flex flex-md-row flex-column justify-content-center col-12 align-items-center justify-content-md-end col-md-4">
                    <span class=" ml-2 mt-4"><?=$value->equipe2?></span>
                    <img src="<?=$value->photoequipe2?>" class="ml-2 mt-3 mt-md-0"  alt="">
                  </div>   
                </div>   
              </div>
              <?php endforeach;?>
            </div>
          
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