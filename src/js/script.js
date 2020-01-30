// let entrance =document.getElementsByClassName("entrance")
//  console.log(entrance)

//     entrance.addEventListener("mouseover",function(){
//         e.target.classList.add("scale")
//         e.target.firstChildren.classList.add("show")
//      },false)
//      entrance.addEventListener("mouseout",function(){
//          e.target.classList.remove("scale")
//          e.target.firstChildren.classList.remove("show")
//       },false)

$(function(){

    index=0
    currentIndex=0
    slider=$('.slider')
    slides=$('.slides')
    entrance =$('.entrance')
    prev=$('.prev')
    next=$('.next')
    coupeDuMonde=$('.coupe')
    euro=$('.euro')
    timeup=$('.timeup')
    search= $("#search")
    search_mobile= $("#search_mobile")
    $(".programme-div").hide()
    $(".infojoueur-div").removeClass('d-flex').hide()
    timeup.hide()
    countDownDate = new Date("march 12, 2020 16:37:52").getTime();
    setInterval(function() {
        now=new Date().getTime()
        timeleft=countDownDate-now
        days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
        hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
        seconds = Math.floor((timeleft % (1000 * 60)) / 1000);
        if(days<10)
            $("#jours").text("0"+days) 
        else
            $("#jours").text(days)
        if(hours<10)
            $("#heures").text("0"+hours) 
        else
            $("#heures").text(hours)
        if(minutes<10)
            $("#minutes").text("0"+minutes) 
        else   
            $("#minutes").text(minutes)
        if(seconds<10)
            $("#secondes").text("0"+seconds) 
        else   
            $("#secondes").text(seconds)

         if(timeleft<0)
           {
            $("#jours,#heures,#minutes,#secondes") .hide()
            $("#jours span,#heures span,#minutes span,#secondes span") .hide()
            timeup.show() 
           }
        }, 1000)
    coupeDuMonde.removeClass("d-flex").hide()
    $(".maskAll").hide()
    $('.link-tab').eq(0).click(function(e){
        e.preventDefault()
        
        $(this).addClass("link-tab_active")
        $(this).next().removeClass("link-tab_active")
        euro.addClass("d-flex").show()
        coupeDuMonde.removeClass("d-flex").hide()

    })
    $('.link-tab').eq(1).click(function(e){
         e.preventDefault() 
    
        $(this).addClass("link-tab_active")
        $(this).prev().removeClass("link-tab_active")
        coupeDuMonde.addClass("d-flex").show()
        euro.removeClass("d-flex").hide()

    })
    prev.click(function(e){
        e.preventDefault()
        currentIndex=--index
        console.log("ci"+currentIndex)
        if(currentIndex==-1)
        {
            i=slider.children().length-2
            slider.css({
                transform:"translateX(-"+33.3*i+"%)",
                transition:"0.5s"
            })
            index=i
            console.log(index)
        }
        else
        {
           
             slider.css({
                transform:"translateX(-"+33.3*currentIndex+"%)",
                transition:"0.5s"
             })
        }

       
    })
    next.click(function(e){
        e.preventDefault() 
        currentIndex=++index
        console.log(currentIndex)
        if(index==slider.children().length-1)
        {
            slider.css({
                transform:"translateX(0%)",
                transition:"0.5s"
            })
           
            index=0
            console.log(index)
        }
        else

        slider.css({
            transform:"translateX(-"+33.3*currentIndex+"%)",
            transition:"0.5s"
        })
        
    })
    function advance(){
        currentIndex=++index
        if(index==slider.children().length-1)
        {
            slider.css({
                transform:"translateX(0%)",
                transition:"0.5s"
            })
           
            index=0
            console.log(index)
        }
        else

        slider.css({
            transform:"translateX(-"+33.3*currentIndex+"%)",
            transition:"0.5s"
        })
     
    }
    setInterval(advance,5000)
   superHead=$(".super-head")
   dm=$('.derniereminute')
   carte=$('.carte')
    $(window).scroll(function(){
     if(carte.position().top-300<=$(this).scrollTop())
     {
         carte.addClass("animated zoomIn")
         carte.css("opacity","1")
     }
         
    
    })
    entrance.each(function(){
        entrance.mouseover(function(){
            $(this).addClass("scale")
            $(this).children().addClass("show")
        })
        entrance.mouseout(function(){
            $(this).removeClass("scale")
            $(this).children().removeClass("show")
        })
    })
    hamburger =$(".hamburger")
    hamburger.click(function(){
        $(".canvas").addClass("slide-out")
        $(".maskAll").show()
    
    })
    
    $(".maskAll").click(function(){
        $(".canvas").removeClass("slide-out")
        $(".maskAll").hide()
        $(".programme-div").hide()
        $(".infojoueur-div").removeClass("d-flex").hide()
    })
    $(".icon-close").click(function(e){
        e.preventDefault()
        $(".canvas").removeClass("slide-out")
        $(".maskAll").hide()
    
    })

   search.keyup(function(){
       query="nom="+$(this).val()
       $.get("search.php",query,function(data){
           $('.output').empty()
           $('.output').html(data)
       })
       .fail(function(){
           console.log("erreur lors de la requete ajax")
       })
   })
   $('.output').mouseover(function(e){
       search.val(e.target.innerText) 
      
   })
   $('.output').click(function(e){
    search.val(e.target.innerText)
    $(this).empty() 
})
$('.programme').click(function(e){
    e.preventDefault()
    $(".maskAll").show()
    $(".programme-div").show()
})
$('.voirpluscover').click(function(e){
    e.preventDefault()
     $('body,html').animate({
               scrollTop:$(this.hash).offset().top
             },1000)

  })
  $('.icon-search').click(function(e){
    e.preventDefault()
   if(search.val())
   {
    query="nom="+search.val()+"&search=1"
    $.get("search.php",query,function(data){
        if(data=="joueur inexistant")
             alert("Ce joueur ne figure pas dans la liste des selectionnes")
        else
        {
            alert(data)
            data=JSON.parse(data)
             $('.infojoueur-div .nom').text(data.nom)
            $('.infojoueur-div .ddn').text(data.ddn)
            $('.infojoueur-div .ldn').text(data.ldn)
            $('.infojoueur-div .poste').text(data.poste)
            $('.infojoueur-div img').attr("src",data.photo)
            $('.infojoueur-div .club').text(data.club)
            $(".infojoueur-div").addClass('d-flex').show()
            $(".maskAll").show()
        }
        search.val("")
    })
    .fail(function(){
        console.log("erreur lors de la requete ajax")
    })
    
   }

  })
  $('.icon-search-mobile').click(function(e){
    e.preventDefault()
   if(search_mobile.val())
   {
    query="nom="+search_mobile.val()+"&search=1"
    $.get("search.php",query,function(data){
        if(data=="joueur inexistant")
             alert("Ce joueur ne figure pas dans la liste des selectionnes")
        else
        {
            alert(data)
            data=JSON.parse(data)
             $('.infojoueur-div .nom').text(data.nom)
            $('.infojoueur-div .ddn').text(data.ddn)
            $('.infojoueur-div .ldn').text(data.ldn)
            $('.infojoueur-div .poste').text(data.poste)
            $('.infojoueur-div img').attr("src",data.photo)
            $('.infojoueur-div .club').text(data.club)
            $(".infojoueur-div").addClass('d-flex').show()
            $(".maskAll").show()
            $(".canvas").removeClass("slide-out")
        }
       search_mobile.val("")
           
    })
    .fail(function(){
        console.log("erreur lors de la requete ajax")
    })
    

   }

  })
})
