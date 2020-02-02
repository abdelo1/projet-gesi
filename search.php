<?php
require("functions/functions.php");
$pdo=init_bdd();

   if(isset($_GET["nom"])&& !empty($_GET["nom"]))
    {
      if(isset($_GET["search"])&& $_GET["search"]==1)
      {
        extract($_GET);
        $req = $pdo->prepare('SELECT * FROM titulaire WHERE nom LIKE :nom ');
        $result=$req->execute([
            'nom' =>  '%' . $nom. '%'
        ]);
        
            
        $data = $req->fetch();
        if($data)
            {
                $membres=[
            'nom'=>$data['nom'],
            'ddn'=>$data['ddn'],
            'ldn'=>$data['ldn'],
            'club'=>$data['club'],
            'photo'=>$data['photo'],
            'poste'=>$data['poste']

            ];
            echo json_encode($membres);
            }
        
        else
        
        echo"joueur inexistant";
      }
      else
      {
            extract($_GET);
        $req = $pdo->prepare('SELECT * FROM titulaire WHERE nom LIKE :nom ');
        $result=$req->execute([
            'nom' => '%' . $nom. '%'
        ]);

        if($data = $req->fetchAll(PDO::FETCH_OBJ))
        {    
           foreach($data as $value)
            {
                
                   echo '<p class="lien_output" data-poste="'.$value->poste.'" data-ldn="'.$value->ldn.'" data-ddn="'.$value->ddn.'" data-club="'.$value->club.'"  data-photo="'.$value->photo.'">' . $value->nom. '</p>';
            }
        
        }

      }
      
  }
  