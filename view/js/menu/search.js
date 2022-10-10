$(function () {
    $("body").css('background-image','url("../img/fondo4.jpg")');

    let pizza={
        "item": "pizza",
        "slices": 4,
        "spoiled": false
    };

    let bow={
        "item": "bow",
        "baseDamage": 0.40,
        "baseDurability": 50,
        "value": 90,
        "weight": 30
    };

    let sword={
        "item": "sword",
        "baseDamage": 0.50,
        "baseDurability": 60,
        "value": 95,
        "weight": 45
    };

    let items=[pizza,sword,bow];

    function getValueItemShow(){
        return Math.floor(Math.random() * (3 - 0) + 0);
    }

    let ramdomValue=getValueItemShow();

    let imgItem="<img id='itemSelect1'  src=../img/"+items[ramdomValue].item+".png alt='imagen 2' width='100%' height='100%'>";

    let item1=items[ramdomValue];
    //alert(ramdomValue);
    $("#item1").append(imgItem);

    ramdomValue=getValueItemShow();

    imgItem="<img id='itemSelect2' src=../img/"+items[ramdomValue].item+".png alt='imagen 2' width='100%' height='100%'>";

    let item2=items[ramdomValue];
    //alert(ramdomValue);
    $("#item2").append(imgItem);

    
    
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
    });


    $("#btnExit").on("click", function () {
        $(location).attr('href',"menu.html");
    });



});