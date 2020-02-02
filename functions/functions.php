<?php
 $pdo=null;
function post_article(){
    global $pdo;
    $pdo=init_bdd();
   extract($_POST);
   $date=new DateTime();
   $date=$date->format('d-m-Y h:i:s');
    $validation = true;
    $erreurs = [];
    
    if(empty($titre) || empty($contenu)) {
        $validation = false;
        $erreurs[] = "Tous les champs sont obligatoires";
    }
    if(!isset($_FILES["file"]) OR $_FILES["file"]["error"] > 0) {
        $validation = false;
        $erreurs[] = "Il faut indiquer un fichier";
    }
    
    if($validation) {
        $image = basename($_FILES["file"]["name"]);
        
        move_uploaded_file($_FILES["file"]["tmp_name"], '../ressources/'. $image);
        
        $query=$pdo->prepare("INSERT INTO article VALUES(?,?,?,?,?)");
        $result= $query->execute([
             null,
             htmlentities( $titre),
             htmlentities(nl2br($contenu)),
             $date, 
             htmlentities('ressources/'.$image) 
         ]);
         if(!$result)
    
           $erreurs[]= "Votre article n'a pas ete poste veuillez reessayer !" ;
        
     
    }
    
    return $erreurs;
}
function post_match() {
    global $pdo;
    $pdo=init_bdd();
   extract($_POST);
    $validation = true;
    $erreurs = [];

    if(!isset($_FILES["photoequipe1"])OR!isset($_FILES["photoequipe2"]) OR $_FILES["photoequipe1"]["error"] > 0 OR $_FILES["photoequipe2"]["error"] > 0) {
        $validation = false;
        $erreurs[] = "Il faut indiquer un fichier";
    }
    
    if($validation) {
        $image1 = basename($_FILES["photoequipe1"]["name"]);
        $image2 = basename($_FILES["photoequipe2"]["name"]);
        
        move_uploaded_file($_FILES["photoequipe1"]["tmp_name"], '../ressources/'. $image1);
        move_uploaded_file($_FILES["photoequipe2"]["tmp_name"], '../ressources/'. $image2);
        extract($_POST);
      $query=$pdo->prepare("INSERT INTO programme VALUES(?,?,?,?,?,?,?,?,?,?)");
     $result=  $query->execute([
          null,
          htmlentities($ddm) ,
          htmlentities($hdm) ,
          htmlentities($categorie),
          htmlentities($equipe1),
          htmlentities($equipe2),
          htmlentities($scoreequipe1),
          htmlentities($scoreequipe2),
          htmlentities('ressources/'.$image1),
          htmlentities('ressources/'.$image2)
      ]);
      $erreurs =null;
      if(!$result)
      {
        $erreurs= "Le match n'a pas ete insere veuillez reessayer !" ;
      }
    }
    
    return $erreurs;
}
function format_date(string $d):string{
 $split=explode(" ",$d);
 $date=$split[0];
 $heure=$split[1];
 $j=explode("-",$date)[0];
 $m=explode("-",$date)[1];
 $a=explode("-",$date)[2];
 $h=explode(":",$heure)[0];
 $min=explode(":",$heure)[1];

 $mois=[" ","janvier","fevrier","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","decembre"];
 return "{$j} {$mois[(int)$m]} {$a} a {$h}h$min" ;
}
function reduce(string $str):string{
 if(strlen($str)>50)
  return substr($str,0,50)."...";
}
function init_bdd ():PDO{
   global $pdo;
    try{
         $pdo=new PDO("mysql:host=localhost;dbname=equipe","root","");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        
        die("erreur {$e->getMessage()}");
    }
    return $pdo;
}
?>