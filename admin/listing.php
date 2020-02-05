
<?php
include ("../header.php");

require("../functions/functions.php");
if(isset($_GET['type']))
  {
    $pdo=init_bdd();
    extract($_GET);
    error_reporting(1);
    if(isset($_GET['searchtype']))
    {

      extract($_POST);
      if($searchtype=='article')
      {
        if($by=='id')
        {
            $query1=$pdo->prepare("SELECT * from article WHERE  id = :search  ");
          $query1->execute([
          'search'=> htmlentities($search)
          ]);
          
        $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun article trouve !";
        }
        elseif($by=='titre')
        {
          $query1=$pdo->prepare("SELECT * from article WHERE  titre = :search  ");
          $query1->execute([
           'search'=> htmlentities($search)
          ]);
          
         $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun article trouve !";
        }
        else
        {
          $query1=$pdo->prepare("SELECT * from article WHERE  ddp LIKE :search  ");
          $query1->execute([
           'search'=> '%'.htmlentities($search).'%'
          ]);
          
         $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun article trouve !";
        }
       
      }
      elseif($searchtype=='joueur')
      {
        if($by=='id')
        {
          $query1=$pdo->prepare("SELECT * from titulaire WHERE  id = :search  ");
          $query1->execute([
          'search'=> htmlentities($search)
          ]);
          
        $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun joueur trouve !";
        }
        elseif($by=='nom')
        {
          $query1=$pdo->prepare("SELECT * from titulaire WHERE  nom LIKE :search  ");
         $query1->execute([
          'search'=>'%'. htmlentities($search).'%'
          ]);
          
        $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun joueur trouve !";
        }
        elseif($by=='poste')
        {
          $query1=$pdo->prepare("SELECT * from titulaire WHERE  poste =:search  ");
          $query1->execute([
          'search'=> htmlentities($search)
          ]);
          
        $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun joueur trouve !";
        }
        else{
          $query1=$pdo->prepare("SELECT * from titulaire WHERE  club LIKE :search  ");
          $query1->execute([
          'search'=>'%'. htmlentities($search).'%'
          ]);
          
        $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun joueur trouve !";

        }

      }
      elseif($searchtype=='match')
      {
        if($by=='id')
        {
          $query1=$pdo->prepare("SELECT * from programme WHERE id = :search  ");
          $query1->execute([
           'search'=> htmlentities($search)
          ]);
          
         $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun match trouve !";
        }
        elseif ($by=='nom') {
          $query1=$pdo->prepare("SELECT * from programme WHERE equipe1 LIKE :search OR equipe2 LIKE :search");
           $query1->execute([
           'search'=>'%'. htmlentities($search).'%'
          ]);
          
         $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun match trouve !";
        }
        elseif ($by=='ddm') {
          $query1=$pdo->prepare("SELECT * from programme WHERE ddm =:search");
          $query1->execute([
           'search'=> htmlentities($search)
          ]);
          
         $result1= $query1->fetchAll(PDO::FETCH_OBJ);
          if(!$result1)
            $message="Aucun match trouve !";
        }
      }
     else {
        $include=true;
      }
    }
    else{

      if($type=='article')
      {
        $query1=$pdo->query("SELECT * from article ORDER BY ddp ASC");
        $result1=$query1->fetchAll(PDO::FETCH_OBJ);
        if(!$result1)
        $message="Aucun article poste !";
      }
      elseif($type=='joueur')
      {
        $query1=$pdo->query("SELECT * from titulaire ORDER BY nom ASC");
        $result1=$query1->fetchAll(PDO::FETCH_OBJ);
        if(!$result1)
        $message="Aucun  joueur dans l'equipe!";
      }
      elseif($type=='match')
      {
        $query1=$pdo->query("SELECT * from programme ORDER BY ddm DESC");
        $result1=$query1->fetchAll(PDO::FETCH_OBJ);
        if(!$result1)
        $message="Aucun match dans le programme !";
      }
     else {
        $include=true;
      }
    }
    
    
  }
  ?>
  
<div class="container p-5  ">
<?php if(!empty($include)) include('../page404.php'); ?> 
     
    <?php if ($type=='article'):?>
    <div class="d-flex flex-row col-12 justify-content-around">
      <div class="mt-1">
        <a style="background-color:#d4d4d4;border-radius:10px;color:black"  title="Ajouter un article" href="post_articles.php" class="p-3 col-1 mb-3 icon-add"></a>
      </div> 
      <div class="col-12 d-flex flex-row  justify-content-around">
          <form action="listing.php?searchtype=article&type=article" class="col-7" method="post">
              <div class="input-group mb-3 row">
              <input type="text" class="form-control border-secondary " name="search" placeholder="Chercher un article par ----> " required>
              <select name="by"  class="browser-default custom-select"required>
                <option selected  value="id">id</option>
                <option   value="titre">Titre</option>
                <option   value="ddp">Date de publication</option>
              </select>
              <div class="input-group-append">
                  <button class="btn btn-dark" type="submit" id="button-addon2">OK</button>
              </div>
              </div>
          </form>
   
      </div>
    </div>
      
        <table class="table mt-4">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Titre</th>
                <th scope="col">Date et heure de publication</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody> 
         
            <?php if(isset($message)): ?>
              <tr >
              <td colspan="4">
              <div class="row">
                <div class="col-sm-12">
                   <p class="text-muted text-center"><?=$message?></p>
                </div>
                </div>
              </td>
            </tr>
              <?php endif; ?>   
                <?php foreach($result1 as $value):?>
                    <tr>
                    <td><p><?=$value->id?></p> </td>
                    <td><p><?=$value->titre?></p></td>
                    <td><p><?=format_date($value->ddp)?></p></td>
                    <td class="d-flex flex-row justify-content-center">
                    <a style="background-color:#f23a2e;border-radius:10px;color:white" title="supprimer" href="supprimer.php?type=article&id=<?=$value->id?>" class="p-3 icon-delete"></a>
                    <a style="background-color:#d4d4d4;border-radius:10px;color:white" title="modifier" href="modifier.php?type=article&id=<?=$value->id?>" class="p-3 ml-2 icon-pencil"></a>
                    </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
   <?php endif; ?>
     <?php if ($type=='joueur'):?>
      <div class="d-flex flex-row col-12 justify-content-around">
      <div class="mt-1">
        <a style="background-color:#d4d4d4;border-radius:10px;color:black"  title="Integrer un nouveau joueur" href="post_joueur.php" class="p-3 col-1 mb-3 icon-add"></a>
      </div> 
      <div class="col-12 d-flex flex-row  justify-content-around">
          <form action="listing.php?searchtype=joueur&type=joueur" class="col-7" method="post">
              <div class="input-group row mb-3">
              <input type="text" class="form-control border-secondary " name="search" placeholder="Chercher un joueur par ---> " required>
              <select name="by"  class="browser-default custom-select"required>
                <option selected  value="id">id</option>
                <option   value="nom">Nom</option>
                <option   value="club">Club</option>
                <option   value="poste">Poste</option>
              </select>
              <div class="input-group-append">
                  <button class="btn btn-dark" type="submit" id="button-addon2">OK</button>
              </div>
              </div>
          </form>
   
      </div>
    </div>
        <table class="table mt-4">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Nom</th>
                <th scope="col">Date et lieu de naissance</th>
                <th scope="col">Club</th>
                <th scope="col">Poste</th>
                <th scope="col">Option</th>
                </tr>
            </thead>
            <tbody> 
            <?php if(isset($message)): ?>
              <tr >
              <td colspan="6">
              <div class="row">
                <div class="col-sm-12">
                   <p class="text-muted text-center"><?=$message?></p>
                </div>
                </div>
              </td>
            </tr>
              <?php endif; ?>   
                <?php foreach($result1 as $value):?>
                    <tr>
                    <td><p><?=$value->id?></p> </td>
                    <td><p><?=$value->nom?></p></td>
                    <td><p><?=$value->ddn?> a <?=$value->ldn?></p></td>
                    <td><p><?=$value->club?></p></td>
                    <td><p><?=$value->poste?></p></td>
                    <td class="d-flex flex-row justify-content-center">
                    <a style="background-color:#f23a2e;border-radius:10px;color:white" title="supprimer" href="supprimer.php?type=joueur&id=<?=$value->id?>" class="p-3 icon-delete"></a>
                    <a style="background-color:#d4d4d4;border-radius:10px;color:white" title="modifier" href="modifier.php?type=joueur&id=<?=$value->id?>" class="p-3 ml-2 icon-pencil"></a>
                    </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
     <?php endif; ?>
     <?php if ($type=='match'):?>
   
      <div class="d-flex flex-row col-12 justify-content-around">
          <div class="mt-1">
            <a style="background-color:#d4d4d4;border-radius:10px;color:black"  title="Ajouter un article" href="post_match.php" class="p-3 col-1 mb-3 icon-add"></a>
          </div> 
          <div class="col-12 d-flex flex-row  justify-content-around">
              <form action="listing.php?searchtype=match&type=match" class="col-7" method="post">
                  <div class="input-group mb-3 ">
                  <input type="text" class="form-control border-secondary  " name="search" placeholder="Chercher un match par ---> " required>
                  <select name="by"  class="browser-default custom-select"required>
                    <option selected  value="id">id</option>
                    <option   value="nom">Nom d'une equipe </option>
                    <option   value="ddm">Date du match</option>
                 </select>
                  <div class="input-group-append">
                      <button class="btn btn-dark" type="submit" id="button-addon2">OK</button>
                  </div>
                  </div>
              </form>
           </div>
       </div>
        <table class="table mt-4">
            <thead>
                <tr>
                <th scope="col">Id</th>
                <th scope="col">Equipes</th>
                <th scope="col">Date et heure du match</th>
                <th scope="col">Score du match</th>
                <th scope="col">Categorie</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody> 
            <?php if(isset($message)): ?>
              <tr >
              <td colspan="6" class="p-3">
              <div class="row">
                <div class="col-sm-12">
                   <p class="text-muted text-center"><?=$message?></p>
                </div>
                </div>
              </td>
            </tr>
              </div>
               <?php endif; ?>   
                <?php foreach($result1 as $value):?>
                    <tr>
                    <td><p><?=$value->id?></p> </td>
                    <td><p><?=$value->equipe1?> vs <?=$value->equipe2?></p></td>
                    <td><p><?=$value->ddm?> a <?=$value->hdm?></p></td>
                    <td><p><?=$value->scoreequipe1?> : <?=$value->scoreequipe2?> </p></td>
                    <td><p><?=$value->categorie?></p></td>
                    <td class="d-flex flex-row justify-content-center">
                    <a style="background-color:#f23a2e;border-radius:10px;color:white" title="supprimer" href="supprimer.php?type=match&id=<?=$value->id?>" class="p-3 icon-delete"></a>
                    <a style="background-color:#d4d4d4;border-radius:10px;color:white" title="modifier" href="modifier.php?type=match&id=<?=$value->id?>" class="p-3 ml-2 icon-pencil"></a>
                    </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
     <?php endif; ?>
</div>



