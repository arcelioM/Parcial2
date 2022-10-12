$(function () {
    $("body").css('background-image','url("../img/fondo4.jpg")');
    $("#item1").css('transition','background-image 1s');
    

    function getValueItemShow(a,b){
        return Math.floor(Math.random() * (b - a) + a);
    }

    let pizza=null;
    let bow=null;
    let sword=null;
    let item1=null;
    let item2=null;

    function showItems(){
        pizza={
            "item": "pizza",
            "slices": getValueItemShow(1,4),
            "spoiled": getValueItemShow(0,1.9)
        };
    
    
        bow={
            "item": "bow",
            "baseDamage": 0.40,
            "baseDurability": 50,
            "value": getValueItemShow(80,100),
            "weight": getValueItemShow(30,35)
        };
    
        sword={
            "item": "sword",
            "baseDamage": 0.50,
            "baseDurability": 60,
            "value": getValueItemShow(80,100),
            "weight": getValueItemShow(40,45)
        };
    
        let items=[pizza,sword,bow];
    
        let ramdomValue=getValueItemShow(0,3);
    
        let imgItem="<img id='itemSelect1'  src=../img/"+items[ramdomValue].item+".png alt='imagen 2' width='100%' height='100%'>";
    
        item1=items[ramdomValue];
        //alert(ramdomValue);
        $("#item1").html(imgItem);
    
        ramdomValue=getValueItemShow(0,3);
    
        imgItem="<img id='itemSelect2' src=../img/"+items[ramdomValue].item+".png alt='imagen 2' width='100%' height='100%'>";
    
        item2=items[ramdomValue];
        //alert(ramdomValue);
        $("#item2").html(imgItem);
    }

    showItems();

    $("#item1").hover(function () {
            // over
            $("#item1").addClass("bg-opacity-75");
        }, function () {
            // out
            $("#item1").removeClass("bg-opacity-75");
            $("#item1").addClass("bg-opacity-50");
        }
    );

    $("#item2").hover(function () {
        // over
        $("#item2").addClass("bg-opacity-75");
    }, function () {
        // out
        $("#item2").removeClass("bg-opacity-75");
        $("#item2").addClass("bg-opacity-50");
    });

    

    
    
    $("#item1").on('click',"#itemSelect1", function () {

        $.ajax({
            type: "POST",
            url: "../../service/AddItemInventory.php",
            data: item1,
            dataType: "json",
            success: function (response) {
                console.log("ITEM CREADO: "+response);
            }
        });

        showItems();
    });


    $("#item2").on('click',"#itemSelect2", function () {
        
        $.ajax({
            type: "POST",
            url: "../../service/AddItemInventory.php",
            data: item2,
            dataType: "json",
            success: function (response) {
                console.log("ITEM CREADO: "+response);
            }
        });

        showItems();
    });


    $("#btnExit").on("click", function () {
        $(location).attr('href',"menu.html");
    });

    


});