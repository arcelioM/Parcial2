$(function () {
    
    /**
     * *FUNCION QUE SE ENCARGAR DE GUARDAR INFO DE USUARIO EN SESSION
     */

    let numImg=null;
    let createUser=()=>{
        let user=$("#user").val();
        let edad=$("#edad").val();
       
        
        
        let newUser={
            "user": user,
            "edad": edad,
            "numImg": numImg
        }

        createUserWebService(newUser);
    };

    /**
     * *FUNCION QUE HAYA LLAMADO AL SERVICIO PARA AGREGAR USUARIO A SESSION EN BACKEND
     */
    function createUserWebService(user){

        $.ajax({
            type: "POST",
            url: "../service/User.php",
            data: user,
            dataType: "json",
            success: validateCreate,
        });
    }

    /**
     * *FUNCION VALIDARA SI EL USUARIO SE CREO, SEGUN LA RESPUESTA QUE HAYA ENVIADO EL WEBSERVICE
     */
    function validateCreate(response){
        if(response){
            $(location).attr('href',"menu/menu.html");
        }else{
            alert("Error en creacion de usuario");
        }
    }

    $("#btn").on("click", createUser);


    /**
     * *VALIDA QUE LOS INPUT HAYAN SIDO LLENADOS ANTES ENVIAR LA INFO
     */
    $("#user").on("change", function () {
        if($("#btn").attr('disabled')=="disabled" && $("#edad").val().trim()!="" && $("#edad").val().trim()>0){
            
            if($("#numImg3").is(":checked") || $("#numImg2").is(":checked") || $("#numImg1").is(":checked")){
                $("#btn").attr('disabled',false);
            }
        }
    });

    
    $("#edad").on("change", function () {
        if($("#btn").attr('disabled')=="disabled" && $("#user").val().trim()!="" ){

            if($("#numImg3").is(":checked") || $("#numImg2").is(":checked") || $("#numImg1").is(":checked")){
                $("#btn").attr('disabled',false);
            }
            
        }
    });

    $("#numImg1").on("change", function () {

        if($(this).is(":checked") && $("#btn").attr('disabled')=="disabled" && $("#edad").val().trim()!="" && $("#edad").val().trim()>0 && $("#user").val().trim()!=""){
            $("#btn").attr('disabled',false);
            
        }
        numImg=1;
    });

    $("#numImg2").on("change", function () {

        if($(this).is(":checked") && $("#btn").attr('disabled')=="disabled" && $("#edad").val().trim()!="" && $("#edad").val().trim()>0 && $("#user").val().trim()!=""){
            $("#btn").attr('disabled',false);
           
        }
        numImg=2;
    });

    $("#numImg3").on("change", function () {

        if($(this).is(":checked") && $("#btn").attr('disabled')=="disabled" && $("#edad").val().trim()!="" && $("#edad").val().trim()>0 && $("#user").val().trim()!=""){
            $("#btn").attr('disabled',false);
        }
        numImg=3;
    });
});