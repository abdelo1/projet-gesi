<?php
  include ("header.php");
?>
<div class="maskAll"> </div><!--d-flex flex-colum justify-content-md-start justify-content-center   align-items-center -->
<div class="cover ">
 
  <div class="slider">
    <div class="mask"></div>

    <div class="slides item-1">
        <div class="welcome animated fadeInUp d-md-block d-none ml-5">
          <p class="p-responsive">ALLEZ LES BLEUS.</p> <p style="margin-top:-1rem;margin-left:2rem">REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom"> VOIR PLUS >></a>
        </div>
        <div class="welcome animated fadeInUp d-md-none d-block">
          <p class="text-center">ALLEZ LES BLEUS. REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom"> VOIR PLUS >></a>
        </div>
        <div  class="arrow d-flex flex-row  justify-content-around">
          <a  href="#" class="icon-arrow-left prev"></a>
          <a  href="#" class="icon-arrow-right ml-5 next"></a>
        </div>
    </div>
    <div class="slides item-2">
    <div class="welcome d-md-block d-none ml-5">
          <p class="p-responsive">ALLEZ LES BLEUS.</p> <p style="margin-top:-1rem;margin-left:2rem">REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom"> VOIR PLUS >></a>
        </div>
        <div class="welcome d-md-none d-block">
          <p class="text-center">ALLEZ LES BLEUS. REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom"> VOIR PLUS >></a>
        </div>
        <div  class="arrow d-flex flex-row justify-content-around">
          <a  href="#" class="icon-arrow-left prev"></a>
          <a  href="#" class="icon-arrow-right ml-5 next"></a>
        </div>
    </div>
    <div class="slides item-3">
       <div class="welcome d-md-block d-none ml-5">
          <p class="p-responsive">ALLEZ LES BLEUS.</p> <p style="margin-top:-1rem;margin-left:2rem">REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom"> VOIR PLUS >></a>
        </div>
        <div class="welcome d-md-none d-block">
          <p class="text-center">ALLEZ LES BLEUS. REVONS PLUS GRAND !!</p>
          <a href="#section" class="btn_custom"> VOIR PLUS >></a>
        </div>
        <div  class="arrow d-flex flex-row  justify-content-around">
          <a  href="#" class="icon-arrow-left prev"></a>
          <a  href="#" class="icon-arrow-right ml-5 next"></a>
        </div>
    </div>

   </div> 
</div>


  <div style="margin-top:-20px;margin-bottom:10px;z-index:5;" class="div-entrance col-12 row justify-content-center">
    <div class=" entrance ml-4 ml-md-0">
      <div class="info p-3 d-flex flex-column justify-content-center">
          <h5 class="font-weight-bold text-white">Championnat de france </br> de football . </h5>
          <p class=" text-white mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eos repellat autem illum nostrum sit distinctio!
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eos repellat autem illum nostrum sit distinctio!
          </p>
        <div>
          <a href="#" class="btn_custom mt-5"> VOIR PLUS >></a>
        </div> 
      </div>
    </div>
    <div class=" entrance ml-4 ">
    <div class="info p-3 d-flex flex-column justify-content-center">
          <h5 class="font-weight-bold text-white">Championnat de france </br> de football . </h5>
          <p class=" text-white mt-3">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eos repellat autem illum nostrum sit distinctio!
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eos repellat autem illum nostrum sit distinctio!
            
          </p>
        <div>
          <a href="#" class="btn_custom mt-5"> VOIR PLUS >></a>
        </div> 
      </div>
    </div>
  </div>
  <section id="section" class="p-5 first_section">
      <div class=" countdown p-3 row w-60">
         <div class="d-flex  flex-column col-md-5">
           <p class="text-muted prochainm">Prochain match dans :</p>
           <div class="d-flex flex-row col-12 justify-content-md-start justify-content-center"> 
             <p  id="jours"></p><span class="text-muted mt-1 mt-md-3">jrs</span> 
             <p  id="heures"></p><span class="text-muted mt-1 mt-md-3">hr</span>
             <p  id="minutes"></p><span class="text-muted mt-1 mt-md-3">min</span>
             <p   id="secondes"></p><span class="text-muted mt-1 mt-md-3">sec</span>
             <p class="text-dark timeup">Jour de matchs !!</p>
            </div> 
         </div>
          <div class="versus col-md-6 d-flex flex-column  flex-md-row justify-content-center align-items-center">
            <img src="ressources/logo2.png"  alt="">
            <span class="ml-2 mt-4">FRANCE</span>
            <span class=" text-muted ml-2 mt-4">VS </span>
            <span class=" ml-2 mt-4">PORTUGAL</span>
            <img src="ressources/logoportugal.jpg" class="ml-2"  alt="">
          </div>
      </div>
      <div class="last_match w-100 mt-5 ">
         <p class="text-dark">Tout dernier match</p>
         <div class="tab-link w-100">
            <a class="link-tab link-tab_active" href="#">
                 Euro
            </a>
            <a class="link-tab ml-4" href="#">
                Coupe du monde
            </a>
         </div>
         <div class="div_tab euro w-100 mt-4 d-flex flex-column">
            <div class="first card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                <div class="d-flex flex-md-row flex-column ">
                   <img src="ressources/logo2.png"  alt="">
                   <span class="ml-2 mt-4">FRANCE</span>
                </div>
                <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                   <span style="font-size:17px" class="score-left font-weight-bold text-white">3</span>
                   <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                   <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> 2</span>
                </div>
                <div class="d-flex flex-md-row flex-column ">
                  <span class=" ml-2 mt-4">MOLDAVIE</span>
                  <img src="ressources/logomoldavie.jpg" class="ml-2 mt-3 mt-md-0"  alt="">
                </div>   
              </div>
            </div>
            <div class="second mt-2 card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                  <div class="d-flex flex-md-row flex-column ">
                    <img src="ressources/logo2.png"  alt="">
                    <span class="ml-2 mt-4">FRANCE</span>
                  </div>
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white">3</span>
                    <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                    <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> 2</span>
                  </div>
                  <div class="d-flex flex-md-row flex-column ">
                    <span class=" ml-2 mt-4">RUSSIE</span>
                    <img src="ressources/logorussie.png" class="ml-2 mt-3 mt-md-0"  alt="">
                  </div>   
                </div>
                
              </div>
            <div class="last mt-2 card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                  <div class="d-flex flex-md-row flex-column ">
                    <img src="ressources/logo2.png"  alt="">
                    <span class="ml-2 mt-4">FRANCE</span>
                  </div>
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white">3</span>
                    <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                    <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> 2</span>
                  </div>
                  <div class="d-flex flex-md-row flex-column ">
                    <span class=" ml-2 mt-4">CROATIE</span>
                    <img src="ressources/logocroatie.jpg" class="ml-2 mt-3 mt-md-0"  alt="">
                  </div>   
                </div>
                
              </div>
            </div>
         </div>
         <div class="div_tab coupe w-100 mt-4 d-flex flex-column">
            <div class="first  card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                <div class="d-flex flex-md-row flex-column">
                   <img src="ressources/logo2.png"  alt="">
                   <span class="ml-2 mt-4">FRANCE</span>
                </div>
                <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                   <span style="font-size:17px" class="score-left font-weight-bold text-white">3</span>
                   <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                   <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> 2</span>
                </div>
                <div class="d-flex flex-md-row flex-column ">
                  <span class=" ml-2 mt-4">BENIN</span>
                  <img src="ressources/logobenin.png" class="ml-2"  alt="">
                </div>  
              </div>
            </div>
            <div class="second mt-2 card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                  <div class="d-flex flex-md-row flex-column ">
                    <img src="ressources/logo2.png"  alt="">
                    <span class="ml-2 mt-4">FRANCE</span>
                  </div>
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white">3</span>
                    <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                    <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> 2</span>
                  </div>
                  <div class="d-flex flex-md-row flex-column ">
                    <span class=" ml-2 mt-4">URUGUAY</span>
                    <img src="ressources/logouruguay.jpg" class="ml-2 mt-3 mt-md-0"  alt="">
                  </div>   
                </div>
                
              </div>
            <div class="last mt-2 card p-3  w-100">
              <div class="versus w-100 d-flex flex-column  flex-md-row justify-content-between align-items-center">
                  <div class="d-flex flex-md-row flex-column ">
                    <img src="ressources/logo2.png"  alt="">
                    <span class="ml-2 mt-4">FRANCE</span>
                  </div>
                  <div style="width:100px;height:70px;border-radius:7px;background:black" class="score mt-3 mt-md-0 d-flex flex-row justify-content-center align-items-center text-center">
                    <span style="font-size:17px" class="score-left font-weight-bold text-white">3</span>
                    <span style="font-size:17px" class="font-weight-bold text-white ml-2" >:</span>
                    <span style="font-size:17px" class="score-right font-weight-bold text-white ml-2"> 2</span>
                  </div>
                  <div class="d-flex flex-md-row flex-column ">
                    <span class=" ml-2 mt-4">EGYPTE</span>
                    <img src="ressources/logoegypte.png" class="ml-2 mt-3 mt-md-0"  alt="">
                  </div>   
                </div>
                
              </div>
            </div>
        </div>

      </div>
  </section>
<?php
  include ("footer.php");
?>