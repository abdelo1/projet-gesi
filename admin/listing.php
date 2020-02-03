
<?php
include ("../header.php");

require("../functions/functions.php");
if(isset($_GET['type']))
  {
     $pdo=init_bdd();
      extract($_GET);
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
  ?>
  
<div class="container p-5  ">
<?php if(!empty($include)) include('../page404.php'); ?> 
    <?php if(isset($message)): ?>
      <div class="row">
        <div class="col-sm-12">
            <div class="alert alert-info"><p><?=$message?></p></div>
        </div>
       </div>
    <?php endif; ?>    
    <?php if ($type=='article'):?>
      <div>
      <a style="background-color:#d4d4d4;border-radius:10px;color:black"  title="Ajouter un article" href="post_articles.php?type=article" class="p-3 col-1 mb-3 icon-add"></a>
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
        <div>
      <a style="background-color:#d4d4d4;border-radius:10px;color:black"  title="Ajouter un joueur" href="post_joueur.php" class="p-3 col-1 mb-3 icon-add"></a>
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
   
        <div>
      <a style="background-color:#d4d4d4;border-radius:10px;color:black"  title="Ajouter un match dans le programme" href="post_match.php" class="p-3 col-1 mb-3 icon-add"></a>

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



