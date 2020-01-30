<?php
$pdo=new PDO("mysql:host=localhost;dbname=equipe","root","");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if(isset($_GET["nom"])&& !empty($_GET["nom"]))
  {
      if(isset($_GET["search"])&& $_GET["search"]==1)
      {
        extract($_GET);
        $req = $pdo->prepare('SELECT * FROM titulaire WHERE nom =:nom ');
        $result=$req->execute([
            'nom' =>  $nom
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
        
       
         $membres = "";
          if($data = $req->fetch())
        {  while($data = $req->fetch()) 
            {
                if(!$membres) {
                    $membres = '<p class="lien_output" data-poste="'.$data['poste'].'" data-ldn="'.$data['ldn'].'" data-ddn="'.$data['ddn'].'" data-club="'.$data['club'].'"  data-photo="'.$data['photo'].'">' . $data['nom'] . '</p>';
                }
                else {
                    $membres .= '<p class="lien_output" data-poste="'.$data['poste'].'" data-ldn="'.$data['ldn'].'" data-ddn="'.$data['ddn'].'" data-club="'.$data['club'].'"  data-photo="'.$data['photo'].'">' . $data['nom'] . '</p>';
                }
            }
        
            echo $membres; 
        }

      }
      
  }
  