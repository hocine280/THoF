function afficherPassword()
{ 
    var input = document.getElementById("password"); 
    if (input.type === "password"){ 
        input.type = "text";
        document.getElementById("eyes").className="bi bi-eye-slash-fill";
    } else{ 
        input.type = "password"; 
        document.getElementById("eyes").className="bi bi-eye-fill";
    } 
} 

function afficherConfirmationPassword()
{ 
    var input = document.getElementById("password_confirmation"); 
    if (input.type === "password"){ 
        input.type = "text";
        document.getElementById("eyes").className="bi bi-eye-slash-fill";
    } else{ 
        input.type = "password"; 
        document.getElementById("eyes").className="bi bi-eye-fill";
    } 
} 


/**
 * Utiliser les recovery code
 */
function afficherRecoveryCode(){
    var input_code = document.getElementById("code");
    var input_recovery_code = document.getElementById("recovery_code"); 
    var link_recovery_code = document.getElementById("link_recovery_code"); 
    var link_code = document.getElementById("link_code"); 
    if(input_code.type === "number"){
        input_code.type="hidden"; 
        input_recovery_code.type="number"; 
        link_recovery_code.style.display="none"; 
        link_code.style.display="block"; 
    }else{
        input_code.type="number";
        input_recovery_code.type="hidden";
        link_code.style.display="none"; 
        link_recovery_code.style.display="block"; 
    }
}