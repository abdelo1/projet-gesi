<?php
  include ("header.php");
  require("functions/functions.php");
  error_reporting(0);
  $today=new DateTime('');
  $today =$today->format('F d,Y');
  $today=new DateTime($today);
  $pdo=init_bdd();
  // recuupere tous les matchs qui n'ont pas encore ete joue
  $result=$pdo->query("SELECT * from programme WHERE scoreequipe1='NULL'");
  //recupere les match qui viennent d'etre joue 
  $result1=$pdo->query("SELECT * from programme WHERE scoreequipe1 NOT LIKE 'NULL' ORDER BY id DESC LIMIT 10");
  //recupere les deux derniers articles
  $result3=$pdo->query("SELECT * from article ORDER BY id DESC LIMIT 6 ");
  $data=$result->fetchAll(PDO::FETCH_OBJ);
  $data1=$result1->fetchAll(PDO::FETCH_OBJ);
  $data2=$result3->fetchAll(PDO::FETCH_OBJ);

  // recupere la date du premier match du tableau
  $date_compared=new DateTime($data[0]->ddm);
  //recupere l,interval de jours entre la date d'aujourd'hui et celle du premier match du tableau
  //et la convertit en int
  $minterval = $today->diff($date_compared);
  $minterval=(int)$minterval->format('%R%a days');
  //recupere ls infos du premier match
  $img_equipe=$data[0]->photoequipe1."-".$data[0]->photoequipe2;
  $equipes=$data[0]->equipe1."-".$data[0]->equipe2;
  $dhm=$data[0]->ddm." ".$data[0]->hdm;
  $cat_match=$data[0]->categorie;
  $id=$data[0]->id;
//parcours le tableau pour recuperer le match le plus recent a jouer

  foreach($data as $value)
  {
    $date_compared=new DateTime($value->ddm);
    $interval = $today->diff($date_compared);
    $interval=(int)$interval->format('%R%a days');
    if($interval==0)
    {
      $minterval=$interval;
      $img_equipe=$value->photoequipe1."-".$value->photoequipe2;
      $equipes=$value->equipe1."-".$value->equipe2;
      $dhm=$value->ddm." ".$value->hdm;
      $cat_match=$value->categorie;
      $id=$value->id;
      break;
    }
    else if($minterval>$interval&&$interval>0)
    {
      $minterval=$interval;
      $img_equipe=$value->photoequipe1."-".$value->photoequipe2;
      $equipes=$value->equipe1."-".$value->equipe2;
      $dhm=$value->ddm." ".$value->hdm;
      $cat_match=$value->categorie;
      $id=$value->id;
    }
         
  }

  $img_equipe1=explode("-",$img_equipe)[0];
  $img_equipe2=explode("-",$img_equipe)[1];
  $equipe1=explode("-",$equipes)[0];
  $equipe2=explode("-",$equipes)[1];

// parcours le tableau contenant les matchs deja joue
$euroArray=[];
$coupeArray=[];
  foreach($data1 as $value)
  {
    if($value->categorie=="Euro")
     array_push($euroArray,$value);
    else
      array_push($coupeArray,$value);
         
  }


?>
<div class="maskAll"> </div><!--d-flex flex-colum justify-content-md-start justify-content-center   align-items-center -->
<div class="cover ">
 
  <div class="slider">
    <div class="mask"></div>

    <div class="slides item-1">
        <div class="welcome animated fadeInUp d-md-block d-none ml-5">
          <p class="p-responsive">ALLEZ LES BLEUS.</p> <p style="margin-top:-1rem;margin-left:2rem">REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom voirpluscover"> VOIR PLUS >></a>
        </div>
        <div class="welcome animated fadeInUp d-md-none d-block">
          <p class="text-center">ALLEZ LES BLEUS. REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom voirpluscover"> VOIR PLUS >></a>
        </div>
        <div  class="arrow d-flex flex-row  justify-content-around">
          <a  href="#" class="icon-arrow-left prev"></a>
          <a  href="#" class="icon-arrow-right ml-5 next"></a>
        </div>
    </div>
    <div class="slides item-2">
    <div class="welcome d-md-block d-none ml-5">
          <p class="p-responsive">ALLEZ LES BLEUS.</p> <p style="margin-top:-1rem;margin-left:2rem">REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom voirpluscover"> VOIR PLUS >></a>
        </div>
        <div class="welcome d-md-none d-block">
          <p class="text-center">ALLEZ LES BLEUS. REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom voirpluscover"> VOIR PLUS >></a>
        </div>
        <div  class="arrow d-flex flex-row justify-content-around">
          <a  href="#" class="icon-arrow-left prev"></a>
          <a  href="#" class="icon-arrow-right ml-5 next"></a>
        </div>
    </div>
    <div class="slides item-3">
       <div class="welcome d-md-block d-none ml-5">
          <p class="p-responsive">ALLEZ LES BLEUS.</p> <p style="margin-top:-1rem;margin-left:2rem">REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom voirpluscover"> VOIR PLUS >></a>
        </div>
        <div class="welcome d-md-none d-block">
          <p class="text-center">ALLEZ LES BLEUS. REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom voirpluscover"> VOIR PLUS >></a>
        </div>
        <div  class="arrow d-flex flex-row  justify-content-around">
          <a  href="#" class="icon-arrow-left prev"></a>
          <a  href="#" class="icon-arrow-right ml-5 next"></a>
        </div>
    </div>

   </div> 
</div>

  <div style="margin-top:-20px;margin-bottom:10px;z-index:5;" class="div-entrance col-12 d-flex flex-column flex-md-row align-items-center justify-content-center ">
   <?php $i=0;?>
   <?php foreach ($data2 as $value): ?>
    <?php if($i==3)break;?>
   <div style="width: 360px;height: 400px;transition: 0.5s;position:relative;" class="entrance mt-3 mt-md-0 ml-4">
      <img style="width:100%;height:100%;top:0;left:0;bottom:0" src="<?=$value->photo?>" class=" position-absolute" alt="">
      <div style="width:100%;height:100%;top:0;left:0;bottom:0" class="info position-absolute p-3 d-flex flex-column justify-content-center">   
          <h5 class=" titre font-weight-bold text-white"><?=$value->titre?></h5>
          <p class="accroche text-white mt-3">
            <?= reduce($value->contenu)?>
          </p>
          <p class="text-muted date mt-2">Poste le <?= format_date($value->ddp)?></p>
        <div>
          <a href="article.php?id=<?= $value->id ?>" class="btn_custom mt-5"> VOIR PLUS >></a>
        </div> 
      </div>
    </div>
    <?php $i++;?>
  <?php endforeach; ?>
  </div>
  <section id="section" class="p-5 first_section">
      <div class=" countdown p-3 row w-60">
         <div class="d-flex  flex-column col-md-5">
           <p class="text-muted prochainm" data-dhm="<?= $dhm ?>">Prochain match dans :</p>
           <div class="d-flex flex-row col-12 justify-content-md-start justify-content-center" > 
             
             <p  id="jours"></p>
             <p  id="heures"></p>
             <p  id="minutes"></p>
             <p   id="secondes"></p>
             <p class="text-dark font-weight-bold timeup">Jour de match !!</p>
            </div> 
         </div>
          <div class="versus col-md-6 d-flex flex-column  justify-content-center align-items-center">
           <div class="d-flex flex-column flex-md-row justify-content-center align-items-center">
            <img src="<?=  $img_equipe1 ;?>"  alt="">
            <span class="ml-2 mt-4"><?=  $equipe1 ;?></span>
            <span class=" text-muted ml-2 mt-4">VS </span>
            <span class=" ml-2 mt-4"><?= $equipe2 ;?></span>
            <img src="<?=  $img_equipe2 ;?>" class="ml-2"  alt="">
         
           </div>  
          
            <div class=" text-center ">
             <p class="text-dark  "><?= $cat_match?> <a style="" href="" class="icon-trophy"></a></p>
            </div>
           </div>
      </div>
      <div class="last_match w-100  mt-5 ">
         <p class="text-dark">Recemment joue</p>
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
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white"><?=$value->scoreequipe1?></span>
                    <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                    <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> <?=$value->scoreequipe2?></span>
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
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white"><?=$value->scoreequipe1?></span>
                    <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                    <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> <?=$value->scoreequipe2?></span>
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
      <div style="margin-top:160px" class="last_news  w-100">
        <h3 style="color:black" class="text-center derniereminute ">Dernieres minutes</h3>
        <div style="margin-top:70px" class="row d-flex flex-md-row flex-column flex-wrap justify-content-around ">
          <?php $i=0;?>
          <?php foreach ($data2 as $value): ?>
            <?php if($i>=3):?>
              <div class="carte card mt-3 mt-md-0">
                <div class="carte-head">
                <img src="<?=$value->photo?>" alt="">
                </div>
                <div class="carte-body p-3 ">
                  <h5 style="color:gray" class="font-weight-bold "><?=$value->titre?> </h5>
                  <p style="line-height:30px;color:black" class=" mt-3">
                   <?= reduce($value->contenu)?>
                  </p>
                  <a href="article.php?id=<?=$value->id?>" class="btn_custom mt-4">Lire l'article >></a>
                </div>
              </div>
            <?php endif;?>
            <?php $i++;?>
          <?php endforeach;?>
        </div>
      </div>
      
      </div>
  </section>
  <div class="programme-div">
    <img src="ressources/matchavenir.png" alt="">
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
<?php
  include ("footer.php");
?>