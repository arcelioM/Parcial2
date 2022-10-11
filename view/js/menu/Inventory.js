$(function () {
    
    $("body").css('background-image','url("../img/fondo.jpg")');
    $("body").css('transition','background-image 1s');

    $.ajax({
        type: "GET",
        url: "../../service/GetInventoryWeapon.php",
        success: function (response) {
            
            let jsonItems=JSON.parse(response);
            let itemsWeapon="";
            
            for(let i=0;i<jsonItems.length;i++){
                if(jsonItems[i].name=="Bow" || jsonItems[i].name=="Sword"){
                    itemsWeapon=itemsWeapon+"<tr><td>"+jsonItems[i].name+"</td> <td>"+jsonItems[i].value+"</td>"+
                    "<td>"+jsonItems[i].weight+"</td>"+"<td>"+jsonItems[i].damage+"</td> <td>"+jsonItems[i].durability+"</td></tr>";
                }
            }
  
            $("#bodyWea").html(itemsWeapon);
        }
    });

    $.ajax({
        type: "GET",
        url: "../../service/GetInventoryConsumable.php",
        success: function (response) {
            
            let jsonItems=JSON.parse(response);
            let itemsConsumable="";
            
            for(let i=0;i<jsonItems.length;i++){
                if(jsonItems[i].name=="PIZZA"){
                    itemsConsumable=itemsConsumable+"<tr><td>"+jsonItems[i].name+"</td> <td>"+jsonItems[i].value+"</td>"+
                    "<td>"+jsonItems[i].weight+"</td>" + "<td>"+jsonItems[i].consumable+"</td> </tr>";
                }
            }
            $("#bodyCon").html(itemsConsumable);
        }
    });


    $("#btnExit").on("click", function () {
        $(location).attr('href',"menu.html");
    });
});