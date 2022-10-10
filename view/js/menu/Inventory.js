$(function () {
    
    $("body").css('background-image','url("../img/fondo.jpg")');
    $("body").css('transition','background-image 1s');

    $.ajax({
        type: "GET",
        url: "../../service/GetInventory.php",
        success: function (response) {
            /*alert(response[1]);
            let jsonItems=JSON.parse(response);
            let itemsString="";
            
            for(let i=0;i<jsonItems.length;i++){
                if(jsonItems[i].name=="pizza"){
                    itemsString=itemsString+jsonItems[i].name+" "+jsonItems[i].value
                }

                if(jsonItems[i].name=="bow" || jsonItems[i].name=="sword"){
                    itemsString=itemsString+jsonItems[i].name+" "+jsonItems[i].value
                }
            }*/
            $("#inventory").append(response);
        }
    });
});