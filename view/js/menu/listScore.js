$(function () {
    
    $.ajax({
        type: "GET",
        url: "../service/getListUser.php",
        datatype: "json",
        success: showInfoUsers
    });

    function showInfoUsers(response){
        //alert(response);
        let jsonUsers=JSON.parse(response);
        let infoUser="";
        
        for(let i=0;i<jsonUsers.length;i++){
           infoUser=infoUser+"<tr> <td> "+jsonUsers[i].id +
           "</td> <td>"+jsonUsers[i].user + "</td> <td>"+jsonUsers[i].edad+
          "</td> <td> <img src='img/"+jsonUsers[i].numImg+".png' alt='imagen 2' width='100px' height='100px'> </td> </tr>";
        }

        $("#bodyTableUsersList").html(infoUser);
    }
    
});