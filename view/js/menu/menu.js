$(function () {


    $.ajax({
        type: "GET",
        url: "../../service/CreateInvetory.php",
        success: function (response) {
            console.log("Inventario creado: "+response);
        }
    });
    
    $("body").css('background-image','url("../img/fondo.jpg")');
    $("body").css('transition','background-image 1s');

    
    

    $("#see").hover(function () {
            // over
            $("body").css('background-image','url("../img/fondo2.jpg")');
            
    });

    $("#search").hover(function () {
        // over
        //$("body").slideUp("slow");
        $("body").css('background-image','url("../img/fondo1.jpg")');
        
        //$("body").slideDown("slow");
        //$('body').fadeIn('slow', function() { $(this).css({opacity: 100})});    
    });

    $("#exit").hover(function () {
        // over
        $("body").css('background-image','url("../img/fondo3.jpg")');
    });

    $("#exit").on("click", function () {
        $(location).attr('href',"../");
    });

    $("#search").on("click", function () {
        $(location).attr('href',"search.html");
    });


});