<?php
  include ("header.php");


  $name = $email = $subject = $message= "";
  error_reporting(0);
  #si la requête est methode post
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
          #traite les variable
         $name = test_input($_POST["name"]);
         $email = test_input($_POST["email"]);
         $message = test_input($_POST["message"]);
         $subject = test_input($_POST["subject"]);
           #si le nom contient des caractères bizzares ou l'email est invalide ou la variable message et subject est vide
         if (preg_match("/^[a-zA-Z ]*$/",$name) and filter_var($email, FILTER_VALIDATE_EMAIL) and !empty($message)and !empty($subject)) {
             $code;
          #contenu de l'email
           $to="abdeli12.ai@gmail.com";
           $content="Nom :$name\n";
           $content.="Email:$email\n";
           $content.="Message :\n\n$message\n";
           #entete de l'email
           $header="Name :$name <$email>";
          #envoie de l'email
           $envoye= mail($to,$subject,$content,$header);
           if($envoye)
             $success="Votre email a bien ete envoye nous vous contacterons dans les plus bref delai !";
          else
            $error="Votre email n'a pas ete envoye veuillez reessayer !";
               }
               else{
  
                $error="Le formulaire a ete mal rempli veuillez reessayer !";
            
           } 
          
         
       }
          
  
  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<style>
.cover-contact{
    width:100% ;
    height: 100%;   
    position: relative; 
    overflow: hidden;

 }
 .cover-contact img{
   position:absolute;
   width:100%;
   height:100%;
   top:0;
   left:0;
 }
</style>

<div class="cover-contact d-flex align-items-center">
    <div class="mask"></div>
      <img src="ressources/about_1.jpg" alt="">
    <div class="welcome animated fadeInUp d-md-block d-none ml-5">
     <p class="p-responsive">ALLEZ LES BLEUS.</p> <p style="margin-top:-1rem;margin-left:2rem">REVONS PLUS GRAND !!</p>
    </div>
    <div class="welcome animated fadeInUp d-md-none d-block">
      <p class="text-center">ALLEZ LES BLEUS. REVONS PLUS GRAND !!</p>
    </div>
</div>
      <div class="container">

   
        <div class="row align-items-first">
          <div class="col-md-7">
        
            <form action="contact.php" method="post" class="bg-white">
                <?php if(isset($success)): ?>
                  <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="alert alert-primary"><p><?=$success?></p></div>
                    </div>
                  </div>
              <?php endif; ?>
              <?php if(isset($error)): ?>
                  <div class="row mt-2">
                    <div class="col-sm-12">
                        <div class="alert alert-danger"><p><?=$error?></p></div>
                    </div>
                  </div>
              <?php endif; ?>
              <div class="p-3 p-lg-5 ">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Nom complet <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_fname" name="name" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control" id="c_email" name="email" placeholder="" required>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_subject" class="text-black">Sujet <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="c_subject" name="subject" required>
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_message" class="text-black">Message <span class="text-danger">*</span></label>
                    <textarea name="message" id="c_message" cols="30" rows="7" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-danger btn-lg btn-block" value="Envoyer">
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="col-md-5 mt-4">
            <div class="p-4 border mb-3 bg-white">
              <p class="mb-0">Addresse</p>
              <p class="mb-4">Louis,Libreville Gabon</p>

              <p class="mb-0">Telephone</p>
              <p class="mb-4"><a href="#">+241 077452017</a></p>

              <p class="mb-0">Adresse Email</p>
              <p class="mb-4"><a href="#">abdeli12.ai@gmail.com</a></p>

            </div>
            
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