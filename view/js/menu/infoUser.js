$(function () {
    $.ajax({
        type: "GET",
        url: "../../service/User.php",
        datatype: "json",
        success: showInfoUser
    });

    function showInfoUser(response){
        let jsonUser=JSON.parse(response);
        let infoUser="<h6 class='card-subtitle mb-2 text-white'>ID: "+jsonUser.id +
           "</h6><h6 class='card-subtitle mb-2 text-white'>USER: "+jsonUser.user + "</h6>"
           +"<h6 class='card-subtitle mb-2 text-white'> EDAD: "+jsonUser.edad+
          "</h6>  <img class'card-img-bottom' src=../img/"+jsonUser.numImg+".png alt='imagen 2' width='100px' height='100px'>";
        $("#bodyCard").append(infoUser);
    }
});