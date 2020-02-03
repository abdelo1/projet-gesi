
<?php

  $title=null;
  if( $_SERVER["SCRIPT_NAME"]=="/projet gesi/index.php")
    $title="Accueil";
  elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/equipe.php")
    $title="Equipe de France" ;
  elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/contact.php")
    $title="Contactez nous" ;
    elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/programme.php")
    $title="Programme des matchs" ;
   elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/admin/post_articles.php")
    $title="Espace Admin|Poster article" ;
  elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/admin/post_match.php")
    $title="Espace Admin|Poster match" ;
  elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/admin/listing.php")
    $title="Espace Admin|Lister tous" ;
  elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/admin/post_joueur.php")
    $title="Espace Admin|Inserer joueur" ;
    elseif ( $_SERVER["SCRIPT_NAME"]=="/projet gesi/admin/modifier.php")
    $title="Espace Admin|Modification" ;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php if ($title=="Espace Admin|Poster article"||$title=="Espace Admin|Poster match"||$title=="Espace Admin|Lister tous"||$title=="Espace Admin|Inserer joueur"||$title=="Espace Admin|Modification"):?>
      <link rel="stylesheet" href="../src/css/style.css">
      <link rel="stylesheet" href="../src/css/bootstrap.min.css">
      <link rel="stylesheet" href="../src/css/owl.theme.default.css">
      <link rel="stylesheet" href="../src/css/owl.carousel.min.css">
      <link rel="stylesheet" href="../src/css/animate.css">
      <link rel="stylesheet" href="../src/css/style-icon.css">
      <link rel="icon" type="image/png" href="../ressources/logo2.png" sizes="32x32">
    <?php else : ?> 
      <link rel="stylesheet" href="src/css/style.css">
      <link rel="stylesheet" href="src/css/bootstrap.min.css">
      <link rel="stylesheet" href="src/css/owl.theme.default.css">
      <link rel="stylesheet" href="src/css/owl.carousel.min.css">
      <link rel="stylesheet" href="src/css/animate.css">
      <link rel="stylesheet" href="src/css/style-icon.css">
      <link rel="icon" type="image/png" href="ressources/logo2.png" sizes="32x32">
    <?php endif ;?>
   
   
    <title><?=$title?></title>
</head>
<style>
.itemdropdown:hover{
    background-color: #1b1a1a!important;
    text-decoration:none!important;
    
}
.menu-dropdown{
  display:none;
}
.dropdown-div:hover >.menu-dropdown{
  display:flex;
  flex-direction: column ;
  justify-content:center;
   align-items:stretch;
   position:absolute;

}


</style>
<body>

  <div class="super-head">
     <div class="head d-flex flex-row col-12 justify-content-between">
        <div class="icon-head-right head col-3  d-flex flex-row justify-content-center align-items-center">
           <a href="#" class="icon-head icon-facebook-square"></a>
           <a href="#" class="icon-head icon-instagram ml-4"></a>
           <a href="#" class="icon-head icon-twitter ml-4"></a>
           <a href="#" class="icon-head  icon-linkedin ml-4"></a>
        </div>
        <?php if($title=="Espace Admin|Poster article"||$title=="Espace Admin|Poster match"||$title=="Espace Admin|Lister tous"||$title=="Espace Admin|Inserer joueur"||$title=="Espace Admin|Modification"):?>
        
        <?php else:?>
          <div class="col-md-4 search_div col-6 d-flex flex-row justify-content-center align-items-center position-relative">
            <input type="text" autocomplete="off" name="search" id="search" class="w-100" placeholder="Rechercher joueur....">
            <a style="color:white;padding:0.8rem 1rem;background-color:black" href="#" class="icon-search"></a>
            <div style="" class=" output d-flex flex-column justify-content-start align-items-stretched">

            </div>
          </div>
        <?php endif;?>
        <div class="head-info col-5 d-none mt-3 d-md-flex flex-row justify-content-end align-items-center">
            <p class="text-muted"> <a href="#" class="icon-head icon-mail_outline mr-3 "></a>Abdeli12.ai@gmail.com</p>
            <p class="text-muted ml-2"> <a href="#" class="icon-head icon-phone_android mr-3 "></a>+241 77 45 20 17</p>
        </div>
        <div class="head-info_mobile d-md-none  col-3 mt-3 d-flex flex-row justify-content-end align-items-center">
            <p class="text-muted"> <a href="#" title="abdeli12.ai@gmail.com" class="icon-head icon-mail_outline mr-3 "></a></p>
            <p class="text-muted ml-2"> <a href="#" class="icon-head icon-phone_android mr-3 "></a></p>
        </div>
    </div>
    <div class="menu col-md-12 d-none d-lg-flex flex-row justify-content-between position-relative">
      <div style="top:-30px;z-index:3" class="logo col-3 justify-content-center d-flex position-absolute">
        <?php if ($title=="Espace Admin|Poster article"||$title=="Espace Admin|Poster match"||$title=="Espace Admin|Lister tous"||$title=="Espace Admin|Inserer joueur"||$title=="Espace Admin|Modification"):?>
        <a href=""><img src="../ressources/logo2.png " width="100px" alt="logo"></a> 
        <?php else:?>
       <a href="index.php"><img src="ressources/logo2.png " width="100px" alt="logo"></a> 
        <?php endif;?>
      </div>
      <?php if ($title=="Espace Admin|Poster article"||$title=="Espace Admin|Poster match"||$title=="Espace Admin|Lister tous"||$title=="Espace Admin|Inserer joueur"||$title=="Espace Admin|Modification"):?>
        <div class="link-menu col-6 d-flex flex-row ml-auto justify-content-center align-items-center">
          <a href="post_articles.php" class="lien <?php if($title=="Espace Admin|Poster article") echo"active";?>">Inserer article</a>
          <a href="post_match.php" class="lien  <?php if($title=="Espace Admin|Poster match") echo"active";?>">Inserer match</a>
          <a href="post_joueur.php" class="lien  <?php if($title=="Espace Admin|Inserer joueur") echo"active";?>">Inserer joueur</a>
          <div class=" dropdown-div position-relative">
            <p  class="lien  <?php if($title=="Espace Admin|Lister tous") echo"active";?>">Lister</p>
              <div style="width:200px;height:150px;background-color:black;left:-130px;top:37px;" class="p-1 menu-dropdown ">
                <a style="color: white;" href="listing.php?type=article" class="p-2 itemdropdown">Lister les articles</a>
                <a style="color: white; margin-top: 10px;" href="listing.php?type=match" class="p-2 itemdropdown">Lister les matchs</a>
                <a style="color: white; margin-top: 10px;" href="listing.php?type=joueur" class="p-2 itemdropdown">Lister les joueurs</a>
              </div>
          </div>
        
        </div>
      <?php else :?>
        <div class="link-menu col-6 d-flex flex-row ml-auto justify-content-center align-items-center">
          <a href="index.php" class="lien <?php if($title=="Accueil") echo"active";?>">Accueil</a>
          <a href="programme.php"  class="lien <?php if($title=="Programme des matchs") echo"active";?>">Programme</a>
          <a href="equipe.php" class="lien  <?php if($title=="Equipe de France") echo"active";?>">Equipe</a>
          <!-- <a href="#" class="lien">Informations </a> -->
          <a href="contact.php" class="lien  <?php if($title=="Contactez nous") echo"active";?>">Contact</a>
        </div>
      <?php endif ;?>
    </div>
  </div>
  <?php if($title=="Espace Admin|Poster article"||$title=="Espace Admin|Poster match"||$title=="Espace Admin|Lister tous"||$title=="Espace Admin|Inserer joueur"||$title=="Espace Admin|Modification"):?>
        
        <?php else:?>
   
  <div class="menu_mobile d-lg-none col-md-12 d-flex flex-row position-relative">
      <div style="top:-30px;z-index:3" class="logo col-3 justify-content-center d-flex position-absolute">
          <img src="ressources/logo2.png" width="100px" alt="logo">
      </div>
      <div class="ml-auto ">
      <a style="font-size:30px;color:white; font-weight:bold"  class="icon-menu mt-2 hamburger" href="#"></a>
      </div>
     
    <div class=" canvas bg-light ">
        <div  class="header_canvas mt-3 d-flex flex-column">
          <div class="col-12 d-flex flex-row justify-content-between ">
            <div style="height:40px" class="logo_canvas col-4">
             <img src="ressources/logo2.png" width="85px" alt="logo">
           </div>
           <div style="height:40px" class="icon_clos mt-3">
               <a style="font-size:19px;color:grey" class="icon-close" href="#"></a>
           </div>
          </div>
          <div class=" mt-5 d-flex flex-row justify-content-center align-items-center">
            <input type="text" name="search" id="search_mobile" placeholder="Rechercher joueur....">
            <a style="color:white;padding:0.8rem 1rem;background-color:black" href="#" class="icon-search icon-search-mobile"></a>
          </div>
           
        </div>
   
        <div style="margin-top:100px" class="d-flex flex-column justify-content-center align-items-stretched ">
         <a href="index.php" class="lien_canvas px-5  <?php if($title=="Accueil") echo"active";?>">Accueil</a>
            <a href="programme.php" class="lien_canvas px-5 <?php if($title=="Programme des matchs") echo"active";?>">Programme</a>
            <a href="equipe.php" class="lien_canvas px-5  <?php if($title=="Equipe de France") echo"active";?>">Equipe</a>
            <!-- <a href="#" class="lien_canvas px-5">Informations </a> -->
            <a href="contact.php" class="lien_canvas px-5  <?php if($title=="Contactez nous") echo"active";?>">Contact</a>
        </div>
            
      </div> 
    </div> 
   <?php endif;?> 
    