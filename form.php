<?php
  include ("header.php");
  $pdo=new PDO("mysql:host=localhost;dbname=equipe","root","");
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
      extract($_POST);

      $query=$pdo->prepare("INSERT INTO titulaire VALUES(?,?,?,?,?,?,?)");
     $result=  $query->execute([
          null, $nom,$ddn,$ldn,$club,$photo,$poste
      ]);
      if($result)
      {
       
      }
     else 
     echo "c pas bon" ;
  }

?>
<pre>
  <?php
    var_dump($_SERVER);
  ?>
</pre>
<div class="container">
    <!-- <form action="form.php" method="post" class="form-signin col-6">
  <img class="mb-4" src="" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  <div class="form-group">
       <label for="inputEmail" class="sr-only">nom</label>
  <input type="text" id="inputnom" name="nom" class="form-control" placeholder="nom"  required autofocus>
  </div>
 
  <label for="inputddn"  class="sr-only">ddn</label>
  <input type="text" name="ddn" id="inputddn" class="form-control" placeholder="ddn"   required>
 
  <label for="inputldn"  class="sr-only">ldn</label>
  <input type="text" name="ldn" id="inputldn" class="form-control" placeholder="ldn"  required>
 
  <label for="inputclub"  class="sr-only">club</label>
  <input type="text" name="club" id="inputclub" class="form-control" placeholder="club"   required>
  
  
  <label for="inputphoto"  class="sr-only">photo</label>
  <input type="text" name="photo" id="inputphoto" class="form-control" placeholder="photo"  required>


  <label for="inputposte"  class="sr-only">poste</label>
  <input type="text" name="poste" id="" class="form-control"  placeholder="poste"   required>

  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>

</form> -->
</div>
<div class="row d-flex flex-column flex-md-row ">
   <?php
$query=$pdo->query("SELECT photo from  titulaire");
while($result=$query->fetch()):
?>
<div class="col-3">
 <img class="w-100" src="<?= $result['photo']?>" alt="">
</div>

<?php
endwhile;
?> 
</div>
<?php
  include ("footer.php");
?> 