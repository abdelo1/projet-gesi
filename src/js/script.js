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

$(document).ready(function(){
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
    timeup.hide()
    countDownDate = new Date("march 12, 2020 16:37:52").getTime();
    setInterval(function() {
        now=new Date().getTime()
        timeleft=countDownDate-now
         days = Math.floor(timeleft / (1000 * 60 * 60 * 24));
         hours = Math.floor((timeleft % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
         minutes = Math.floor((timeleft % (1000 * 60 * 60)) / (1000 * 60));
         seconds = Math.floor((timeleft % (1000 * 60)) / 1000);

         $("#jours").text(days)
         $("#heures").text(hours)
         $("#minutes").text(minutes)
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
    $(window).scroll(function(){
    // if(superHead.position().top<$(this).scrollTop())
    
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
    
    })
    $(".icon-close").click(function(e){
        e.preventDefault()
        $(".canvas").removeClass("slide-out")
        $(".maskAll").hide()
    
    })


})