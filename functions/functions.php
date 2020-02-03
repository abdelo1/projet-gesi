<?php
 $pdo=null;
function post_article(){
    global $pdo;
    $pdo=init_bdd();
   extract($_POST);
   $date=new DateTime();
   $date=$date->format('d-m-Y H:i:s');
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
function modifier_article(){
    global $pdo;
    $pdo=init_bdd();
   extract($_POST);

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
        
        $query=$pdo->prepare("UPDATE article SET titre=?,contenu=?,ddp=?,photo=? WHERE id=?");
        $query->execute(array(
            htmlentities( $titre),
            htmlentities(nl2br($contenu)),
            $date, 
            htmlentities('ressources/'.$image) ,
            $id
        ));
      if(!$query)
      {
          $erreurs[]= "L'article n'a pas ete modifie veuillez reessayer !" ;
      }
           
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
function modifier_match() {
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
        $query=$pdo->prepare("UPDATE programme SET ddm=?,hdm=?,categorie=?,equipe1=?,equipe2=?,scoreequipe1=?,scoreequipe2=?,photoequipe1=?,photoequipe2=? WHERE id=?");
       $result=  $query->execute([
          htmlentities($ddm) ,
          htmlentities($hdm) ,
          htmlentities($categorie),
          htmlentities($equipe1),
          htmlentities($equipe2),
          htmlentities($scoreequipe1),
          htmlentities($scoreequipe2),
          $id
      ]);
      if(!$result)
      {
        $erreurs[]= "Le match n'a pas ete modifier veuillez reessayer !" ;
      }
    }
    
    return $erreurs;
}
function post_joueur() {
    global $pdo;
    $pdo=init_bdd();
   extract($_POST);
    $validation = true;
    $erreurs = [];

    if(!isset($_FILES["photo"])OR $_FILES["photo"]["error"] > 0) {
        $validation = false;
        $erreurs[] = "Il faut indiquer un fichier";
    }
    
    if($validation) {
        $image1 = basename($_FILES["photo"]["name"]);
            
        move_uploaded_file($_FILES["photo"]["tmp_name"], '../ressources/'. $image1);
        extract($_POST);
      $query=$pdo->prepare("INSERT INTO titulaire VALUES(?,?,?,?,?,?,?)");
     $result=  $query->execute([
          null,
          htmlentities($nom) ,
          htmlentities($ddn) ,
          htmlentities($ldn) ,
          htmlentities($club),
          htmlentities('ressources/'.$image1),
          htmlentities($poste)
      ]);
      $erreurs =null;
      if(!$result)
      {
        $erreurs= "Le joueur n'a pas ete insere veuillez reessayer !" ;
      }
    }
    
    return $erreurs;
}
function modifier_joueur() {
    global $pdo;
    $pdo=init_bdd();
   extract($_POST);
    $validation = true;
    $erreurs = [];

    if(!isset($_FILES["photo"])OR $_FILES["photo"]["error"] > 0) {
        $validation = false;
        $erreurs[] = "Il faut indiquer un fichier";
    }
    
    if($validation) {
        $image1 = basename($_FILES["photo"]["name"]);
            
        move_uploaded_file($_FILES["photo"]["tmp_name"], '../ressources/'. $image1);
        extract($_POST);

      $query=$pdo->prepare("UPDATE joueur SET nom=?,ddn=?,ldn=?,club=?,photo=?,poste=? WHERE id=?");
      $result=  $query->execute([
        htmlentities($nom) ,
        htmlentities($ddn) ,
        htmlentities($ldn) ,
        htmlentities($club),
        htmlentities('ressources/'.$image1),
        htmlentities($poste),
         $id
     ]);
      if(!$result)
      {
        $erreurs[]= "Le joueur n'a pas ete modifier veuillez reessayer !" ;
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