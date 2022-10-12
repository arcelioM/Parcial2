$(function () {
    
    $("body").css('background-image','url("../img/fondo.jpg")');
    $("body").css('transition','background-image 1s');
    $("#consumable").css("overflow", "auto");

    function loadItemWeapon(){
        $.ajax({
            type: "GET",
            url: "../../service/GetInventoryWeapon.php",
            success: showItemWeapon
        });
    }

    function showItemWeapon (response) {
                
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

    function loadItemConsumable(){
        $.ajax({
            type: "GET",
            url: "../../service/GetInventoryConsumable.php",
            success: showItemsConsumable
        });
    }

    function showItemsConsumable(response){
        console.log(response);
        
        let jsonItems=JSON.parse(response);
        let itemsConsumable="";
        
        for(let i=0;i<jsonItems.length;i++){
            console.log(jsonItems[i].id);
            if(jsonItems[i].name=="PIZZA"){
                itemsConsumable=itemsConsumable+"<tr><td>"+jsonItems[i].name+"</td> <td>"+jsonItems[i].value+"</td>"+
                "<td>"+jsonItems[i].weight+"</td>" + "<td>"+jsonItems[i].consumable+"</td>"+ "<td>"+jsonItems[i].spoiled+"</td>"+ "<td>"+jsonItems[i].numberOfSlice+"</td> </tr>";
            }
        }
        $("#bodyCon").html(itemsConsumable);
    }

    loadItemWeapon();
    loadItemConsumable();

    function sortByWeight(){
        let sort={
            'sortBy': "weight"
        }
        $.ajax({
            type: "POST",
            url: "../../service/SortItems.php",
            data: sort,
            dataType: "json",
            success: function (response) {
                //alert(response);
                loadItemConsumable();
                loadItemWeapon();
            }
        });
    }

    function sortByValue(){
        let sort={
            'sortBy': "value"
        }
        $.ajax({
            type: "POST",
            url: "../../service/SortItems.php",
            data: sort,
            dataType: "json",
            success: function (response) {
                //alert(response);
                loadItemConsumable();
                loadItemWeapon();
            }
        });
    }


    $("#btnExit").on("click", function () {
        $(location).attr('href',"menu.html");
    });

    $("#btnSortWeight").on('click', sortByWeight);

    $("#btnSortValue").on('click', sortByValue);
});