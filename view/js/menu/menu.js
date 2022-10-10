$(function () {
    
    $.ajax({
        type: "GET",
        url: "../../service/User.php",
        datatype: "json",
        success: showInfoUser
    });

    function showInfoUser(response){
        let jsonUser=JSON.parse(response);
        let infoUser="ID: "+jsonUser.id +
           "<br/> USER: "+jsonUser.user + " <br/> EDAD: "+jsonUser.edad+
          "<br/> <img src=../img/"+jsonUser.numImg+".png alt='imagen 2' width='100px' height='100px'>";
        $("#result").html(infoUser);
    }
});